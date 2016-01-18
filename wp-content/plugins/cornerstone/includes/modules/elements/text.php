<?php

class CS_Text extends Cornerstone_Element_Base {

  public function data() {
    return array(
      'name'        => 'text',
      'title'       => __( 'Text', csl18n() ),
      'section'     => 'content',
      'description' => __( 'Text description.', csl18n() ),
      'supports'    => array( 'text_align', 'id', 'class', 'style' ),
      'empty'       => array( 'content' => '' )
    );
  }

  public function controls() {

    $this->addControl(
      'content',
      'editor',
      NULL,
      NULL,
      ''
    );

  }

  public function render( $atts ) {

    extract( $atts );

    $shortcode = "[x_text{$extra}]{$content}[/x_text]";

    return $shortcode;

  }

}