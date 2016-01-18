<?php

class CS_Gap extends Cornerstone_Element_Base {

  public function data() {
    return array(
      'name'        => 'gap',
      'title'       => __( 'Gap', csl18n() ),
      'section'     => 'structure',
      'description' => __( 'Gap description.', csl18n() ),
      'supports'    => array( 'visibility', 'id', 'class', 'style' ),
      'render'      => false
    );
  }

  public function controls() {

    $this->addControl(
      'gap_size',
      'text',
      __( 'Size', csl18n() ),
      __( 'Enter in the size of your gap. Pixels, ems, and percentages are all valid units of measurement.', csl18n() ),
      '50px'
    );

  }

  public function render( $atts ) {

    extract( $atts );

    $shortcode = "[x_gap size=\"$gap_size\"{$extra}]";

    return $shortcode;

  }

}