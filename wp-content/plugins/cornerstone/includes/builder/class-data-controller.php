<?php

/**
 * Methods for working with Cornertone Rows and Settings
 */
class Cornerstone_Data_Controller {

	/**
	 * WP_Post object for what is being edited
	 * @var object
	 */
	private $post;

	/**
	 * Instantiate from a post ID or a WP_Post
	 * @param string $post_id
	 */
	public function __construct( $post ) {
		$this->post = ( is_a( $post, 'WP_Post' ) ) ? $post : get_post( $post );
	}

	/**
	 * Ensure this object was created properly
	 * @return boolean   true if we have a proper WP_Post object
	 */
	public function isValid() {
		return is_a( $this->post, 'WP_Post' );
	}

	/**
	 * Save updated rows to meta data
	 * @param  array $data  new data
	 * @return array        send back persisted data
	 */
	public function update( $data ) {

		if ( ! isset( $data['elements']) )
			$data['elements'] = array();

		if ( is_wp_error( $error = $this->validateRows( $data['elements'] ) ) )
			return $error;

		if ( isset( $data['settings'] ) && $data['settings'] != '' ) {

			global $post;

			if ( !isset( $data['post_id'] ) || !$post = get_post( $data['post_id'] ) )
  	    return new WP_Error( 'cornerstone', 'Post ID not set' );

    	setup_postdata( $post );

			$settingManager = new Cornerstone_Setting_Sections_Manager;
			$settingManager->init();

			foreach ($data['settings'] as $settingSection ) {
				$settingManager->saveSection( $settingSection );
			}
			wp_reset_postdata();
		}

		$updated = array();

		if ( isset( $data['elements'] ) && is_array( $data['elements'] ) ) {
			foreach ($data['elements'] as $row) {
				$updated[] = $this->sanitizeData( $row );
			}
		}


		update_post_meta( $this->post->ID, '_cornerstone_data', $updated );
		delete_post_meta( $this->post->ID, '_cornerstone_override' );

		$newData = $this->get();

		$content = $this->saveContent( $data, $newData );

		$content .= $this->saveResponsiveText();
		wp_update_post( array(
      'ID'           => $this->post->ID,
      'post_content' => $content
    ) );

		return $newData;

	}

	public function sanitizeData( $data ) {

		// Recursively sanitize child elements
		if ( isset( $data['elements'] ) ) {
			$elements = array();
			foreach ($data['elements'] as $key => $item) {
				$elements[] = $this->sanitizeData( $item );
			}
			$data['elements'] = $elements;
		}

		foreach ($data as $key => $item) {

			if ( is_array($item) && count($item) == 5 && ( $item[4] == 'linked' || $item[4] == 'unlinked' ) ) {
				$data[$key] = array_map( 'esc_html', $item );
				continue;
			}

			if ( is_string( $item ) && !current_user_can( 'unfiltered_html' ) ) {
				$data[$key] = wp_kses( $item, wp_kses_allowed_html( 'post' ) );
				continue;
			}
		}

		return $data;
	}
	/**
	 * Processes data and renders it into a string of shortcodes
	 * that can be saved into the_content
	 */
	public function saveContent( $data, $newData ) {

		//$output = '';
		$this->indentLevel = 0;
		$this->outputBuffer = '';

		foreach ($newData as $section) {
			$this->outputBuffer .= $this->recursiveSave( $section, false );
		}

		return $this->outputBuffer;
	}

	public function recursiveSave( $parent, $last ) {

		if ( isset( $parent['active'] ) && $parent['active'] == false ) {
			return '';
		}

		$buffer = '';

		$level = $this->indentLevel;

		if ( isset( $parent['elements'] ) && is_array( $parent['elements'] ) ) {
			$this->indentLevel++;

			for ( $i = 0, $size = count( $parent['elements'] ); $i < $size; ++$i ) {
				$last = ( $i == $size - 1 || ( isset( $parent['elements'][$i+1] ) && isset( $parent['elements'][$i+1]['active'] ) && $parent['elements'][$i+1]['active'] == false ) );
    		$buffer .= $this->recursiveSave( $parent['elements'][$i], $last );
			}

			$parent['content'] = $buffer;// "\n" . str_repeat('  ', $level + 1 ) . $buffer . "\n" . str_repeat('  ', $level ) ;
			$this->indentLevel--;
		}

		$nl = ( ($last) ? '' : "\n"  . str_repeat('  ', $level ) );
		return Cornerstone_Element_Renderer::saveElement( $parent );// . $nl;

	}

	/**
	 * Take responsive text meta and create a list of shortcodes
	 * that can be appended to our save data.
	 */
	public function saveResponsiveText() {

		$output = '';
		$settings = get_post_meta( $this->post->ID, '_cornerstone_settings', true );

    if ( !isset( $settings['responsive_text'] ) || empty( $settings['responsive_text'] ) )
    	return $output;

    foreach ( $settings['responsive_text'] as $item ) {
    	$output .= Cornerstone_Element_Renderer::saveElement( $item ) . "\n";
    }

		return $output;
	}


	/**
	 * Retrieve rows from the current post.
	 * @return array  current rows
	 */
	public function get() {
		return get_post_meta( $this->post->ID, '_cornerstone_data', true );
	}

	/**
	 * Enforce Model consistency
	 * @param  array $data  Data to test
	 * @return true|WP_Error
	 */
	public function validateRows( $data ) {

		foreach ($data as $section) {

			// if ( !isset( $section['title'] ) || $section['title'] != '' )
			// 		return new WP_Error( 'cornerstone', 'Section missing Title' );

			foreach ($section['elements'] as $row) {

				if ( !isset( $row['columnLayout'] ) || $row['columnLayout'] == '' )
					return new WP_Error( 'cornerstone', 'Row has invalid column layout' );

				if ( !isset( $row['elements'] ) || count($row['elements']) != 6 )
					return new WP_Error( 'cornerstone', 'Row has corrupted columns' );
			}

		}

		return true;
	}

	/**
	 * Static helper to get all rows for a post
	 * @param  [mixed] $post
	 * @return array          Full content for rows
	 */
	public static function getPostRows( $post = '') {
		$rows = new Cornerstone_Data_Controller( CS()->common()->locatePost( $post ) );
		return $rows->get();
	}

	/**
	 * AJAX handler for rows
	 * @return string JSON response
	 */
	public static function ajaxHandler() {

		if (!isset($_POST['post']))
			wp_send_json_error( 'Data not set' );

		$post = json_decode( stripslashes( $_POST['post'] ), true );

		if ( !isset( $post['post_id'] ) )
			wp_send_json_error( 'Data not set' );

		$data = new Cornerstone_Data_Controller( $post['post_id'] );

		if ( !$data->isValid() )
			wp_send_json_error( 'Post not valid' );

		$update = $data->update( $post );

		if ( is_wp_error( $update ) )
			wp_send_json_error( $update->get_error_message() );

		// Suppress PHP error output unless debugging
		if ( CS()->common()->isDebug() )
			return wp_send_json_success( $update );
		return @wp_send_json_success( $update );

	}

}