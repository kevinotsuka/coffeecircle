<?php

/**
 * This class serves as a Repository
 * All the main settings and computed configuration values can be found here.
 */

class Cornerstone_Common {

	private $fontIcons;
	private $defaults;

	/**
	 * Instantiate and setup hooks
	 */
	public function __construct() {

		$this->fontIcons = include( CS()->path() . 'includes/common/font-icons.php' );
		$this->defaults = include( CS()->path() . 'includes/common/settings-defaults.php' );

	}

	/**
	 * Get a localized title.
	 * @return string
	 */
	public function properTitle() {
		return __( 'Cornerstone', csl18n() );
	}

	/**
	 * Get an array of post types allowed for Cornerstone.
	 * This is based on both user role, and enabled post types
	 * @return array
	 */
	public function getAllowedPostTypes() {

		$settings = CS()->settings();
		$user = wp_get_current_user();

		if ( !empty( $user ) && ( user_can( $user, 'manage_options' ) || count( array_intersect( $settings['permitted_roles'], (array) $user->roles ) ) > 0 ) )
			return apply_filters( 'cornerstone_allowed_post_types', $settings['allowed_post_types'] );

		return array();
	}

	/**
	 * Get Font Icon Unicode Value as a string
	 * @return string
	 */
	public function getFontIcon( $key ) {
		return ( isset( $this->fontIcons[ $key] ) ) ? $this->fontIcons[$key] : 'f00d';
	}

	/**
	 * Return font icon cache
	 * @return array
	 */
	public function getFontIcons() {
		return $this->fontIcons;
	}

	/**
	 * Check if a post's post_type is allowed for Cornerstone
	 * @param  object  $post_id Can also accept a full post object
	 * @return boolean
	 */
	public function isPostTypeAllowed( $post_id = '' ) {

		$post = $this->locatePost( $post_id );

		return ( $post && in_array( $post->post_type, $this->getAllowedPostTypes() ) );

	}

	/**
	 * This is different than the "Allowed" function. It simply returns the global setting
	 * regardless of user capability.
	 * @param  string  $post_id Can also accept a full post object
	 * @return boolean
	 */
	public function isPostTypeEnabled( $post_id = '' ) {

		$settings = CS()->settings();
		$post = $this->locatePost( $post_id );

		return ( $post && in_array( $post->post_type, apply_filters( 'cornerstone_allowed_post_types', $settings['allowed_post_types'] ) ) );

	}

	/**
	 * Get a URL that can be used to access Cornerstone for a given post.
	 * @param  string $post Accepts a post object, or post ID. Uses queried object if one isn't provided
	 * @return string
	 */
	public function getEditURL( $post = '' ) {

		$post = $this->locatePost( $post );

		if ( $post ) {
			return add_query_arg(
			apply_filters( 'cornerstone_edit_url_query_args',
				array(
					'cornerstone' => 1,
				)
			), get_permalink( $post->ID ) );
		}

		return null;

	}

	/**
	 * Get a WP_Post object from an ID or an automatic source
	 * If $post_id is left black, it will be automatically populated (works in dashboard or on front end)
	 * @param  string $post_id
	 * @return WP_Post
	 */
	public function locatePost( $post_id = '') {

		// Allow pass through of full post objects
		if ( isset( $post_id->ID ) )
			return $post_id;

		// Get post by ID
		if ( is_int( $post_id ) )
			return get_post( $post_id );

		// Or, in the dashboard use a query string
		if ( is_admin() && isset($_GET['post']) )
			return get_post( $_GET['post'] );

		// Or, use the queried object
		if ( '' == $post_id ) {
			$post = get_queried_object();
			if ( is_a( $post, 'WP_POST' ))
				return $post;
		}

		// Otherwise there's just no way...
		return false;

	}

	/**
	 * Potentially redirect a logged out user who was attempting to edit a page in Cornerstone.
	 * @return none
	 */
	public function loginRedirect() {
		if ( isset($_GET['cornerstone']) && $_GET['cornerstone'] == 1 && $this->isPostTypeEnabled() ) {
			wp_redirect( add_query_arg( array(
				'cornerstone' => '1'
			), wp_login_url( get_the_permalink() ) ) );
		}
	}

	/**
	 * Get the default Cornerstone settings.
	 * These are loaded from: data/settings-defaults.php
	 * @return array
	 */
	public function defaultSettings() {
		return apply_filters( 'cornerstone_setting_defaults', $this->defaults );
	}

	/**
	 * Returns appropriate js extension depending on SCRIPT_DEBUG
	 * @return string  .js or .min.js
	 */
	public function jsSuffix() {
		return ( $this->isDebug() ) ? '.js' : '.min.js';
	}

	/**
	 * Determine if we are debugging / developing
	 * @return boolean
	 */
	public function isDebug() {
		$script_debug = ( defined('SCRIPT_DEBUG') && SCRIPT_DEBUG );
		$cs_debug = ( isset($_REQUEST['cs_debug']) && $_REQUEST['cs_debug'] == 1 );
		return ( $script_debug || $cs_debug );
	}

	/**
	 * Create an image URI of a blank SVG image to be used as a placeholder
	 * @return string
	 */
	public function placeholderImage( $height = '300', $width = '250', $color = '#eeeeee' ) {
		return 'data:image/svg+xml;base64,' . base64_encode( "<svg xmlns='http://www.w3.org/2000/svg' width='{$width}px' height='{$height}px' viewBox='0 0 {$width} {$height}' version='1.1'><rect fill='{$color}' x='0' y='0' width='{$width}' height='{$height}'></rect></svg>" );
	}
}