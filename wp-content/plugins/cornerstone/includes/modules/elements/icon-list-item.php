<?php

class CS_Icon_List_Item extends Cornerstone_Element_Base {

  public function data() {
    return array(
      'name'        => 'icon-list-item',
      'title'       => __( 'Icon List Item', csl18n() ),
      'section'     => '_typography',
      'description' => __( 'Icon List Item description.', csl18n() ),
      'supports'    => array( 'id', 'class', 'style' ),
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
      'type',
      'icon-choose',
      __( 'Icon', csl18n() ),
      __( 'Specify the icon you would like to use as the bullet for your Icon List Item.', csl18n() ),
      'check'
    );

  }

  // public function render( $atts ) {

  //   extract( $atts );

  //   $extra = $this->extra( array(
  //     'id'    => $id,
  //     'class' => $class,
  //     'style' => $style
  //   ) );

  //   $shortcode = "[x_icon_list_item type=\"{$type}\"{$extra}]{$title}[/x_icon_list_item]";

  //   return $shortcode;

  // }

}