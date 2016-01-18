<?php
/**
 * This houses all the code to integrate with X
 */

class Cornerstone_Integration_X_Theme {

	/**
	 * Theme integrations should provide a stylesheet function returning the stylesheet name
	 * This will be matched with get_stylesheet() to determine if the integration will load
	 */
	public static function stylesheet() {
		return 'x';
	}

	/**
	 * Theme integrations are loaded on the after_theme_setup hook
	 */
	public function __construct() {
		add_action( 'init', array( $this, 'init' ) );
		add_filter( 'cornerstone_setting_defaults', array( $this, 'addDefaultSettings' ) );

		// Don't enqueue native styles
		add_filter( 'cornerstone_enqueue_styles', '__return_false' );
		add_filter( 'cornerstone_inline_styles',  '__return_false' );

		// Don't load the Customizer
		add_filter( 'cornerstone_use_customizer',  '__return_false' );

		// Enable X specific settings pane items
		add_filter( 'x_settings_pane', '__return_true' );

		// Shortcode generator tweaks
		add_action('cornerstone_generator_preview_before', array( $this, 'shortcodeGeneratorPreviewBefore' ), -9999 );
		add_filter('cornerstone_generator_map', array( $this, 'shortcodeGeneratorDemoURL' ) );

	  // Alias legacy shortcode names.
	  add_action('cornerstone_shortcodes_loaded', array( $this, 'aliasShortcodes' ) );


	  add_filter('cornerstone_scrolltop_selector', array( $this, 'scrollTopSelector' ) );
	  add_filter('cs_recent_posts_post_types', array( $this, 'recentPostTypes' ) );
	}

	public function init() {

		// Add Logic for additional contact methods if not overridden in a child theme
		if ( ! function_exists( 'x_modify_contact_methods' ) )
			add_filter( 'user_contactmethods', array( $this, 'modifyContactMethods' ) );

		add_action( 'admin_menu', array( $this, 'optionsPage' ) );


		// Enqueue Legacy font classes
		$settings = CS()->settings();
		if ( isset( $settings['enable_legacy_font_classes'] ) && $settings['enable_legacy_font_classes'] ) {
			add_filter( 'cornerstone_legacy_font_classes', '__return_true' );
		}

	}

	public function aliasShortcodes() {

		//
		// Alias [social] to [icon] for backwards compatability.
		//

		add_shortcode( 'social', 'x_shortcode_icon' );


		//
		// Alias deprecated shortcode names.
		//

		add_shortcode( 'accordion',            'x_shortcode_accordion' );
		add_shortcode( 'accordion_item',       'x_shortcode_accordion_item' );
		add_shortcode( 'alert',                'x_shortcode_alert' );
		add_shortcode( 'author',               'x_shortcode_author' );
		add_shortcode( 'block_grid',           'x_shortcode_block_grid' );
		add_shortcode( 'block_grid_item',      'x_shortcode_block_grid_item' );
		add_shortcode( 'blockquote',           'x_shortcode_blockquote' );
		add_shortcode( 'button',               'x_shortcode_button' );
		add_shortcode( 'callout',              'x_shortcode_callout' );
		add_shortcode( 'clear',                'x_shortcode_clear' );
		add_shortcode( 'code',                 'x_shortcode_code' );
		add_shortcode( 'column',               'x_shortcode_column' );
		add_shortcode( 'columnize',            'x_shortcode_columnize' );
		add_shortcode( 'container',            'x_shortcode_container' );
		add_shortcode( 'content_band',         'x_shortcode_content_band' );
		add_shortcode( 'counter',              'x_shortcode_counter' );
		add_shortcode( 'custom_headline',      'x_shortcode_custom_headline' );
		add_shortcode( 'dropcap',              'x_shortcode_dropcap' );
		add_shortcode( 'extra',                'x_shortcode_extra' );
		add_shortcode( 'feature_headline',     'x_shortcode_feature_headline' );
		add_shortcode( 'gap',                  'x_shortcode_gap' );
		add_shortcode( 'google_map',           'x_shortcode_google_map' );
		add_shortcode( 'google_map_marker',    'x_shortcode_google_map_marker' );
		add_shortcode( 'highlight',            'x_shortcode_highlight' );
		add_shortcode( 'icon_list',            'x_shortcode_icon_list' );
		add_shortcode( 'icon_list_item',       'x_shortcode_icon_list_item' );
		add_shortcode( 'icon',                 'x_shortcode_icon' );
		add_shortcode( 'image',                'x_shortcode_image' );
		add_shortcode( 'lightbox',             'x_shortcode_lightbox' );
		add_shortcode( 'line',                 'x_shortcode_line' );
		add_shortcode( 'map',                  'x_shortcode_map' );
		add_shortcode( 'pricing_table',        'x_shortcode_pricing_table' );
		add_shortcode( 'pricing_table_column', 'x_shortcode_pricing_table_column' );
		add_shortcode( 'promo',                'x_shortcode_promo' );
		add_shortcode( 'prompt',               'x_shortcode_prompt' );
		add_shortcode( 'protect',              'x_shortcode_protect' );
		add_shortcode( 'pullquote',            'x_shortcode_pullquote' );
		add_shortcode( 'raw_output',           'x_shortcode_raw_output' );
		add_shortcode( 'recent_posts',         'x_shortcode_recent_posts' );
		add_shortcode( 'responsive_text',      'x_shortcode_responsive_text' );
		add_shortcode( 'search',               'x_shortcode_search' );
		add_shortcode( 'share',                'x_shortcode_share' );
		add_shortcode( 'skill_bar',            'x_shortcode_skill_bar' );
		add_shortcode( 'slider',               'x_shortcode_slider' );
		add_shortcode( 'slide',                'x_shortcode_slide' );
		add_shortcode( 'tab_nav',              'x_shortcode_tab_nav' );
		add_shortcode( 'tab_nav_item',         'x_shortcode_tab_nav_item' );
		add_shortcode( 'tabs',                 'x_shortcode_tabs' );
		add_shortcode( 'tab',                  'x_shortcode_tab' );
		add_shortcode( 'toc',                  'x_shortcode_toc' );
		add_shortcode( 'toc_item',             'x_shortcode_toc_item' );
		add_shortcode( 'visibility',           'x_shortcode_visibility' );

	}


