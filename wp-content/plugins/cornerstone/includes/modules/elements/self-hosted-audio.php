<?php

class CS_Self_Hosted_Audio extends Cornerstone_Element_Base {

  public function data() {
    return array(
      'name'        => 'self-hosted-audio',
      'title'       => __( 'Audio Player', csl18n() ),
      'section'     => 'media',
      'description' => __( 'Audio Player description.', csl18n() ),
      'supports'    => array( 'id', 'class', 'style' ),
      'empty'       => array( 'src' => '' )
    );
  }

  public function controls() {

    $this->addControl(
      'src',
      'text',
      __( 'Src', csl18n() ),
      __( 'Include your audio URL(s) here. If using multiple sources, separate them using the pipe character (|) and place fallbacks towards the end (i.e. .mp3 then .ogg).', csl18n() ),
      '',
      array(
        'expandable' => false,
        'placeholder' => home_url( __( 'audio.mp3', csl18n() ) )
      )
    );

    // $this->addControl(
    //   'mp3',
    //   'text',
    //   __( 'MP3', csl18n() ),
    //   __( 'Include a .mp3 version of your audio.', csl18n() ),
    //   ''
    // );

    // $this->addControl(
    //   'oga',
    //   'text',
    //   __( 'OGA', csl18n() ),
    //   __( 'Include a .oga version of your audio for additional native browser support.', csl18n() ),
    //   ''
    // );

    $this->addControl(
      'advanced_controls',
      'toggle',
      __( 'Advanced Controls', csl18n() ),
      __( 'Enable audio player\'s advanced controls.', csl18n() ),
      false
    );

    $this->addControl(
      'preload',
      'select',
      __( 'Preload', csl18n() ),
      __( 'Specifies if and how the audio should be loaded when the page loads. "None" means the audio is not loaded when the page loads, "Auto" loads the audio entirely, and "Metadata" loads only metadata.', csl18n() ),
      'none',
      array(
        'choices' => array(
          array( 'value' => 'none',     'label' => __( 'None', csl18n() ) ),
          array( 'value' => 'auto',     'label' => __( 'Auto', csl18n() ) ),
          array( 'value' => 'metadata', 'label' => __( 'Metadata', csl18n() ) )
        )
      )
    );

    $this->addControl(
      'autoplay',
      'toggle',
      __( 'Autoplay', csl18n() ),
      __( 'Enable audio player\'s autoplay.', csl18n() ),
      false
    );

    $this->addControl(
      'loop',
      'toggle',
      __( 'Loop', csl18n() ),
      __( 'Enable audio player\'s loop.', csl18n() ),
      false
    );

  }

  public function render( $atts ) {

    extract( $atts );

    $shortcode = "[x_audio_player src=\"$src\" advanced_controls=\"$advanced_controls\" preload=\"$preload\" autoplay=\"$autoplay\" loop=\"$loop\"{$extra}]";

    return $shortcode;

  }
}