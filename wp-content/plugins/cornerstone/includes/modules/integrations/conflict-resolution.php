<?php

class Cornerstone_Integration_Conflict_Resolution {

	public static function shouldLoad() {

		return true;
	}

	public function __construct() {

		add_action( 'cornerstone_load_builder', array( $this, 'loadBuilder' ) );
		add_action( 'cornerstone_load_preview', array( $this, 'loadPreview' ) );
	}

	public static function preInit() {

		// Disable NextGEN Resource Manager
		add_filter('run_ngg_resource_manager', '__return_false' );

		global $wp_version;

		if ( version_compare( $wp_version, '4.1', '<' ) ) {
			require_once( CS()->path('includes/utility/wp-json.php') );
		}


	}

	public function loadBuilder() {

		// General DONOTCACHEPAGE for WP Super Cache, W3TC and others.
		if (!defined('DONOTCACHEPAGE'))
			define( 'DONOTCACHEPAGE', true );

		// Disable W3TC
		if ( class_exists('W3_Root') && apply_filters( 'cornerstone_compat_w3tc', true ) ) {

			if ( !defined( 'DONOTMINIFY') )
				define( 'DONOTMINIFY', true );

			if ( !defined( 'DONOTCDN') )
				define( 'DONOTCDN', true );
		}

	}

	public function loadPreview() {

		if ( function_exists( 'csshero_add_footer_trigger' ) ) {
			add_filter( 'pre_option_wpcss_hidetrigger', '__return_true' );
		}

	}
}