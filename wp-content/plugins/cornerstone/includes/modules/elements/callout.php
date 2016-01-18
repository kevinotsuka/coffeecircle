<?php

class CS_Callout extends Cornerstone_Element_Base {

  public function data() {
    return array(
      'name'        => 'callout',
      'title'       => __( 'Callout', csl18n() ),
      'section'     => 'marketing',
      'description' => __( 'Callout description.', csl18n() ),
      'supports'    => array( 'id', 'class', 'style' )
    );
  }

  public function controls() {

    $this->addControl(
      'heading',
      'text',
      __( 'Title &amp; Message', csl18n() ),
      __( 'Enter the title and message for your Callout below.', csl18n() ),
      __( 'Callout Title', csl18n() )
    );

    $this->addControl(
      'message',
      'textarea',
      NULL,
      NULL,
      __( 'The message text for your Callout goes here.', csl18n() ),
      array(
        'expandable' => __( 'Message', csl18n() )
      )
    );

    $this->addControl(
      'button_text',
      'text',
      __( 'Button Text', csl18n() ),
      __( 'Enter the text for your Callout button.', csl18n() ),
      __( 'Enter Your Text', csl18n() )
    );

    $this->addControl(
      'button_icon',
      'icon-choose',
      __( 'Button Icon', csl18n() ),
      __( 'Optionally enter the button icon.', csl18n() ),
      'lightbulb-o'
    );

    $this->addControl(
      'circle',
      'toggle',
      __( 'Marketing Circle', csl18n() ),
      __( 'Select to include a marketing circle around your button.', csl18n() ),
      false
    );

    $this->addSupport( 'link' );

    $this->addControl(
      'type',
      'choose',
      __( 'Alignment', csl18n() ),
      __( 'Select the alignment for your Callout.', csl18n() ),
      'left',
      array(
        'columns' => '3',
        'choices' => array(
          array( 'value' => 'left',   'tooltip' => __( 'Left', csl18n() ),   'icon' => fa_entity( 'align-left' ) ),
          array( 'value' => 'center', 'tooltip' => __( 'Center', csl18n() ), 'icon' => fa_entity( 'align-center' ) ),
          array( 'value' => 'right',  'tooltip' => __( 'Right', csl18n() ),  'icon' => fa_entity( 'align-right' ) )
        )
      )
    );

  }

  public function render( $atts ) {

    extract( $atts );

    $href_target = ( $href_target == 'true' ) ? 'blank' : '';

    $shortcode = "[x_callout title=\"$heading\" message=\"$message\" type=\"$type\" button_text=\"$button_text\" circle=\"$circle\" button_icon=\"$button_icon\" href=\"$href\" href_title=\"$href_title\" target=\"$href_target\"{$extra}]";

    return $shortcode;

  }

}