<?php

class CS_Settings_Responsive_Text extends Cornerstone_Setting_Section_Base {

  public function data() {
    return array(
      'name'        => 'responsive-text',
      'title'       => __( 'Responsive Text', csl18n() ),
      'priority' => '30'
    );
  }

  public function controls() {

    global $post;

    $settings = get_post_meta( $post->ID, '_cornerstone_settings', true );

    $items = ( isset( $settings['responsive_text'] ) && is_array($settings['responsive_text']) ) ? $settings['responsive_text'] : array();

    $this->addControl(
      'elements',
      'sortable',
      NULL,
      NULL,
      $items,
      array( 'type' => 'responsive-text' )
    );

  }

  public function handler( $atts ) {

    extract( $atts );
    global $post;

    $settings = get_post_meta( $post->ID, '_cornerstone_settings', true );

    $settings['responsive_text'] = $elements;

    update_post_meta( $post->ID, '_cornerstone_settings', $settings );


  }


}