<?php
/**
 * Responsible for loading all Cornerstone elements
 */
class Cornerstone_Element_Renderer {

	private $manager;
	private static $instance;

	public function __construct( $manager ) {
		self::$instance = $this;
		$this->manager = $manager;
	}

	/**
	 * Respond to AJAX request
	 */
	public static function ajaxHandler() {
		global $post;
		if ( !isset( $_POST['post_id'] ) || !$post = get_post( (int) $_POST['post_id'] ) )
      wp_send_json_error( array('message' => 'post_id not set' ) );

    setup_postdata( $post );

		if ( !isset( $_POST['request'] ) )
			wp_send_json_error( array('message' => 'No element data recieved' ) );


		$json = stripslashes( html_entity_decode( $_POST['request'] ) );
		$data = json_decode( $json, true );

		$result = self::$instance->batch( $data );

		if ( is_wp_error( $result ) )
			wp_send_json_error( array( 'message' => $result->get_error_message() ) );


		// Suppress PHP error output unless debugging
		if ( CS()->common()->isDebug() )
			return wp_send_json_success( $result );
		return @wp_send_json_success( $result );
	}

	/**
	 * Return an element that has been rendered with data formatted for saving
	 * @param  array $data  element data
	 * @return string       final shortcode
	 */
	public static function saveElement( $data ) {
		$element = self::$instance->manager->get($data['elType']);

		if ( $element->shouldRender() == true ) {
			return '';
		}

		$data = self::$instance->formatData( $data, $element, true );

		return $element->renderElement( $data );
	}

	/**
	 * Return an element that has been rendered with data formatted for the preview window
	 * @param  array $data  element data
	 * @return string       shortcode to be processed for preview window
	 */
	public function renderElement( $data ) {

		$element = $this->manager->get($data['elType']);

		if ( $element == null )
			return $this->renderError( 'Element not registered: <strong>' . $data['elType'] . '</strong>' );

		if ( !is_callable( array( $element, 'render' ) ) )
			return $this->renderError( 'Element missing render method: <strong>' . $data['elType'] . '</strong>' );

		$data = $this->formatData( $data, $element, false );

		$emptyConditions = $element->emptyCondition();
		$renderEmpty = false;
		if ( is_array( $emptyConditions ) ) {

			$remainingConditions = array();

			foreach ($element->emptyCondition() as $conditionName => $conditionValue) {

				$negate = ( strpos($conditionName, '!') == 0 );

				if ($negate)
					$conditionName = str_replace('!', '', $conditionName);

	  		$controlValue = $data[$conditionName];

	  		$check = ( is_array($controlValue) ) ? in_array( $controlValue, $conditionValue ) : ( $controlValue == $conditionValue );

	  		if ( $negate )
	  			$check = !$check;

	  		if ($check)
	  			$remainingConditions[] = $conditionName;

			}

			$renderEmpty = empty($remainingConditions);

		} elseif ( $emptyConditions == true ) {
			$renderEmpty = true;
		}

		if ( $renderEmpty )
				return $element->renderEmpty( $data);

		if ( isset($_POST['no_do_shortcode']) && $_POST['no_do_shortcode'] == true )
			return $element->renderElement( $data );

		return do_shortcode( $element->renderElement( $data ) );
	}


	/**
	 * Run a batch of render jobs.
	 * This helps reduce AJAX request, as the javascript will send as many
	 * elements as it can to be rendered at once.
	 * @param  array $data list of jobs with element data
	 * @return array       finished jobs
	 */
	public function batch( $data ) {

		$results = array();

		foreach ($data as $job) {

			if ( !isset( $job['jobID'] ) || !isset( $job['data'] ) )
				return new WP_Error( 'cs_renderer', 'Malformed render job request');

			$results[] = array(
				'jobID' => $job['jobID'],
				'render' => $this->renderElement( $job['data'] )
			);

		}

		return $results;
	}

	/**
	 * If something goes wrong with a render job, output empty element styling with a message
	 * @param  string $message
	 * @return string
	 */
	private function renderError( $message ) {
		return '<div class="cs-empty-element cs-element-error"><span class="sub-title">' . $message . '</span></div>';
	}

	/**
	 * Process data before it is rendered.
	 * @param  array   $data    Input data
	 * @param  object  $element Element object we cant refer to for controls and whatnot
	 * @param  boolean $saving  If the data is meant to be saved (otherwise we're in the preview window)
	 * @param  boolean $child   Flag indicating if we're working recursively
	 * @return [type]           Formatted output data
	 */
	private function formatData( $data, $element, $saving = false, $child = false ) {

		// Recursively apply to child collections
		$childType = $element->childType();

		if (isset($data['elements']) && $childType != false) {

			$childType = $this->manager->get( $childType );

			$elements = array();
			foreach ($data['elements'] as $key => $item) {
				$elements[] = $this->formatData( $item, $childType, $saving, true );
			}
			$data['elements'] = $elements;

		} else {
			$data['elements'] = array();
		}

		$data = wp_parse_args( $data, $element->getDefaults() );

		// Get around id being a reserved keyword. This way we can still use it in render methods for elements
		if ( isset( $data['custom_id'] ) )
			$data['id'] = $data['custom_id'];

		$data['builder'] = !$saving;


		// Format data before rendering
		foreach ($data as $key => $item) {

			if ( is_array($item) && count($item) == 5 && ( $item[4] == 'linked' || $item[4] == 'unlinked' ) ) {
				$data[$key . '_linked' ] = array_pop($item);
				$data[$key] = array_map( 'esc_html', array( $item[0],$item[1],$item[2],$item[3] ) );
				continue;
			}

			// Convert boolean to string
			if ( $item === true ) {
				$data[$key] = 'true';
				continue;
			}

			if ( $item === false ) {
				$data[$key] = 'false';
				continue;
			}

			// Secure HTML from unworthy users
			if ( is_string( $item ) && !current_user_can( 'unfiltered_html' ) ) {

				$data[$key] = wp_kses( $item, $this->ksesTags() );
				continue;
			}

		}

		if ( !isset( $data['content'] ) ) {
			$data['content'] = '';
		}

		return $data;
	}

	public function ksesTags( ) {

		$tags = wp_kses_allowed_html( 'post' );

		$tags['iframe'] = array (
	    'align'       => true,
	    'frameborder' => true,
	    'height'      => true,
	    'width'       => true,
	    'sandbox'     => true,
	    'seamless'    => true,
	    'scrolling'   => true,
	    'srcdoc'      => true,
	    'src'         => true,
	    'class'       => true,
	    'id'          => true,
	    'style'       => true,
	    'border'      => true,
	    'list'        => true //YouTube embeds
		);

		return $tags;
	}
}