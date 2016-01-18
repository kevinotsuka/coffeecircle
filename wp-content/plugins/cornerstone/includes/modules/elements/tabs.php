<?php

class CS_Tabs extends Cornerstone_Element_Base {

  public function data() {
    return array(
      'name'        => 'tabs',
      'title'       => __( 'Tabs', csl18n() ),
      'section'     => 'content',
      'description' => __( 'Tabs description.', csl18n() ),
      'supports'    => array( 'class' ),
      'childType'   => 'tab',
      'renderChild' => true
    );
  }

  public function controls() {

    $this->addControl(
      'elements',
      'sortable',
      __( 'Tabs', csl18n() ),
      __( 'Add a new tab.', csl18n() ),
      array(
        array( 'title' => __( 'Tab 1', csl18n() ), 'content' => __( 'The content for your Tab goes here. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque pretium, nisi ut volutpat mollis, leo risus interdum arcu, eget facilisis quam felis id mauris. Ut convallis, lacus nec ornare volutpat, velit turpis scelerisque purus, quis mollis velit purus ac massa. Fusce quis urna metus. Donec et lacus et sem lacinia cursus.', csl18n() ), 'active' => true ),
        array( 'title' => __( 'Tab 2', csl18n() ), 'content' => __( 'The content for your Tab goes here. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque pretium, nisi ut volutpat mollis, leo risus interdum arcu, eget facilisis quam felis id mauris. Ut convallis, lacus nec ornare volutpat, velit turpis scelerisque purus, quis mollis velit purus ac massa. Fusce quis urna metus. Donec et lacus et sem lacinia cursus.', csl18n() ) )
      ),
      array(
        'newTitle' => __( 'Tab %s', csl18n() ),
        'floor'    => 2,
        'capacity' => 5
      )
    );

    $this->addControl(
      'nav_position',
      'choose',
      __( 'Navigation Position', csl18n() ),
      __( 'Choose the positioning of your navigation for your tabs.', csl18n() ),
      'top',
      array(
        'columns' => '3',
        'choices' => array(
          array( 'value' => 'top',   'tooltip' => __( 'Top', csl18n() ),   'icon' => fa_entity( 'arrow-up' ) ),
          array( 'value' => 'left',  'tooltip' => __( 'Left', csl18n() ),  'icon' => fa_entity( 'arrow-left' ) ),
          array( 'value' => 'right', 'tooltip' => __( 'Right', csl18n() ), 'icon' => fa_entity( 'arrow-right' ) )
        )
      )
    );

  }

  public function render( $atts ) {

    extract( $atts );

    switch ( count( $elements ) ) {
      case 2 :
        $type = 'two-up';
        break;
      case 3 :
        $type = 'three-up';
        break;
      case 4 :
        $type = 'four-up';
        break;
      case 5 :
        $type = 'five-up';
        break;
    }


    //
    // Tabs nav items.
    //

    $tabs_nav_content = '';

    foreach ( $elements as $e ) {

      $tabs_nav_extra = $this->extra( array(
        'class' => $e['class']
      ) );

      $tabs_nav_content .= '[x_tab_nav_item title="' . $e['title'] . '" active="' . $e['active'] . '"' . $tabs_nav_extra . ']';

    }


    //
    // Tabs.
    //

    $tabs_content = '';

    foreach ( $elements as $e ) {

      $tabs_extra = $this->extra( array(
        'class' => $e['class']
      ) );

      $tabs_content .= '[x_tab active="' . $e['active'] . '"' . $tabs_extra . ']' . $e['content'] . '[/x_tab]';

    }


    //
    // Pieces.
    //

    $tabs_nav  = '[x_tab_nav type="' . $type . '" float="' .  $nav_position . '"' . $extra . ']' . $tabs_nav_content . '[/x_tab_nav]';
    $tabs      = '[x_tabs' . $extra . ']' . $tabs_content . '[/x_tabs]';
    $shortcode = $tabs_nav . $tabs;

    return $shortcode;

  }

}