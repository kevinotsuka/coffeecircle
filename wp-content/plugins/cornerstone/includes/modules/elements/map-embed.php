<?php

class CS_Map_Embed extends Cornerstone_Element_Base {

  public function data() {
    return array(
      'name'        => 'map-embed',
      'title'       => __( 'Map Embed', csl18n() ),
      'section'     => 'media',
      'description' => __( 'Map Embed description.', csl18n() ),
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
      'no_container',
      'toggle',
      __( 'No Container', csl18n() ),
      __( 'Select to remove the container around the map.', csl18n() ),
      false
    );

  }

  public function isActive() {
    return current_user_can( 'unfiltered_html' );
  }

  public function render( $atts ) {

    extract( $atts );

    $shortcode = "[x_map no_container=\"$no_container\"{$extra}]{$content}[/x_map]";

    return $shortcode;

  }

}