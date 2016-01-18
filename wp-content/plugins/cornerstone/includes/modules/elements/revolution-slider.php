<?php

class CS_Revolution_Slider extends Cornerstone_Element_Base {

  public function data() {
    return array(
      'name'        => 'revolution-slider',
      'title'       => __( 'Revolution Slider', csl18n() ),
      'section'     => 'media',
      'description' => __( 'Place a Revolution Slider into your content.', csl18n() ),
      'supports'    => array(),
      //'empty'       => array( 'content' => '' )
    );
  }

  public function controls() {

    $sliders = array();

    if ( class_exists( 'RevSlider' ) ) {
      $rev_slider   = new RevSlider();
      $rev_sliders  = $rev_slider->getArrSliders();

      foreach ( $rev_sliders as $slider ) {
        $sliders[] = array( 'value' => $slider->getAlias(), 'label' => $slider->getTitle() );
      }
    }

    if ( empty( $sliders ) ) {
      $sliders[] = array( 'value' => 'none', 'label' => __( 'No slider available', csl18n() ), 'disabled' => true );
    }

    $this->addControl(
      'alias',
      'select',
      __( 'Select Slider', csl18n() ),
      __( 'Choose from Revolution sliders that have already been created.', csl18n() ),
      $sliders[0]['value'],
      array(
        'choices' => $sliders
      )
    );

  }

  public function isActive() {
    return class_exists( 'RevSlider' );
  }

  public function render( $atts ) {

    extract( $atts );

    $shortcode = "[rev_slider $alias ]";

    return $shortcode;

  }

}