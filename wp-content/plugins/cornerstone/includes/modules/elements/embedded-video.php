<?php

class CS_Embedded_Video extends Cornerstone_Element_Base {

  public function data() {
    return array(
      'name'        => 'embedded-video',
      'title'       => __( 'Embedded Video', csl18n() ),
      'section'     => 'media',
      'description' => __( 'Embedded Video description.', csl18n() ),
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

    $this->addControl(
      'aspect_ratio',
      'select',
      __( 'Aspect Ratio', csl18n() ),
      __( 'Select your aspect ratio.', csl18n() ),
      '16:9',
      array(
        'choices' => array(
          array( 'value' => '16:9', 'label' => __( '16:9', csl18n() ), ),
          array( 'value' => '5:3',  'label' => __( '5:3', csl18n() ), ),
          array( 'value' => '5:4',  'label' => __( '5:4', csl18n() ), ),
          array( 'value' => '4:3',  'label' => __( '4:3', csl18n() ), ),
          array( 'value' => '3:2',  'label' => __( '3:2', csl18n() ), )
        )
      )
    );

    $this->addControl(
      'no_container',
      'toggle',
      __( 'No Container', csl18n() ),
      __( 'Select to remove the container around the video.', csl18n() ),
      false
    );

  }

  public function isActive() {
    return current_user_can( 'unfiltered_html' );
  }

  public function render( $atts ) {

    extract( $atts );

    $shortcode = "[x_video_embed no_container=\"$no_container\" type=\"$aspect_ratio\"{$extra}]{$content}[/x_video_embed]";

    return $shortcode;

  }

}