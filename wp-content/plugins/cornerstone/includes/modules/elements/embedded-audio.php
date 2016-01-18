<?php

class CS_Embedded_Audio extends Cornerstone_Element_Base {

  public function data() {
    return array(
      'name'        => 'embedded-audio',
      'title'       => __( 'Embedded Audio', csl18n() ),
      'section'     => 'media',
      'description' => __( 'Embedded Audio description.', csl18n() ),
      'supports'    => array( 'id', 'class', 'style' ),
      'empty'       => array( 'content' => '' )
    );
  }

  public function controls() {

    $this->addControl(
      'content',
      'textarea',
      __( 'Embed Code', csl18n() ),
      __( 'Input your &lt;iframe&gt; or &lt;embed&gt; code from a third party service.', csl18n() ),
      ''
    );

  }

  public function isActive() {
    return current_user_can( 'unfiltered_html' );
  }

  public function render( $atts ) {

    extract( $atts );

    $shortcode = "[x_audio_embed{$extra}]{$content}[/x_audio_embed]";

    return $shortcode;

  }

}