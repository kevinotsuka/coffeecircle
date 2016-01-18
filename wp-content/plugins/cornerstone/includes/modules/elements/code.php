<?php

class CS_Code extends Cornerstone_Element_Base {

  public function data() {
    return array(
      'name'        => 'code',
      'title'       => __( 'Code Snippet', csl18n() ),
      'section'     => 'typography',
      'description' => __( 'Code Snippet description.', csl18n() ),
      'supports'    => array( 'id', 'class', 'style' )
    );
  }

  public function controls() {

    $this->addControl(
      'content',
      'textarea',
      __( 'Content', csl18n() ),
      __( 'The content you want output. Keep in mind that this shortcode is meant to display code snippets, not output functioning code.', csl18n() ),
      __( 'This shortcode is great for outputting code snippets or preformatted text.', csl18n() )
    );

  }

  public function render( $atts ) {

    extract( $atts );

    $shortcode = "[x_code{$extra}]{$content}[/x_code]";

    return $shortcode;

  }

}