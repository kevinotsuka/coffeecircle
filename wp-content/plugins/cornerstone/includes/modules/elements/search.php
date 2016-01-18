<?php

class CS_Search extends Cornerstone_Element_Base {

  public function data() {
    return array(
      'name'        => 'search',
      'title'       => __( 'Search', csl18n() ),
      'section'     => 'content',
      'description' => __( 'Search description.', csl18n() ),
      'supports'    => array( 'id', 'class', 'style' )
    );
  }

  public function controls() { }

  public function render( $atts ) {

    extract( $atts );

    $shortcode = "[x_search{$extra}]";

    return $shortcode;

  }

}