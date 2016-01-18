<?php
/**
 * Responsible for loading all Cornerstone elements
 */
class Cornerstone_Element_Manager {

	private $class_prefix = 'CS_';

	private $elements;
	private $sections;
	private $renderer;

	/**
	 * Defer until init
	 */
	public function __construct() {
		add_action('init', array( $this, 'init' ) );
	}

	/**
	 * Load Sections and Elements
	 */
	public function init() {

		$this->defineSections();
		$this->loadNativeElements();
		do_action( 'cornerstone_load_elements' );

		$this->renderer = new Cornerstone_Element_Renderer( $this );
	}


	/**
	 * Define the element sections, each with a unique name and localized title
	 * @return  none
	 */
	public function defineSections() {
		$this->sections = apply_filters( 'cornerstone_element_sections', array(
			array( 'name' => 'structure',   'title' => __( 'Structure', csl18n() ) ),
			array( 'name' => 'typography',  'title' => __( 'Typography', csl18n() ) ),
			array( 'name' => 'information', 'title' => __( 'Information', csl18n() ) ),
			array( 'name' => 'content',     'title' => __( 'Content', csl18n() ) ),
			array( 'name' => 'social',      'title' => __( 'Social', csl18n() ) ),
			array( 'name' => 'marketing',   'title' => __( 'Marketing', csl18n() ) ),
			array( 'name' => 'media',   'title' => __( 'Media', csl18n() ) ),
		));
	}

	/**
	 * Load all element classes from the elements folder.
	 * Elements are loaded by a convention of lowercase filenames and capitalized class names.
	 * Once the classes are loaded, each one is added to the manager library
	 * @return none
	 */
	public function loadNativeElements() {

		$this->elements = array();


		$path = CS()->path() . 'includes/modules/elements/';
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
	 * Takes a class name, instantiate it, and add it to our list of elements
	 * @param string $class_name Class name - the class must already be defined
	 * @return  boolean true if the class exists and could be loaded
	 */
	public function add( $class_name ) {

		if ( !class_exists( $class_name ) )
			return false;

		$element = new $class_name();

		$error = $element->isValid();
		if ( is_wp_error( $error ) ) {
			unset($element);
			trigger_error( 'Cornerstone_Element_Manager::add | Failed to add element: ' . $class_name . ' | ' . $error->get_error_message(), E_USER_WARNING );
			return false;
		}

		$this->elements[$element->name()] = $element;
		return true;



	}

	/**
	 * Remove a previously defined element from our library
	 * @param  string $name The unique element name
	 * @return boolean  true if successful and the element formerly existed.
	 */
	public function remove( $name ) {
		if (isset($this->elements[$name])) {
			unset($this->elements[$name]);
			return true;
		}
		return false;

	}

	/**
	 * Get an instance from the registry by name
	 * @param  string $name
	 * @return object
	 */
	public function get( $name ) {
		return isset($this->elements[$name]) ? $this->elements[$name] : null;
	}

	/**
	 * Build a list of all elements and their data
	 * @return array JSON ready array of element data
	 */
	public function getAll() {
		$element_data = array();
		foreach ( $this->elements as $key => $value) {
			$element_data[] = $value->getData();
		}
		return $element_data;
	}

	/**
	 * Get our previously defined list of sections
	 * @return array Sections with name and title
	 */
	public function sections() {
		return $this->sections;
	}
}