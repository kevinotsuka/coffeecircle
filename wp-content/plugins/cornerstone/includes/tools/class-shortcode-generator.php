<?php

class Cornerstone_Shortcode_Generator {

  static $instance;
  private $map;

  public static function init() {

    self::$instance = new Cornerstone_Shortcode_Generator;
  }

  public static function instance() {
    return self::$instance;
  }

  function __construct() {

    $this->map = new Cornerstone_Generator_Map();

    add_action( 'admin_init', array( &$this, 'setup' ) );
    add_action( 'cornerstone_load_builder', array( &$this, 'setup' ) );

    add_action( 'wp_ajax_csg_list_shortcodes', array( &$this, 'modelEndpoint' ) );
  }

  public function map() {
    return $this->map;
  }

  public function setup() {
    if ( ! current_user_can( 'edit_posts' ) && ! current_user_can( 'edit_pages' ) )
      return;

    require_once( CS()->path() . 'includes/tools/map.php' );
    add_action( 'media_buttons', array( $this, 'addMediaButton' ), 999 );

    add_action( 'cornerstone_generator_preview_before', array( $this, 'previewBefore' ) );
  }

  public function enqueue( ) {

    wp_enqueue_style( 'cs-generator-css' , CS()->url( 'assets/css/admin/generator.css' ), array(), CS()->version() );

    wp_register_script( 'cs-generator', CS()->url( 'assets/js/dist/admin/generator' . CS()->common()->jsSuffix() ), array( 'backbone', 'jquery-ui-core', 'jquery-ui-accordion' ), CS()->version(), true );
    wp_localize_script( 'cs-generator', 'csgData', $this->getData() ) ;
    wp_enqueue_script( 'cs-generator' );

  }

  public function getData() {
    return array(
      'shortcodeCollectionUrl' => add_query_arg( array( 'action' => 'csg_list_shortcodes' ), admin_url( 'admin-ajax.php' ) ),
      'sectionNames'           => $this->map->get_sections(),
      'previewContentBefore' => $this->getPreviewContentBefore(),
      'previewContentAfter' => $this->getPreviewContentAfter(),
      'strings' => include CS()->path() . 'includes/tools/strings-generator.php'
    );
  }

  public function getPreviewContentBefore() {
    ob_start();
    do_action('cornerstone_generator_preview_before');
    return ob_get_clean();
  }

  public function getPreviewContentAfter() {
    ob_start();
    do_action('cornerstone_generator_preview_after');
    return ob_get_clean();
  }

  public function previewBefore() {
    return '<p>' . __('Click the button below to check out a live example of this shortcode', csl18n() ) . '</p>';
  }

  public function modelEndpoint() {
    wp_send_json( $this->map->get_collection() );
  }

  public function addMediaButton( $editor_id ) {
    $this->enqueue();
    $title = sprintf( __( 'Insert Shortcodes', csl18n() ) );
    $contents = include( CS()->path('includes/builder/svg/nav-elements-solid.php') ) ;
    echo "<button href=\"#\" title=\"{$title}\" id=\"cs-insert-shortcode-button\" class=\"button cs-insert-btn\">{$contents}</button>";
  }

}

class Cornerstone_Generator_Map {

  private $shortcodes = array();
  private $sections = array();

  public function add( $attributes ) {

    $attributes = apply_filters( 'cornerstone_generator_map', $attributes );

    if ( !isset($attributes['id'])|| !is_string($attributes['id']) ) {
      return _doing_it_wrong( 'xsg_add', 'Invalid `id` attribute', '2.7' );
    }

    $this->shortcodes[$attributes['id']] = $attributes;

    if ( isset($attributes['section']) && !in_array( $attributes['section'], $this->sections) )
      array_push($this->sections, $attributes['section']);

  }

  public function remove( $id ) {
    if ( is_string($id) && isset($this->shortcodes[$id]) )
      unset($this->shortcodes[$id]);
  }

  public function get( $id = '' ) {
    return isset( $this->shortcodes[$id] ) ? $this->shortcodes[$id] : false;
  }

  public function get_collection() {
    return array_values( $this->shortcodes );
  }

  public function get_sections() {
    return $this->sections;
  }
}