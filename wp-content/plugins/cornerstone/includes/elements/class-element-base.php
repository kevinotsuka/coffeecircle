<?php

/**
 * Parent class for Cornerstone Elements
 * All element inherit from this class for underlying functionality
 */

abstract class Cornerstone_Element_Base {

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
			'title'       => __('Generic Element', csl18n() ),
			'section'     =>  'content',
			'description' => __( 'Generic Element', csl18n() ),
			'controls'    => array(),
			'empty'       => false,
			'render'      => true,
			'delegate'    => false,
			'childType'   => false,
			'childRender' => true,
			'active'      => $this->isActive()
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
			return new WP_Error( 'cornerstone_add_element', 'Missing Name' );

		$reserved = array( 'title', 'columnLayout', 'builder', 'elements', 'parentElement', 'active', 'size', 'rank', 'name', 'elType', 'section', 'icon', 'description', 'controls', 'supports', 'defaultValue', 'options', 'tooltip' );
		$whitelist = array( 'title', 'sortable' );

		$names = array();
		foreach( $this->data['controls'] as $control ) {

			if ( in_array($control['controlType'], $whitelist) )
				continue;

			$names[] = $control['name'];
		}

		if ( isset( $names['name'] ) )

		if ( count( array_intersect( $names, $reserved ) ) > 0 )
				return new WP_Error( 'cornerstone_add_element', 'Control names can not use a reserved keyword: ' . implode( ', ', $reserved ) );

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
	 * Gets element childType
	 * @return string childType from element data
	 */
	public function childType() {
		return $this->data['childType'];
	}

	/**
	 * Gets element empty condition
	 * @return string childType from element data
	 */
	public function emptyCondition() {
		return $this->data['empty'];
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
	 * Allow a mixin to be added inline. This allows you to determine it's position
	 * in the order of mapped controls.
	 * @param string $support name of the mixin
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
	 * Helper function used in render methods.
	 * This creates a string that can be used to speed up shortcode building.
	 * @param  array $params
	 * @return string
	 */
	public function extra( $atts ) {

		$extra = '';

		if ( isset($atts['id']) && $atts['id'] != '' )
			$extra .= " id=\"{$atts['id']}\"";

		if ( isset($atts['class']) && $atts['class'] != '' )
			$extra .= " class=\"{$atts['class']}\"";

		if ( isset($atts['style']) && $atts['style'] != '' )
			$extra .= " style=\"{$atts['style']}\"";

		return $extra;
	}

	public function shouldRender() {
		return $this->data['delegate'];
	}

	public function renderElement( $atts ) {
		return $this->render( $this->injectAtts( $atts ) );
	}

	/**
	 * Perform common operations such as mixin class injection
	 * @param  array $atts
	 * @return array
	 */
	public function injectAtts( $atts ) {

    // Set custom values to blank strings to prepare for injections
    if ( !isset( $atts['class'] ) )
			$atts['class'] = '';

		if ( !isset( $atts['style'] ) )
			$atts['style'] = '';


		// Split generated and user values for access in render method
    $atts['user_class'] = $atts['class'];
		$atts['user_style'] = $atts['style'];
    $atts['injected_classes'] = array();
		$atts['injected_styles'] = array();

		$atts = apply_filters( 'cornerstone_render_injections', $atts );

		// Combine user and injected values for shortcode injection
		if ( count( $atts['injected_classes'] ) > 0 )
			$atts['class'] = implode( $atts['injected_classes'], ' ' ) . ' ' . $atts['class'];

		if ( count( $atts['injected_styles'] ) > 0 )
			$atts['style'] = implode( $atts['injected_styles'], ' ' ) . ' ' . $atts['style'];

		// Apply helper function to create a string of id, class, and style attributes.
		$atts['extra'] = $this->extra( $atts );

    return $atts;
	}

	/**
	 * Helper function used in render methods.
	 * This creates a string that can be used to speed up shortcode building.
	 * @param  array  $width
	 * @param  string $style
	 * @param  string $color
	 * @return string
	 */
	public function borderStyle( $width, $style, $color ) {

		$width = 'border-width: ' . implode( ' ', $width ) . '; ';
		$style = 'border-style: ' . $style . '; ';
		$color = 'border-color: ' . $color . ';';

		return $width . $style . $color;

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

	public function isActive() { return true; }

	/**
	 * Helper function for rendering empty elements.
	 * This outputs a javascript template that will show the icon for the current element.
	 * @return string
	 */
	public function renderEmpty() {
		return '%%TMPL%%<div class="cs-empty-element"><div class="cs-empty-element-icon"><%= cs.icon("element-' . $this->name() . '") %></div></div>';
	}

}