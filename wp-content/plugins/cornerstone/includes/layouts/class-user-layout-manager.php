<?php
class Cornerstone_User_Layout_Manager {

	private static $instance;

	public function __construct() {
		add_action( 'init', array( $this, 'registerPostType' ) );
		add_action( 'cornerstone_load_layout_templates', array( $this, 'loadUserTemplates' ) );
	}

	public static function init() {
		self::$instance = new self;
	}

	public static function ajaxHandler( $mode = '' ) {

		if ($mode == 'delete') {
			return self::$instance->ajaxResponseDelete();
		}

    return self::$instance->ajaxResponseSave();

	}

	public function ajaxResponseSave() {

		if (!isset($_POST['post']))
			wp_send_json_error( 'Invalid request.' );

		$post = json_decode( stripslashes( html_entity_decode( $_POST['post'] ) ), true );

		if ( !isset( $post['elements'] ) )
			wp_send_json_error( 'Missing element data.' );

		if ( !isset( $post['type'] ) )
			$post['type'] = 'block';

		if ( !isset( $post['title'] ) )
			$post['title'] = __( 'Untitled', csl18n() );

		$post['slug'] = uniqid( sanitize_key( $post['title'] ) . '_' );

		// SAVE
		$post_id = wp_insert_post( array( 'post_type' => 'cs_user_templates' ) );
		update_post_meta( $post_id, 'cs_template_title', $post['title'] );
		update_post_meta( $post_id, 'cs_template_elements', $post['elements'] );
		update_post_meta( $post_id, 'cs_template_type', $post['type'] );
		update_post_meta( $post_id, 'cs_template_slug', $post['slug'] );

		// Set section before responding so it can be added immediately
		$post['section'] = ( $post['type'] == 'page' ) ? 'user-pages' : 'user-blocks';

		$result = array( 'template' => $post );

		// Suppress PHP error output unless debugging
		if ( CS()->common()->isDebug() )
			return wp_send_json_success( $result );
		return @wp_send_json_success( $result );

	}

	public function ajaxResponseDelete() {
		if (!isset($_POST['slug']))
			return wp_send_json_error( 'Invalid request.' );

		$query = new WP_Query( array(
			'post_type'  => 'cs_user_templates',
			'meta_key'   => 'cs_template_slug',
			'meta_value' => $_POST['slug'],
			'posts_per_page' => 999
		) );

		if ($query->post && wp_delete_post($query->post->ID, true ) ) {
			if ( CS()->common()->isDebug() )
				return wp_send_json_success();
			return @wp_send_json_success();
		}

		return wp_send_json_error( 'Unable to delete template.' );

	}

	public function registerPostType( $manager ) {
		register_post_type( 'cs_user_templates', array(
			'public'          => false,
			'capability_type' => 'page',
			'supports'        => false
		));
	}

	public function loadUserTemplates( $manager ) {

		$query = new WP_Query( array(
			'post_type' => 'cs_user_templates',
			'posts_per_page' => 999
		) );

		foreach ($query->posts as $post) {
			$template = array(
				'title'    => get_post_meta( $post->ID, 'cs_template_title', true ),
				'elements' => get_post_meta( $post->ID, 'cs_template_elements', true ),
				'type'     => get_post_meta( $post->ID, 'cs_template_type', true ),
				'slug'     => get_post_meta( $post->ID, 'cs_template_slug', true ),
			);
			$template['section'] = ( $template['type'] == 'page' ) ? 'user-pages' : 'user-blocks';
			$manager->register( $template );
		}

	}
}