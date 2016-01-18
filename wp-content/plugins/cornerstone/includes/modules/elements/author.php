<?php

class CS_Author extends Cornerstone_Element_Base {

  public function data() {
    return array(
      'name'        => 'author',
      'title'       => __( 'Author', csl18n() ),
      'section'     => 'social',
      'description' => __( 'Author description.', csl18n() ),
      'supports'    => array( 'id', 'class', 'style' )
    );
  }

  public function controls() {

    $this->addControl(
      'heading',
      'text',
      __( 'Title', csl18n() ),
      __( 'Enter in a title for your author information.', csl18n() ),
      __( 'About the Author', csl18n() )
    );

    $this->addControl(
      'author_id',
      'text',
      __( 'Author ID', csl18n() ),
      __( 'By default the author of the post or page will be output by leaving this input blank. If you would like to output the information of another author, enter in their user ID here.', csl18n() ),
      ''
    );

  }

  public function render( $atts ) {

    extract( $atts );

    $shortcode = "[x_author title=\"$heading\" author_id=\"$author_id\"{$extra}]";

    return $shortcode;

  }

}