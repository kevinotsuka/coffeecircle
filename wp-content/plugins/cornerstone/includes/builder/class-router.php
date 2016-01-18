<?php
/**
 * This is a centralized place to declare AJAX handlers
 * and point them to their respective classes.
 */
class Cornerstone_Router {

	/**
	 * Instantiate and register AJAX handlers
	 */
	public function __construct() {
		add_action( 'wp_ajax_cs_endpoint_rows', array( $this, 'rows' ) );
		add_action( 'wp_ajax_cs_render_element', array( $this, 'render' ) );
		add_action( 'wp_ajax_cs_setting_sections', array( $this, 'settings' ) );
		add_action( 'wp_ajax_cs_blocks', array( $this, 'blocks' ) );
		add_action( 'wp_ajax_cs_override', array( $this, 'override' ) );
		add_action( 'wp_ajax_cs_save_template', array( $this, 'templateSave' ) );
		add_action( 'wp_ajax_cs_delete_template', array( $this, 'templateDelete' ) );


		if ( CS()->common()->isDebug() )
			add_action( 'wp_ajax_cs_debug', array( $this, 'debug' ) );
	}

	public function rows() {
		Cornerstone_Data_Controller::ajaxHandler();
	}

	public function render() {
		Cornerstone_Element_Renderer::ajaxHandler();
	}

	public function settings() {
		Cornerstone_Setting_Sections_Manager::ajaxHandler();
	}

	public function blocks() {
		Cornerstone_Layout_Manager::ajaxHandler();
	}

	public function override() {
		Cornerstone_Admin::ajaxHandler();
	}

	public function templateSave() {
		Cornerstone_User_Layout_Manager::ajaxHandler();
	}

	public function templateDelete() {
		Cornerstone_User_Layout_Manager::ajaxHandler('delete');
	}

	public function debug() {
		include( CS()->path( 'debug.php' ) ); // Only present in dev environments
		die();
	}

}