	public function recentPostTypes( $types ) {
		$types['portfolio'] = 'x-portfolio';
		return $types;
	}

	public function scrollTopSelector() {
		return '.x-navbar-fixed-top';
	}

	public function modifyContactMethods( $user_contactmethods ) {

		if ( isset( $user_contactmethods['yim'] ) )
    	unset( $user_contactmethods['yim'] );

    if ( isset( $user_contactmethods['aim'] ) )
    	unset( $user_contactmethods['aim'] );

    if ( isset( $user_contactmethods['jabber'] ) )
    	unset( $user_contactmethods['jabber'] );

    $user_contactmethods['facebook']   = 'Facebook Profile';
    $user_contactmethods['twitter']    = 'Twitter Profile';
    $user_contactmethods['googleplus'] = 'Google+ Profile';

    return $user_contactmethods;
  }

  public function cleanShortcodes( $content ) {

    $array = array (
      '<p>['    => '[',
      ']</p>'   => ']',
      ']<br />' => ']'
    );

    $content = strtr( $content, $array );

    return $content;

  }

  public function shortcodeGeneratorPreviewBefore() {

  	remove_all_actions( 'cornerstone_generator_preview_before' );

	  $list_stacks = array(
	    'integrity' => __( 'Integrity',  '__x__' ),
	    'renew'     => __( 'Renew',  '__x__' ),
	    'icon'      => __( 'Icon',  '__x__' ),
	    'ethos'     => __( 'Ethos',  '__x__' )
	  );

	  $stack = x_get_stack();
	  $stack_name = ( isset( $list_stacks[ $stack ] ) ) ? $list_stacks[ $stack ] : 'X';

		printf(
	    __('You&apos;re using %s. Click the button below to check out a live example of this shortcode when using this Stack.', '__x__' ),
	    '<strong>' . $stack_name . '</strong>'
	  );
	}

	public function shortcodeGeneratorDemoURL( $attributes ) {

	  if ( isset($attributes['demo']) )
	    $attributes['demo'] = str_replace( 'integrity', x_get_stack(), $attributes['demo'] );

	  return $attributes;
	}

	public function addDefaultSettings( $settings ) {
		$settings['enable_legacy_font_classes'] = get_option( 'x_pre_v4', false );
		return $settings;
	}

	/**
	 * Swap out the Design and Product Validation Metaboxes on the Options page
	 */
	public function optionsPage() {

		remove_action( 'cornerstone_options_mb_validation', array( CS()->admin(), 'renderValidationMB' ) );
		add_action( 'cornerstone_options_mb_settings',      array( $this, 'legacyFontClasses' ) );
		add_action( 'cornerstone_options_mb_validation',    array( $this, 'renderValidationMB' ) );
		add_filter( 'cornerstone_options_info_items',       array( $this, 'removeInfoItems' ) );
	}

	/**
	 *
	 */
	public function legacyFontClasses() {

		?>
		<tr>
	    <th>
	      <label for="cornerstone-fields-enable_legacy_font_classes">
	        <strong><?php _e( 'Enable Legacy Font Classes', csl18n() ); ?></strong>
	        <span><?php _e( 'Check to enable legacy font classes.', csl18n() ); ?></span>
	      </label>
	    </th>
	    <td>
	      <fieldset>
	        <?php echo CS()->admin()->settings->renderField( 'enable_legacy_font_classes', array( 'type' => 'checkbox', 'value' => '1', 'label' => 'Enable' ) ) ?>
	      </fieldset>
	    </td>
	  </tr>

	  <?php

	}


	/**
	 * Output custom Product Validation Metabox
	 */
	public function renderValidationMB() { ?>

		<?php if ( x_is_validated() ) : ?>
			<p class="cs-validated"><strong>Congrats! X is active and validated</strong>. Because of this you don't need to validate Cornerstone and automatic updates are up and running.</p>
		<?php else : ?>
			<p class="cs-not-validated"><strong>Uh oh! It looks like X isn't validated</strong>. Cornerstone validates through X, which enables automatic updates. Head over to the product validation page to get that setup.<br><a href="<?php echo x_addons_get_link_product_validation(); ?>">Validate</a></p>
		<?php endif;

	}

	public function removeInfoItems( $info_items ) {

		unset( $info_items['api-key'] );
		unset( $info_items['design-options'] );

		$info_items['enable-legacy-font-classes' ] = array(
			'title' => __( 'Enable Legacy Font Classes', csl18n() ),
			'content' => __( 'X no longer provides the <strong>.x-icon*</strong> classes. This was done for performance reasons. If you need these classes, you can enable them again with this setting.', csl18n() )
		);

		return $info_items;
	}

}