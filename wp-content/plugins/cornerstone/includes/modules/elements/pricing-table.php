<?php

class CS_Pricing_Table extends Cornerstone_Element_Base {

  public function data() {
    return array(
      'name'        => 'pricing-table',
      'title'       => __( 'Pricing Table', csl18n() ),
      'section'     => 'marketing',
      'description' => __( 'Pricing Table description.', csl18n() ),
      'supports'    => array( 'id', 'class', 'style' ),
      'childType'   => 'pricing-table-column',
      'renderChild' => true
    );
  }

  public function controls() {

    $this->addControl(
      'elements',
      'sortable',
      __( 'Pricing Table Columns', csl18n() ),
      __( 'Add your pricing table columns here.', csl18n() ),
      array(
        array( 'title' => __( 'Basic', csl18n() ),    'price' => '19', 'featured' => false, 'content' => __( "[x_icon_list]\n    [x_icon_list_item type=\"check\"]First Feature[/x_icon_list_item]\n    [x_icon_list_item type=\"times\"]Second Feature[/x_icon_list_item]\n    [x_icon_list_item type=\"times\"]Third Feature[/x_icon_list_item]\n[/x_icon_list]\n\n[x_button href=\"#\" size=\"large\"]Buy Now![/x_button]", csl18n() ) ),
        array( 'title' => __( 'Standard', csl18n() ), 'price' => '29', 'featured' => true,  'content' => __( "[x_icon_list]\n    [x_icon_list_item type=\"check\"]First Feature[/x_icon_list_item]\n    [x_icon_list_item type=\"check\"]Second Feature[/x_icon_list_item]\n    [x_icon_list_item type=\"times\"]Third Feature[/x_icon_list_item]\n[/x_icon_list]\n\n[x_button href=\"#\" size=\"large\"]Buy Now![/x_button]", csl18n() ), 'featured_sub' => 'Most Popular!' ),
        array( 'title' => __( 'Pro', csl18n() ),      'price' => '39', 'featured' => false, 'content' => __( "[x_icon_list]\n    [x_icon_list_item type=\"check\"]First Feature[/x_icon_list_item]\n    [x_icon_list_item type=\"check\"]Second Feature[/x_icon_list_item]\n    [x_icon_list_item type=\"check\"]Third Feature[/x_icon_list_item]\n[/x_icon_list]\n\n[x_button href=\"#\" size=\"large\"]Buy Now![/x_button]", csl18n() ) )
      ),
      array(
        'newTitle' => __( 'Column %s', csl18n() ),
        'floor'    => 1,
        'capacity' => 5
      )
    );

  }

  public function render( $atts ) {

    extract( $atts );

    $columns  = count( $elements );
    $contents = '';

    foreach ( $elements as $e ) {

      $item_extra = $this->extra( array(
        'id'    => $e['id'],
        'class' => $e['class'],
        'style' => $e['style']
      ) );

      $contents .= '[x_pricing_table_column featured="' . $e['featured'] . '" featured_sub="' . $e['featured_sub'] . '" title="' . $e['title'] . '" currency="' . $e['currency'] . '" price="' . $e['price'] . '" interval="' . $e['interval'] . '"' . $item_extra . ']' . $e['content'] . '[/x_pricing_table_column]';

    }

    $shortcode = "[x_pricing_table columns=\"$columns\"{$extra}]{$contents}[/x_pricing_table]";

    return $shortcode;

  }

}