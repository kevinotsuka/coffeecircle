<?php

class CS_Clear extends Cornerstone_Element_Base {

  public function data() {
    return array(
      'name'        => 'clear',
      'title'       => __( 'Clear', csl18n() ),
      'section'     => 'structure',
      'description' => __( 'Clear description.', csl18n() ),
      'supports'    => array( 'id', 'class', 'style' ),
    );
  }

  public function controls() { }

  public function render( $atts ) {

    extract( $atts );

    $shortcode = "[x_clear{$extra}]";

    if ( $builder == 'true' ) {
      $shortcode = '%%TMPL%%' . do_shortcode( $shortcode ) . '<div class="cs-empty-element"><div class="cs-empty-element-icon"><%= cs.icon("element-' . $this->name() . '") %></div></div>';
    }

    return $shortcode;

  }

}