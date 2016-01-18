<?php

class CS_Promo extends Cornerstone_Element_Base {

  public function data() {
    return array(
      'name'        => 'promo',
      'title'       => __( 'Promo', csl18n() ),
      'section'     => 'marketing',
      'description' => __( 'Promo description.', csl18n() ),
      'supports'    => array( 'id', 'class', 'style' )
    );
  }


  public function controls() {

    $this->addControl(
      'content',
      'editor',
      __( 'Content', csl18n() ),
      __( 'Enter your Promo content.', csl18n() ),
      ''
    );

    $this->addControl(
      'image',
      'image',
      __( 'Promo Image &amp; Alt Text', csl18n() ),
      __( 'Include an image for your Promo element and provide the alt text in the input below. Alt text is used to describe an image to search engines.', csl18n() ),
      CS()->common()->placeholderImage( 650, 1500 )
    );


    $this->addControl(
      'alt',
      'text',
      NULL,
      NULL,
      ''
    );

  }

  public function render( $atts ) {

    extract( $atts );

    $shortcode = "[x_promo image=\"$image\" alt=\"$alt\"{$extra}]{$content}[/x_promo]";

    return $shortcode;

  }

}