<?php

class CS_Block_Grid extends Cornerstone_Element_Base {

  public function data() {
    return array(
      'name'        => 'block-grid',
      'title'       => __( 'Block Grid', csl18n() ),
      'section'     => 'content',
      'description' => __( 'Block Grid description.', csl18n() ),
      'supports'    => array( 'id', 'class', 'style' ),
      'childType'   => 'block-grid-item',
      'renderChild' => true
    );
  }

  public function controls() {

    $this->addControl(
      'elements',
      'sortable',
      __( 'Block Grid Items', csl18n() ),
      __( 'Add a new item to your Block Grid.', csl18n() ),
      array(
        array( 'title' => __( 'Block Grid Item 1', csl18n() ) ),
        array( 'title' => __( 'Block Grid Item 2', csl18n() ) )
      ),
      array(
        'newTitle' => __( 'Block Grid Item %s', csl18n() ),
        'floor'    => 2
      )
    );

    $this->addControl(
      'type',
      'select',
      __( 'Columns', csl18n() ),
      __( 'Select how many columns of items should be displayed on larger screens. These will update responsively based on screen size.', csl18n() ),
      'two-up',
      array(
        'choices' => array(
          array( 'value' => 'two-up',   'label' => __( '2', csl18n() ) ),
          array( 'value' => 'three-up', 'label' => __( '3', csl18n() ) ),
          array( 'value' => 'four-up',  'label' => __( '4', csl18n() ) )
        )
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

      $contents .= '[x_block_grid_item' . $item_extra . ']' . $e['content'] . '[/x_block_grid_item]';

    }

    $shortcode = "[x_block_grid type=\"$type\"{$extra}]{$contents}[/x_block_grid]";

    return $shortcode;

  }

}