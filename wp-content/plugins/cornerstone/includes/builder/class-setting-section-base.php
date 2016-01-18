<?php

/**
 * Parent class for Cornerstone Setting Sections
 * All setting sections inherit from this class for underlying functionality
 */

abstract class Cornerstone_Setting_Section_Base {

	/**
	 * Contains element data (id, title, callbacks etc.)
	 * @var array
	 */
	private $data;

	/**
	 * Instantiate element with supplied data
	 */
	public function __construct() {

		$this->data = wp_parse_args( $this->data(), array(
			'name'        => '',
			'title'       => __('Settings', csl18n() ),
			'controls'    => array()
		));

		$this->controls();
		$this->controlMixins();
	}

	/**
	 * Basic validation consists of requiring a string id
	 * @return boolean  true if data is valid
	 */
	public function isValid() {

		if ( '' == $this->data['name'] )
			return new WP_Error( 'cornerstone_add_settings_section', 'Missing Name' );

		$reserved = array( 'title', 'columnLayout', 'builder', 'elements', 'parentElement', 'active', 'size', 'rank', 'name', 'elType', 'section', 'icon', 'description', 'controls', 'supports', 'defaultValue', 'options', 'tooltip' );
		$whitelist = array( 'title', 'sortable' );

		$names = array();
		foreach( $this->data['controls'] as $control ) {

			if ( in_array($control['controlType'], $whitelist) )
				continue;

			$names[] = $control['name'];
		}

		if (count( array_intersect( $names, $reserved ) ) > 0)
				return new WP_Error( 'cornerstone_add_settings_section', 'Control names can not use a reserved keyword: ' . implode( ', ', $reserved ) );

		return true;
	}

	/**
	 * Gets element name
	 * @return string name from element data
	 */
	public function name() {
		return $this->data['name'];
	}

	/**
	 * Get the element data after it's been
	 * @return array element data
	 */
	public function getData() {
		return $this->data;
	}


	/**
	 * Call from the elements's control method. Map controls in order you'd like them in the inspector pane.
	 * @param string $name     Required. Control name - will become an attribute name for the element
	 * @param string $type     Type of view used to create the UI for this control
	 * @param string $title    Localized title. Set null to compact this control
	 * @param string $tooltip  Localized tooltip. Only visible if title is set
	 * @param array  $default  Values used to populate the control if the element doesn't have values of it's own
	 * @param array  $options  Information specific to this control. For example, the names and data of items in a dropdown
	 */
	public function addControl( $name, $type, $title = null, $tooltip = null, $default = array(), $options = array() ) {
		$control = array( 'name' => $name, 'controlType' => $type, 'controlTitle' => $title, 'controlTooltip' => $tooltip, 'defaultValue' => $default, 'options' => $options );
		$this->data['controls'][] = $control;
	}

	/**
	 * Allow a mixin to be added inline. This way it's order can be determine
	 */
	public function addSupport( $support ) {

		$numargs = func_num_args();
		$count = 0;

		$mixin_controls = apply_filters( '_cornerstone_control_mixin_' . $support, array() );
		if ( !empty( $mixin_controls ) ) {
			foreach ($mixin_controls as $mixin) {

				$override = ( $numargs > ++$count ) ? func_get_arg($count) : array();
				$control = wp_parse_args( $override, $mixin );

				if ( isset( $override['options'] ) && isset( $mixin['options'] ) ) {
					$control['options'] = wp_parse_args( $override['options'], $mixin['options'] );
				}

				$this->data['controls'][] = $control;

			}
		}
	}

	/**
	 * Add control mixins. Looks for a 'supports' array, and adds additional controls.
	 * Don't use `_cornerstone_control_mixin_$name` filter. Use `cornerstone_control_mixins` instead
	 * @return none
	 */
	public function controlMixins() {

		if ( !isset( $this->data['supports'] ) || !is_array( $this->data['supports'] ) )
			return;

		foreach ( $this->data['supports'] as $support ) {
			$mixin_controls = apply_filters( '_cornerstone_control_mixin_' . $support, array() );
			if ( !empty( $mixin_controls ) ) {
				foreach ($mixin_controls as $mixin) {
					$this->data['controls'][] = $mixin;
				}
			}
		}

	}

	/**
	 * Iterate over the controls and retrieve a list
	 * of default values by control name
	 * @return array
	 */
	public function getDefaults() {

		$defaults = array();

		foreach ( $this->data['controls'] as $control ) {
			$defaults[ $control['name'] ] = $control['defaultValue'];
		}

		return $defaults;
	}

	/**
	 * Determine whether or not this section is valid for registration
	 * It will show only when there is at least on control and it's condition test passes.
	 * @return bool
	 */
	public function shouldRegister() {
		return ( count( $this->data['controls'] ) > 0 && $this->condition() );
	}

	/**
	 * Data provider. Override in child class to set element data
	 * This is for SETUP ONLY. To access element data later on, use Cornerstone_Element_Base::getData
	 * Should contain: name, title, section, icon, description
	 * @return array element data
	 */
	public function data(){
		return array();
	}

	/**
	 * Stub controls. This should be overriden in the child element, and contain calls to addControl
	 * @return none
	 */
	public function controls() { }

	/**
	 * Override in child element to provide a custom condition for whether a section should be added.
	 * For example, "Page Attributes" is only when that post type support is available.
	 * @return bool
	 */
	public function condition() {
		return true;
	}

}