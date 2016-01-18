<?php

class CS_Google_Map extends Cornerstone_Element_Base {

  public function data() {
    return array(
      'name'        => 'google-map',
      'title'       => __( 'Google Map', csl18n() ),
      'section'     => 'media',
      'description' => __( 'Google Map description.', csl18n() ),
      'supports'    => array( 'id', 'class', 'style' ),
      'childType'   => 'google-map-marker',
      'renderChild' => true
    );
  }

  public function controls() {

    $this->addControl(
      'elements',
      'sortable',
      __( 'Map Markers', csl18n() ),
      __( 'Optionally include markers to your map to specify certain locations.', csl18n() ),
      NULL,
      array(
        'newTitle' => __( 'Map Marker %s', csl18n() )
      )
    );

    $this->addControl(
      'lat',
      'text',
      __( 'Latitude', csl18n() ),
      __( 'Enter the latitude for the center of your map.', csl18n() ),
      '40.7056308'
    );

    $this->addControl(
      'lng',
      'text',
      __( 'Longitude', csl18n() ),
      __( 'Enter the longitude for the center of your map.', csl18n() ),
      '-73.9780035'
    );

    $this->addControl(
      'zoom',
      'number',
      __( 'Zoom', csl18n() ),
      __( 'Specify a number between 1 and 18 for the zoom level of your map.', csl18n() ),
      '12'
    );

    $this->addControl(
      'zoom_control',
      'toggle',
      __( 'Zoom Control', csl18n() ),
      __( 'Enable to display the zoom controls for your map.', csl18n() ),
      false
    );

    $this->addControl(
      'drag',
      'toggle',
      __( 'Draggable', csl18n() ),
      __( 'Enable to make your map draggable.', csl18n() ),
      false
    );

    $this->addControl(
      'height',
      'text',
      __( 'Height', csl18n() ),
      __( 'Specify a custom height for your map if desired. You may use pixels, ems, or percentages.', csl18n() ),
      ''
    );

    $this->addControl(
      'hue',
      'color',
      __( 'Map Hue', csl18n() ),
      __( 'Specifying a hexadecimal map hue will give your map a different color palette.', csl18n() ),
      false
    );

    $this->addControl(
      'no_container',
      'toggle',
      __( 'No Container', csl18n() ),
      __( 'Select to remove the container around the map.', csl18n() ),
      false
    );

  }

  public function render( $atts ) {

    extract( $atts );

    $elements = ( isset( $elements ) ) ? $elements : array();
    $contents = '';

    foreach ( $elements as $e ) {

      $contents .= '[x_google_map_marker lat="' . $e['lat'] . '" lng="' . $e['lng'] . '" info="' . $e['info'] . '" image="' . $e['image'] . '"]';

    }

    $shortcode = "[x_google_map lat=\"{$lat}\" lng=\"{$lng}\" zoom=\"{$zoom}\" zoom_control=\"{$zoom_control}\" drag=\"{$drag}\" height=\"{$height}\" hue=\"{$hue}\" no_container=\"{$no_container}\" {$extra}]{$contents}[/x_google_map]";

    return $shortcode;

  }

}