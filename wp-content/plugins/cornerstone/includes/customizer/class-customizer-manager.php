<?php

class Cornerstone_Customizer_Manager {

	/**
	 * List of option names and default values
	 * @var array
	 */
	private $defaults;

	/**
	 * Register hooks
	 */
	public function __construct() {

		if ( apply_filters( 'cornerstone_use_customizer', true ) ) {
			add_action( 'customize_register', array( $this, 'register' ) );
		}

		$this->defaults = apply_filters( 'cornerstone_customizer_defaults', include( CS()->path('includes/customizer/defaults.php') ) );

		if ( defined('WP_DEBUG') && WP_DEBUG ) {
			add_shortcode( 'cornerstone_customizer_debug', array( $this, 'debugShortcode' ) );
		}
	}

	/**
	 * Return all registered options as an array of keys.
	 * @return array
	 */
	public function optionList() {
		return array_keys( $this->defaults );
	}

	/**
	 * Get all of our registered options and apply their defaults
	 * @return array
	 */
	public function optionData() {
		$retrieved = array();
		foreach ($this->defaults as $name => $default) {
			$retrieved[$name] = get_option( $name, $default );
		}
		return $retrieved;
	}

	public function debugShortcode() {
		ob_start();
		echo '<pre>';
		print_r( $this->optionData() );
		echo '</pre>';
		return ob_get_clean();
	}

	/**
	 * Register Customizer Sections, Settings, and Controls.
	 */
	public function register( $wp_customize ) {

		$cs = array();

		include( CS()->path('includes/customizer/register.php') );

	  //
	  // Output - Sections.
	  //

	  foreach ( $cs['sec'] as $section ) {

	    $wp_customize->add_section( $section[0], array(
	      'title'    => $section[1],
	      'priority' => $section[2],
	    ) );

	  }


	  //
	  // Output - Settings.
	  //

	  foreach ( $cs['set'] as $setting ) {

	    $wp_customize->add_setting( $setting[0], array(
	      'type'      => 'option',
	      'default'   => $this->defaults[$setting[0]],
	      'transport' => 'refresh' //(isset( $setting[2] ) ) ? $setting[2] : 'refresh'
	    ));

	  }


	  //
	  // Output - Controls.
	  //

	  foreach ( $cs['con'] as $control ) {

	    static $i = 1;

	    if ( $control[1] == 'radio' ) {

	      $wp_customize->add_control( $control[0], array(
	        'type'     => $control[1],
	        'label'    => $control[2],
	        'section'  => $control[4],
	        'priority' => $i,
	        'choices'  => $control[3]
	      ));

	    } elseif ( $control[1] == 'select' ) {

	      $wp_customize->add_control( $control[0], array(
	        'type'     => $control[1],
	        'label'    => $control[2],
	        'section'  => $control[4],
	        'priority' => $i,
	        'choices'  => $control[3]
	      ));

	    } elseif ( $control[1] == 'slider' ) {

	      $wp_customize->add_control(
	        new X_Customize_Control_Slider( $wp_customize, $control[0], array(
	          'label'    => $control[2],
	          'section'  => $control[4],
	          'settings' => $control[0],
	          'priority' => $i,
	          'choices'  => $control[3]
	        ))
	      );

	    } elseif ( $control[1] == 'text' ) {

	      $wp_customize->add_control( $control[0], array(
	        'type'     => $control[1],
	        'label'    => $control[2],
	        'section'  => $control[3],
	        'priority' => $i
	      ));

	    } elseif ( $control[1] == 'textarea' ) {

	      $wp_customize->add_control(
	        new X_Customize_Control_Textarea( $wp_customize, $control[0], array(
	          'label'    => $control[2],
	          'section'  => $control[3],
	          'settings' => $control[0],
	          'priority' => $i
	        ))
	      );

	    } elseif ( $control[1] == 'checkbox' ) {

	      $wp_customize->add_control( $control[0], array(
	        'type'     => $control[1],
	        'label'    => $control[2],
	        'section'  => $control[3],
	        'priority' => $i
	      ));

	    } elseif ( $control[1] == 'color' ) {

	      $wp_customize->add_control(
	        new WP_Customize_Color_Control( $wp_customize, $control[0], array(
	          'label'    => $control[2],
	          'section'  => $control[3],
	          'settings' => $control[0],
	          'priority' => $i
	        ))
	      );

	    } elseif ( $control[1] == 'image' ) {

	      $wp_customize->add_control(
	        new WP_Customize_Image_Control( $wp_customize, $control[0], array(
	          'label'    => $control[2],
	          'section'  => $control[3],
	          'settings' => $control[0],
	          'priority' => $i
	        ))
	      );

	    }

	    $i++;

	  }
	}

}