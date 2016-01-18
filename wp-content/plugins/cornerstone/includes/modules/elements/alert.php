<?php

class CS_Alert extends Cornerstone_Element_Base {

  public function data() {
    return array(
      'name'        => 'alert',
      'title'       => __( 'Alert', csl18n() ),
      'section'     => 'information',
      'description' => __( 'Alert description.', csl18n() ),
      'supports'    => array( 'id', 'class', 'style' )
    );
  }

  public function controls() {

    $this->addControl(
      'heading',
      'text',
      __( 'Heading &amp; Content', csl18n() ),
      __( 'Text for your alert heading and content.', csl18n() ),
      __( 'Alert Title', csl18n() )
    );

    $this->addControl(
      'content',
      'textarea',
      NULL,
      NULL,
      __( 'Click to inspect, then edit as needed.', csl18n() ),
      array(
        'expandable' => __( 'Content', csl18n() )
      )
    );

    $this->addControl(
      'type',
      'choose',
      __( 'Type', csl18n() ),
      __( 'There are multiple alert types for different situations. Select the one that best suits your needs.', csl18n() ),
      'success',
      array(
        'columns' => '5',
        'choices' => array(
          array( 'value' => 'muted',   'tooltip' => __( 'Muted', csl18n() ),   'icon' => fa_entity( 'ban' ) ),
          array( 'value' => 'success', 'tooltip' => __( 'Success', csl18n() ), 'icon' => fa_entity( 'check' ) ),
          array( 'value' => 'info',    'tooltip' => __( 'Info', csl18n() ),    'icon' => fa_entity( 'info' ) ),
          array( 'value' => 'warning', 'tooltip' => __( 'Warning', csl18n() ), 'icon' => fa_entity( 'exclamation-triangle' ) ),
          array( 'value' => 'danger',  'tooltip' => __( 'Danger', csl18n() ),  'icon' => fa_entity( 'exclamation-circle' ) )
        )
      )
    );

    $this->addControl(
      'close',
      'toggle',
      __( 'Close Button', csl18n() ),
      __( 'Enabling the close button will make the alert dismissible, allowing your users to remove it if desired.', csl18n() ),
      false
    );

  }

  public function render( $atts ) {

    extract( $atts );

    $shortcode = "[x_alert type=\"$type\" close=\"$close\" heading=\"$heading\"{$extra}]{$content}[/x_alert]";

    return $shortcode;

  }

}