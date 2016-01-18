<?php
/**
 * Responsible for loading all Cornerstone Settings Sections
 */
class Cornerstone_Setting_Sections_Manager {

	private $class_prefix = 'CS_Settings_';
	private $registry;

	private static $instance;

	/**
	 * Load Sections and Elements
	 * This needs to be called after the post data is setup
	 */
	public function init() {
		$this->loadNativeSections();
		do_action( 'cornerstone_load_setting_registry' );
	}

	/**
	 * Create new instance to handle AJAX request
	 */
	public static function ajaxHandler() {
		self::$instance = new self;
		return self::$instance->ajaxResponse();
	}

	/**
	 * Respond to AJAX request.
	 * This is used to populate the settings pane within the builder interface
	 */
	public function ajaxResponse() {

		global $post;

		if ( !isset( $_REQUEST['post_id'] ) || !$post = get_post( (int) $_REQUEST['post_id'] ) )
      wp_send_json_error( array('message' => 'post_id not set' ) );

    setup_postdata( $post );

    $this->init();

		$result = $this->getAll();

		// Suppress PHP error output unless debugging
		if ( CS()->common()->isDebug() )
			return wp_send_json_success( $result );
		return @wp_send_json_success( $result );

	}

	public function saveSection( $data ) {
		$section = $this->get( $data['name'] );
		return $section->handler( $this->formatData( $data, $section ) );
	}

	private function formatData( $data, $section ) {

		if ( !isset( $data['elements'] ) ) {
			$data['elements'] = array();
		}

		$data = wp_parse_args( $data, $section->getDefaults() );

		// Get around id being a reserved keyword. This way we can still use it in render methods for elements
		if ( isset( $data['custom_id'] ) )
			$data['id'] = $data['custom_id'];

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

			if ( is_string( $item ) && !current_user_can( 'unfiltered_html' ) ) {
				$data[$key] = wp_kses( $item, wp_kses_allowed_html( 'post' ) );
				continue;
			}

		}

		return $data;
	}
	/**
	 * Load all element classes from the registry folder.
	 * Elements are loaded by a convention of lowercase filenames and capitalized class names.
	 * Once the classes are loaded, each one is added to the manager library
	 * @return none
	 */
	public function loadNativeSections() {

		$this->registry = array();

		$path = CS()->path() . 'includes/modules/settings/';
		foreach ( glob("$path*.php") as $filename ) {

			if ( !file_exists( $filename) )
				continue;

			require_once( $filename );
			$words = explode('-', str_replace('.php', '', basename($filename) ) );

			foreach ($words as $key => $value) {
				$words[$key] = ucfirst($value);
			}

			$class_name = $this->class_prefix . implode('_', $words);

			$this->add($class_name);

		}

	}

	/**
	 * Takes a class name, instantiate it, and add it to our list of registry
	 * @param string $class_name Class name - the class must already be defined
	 * @return  boolean true if the class exists and could be loaded
	 */
	public function add( $class_name ) {

		if ( !class_exists( $class_name ) )
			return false;

		$instance = new $class_name();

		$error = $instance->isValid();
		if ( is_wp_error( $error ) ) {
			unset($instance);
			trigger_error( 'Cornerstone_Setting_Sections_Manager::add | Failed to add settings section: ' . $class_name . ' | ' . $error->get_error_message(), E_USER_WARNING );
			return false;
		}

		if ( $instance->shouldRegister() )
			$this->registry[$instance->name()] = $instance;

		return true;

	}

	/**
	 * Remove a previously defined element from our library
	 * @param  string $name The unique element name
	 * @return boolean  true if successful and the element formerly existed.
	 */
	public function remove( $name ) {
		if (isset($this->registry[$name])) {
			unset($this->registry[$name]);
			return true;
		}
		return false;

	}

	/**
	 * Retrieve an instance by name
	 * @param  string $name Registered name of instance being accessed
	 * @return object
	 */
	public function get( $name ) {
		return isset($this->registry[$name]) ? $this->registry[$name] : null;
	}

	/**
	 * Build a list of all registry and their data
	 * @return array JSON ready array of element data
	 */
	public function getAll() {
		$list = array();
		foreach ( $this->registry as $key => $value) {
			$list[] = $value->getData();
		}
		return $list;
	}

}