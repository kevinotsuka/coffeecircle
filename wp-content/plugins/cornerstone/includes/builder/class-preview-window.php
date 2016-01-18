<?php
/**
 * This class is responsible for settings up everything that happens
 * inside the preview iframe
 */
class Cornerstone_Preview_Window {

	/**
	 * Setup hooks
	 */
	public function __construct() {

		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue' ), 999 );
		add_action( 'template_redirect', array( $this, 'pageLoading' ), 9999999 );
		add_filter( 'show_admin_bar', '__return_false' );

		add_filter( '_cornerstone_custom_css', '__return_true' );
		add_action( 'wp_head', array( $this, 'inlineStyles' ), 9998, 0 );

	}

	/**
	 * Hook in to filter the content as late as possible.
	 */
	public function pageLoading() {

		add_filter( 'the_content', array( $this, 'wrapContent' ), -9999999 );

		do_action( 'cornerstone_load_preview' );

	}

	/**
	 * Load Preview Scripts / Styles
	 */
	public function enqueue() {

		// Preview CSS
		wp_enqueue_style( 'cs-preview', CS()->url() . 'assets/css/admin/preview.css', null, CS()->version() );

		// Piggy back off the builder to enqueue main scripts
		CS()->builder()->enqueueScripts();

		// Vendor Scripts
		wp_enqueue_script( 'mediaelement' );
		wp_enqueue_script( 'vendor-ilightbox' );
  	wp_enqueue_script( 'vendor-google-maps' );

	}

	/**
	 * Load generated CSS output and place style tag in wp_head
	 */
	public function inlineStyles() {

		ob_start();

  	echo '<style id="cornerstone-generated-preview-css" type="text/css">';

  		$settings = CS()->settings();
			$options = CS()->customizer()->optionData();
			extract( $settings );
			extract( $options );

    	include( CS()->path() . 'includes/builder/styles.php' );

    	do_action( 'cornerstone_generated_preview_css' );

	  echo '</style>';

	  $css = ob_get_contents(); ob_end_clean();

	  //
	  // 1. Remove comments.
	  // 2. Remove whitespace.
	  // 3. Remove starting whitespace.
	  //

	  $output = preg_replace( '#/\*.*?\*/#s', '', $css );            // 1
	  $output = preg_replace( '/\s*([{}|:;,])\s+/', '$1', $output ); // 2
	  $output = preg_replace( '/\s\s+(.*)/', '$1', $output );        // 3

	  echo $output;
	}

	/**
	 * Filter applied to the_content
	 * We wrap everything in a custom div so we can replace it's contents
	 * once the javascript boots.
	 */
	public function wrapContent( $content ) {
		//remove_filter( 'the_content', array( $this, 'wrapContent' ), -9999999 );
		return '<div id="cornerstone-preview-entry">' . $content . '</div>';
	}
}