<?php

class CS_Blockquote extends Cornerstone_Element_Base {

  public function data() {
    return array(
      'name'        => 'blockquote',
      'title'       => __( 'Blockquote', csl18n() ),
      'section'     => 'typography',
      'description' => __( 'Block Quote shortcode.', csl18n() ),
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
      __( 'Select the alignment of the blockquote.', csl18n() ),
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

    $shortcode = "[x_blockquote cite=\"$cite\" type=\"$align\"{$extra}]{$content}[/x_blockquote]";

    return $shortcode;

  }

}