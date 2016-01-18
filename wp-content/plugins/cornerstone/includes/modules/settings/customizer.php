<?php

class CS_Settings_Customizer extends Cornerstone_Setting_Section_Base {

  public function data() {
    return array(
      'name'     => 'customizer',
      'title'    => __( 'Customizer', csl18n() ),
      'priority' => '50'
    );
  }

  public function controls() {

    global $post;

    $url = add_query_arg(array(
      'url' => get_the_permalink()
    ), admin_url( 'customize.php' ) );

    $link = '<a href="' . $url . '">' . __( 'Customizer', csl18n() ) . '</a>';
    $html = '<ul class="cs-controls"><li class="cs-control cs-control-element-info"><h4>Looking for global styling?</h4><p>' . sprintf( __( 'Sitewide styles outside of the content area are managed via the %s.', csl18n() ), $link ) . '</p></li></ul>';

    $this->addControl(
      'customizer_message',
      'custom-markup',
      NULL,
      NULL,
      NULL,
      array( 'html' => $html )
    );

  }

  public function handler() { }

}