<?php
/**
 * This class manages all Dashboard related activity.
 * It handles the Options page, and adds the "Edit with Cornerstone"
 * links to the list table screens, and the toolbar.
 */

class Cornerstone_Admin {

	/**
	 * Cache settings locally
	 * @var array
	 */
	public $settings;

	/**
	 * Initialize, and add hooks
	 */
	public function __construct() {

		add_action( 'admin_bar_menu', array( $this, 'addToolbarEditLink' ), 999 );

		if ( !is_admin() )
			return;

		add_action( 'admin_menu',            array( $this, 'optionsPage' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue' ) );
		add_filter( 'page_row_actions',      array( $this, 'addRowActions' ), 10, 2 );
		add_filter( 'post_row_actions',      array( $this, 'addRowActions' ), 10, 2 );
		add_action( 'admin_notices',         array( $this, 'updateNotice' ), 20 );

		add_action( 'cornerstone_options_mb_settings',   array( $this, 'renderSettingsMB' ) );
		add_action( 'cornerstone_options_mb_validation', array( $this, 'renderValidationMB' ) );
	}

	public static function ajaxHandler() {
		if ( isset( $_POST['post_id'] ) ) {
			update_post_meta( $_POST['post_id'], '_cornerstone_override', true );
		}
	}

	/**
	 * Enqueue Admin Scripts and Styles
	 */
	public function enqueue( $hook ) {

		wp_enqueue_style( 'cornerstone-admin-css', CS()->url( 'assets/css/admin/dashboard.css' ), array('wp-color-picker'), CS()->version() );

    wp_register_script( 'cs-admin-js', CS()->url( 'assets/js/dist/admin/dashboard' . CS()->common()->jsSuffix() ) , array( 'jquery', 'wp-color-picker', 'postbox' ), CS()->version(), true );

    ob_start();
    include( CS()->path() . 'includes/admin/editor-tab.php' );
    $editorTabMarkup = ob_get_clean();

    $post = CS()->common()->locatePost();
    $post_id = ($post) ? $post->ID : 'new';

		wp_localize_script( 'cs-admin-js', 'csAdmin', array(
			'homeURL' => home_url(),
    	'editURL' => CS()->common()->getEditURL(),
    	'post_id' => $post_id,
    	'isSettingsPage' => ($hook == 'settings_page_cornerstone') ? "true" : "false",
    	'isPostEditor' => ( $this->isPostEditor( $hook ) ) ? "true" : "false",
    	'usesCornerstone' => ( $this->usesCornerstone() ) ? "true" : "false",
    	'strings' => include( CS()->path() . 'includes/admin/strings-admin.php' ),
    	'editorTabMarkup' => $editorTabMarkup
    ) );

    wp_enqueue_script( 'cs-admin-js' );

	}

	/**
	 * Detect if a post has saved Cornerstone data
	 * @return bool true is Cornerstone meta exists
	 */
	public function usesCornerstone() {

		$post = CS()->common()->locatePost();

		if (!$post)
			return false;

		$rows = get_post_meta( $post->ID, '_cornerstone_data', true );
		$override = get_post_meta( $post->ID, '_cornerstone_override', true );

		if ( !$rows || $override )
			return false;

		return true;
	}

	/**
	 * Determine if the post editor is being viewed, and Cornerstone is available
	 * @param  string  $hook passed through from admin_enqueue_scripts hook
	 * @return boolean
	 */
	public function isPostEditor( $hook ) {

		if ( $hook == 'post.php' && isset( $_GET['action']) && $_GET['action'] == 'edit')
		  return CS()->common()->isPostTypeAllowed();

		if ( $hook == 'post-new.php' && isset( $_GET['post_type']) )
		  return in_array( $_GET['post_type'], CS()->common()->getAllowedPostTypes() );

		if ( $hook == 'post-new.php' && !isset( $_GET['post_type']) )
		  return in_array( 'post', CS()->common()->getAllowedPostTypes() );

		return false;
	}

	/**
	 * Register the Options page
	 */
	public function optionsPage() {
		$title = CS()->common()->properTitle();
		add_options_page( $title, $title, 'manage_options', 'cornerstone', array( $this, 'renderOptionsPage' ) );
	}


	/**
	 * Callback to render the Options Page
	 */
	public function renderOptionsPage() {

		$title = CS()->common()->properTitle();
		$info_items = apply_filters( 'cornerstone_options_info_items', include(CS()->path() . 'includes/admin/info-items.php') );

		/* Let's call this class just for this option page */
		$this->settings = new Cornerstone_Settings_Handler;

		include CS()->path() . 'includes/admin/views/options-page.php';
	}


	/**
	 * Add "Edit With Cornerstone" links to the WP List tables
	 * Filter applied to page_row_actions and post_row_actions
	 * @param array $actions
	 * @param object $post
	 */
	public function addRowActions( $actions, $post ) {

		if ( CS()->common()->isPostTypeAllowed( $post ) ) {
			$url = CS()->common()->getEditURL( $post );
			$label = __( 'Edit with Cornerstone', csl18n() );
			$actions['edit_cornerstone'] = "<a href=\"$url\">$label</a>";
		}

		return $actions;
	}


	/**
	 * Add "Edit with Cornerstone" button on the toolbar
	 * This is only added on singlular views, and if the post type is supported
	 */
	public function addToolbarEditLink() {

		if ( is_singular() && CS()->common()->isPostTypeAllowed() && $this->usesCornerstone() )  {

			global $wp_admin_bar;

			$wp_admin_bar->add_menu( array(
				'id' => 'cornerstone-edit-link',
				'title' => __( 'Edit with Cornerstone', csl18n() ),
				'href' => CS()->common()->getEditURL(),
				'meta' => array( 'class' => 'cornerstone-edit-link' )
			) );

		}

	}

	/**
	 * Load View files
	 */

	public function updateNotice() {
		include CS()->path() . 'includes/admin/views/options-notice.php';
	}

	public function renderSettingsMB() {
		include CS()->path() . 'includes/admin/views/metaboxes/settings.php';
	}

	public function renderDesignMB() {
		include CS()->path() . 'includes/admin/views/metaboxes/design.php';
	}

	public function renderValidationMB() {
		include CS()->path() . 'includes/admin/views/metaboxes/product-validation.php';
	}

}