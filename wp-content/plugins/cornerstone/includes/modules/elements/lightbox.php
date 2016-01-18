<?php

class CS_Lightbox extends Cornerstone_Element_Base {

  public function data() {
    return array(
      'name'        => 'lightbox',
      'title'       => __('Lightbox', csl18n() ),
      'section'     => '_information', // temporarily disabled
      'description' => __( 'Lightbox description.', csl18n() )
    );
  }

  public function controls() {

    $this->addControl(
      'selector',
      'text',
      __( 'Selector', csl18n() ),
      __( 'Enter in the selector for your images (e.g. if your class is "my-img" enter ".my-img"). Set to ".x-img-link" to automatically setup a lightbox for all linked [image] shortcodes on your page.', csl18n() ),
      '.x-img-link'
    );

    $this->addControl(
      'deeplink',
      'toggle',
      __( 'Deeplink', csl18n() ),
      __( 'Select to activate deeplinking (creates unique link for each image).', csl18n() ),
      false
    );

    $this->addControl(
      'opacity',
      'text',
      __( 'Backdrop Opacity', csl18n() ),
      __( 'Enter in the opacity for the backdrop (valid inputs are numbers 0 to 1).', csl18n() ),
      '0.875'
    );

    $this->addControl(
      'prev_scale',
      'text',
      __( 'Previous Item Scale', csl18n() ),
      __( 'Enter in the scale for the previous item (valid inputs are numbers 0 to 1).', csl18n() ),
      '0.75'
    );

    $this->addControl(
      'prev_opacity',
      'text',
      __( 'Previous Item Opacity', csl18n() ),
      __( 'Enter in the opacity for the previous item (valid inputs are numbers 0 to 1).', csl18n() ),
      '0.75'
    );

    $this->addControl(
      'next_scale',
      'text',
      __( 'Next Item Scale', csl18n() ),
      __( 'Enter in the scale for the next item (valid inputs are numbers 0 to 1).', csl18n() ),
      '0.75'
    );

    $this->addControl(
      'next_opacity',
      'text',
      __( 'Next Item Opacity', csl18n() ),
      __( 'Enter in the opacity for the next item (valid inputs are numbers 0 to 1).', csl18n() ),
      '0.75'
    );

    $this->addControl(
      'thumbnails',
      'toggle',
      __( 'Thumbnails', csl18n() ),
      __( 'Select to activate thumbnail navigation.', csl18n() ),
      false
    );

    $this->addControl(
      'orientation',
      'choose',
      __( 'Orientation', csl18n() ),
      __( 'Select the orientation of your lightbox.', csl18n() ),
      'horizontal',
      array(
        'columns' => '2',
        'choices' => array(
          array( 'value' => 'horizontal', 'label' => __( 'Horizontal', csl18n() ), 'icon' => fa_entity( 'arrows-h' ) ),
          array( 'value' => 'vertical',   'label' => __( 'Vertical', csl18n() ),   'icon' => fa_entity( 'arrows-v' ) )
        )
      )
    );

  }

  public function render( $atts ) {

    extract( $atts );

    $shortcode = "[x_lightbox selector=\"$selector\" deeplink=\"$deeplink\" opacity=\"$opacity\" prev_scale=\"$prev_scale\" prev_opacity=\"$prev_opacity\" next_scale=\"$next_scale\" next_opacity=\"$next_opacity\" orientation=\"$orientation\" thumbnails=\"$thumbnails\"]";

    return $shortcode;

  }

}