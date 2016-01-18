<?php

class CS_Accordion_Item extends Cornerstone_Element_Base {

  public function data() {
    return array(
      'name'        => 'accordion-item',
      'title'       => __( 'Accordion Item', csl18n() ),
      'section'     => '_content',
      'description' => __( 'Accordion Item description.', csl18n() ),
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
      __( 'Include your desired content for your Accordion Item here.', csl18n() ),
      ''
    );

    $this->addControl(
      'open',
      'toggle',
      __( 'Starts Open', csl18n() ),
      __( 'If the Accordion Items are linked, only one can start open.', csl18n() ),
      false
    );

  }

  // public function render( $atts ) {

  //   extract( $atts );

  //   $extra = $this->extra( array(
  //     'id'    => $id,
  //     'class' => $class,
  //     'style' => $style
  //   ) );

  //   $shortcode = "[x_accordion_item title=\"$title\" open=\"$open\"{$extra}]{$content}[/x_accordion_item]";

  //   return $shortcode;

  // }

}