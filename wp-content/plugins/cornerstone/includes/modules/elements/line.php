<?php

class CS_Line extends Cornerstone_Element_Base {

  public function data() {
    return array(
      'name'        => 'line',
      'title'       => __( 'Line', csl18n() ),
      'section'     => 'structure',
      'description' => __( 'Line description.', csl18n() ),
      'supports'    => array( 'id', 'class', 'style' )
    );
  }

  public function controls() { }

  public function render( $atts ) {

    extract( $atts );

    $shortcode = "[x_line{$extra}]";

    return $shortcode;

  }

}