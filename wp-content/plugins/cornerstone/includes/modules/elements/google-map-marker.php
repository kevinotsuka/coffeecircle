<?php

class CS_Google_Map_Marker extends Cornerstone_Element_Base {

  public function data() {
    return array(
      'name'        => 'google-map-marker',
      'title'       => __( 'Google Map Marker', csl18n() ),
      'section'     => '_media',
      'description' => __( 'Google Map Marker description.', csl18n() ),
      'render'      => false,
      'delegate'    => true
    );
  }

  public function controls() {

    $this->addControl(
      'title',
      'title',
      NULL,
      NULL,
      ''
    );

    $this->addControl(
      'lat',
      'text',
      __( 'Latitude', csl18n() ),
      __( 'Enter the latitude for your map marker.', csl18n() ),
      '40.7056308'
    );

    $this->addControl(
      'lng',
      'text',
      __( 'Longitude', csl18n() ),
      __( 'Enter the longitude for your map marker.', csl18n() ),
      '-73.9780035'
    );

    $this->addControl(
      'info',
      'text',
      __( 'Text', csl18n() ),
      __( 'Enter in optional text to appear if your map marker is hovered over.', csl18n() ),
      ''
    );

    $this->addControl(
      'image',
      'image',
      __( 'Image', csl18n() ),
      __( 'Upload an optional alternate image to use in place of the standard map marker.', csl18n() ),
      ''
    );

  }

  // public function render( $atts ) {

  //   extract( $atts );

  //   $extra = $this->extra( array(
  //     'id'    => $id,
  //     'class' => $class,
  //     'style' => $style
  //   ) );

  //   $shortcode = "[x_google_map_marker lat=\"{$lat}\" lng=\"{$lng}\" info=\"{$info}\" image=\"{$image}\"]";

  //   return $shortcode;

  // }

}