<?php
/**
 * This class manages the primary editing interface for Cornerstone
 * It handles
 */
class Cornerstone_Builder {

	private $preview;
	private $templateLoader;
	private $router;
	public $mixins;

	/**
	 * Determine whether we are working in the iframe, or primary screen.
	 */
	public function __construct() {

		$this->router = new Cornerstone_Router;
		$this->mixins = new Cornerstone_Control_Mixins;

		if ( $this->isPreview() )
			$this->preview = new Cornerstone_Preview_Window;

		add_action( 'template_redirect', array( $this, 'load' ) );
	}

	/**
	 * Load the editor. This restructures the hooks for wp_head and
	 * adds a hook to replace the main template with our own.
	 */
	public function load() {

		if ( $this->isPreview() || !$this->isEditing() )
			return;

		add_action( 'wp_clean_slate_options', array( $this, 'slateConfig' ) );
		WP_Clean_Slate::init();

		do_action( 'cornerstone_load_builder' );

		add_action( 'admin_bar_menu', array( $this, 'adminBarMenu'), 9999 );

		// Enqueue Styles & Scripts
		add_action( 'wp_enqueue_scripts_clean', array( $this, 'dependencyEnqueues' ) );

		add_action( 'wp_enqueue_scripts_clean', array( $this, 'enqueueStyles' ) );
		add_action( 'wp_enqueue_scripts_clean', array( $this, 'enqueueScripts' ) );

		// Add boilerplate HTML with entry points for our Backbone Application
		add_action( 'wp_clean_slate_content', array( $this, 'boilerplateHTML' ) );

		// Additional filters
		add_filter( 'wp_title', array( $this, 'title' ), 10, 3 );

		add_filter( '_cornerstone_front_end', '__return_false' );
	}

	public function slateConfig( $options ) {

		$settings = CS()->settings();

		$options['showAdminBar'] = ($settings['show_wp_toolbar'] == '1');

		return $options;
	}

	/**
	 * Enqueue dependency libraries. These won't load in the preview window
	 */
	public function dependencyEnqueues() {

		Cornerstone_Code_Editor::enqueue();

		wp_register_style( 'wp-color-picker', "/wp-admin/css/color-picker.min.css" );
		wp_enqueue_style( 'wp-color-picker' );

		wp_register_script( 'iris', admin_url('/js/iris.min.js'), array( 'jquery-ui-draggable', 'jquery-ui-slider', 'jquery-touch-punch' ), '1.0.7', 1 );
		wp_register_script( 'wp-color-picker', admin_url('/js/color-picker' . CS()->common()->jsSuffix()), array( 'iris' ), false, 1 );

		// We're registering the native WordPress color picker for the front end, so we should use their localization
		wp_localize_script( 'wp-color-picker', 'wpColorPickerL10n', array(
			'clear' => __( 'Clear' ),
			'defaultString' => __( 'Default' ),
			'pick' => __( 'Select Color' ),
			'current' => __( 'Current Color' ),
		) );

		wp_enqueue_media();
		wp_enqueue_script( 'wp-color-picker' );

		$this->primeEditor();
	}

	/**
	 * Enqueue styles for the front end interface
	 */
	public function enqueueStyles() {


		wp_register_style( 'cs-lato', '//fonts.googleapis.com/css?family=Lato%3A300%2C400%2C700&subset=latin%2Clatin-ext' );
		wp_register_style( 'cs-dashicons', "/wp-includes/css/dashicons.min.css" );
		wp_enqueue_style( 'cs-styles', CS()->url( 'assets/css/admin/builder.css' ), array( 'open-sans', 'cs-lato', 'cs-dashicons' ), CS()->version() );

	}


	/**
	 * Enqueue scripts for the front end interface
	 */
	public function enqueueScripts() {



		wp_register_script( 'cs-code-editor', CS()->url( 'assets/js/dist/admin/code-editor' . CS()->common()->jsSuffix() ), array( 'jquery' ), CS()->version(), true );

		// Register
		wp_register_script(
			'cs-builder',
			CS()->url( 'assets/js/dist/admin/builder' . CS()->common()->jsSuffix() ),
			array( 'backbone' ),
			CS()->version(),
			true
		);

		// Enqueue with Data
		wp_script_data_function( 'cs-builder', 'cs', $this->getConfigData() );
		wp_enqueue_script( 'cs-builder' );

	}

	/**
	 * Populate csConfig for javascript
	 * Filter cornerstone_data allows additional data to be sent,
	 * but prevents some original data to be modified
	 */
	public function getConfigData() {

		$settings = CS()->settings();

		return wp_parse_args( array(
				'strings' => include( CS()->path( 'includes/builder/strings-builder.php' ) ),
				'isPreview' => ( $this->isPreview() ) ? 'true' : 'false',
				'post' => $this->getPostData(),
				'elementLibrarySections' => CS()->elements()->sections(),
				'elementLibraryStubs' => CS()->elements()->getAll(),
				'dashboardEditUrl' => get_edit_post_link(),
				'frontEndUrl' => get_the_permalink(),
				'ajaxUrl' => admin_url( 'admin-ajax.php', 'relative' ),
				'fontAwesome' => CS()->common()->getFontIcons(),
				'editor' => $this->getWPeditor(),
				'remoteRenderDelay' => apply_filters( 'cornerstone_render_debounce', 200 ),
				'debug' => ( CS()->common()->isDebug() ) ? 'true' : 'false',
				'loginURL' => wp_login_url( get_permalink() ),
				'scrollTopSelector' => apply_filters( 'cornerstone_scrolltop_selector', null ),
				'unfilteredHTML' => current_user_can( 'unfiltered_html' ) ? 'true' : 'false',
				'savedLast' => get_the_modified_time('U'),
				'visualEnhancements' => ($settings['visual_enhancements']) ? 'true' : 'false',
				'isRTL' => is_rtl() ? 'true' : 'false',
				'keybindings' => apply_filters( 'cornerstone_keybindings', include( CS()->path( 'includes/builder/keybindings.php' ) ) ),
			), apply_filters( 'cornerstone_config_data', array() )
		);

	}

