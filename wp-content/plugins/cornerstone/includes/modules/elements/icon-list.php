<?php

class CS_Icon_List extends Cornerstone_Element_Base {

  public function data() {
    return array(
      'name'        => 'icon-list',
      'title'       => __( 'Icon List', csl18n() ),
      'section'     => 'typography',
      'description' => __( 'Icon List description.', csl18n() ),
      'supports'    => array( 'id', 'class', 'style' ),
      'childType'   => 'icon-list-item',
      'renderChild' => true
    );
  }

  public function controls() {

    $this->addControl(
      'elements',
      'sortable',
      __( 'Icon List Items', csl18n() ),
      __( 'Add new items to your Icon List.', csl18n() ),
      array(
        array( 'title' => __( 'Icon List Item 1', csl18n() ), 'type' => 'check' ),
        array( 'title' => __( 'Icon List Item 2', csl18n() ), 'type' => 'check' ),
        array( 'title' => __( 'Icon List Item 3', csl18n() ), 'type' => 'times' )
      ),
      array(
        'newTitle' => __( 'Icon List Item %s', csl18n() ),
        'floor'    => 1
      )
    );

  }

  public function render( $atts ) {

    extract( $atts );

    $contents = '';

    foreach ( $elements as $e ) {

      $item_extra = $this->extra( array(
        'id'    => $e['id'],
        'class' => $e['class'],
        'style' => $e['style']
      ) );

      $contents .= '[x_icon_list_item type="' . $e['type'] .'"' . $item_extra . ']' . $e['title'] . '[/x_icon_list_item]';

    }

    $shortcode = "[x_icon_list{$extra}]{$contents}[/x_icon_list]";

    return $shortcode;

  }

}