<?php
/**
 * Main class for Cornerstone
 * This bootstraps the plugin and activates the required components.
 */
class Cornerstone {

	/**
	 * Singleton
	 * @var object
	 */
	private static $instance;

	/**
	 * __FILE__ from when the plugin was initialized
	 * @var string
	 */
	private static $file;

	/**
	 * Contains plugin_dir_path( __FILE__ )
	 * @var string
	 */
	private static $path;

	/**
	 * Contains plugin_dir_url( __FILE__ )
	 * @var string
	 */
	private static $url;

	/**
	 * Caches the plugin version retrieved from the file header
	 * @var string
	 */
	private static $version;

	/**
	 * Caches the text domain retrieved from the file header
	 * @var string
	 */
	private static $text_domain;

	/**
	 * Folder location for language files
	 * @var string
	 */
	private static $domain_path;

	/**
	 * Shortcode Component Instance
	 * Used with accessor method.
	 * @var object
	 */
	private $shortcodes;

	/**
	 * Common Component Instance
	 * Used with accessor method.
	 * @var object
	 */
	private $common;

	/**
	 * Admin Component Instance
	 * Used with accessor method.
	 * @var object
	 */
	private $admin;

	/**
	 * Elements Component Instance
	 * Used with accessor method.
	 * @var object
	 */
	private $elements;

	/**
	 * Builder Component Instance
	 * Used with accessor method.
	 * @var object
	 */
	private $builder;

	/**
	 * Integration Component Instance
	 * Used with accessor method.
	 * @var object
	 */
	private $integrations;

	/**
	 * Builder Component Instance
	 * Used with accessor method.
	 * @var object
	 */
	private $customizer;

	/**
	 * Contains a list of files to require
	 * @var array
	 */
	private $registry;

	/**
	 * Run after plugin instantiation
	 */
	public function setup() {

		// Load framework level items
		$this->registry = include $this->path() . 'includes/registry.php';
		$this->includes( $this->registry['framework'] );

		// Load Commmonly used functions and data
		$this->common = new Cornerstone_Common;

		// Load integrations
		$this->integrations = new Cornerstone_Integration_Manager;

		// Defer until the init action (early)
		add_action( 'init', array( $this, 'init' ), -1000 );

		if (defined('CS_DEV') && CS_DEV ) {
			$this->devENV();
		}
	}

	/**
	 * Perform boilerplate init actions
	 * @return none
	 */
	public function init() {

		// Localize
		load_plugin_textdomain( csl18n() , false, $this->path() . '/' . self::$domain_path . '/' );


		// Load Core Components
		$this->shortcodes = new Cornerstone_Shortcode_Manager;
		$this->customizer = new Cornerstone_Customizer_Manager;

		// Nothing left to do if we don't have a user
		if ( !is_user_logged_in() ) {
			add_action( 'template_redirect', array( $this->common, 'loginRedirect' ) );
			return;
		}

		// Load the rest of Cornerstone
		$this->includes( $this->registry['builder'] );

		// Load Components
		Cornerstone_Shortcode_Generator::init();
		Cornerstone_User_Layout_Manager::init();
		$this->admin    = new Cornerstone_Admin;
		$this->elements = new Cornerstone_Element_Manager;
		$this->builder  = new Cornerstone_Builder;

		// Version Migration
		add_action( 'admin_init', array( $this, 'versionMigration' ) );
	}

	/**
	 * Require registered classes and modules
	 * @return none
	 */
	public function includes( $includes = array() ) {

		foreach ($includes as $filename) {
			require_once ( $this->path() . 'includes/' . $filename . '.php' );
		}

	}

	/**
	 * Gets the path to the Cornerstone plugin directory.
	 * Should be used in combination with the instance wrapper funciton.
	 * For example: $path = CS()->path();
	 * @return string filterable equivilent of plugin_dir_path( __FILE__ )
	 */
	public function path( $to = '' ) {
		return apply_filters('cornerstone_path', self::$path ) . $to;
	}

	/**
	 * Gets the utl to the Cornerstone plugin directory.
	 * Should be used in combination with the instance wrapper funciton.
	 * For example: $url = CS()->url();
	 * @return string filterable equivilent of plugin_dir_url( __FILE__ )
	 */
	public function url( $to = '' ) {
		return apply_filters('cornerstone_url', self::$url ) . $to;
	}

	/**
	 * Returns the plugin version number
	 * @return string Obtained from the file header and cached
	 */
	public function version() {
		return self::$version;
	}

	/**
	 * Returns the plugin text domain
	 * Call the helper method instead: csl18n()
	 * @return string Obtained from the file header and cached
	 */
	public function td() {
		return self::$text_domain;
	}

	/**
	 * Shortcodes Component Accessor
	 * @return object reference to Cornerstone_Common instance
	 */
	public function shortcodes() {
		return $this->shortcodes;
	}

	/**
	 * Common Component Accessor
	 * @return object reference to Cornerstone_Common instance
	 */
	public function common() {
		return $this->common;
	}

	/**
	 * Admin Component Accessor
	 * @return object reference to Cornerstone_Admin instance
	 */
	public function admin() {
		return $this->admin;
	}

	/**
	 * Element Manager Component Accessor
	 * @return object reference to Cornerstone_Element_Manager instance
	 */
	public function elements() {
		return $this->elements;
	}

	/**
	 * Builder Component Accessor
	 * @return object reference to Cornerstone_Builder instance
	 */
	public function builder() {
		return $this->builder;
	}

	/**
	 * Customizer Component Accessor
	 * @return object reference to Cornerstone_Customizer_Manager instance
	 */
	public function customizer() {
		return $this->customizer;
	}

	/**
	 * Integration Component Accessor
	 * @return object reference to Cornerstone_Integration_Manager instance
	 */
	public function integrations() {
		return $this->integrations;
	}

	/**
	 * Get array of Cornerstone settings with defaults applied
	 * @return array
	 */
	public function settings() {
		return get_option( 'cornerstone_settings', $this->common()->defaultSettings() );
	}

	public function versionMigration() {

		$prior = get_option( 'cornerstone_version', $this->version() );

	  if ( !version_compare( $prior, $this->version(), '<' ) )
	  	return;

	  do_action( 'cornerstone_updated', $prior );
	  update_option( 'cornerstone_version', $this->version() );

	}

	public function devENV() {

		foreach ( glob(CS()->path('_dev/*.php')) as $filename ) {

			if ( !file_exists( $filename) )
				continue;

			require_once( $filename );

		}
	}
	/**
	 * Return plugin instance. If you need access to this instance,
	 * use the global `Cornerstone` wrapper function instead.
	 * @return object  Singleton instance
	 */
	public static function instance() {
		return (isset( self::$instance )) ? self::$instance : false;
	}

	/**
	 * Cornerstone entry point.
	 * @param  string $file This should be __FILE__ from the main plugin file
	 * @return bool true if the instance was generated for the first time
	 */
	public static function run( $file ) {
		if ( isset( self::$instance ) )
			return false;

		self::$file = $file;
		self::$path = plugin_dir_path( $file );
		self::$url = plugin_dir_url( $file );
		$data = get_file_data( $file, array( 'Version', 'Text Domain', 'Domain Path' ) );
		self::$version = array_shift( $data );
		self::$text_domain = array_shift( $data );
		self::$domain_path = array_shift( $data );
		self::$instance = new Cornerstone;
		self::$instance->setup();
		return true;
	}
}