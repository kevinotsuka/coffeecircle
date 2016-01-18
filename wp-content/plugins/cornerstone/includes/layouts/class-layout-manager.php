<?php

class Cornerstone_Layout_Manager {

	private static $instance;
	private $registry;

	public function __construct() {
		$this->registry = array();
	}

	public function init() {
		$this->loadNativeBlocks();
		$this->loadNativePages();
		do_action( 'cornerstone_load_layout_templates', $this );
	}

	public static function ajaxHandler() {
		self::$instance = new self;
		self::$instance->ajaxResponse();
	}

	public function ajaxResponse() {

		$this->init();

		$result = $this->getAll();

		// Suppress PHP error output unless debugging
		if ( CS()->common()->isDebug() )
			return wp_send_json_success( $result );
		return @wp_send_json_success( $result );

	}

	public function loadNativeBlocks() {

		$path = CS()->path() . 'includes/modules/layout_templates/';
		foreach ( glob("{$path}block-*.php") as $filename ) {

			if ( !file_exists( $filename) )
				continue;

			$data = include( $filename );
			$data['type'] = 'block';
			$data['slug'] = 'themeco-' . trim( str_replace('.php', '', basename( $filename ) ) );
			$data['section'] = 'themeco-blocks';
			$this->registry[] = $data;

		}

	}

	public function loadNativePages() {

		$path = CS()->path() . 'includes/modules/layout_templates/';
		foreach ( glob("{$path}page-*.php") as $filename ) {

			if ( !file_exists( $filename) )
				continue;

			$data = include( $filename );
			$data['type'] = 'page';
			$data['slug'] = 'themeco-' . trim( str_replace('.php', '', basename( $filename ) ) );
			$data['section'] = 'themeco-pages';
			$this->registry[] = $data;

		}

	}

	public function register( $data ) {
		if ( !is_array($data)
			|| !isset($data['slug'])
			|| !isset($data['type'])
			|| !isset($data['title'])
			|| !isset($data['elements']) ) {
			return new WP_Error( 'cornerstone', 'Template improperly formatted' );
		}

		$data['type'] =  ( $data['type'] == 'page' ) ? 'pages' : 'block';
		$post['section'] = ( $data['type'] == 'page' ) ? 'user-pages' : 'user-blocks';
		$this->registry[] = $data;

	}

	public function getAll() {
		return ( isset( $this->registry ) ) ? $this->registry : array();
	}
}