	/**
	 * Pull the meta data for this post and prepare it for javascript
	 * @return array
	 */
	public function getPostData() {
		return array(
			'post_id' => get_the_id(),
			'elements' => Cornerstone_Data_Controller::getPostRows()
		);
	}

	/**
	 * Create a link to be used for the preview frame
	 * @param  string $post_id Provide a post ID to check, or it will automatically detect one
	 * @return string          URL for the preview pane.
	 */
	public function getPreviewURL( $post_id = '') {
		$post = CS()->common()->locatePost( $post_id );
		return add_query_arg( array( 'cornerstone_preview' => 1 ), get_permalink( $post->ID ) );
	}

	/**
	 * Replace wp_title
	 */
	public function title( $title, $sep, $seplocation ) {
		return CS()->common()->properTitle();
	}

	/**
	 * Add DOM insertion point for Backbone App
	 */
	public function boilerplateHTML( ) {
		echo '<div id="cornerstone" class="cs-builder">';
		echo '<div id="editor" class="cs-editor"><div class="cs-editor-extra">' . $this->preloader() .'</div></div>';
		echo '<div id="preview" class="cs-preview">';
		echo '<iframe id= "preview-frame" src="' . $this->getPreviewURL() . '"></iframe>';
		echo '</div></div>';
	}

	/**
	 * Load Preloader HTML from file
	 * @return string
	 */
	public function preloader() {
		ob_start();
		include( 'preloader.php' );
		return apply_filters('cornerstone_preloader_content', ob_get_clean() );
	}

	/**
	 * Prepare the WordPress Editor (wp_editor) for use as a control
	 * This thing does NOT like to be used in multiple contexts where it's added and removed dynamically.
	 * We're creating some initial settings here to be used later.
	 * Callings this function also triggers all the required styles/scripts to be enqueued.
	 * @return none
	 */
	public function primeEditor() {

		// Remove all 3rd party integrations to prevent plugin conflicts.
		remove_all_actions('before_wp_tiny_mce');
		remove_all_filters('mce_external_plugins');
		remove_all_filters('mce_buttons');
		remove_all_filters('tiny_mce_before_init');
		add_filter( 'tiny_mce_before_init', '_mce_set_direction' );

		// Cornerstone's editor is modified, so we will allow visual editing for all users.
		add_filter( 'user_can_richedit', '__return_true' );

		if( apply_filters( 'cornerstone_use_br_tags', false ) ) {
			add_filter('tiny_mce_before_init', array( $this, 'allowBrTags' ) );
		}

		// Allow integrations to use hooks above before the editor is primed.
		do_action('cornerstone_before_wp_editor');

		ob_start();
		wp_editor( '%%PLACEHOLDER%%','cswpeditor', array(
			//'quicktags' => false,
			'tinymce'=> array(
       	'toolbar1' => 'bold,italic,strikethrough,underline,bullist,numlist,forecolor,wp_adv',
       	'toolbar2' => 'link,unlink,alignleft,aligncenter,alignright,alignjustify,outdent,indent',
       	'toolbar3' => 'formatselect,pastetext,removeformat,charmap,undo,redo'
			),
			'editor_class' => 'cs-wp-editor',
			'drag_drop_upload' => true
		) );
		$this->cachedWPeditor = ob_get_clean();
	}

	/**
	 * Get the WP Editor markup if it's been primed
	 * @return string
	 */
	public function getWPeditor() {
		return isset( $this->cachedWPeditor ) ? $this->cachedWPeditor : '';
	}

	/**
	 * Depending on workflow, users may wish to allow <br> tags.
	 * This can be conditionally enabled with a filter.
	 * add_filter( 'cornerstone_use_br_tags', '__return_true' );
	 */
	public function allowBrTags( $init ) {
    $init['forced_root_block'] = false;
    return $init;
	}

	/**
	 * Check if the proper conditions are met to load Cornerstone
	 * @return boolean
	 */
	public function isEditing() {
		return ($this->intendsToEdit() && is_singular() && CS()->common()->isPostTypeAllowed() );
	}

	/**
	 * Are we trying to edit?
	 * Check if the ?cornerstone=1 query string has been added to the URL
	 * @return boolean
	 */
	public function intendsToEdit() {
		return ( isset($_GET['cornerstone']) && $_GET['cornerstone'] == 1 );
	}

	/**
	 * Remove the Cornerstone edit link from the toolbar.
	 * @return none
	 */
	public function adminBarMenu() {

		global $wp_admin_bar;

		$wp_admin_bar->remove_menu( 'cornerstone-edit-link' );

		$type = get_post_type_object( get_post_type() );
		$wp_admin_bar->add_menu( array(
			'id' => 'cornerstone-view-link',
			'title' => $type->labels->view_item,
			'href' => get_the_permalink(),
			'meta' => array( 'class' => 'cornerstone-view-link' )
		) );
	}

	/**
	 * Is this the iFrame?
	 * Check if the ?cornerstone_preview=1 query string has been added to the URL
	 * @return boolean [description]
	 */
	public function isPreview() {
		return ( isset($_GET['cornerstone_preview']) && $_GET['cornerstone_preview'] == 1 );
	}
}