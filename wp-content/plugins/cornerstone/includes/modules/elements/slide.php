<?php

class CS_Slide extends Cornerstone_Element_Base {

  public function data() {
    return array(
      'name'        => 'slide',
      'title'       => __( 'Slide', csl18n() ),
      'section'     => '_content',
      'description' => __( 'Slide description.', csl18n() ),
      'supports'    => array( 'id', 'class', 'style' ),
      'render'      => false,
      'delegate'    => true
    );
  }

  public function controls() {

    $this->addControl(
      'title',
      'title',
      NULL,
      NULL,
      ''
    );

    $this->addControl(
      'content',
      'editor',
      __( 'Content', csl18n() ),
      __( 'Include your desired content for your Slide here.', csl18n() ),
      ''
    );

  }

  // public function render( $atts ) {

  //   extract( $atts );

  //   $extra = $this->extra( array(
  //     'id'    => $id,
  //     'class' => $class,
  //     'style' => $style
  //   ) );

  //   $shortcode = "[x_slide{$extra}][/x_slide]";

  //   return $shortcode;

  // }

}