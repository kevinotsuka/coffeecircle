<?php

class CS_Pullquote extends Cornerstone_Element_Base {

  public function data() {
    return array(
      'name'        => 'pullquote',
      'title'       => __( 'Pullquote', csl18n() ),
      'section'     => '_typography',
      'description' => __( 'Pullquote description.', csl18n() ),
      'supports'    => array( 'id', 'class', 'style' ),
      'empty'       => array( 'content' => '', 'cite' => '' )
    );
  }

  public function controls() {

    $this->addControl(
      'content',
      'textarea',
      __( 'Quote &amp Citation', csl18n() ),
      __( 'Enter your quote in the textarea below. If you want to cite your quote, you can place that in the input following the textarea.', csl18n() ),
      __( 'Input your quotation here. Also, you can cite your quotes if you would like.', csl18n() ),
      array(
        'expandable' => __( 'Quote', csl18n() )
      )
    );

    $this->addControl(
      'cite',
      'text',
      NULL,
      NULL,
      __( 'Mr. WordPress', csl18n() )
    );

    $this->addControl(
      'align',
      'choose',
      __( 'Alignment', csl18n() ),
      __( 'Select the alignment of the pullquote.', csl18n() ),
      'right',
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

    $shortcode = "[x_pullquote cite=\"$cite\" type=\"$align\"{$extra}]{$content}[/x_pullquote]";

    return $shortcode;

  }

}