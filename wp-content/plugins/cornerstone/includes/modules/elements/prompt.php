<?php

class CS_Prompt extends Cornerstone_Element_Base {

  public function data() {
    return array(
      'name'        => 'prompt',
      'title'       => __( 'Prompt', csl18n() ),
      'section'     => 'marketing',
      'description' => __( 'Prompt description.', csl18n() ),
      'supports'    => array( 'id', 'class', 'style' )
    );
  }

  public function controls() {

    $this->addControl(
      'heading',
      'text',
      __( 'Title &amp; Content', csl18n() ),
      __( 'Enter the title and content for your Prompt.', csl18n() ),
      __( 'Prompt Title', csl18n() )
    );

    $this->addControl(
      'message',
      'textarea',
      NULL,
      NULL,
      __( 'This is where the main content for your Prompt can go.', csl18n() ),
      array(
        'expandable' => __( 'Content', csl18n() )
      )
    );

    $this->addControl(
      'button_text',
      'text',
      __( 'Button Text', csl18n() ),
      __( 'Enter the text for your Prompt button.', csl18n() ),
      __( 'Click Me!', csl18n() )
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
      __( 'Select to include a marketing circle around your button', csl18n() ),
      false
    );

    $this->addSupport( 'link' );

    $this->addControl(
      'align',
      'choose',
      __( 'Alignment', csl18n() ),
      __( 'Select the alignment of your Prompt.', csl18n() ),
      'left',
      array(
        'columns' => '2',
        'choices' => array(
          array( 'value' => 'left',  'label' => __( 'Left', csl18n() ),  'icon' => fa_entity( 'align-left' ) ),
          array( 'value' => 'right', 'label' => __( 'Right', csl18n() ), 'icon' => fa_entity( 'align-right' ) )
        )
      )
    );

  }

  public function render( $atts ) {

    extract( $atts );

    $href_target = ( $href_target == 'true' ) ? 'blank' : '';

    $shortcode = "[x_prompt type=\"$align\" title=\"$heading\" message=\"$message\" button_text=\"$button_text\" button_icon=\"$button_icon\" circle=\"$circle\" href=\"$href\" href_title=\"$href_title\" target=\"$href_target\"{$extra}]";

    return $shortcode;

  }

}