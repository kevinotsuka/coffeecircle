<?php

class CS_Feature_Headline extends Cornerstone_Element_Base {

  public function data() {
    return array(
      'name'        => 'feature-headline',
      'title'       => __( 'Feature Headline', csl18n() ),
      'section'     => 'typography',
      'description' => __( 'Feature Headline description.', csl18n() ),
      'supports'    => array( 'text_align', 'id', 'class', 'style' ),
      'empty'       => array( 'content' => '' )
    );
  }

  public function controls() {

    $headingChoices = array(
      array( 'value' => 'h1', 'label' => __( 'h1', csl18n() ) ),
      array( 'value' => 'h2', 'label' => __( 'h2', csl18n() ) ),
      array( 'value' => 'h3', 'label' => __( 'h3', csl18n() ) ),
      array( 'value' => 'h4', 'label' => __( 'h4', csl18n() ) ),
      array( 'value' => 'h5', 'label' => __( 'h5', csl18n() ) ),
      array( 'value' => 'h6', 'label' => __( 'h6', csl18n() ) )
    );

    $this->addControl(
      'content',
      'textarea',
      __( 'Text', csl18n() ),
      __( 'Text to be placed inside the heading element.', csl18n() ),
      __( 'Feature Headline', csl18n() )
    );

    $this->addControl(
      'level',
      'select',
      __( 'Heading Level', csl18n() ),
      __( 'Determines which heading level should be used in the actual HTML.', csl18n() ),
      'h2',
      array(
        'choices' => $headingChoices
      )
    );

    $this->addControl(
      'looks_like',
      'select',
      __( 'Looks Like', csl18n() ),
      __( 'Allows you to alter the appearance of the heading, while still outputting it as a different HTML tag.', csl18n() ),
      'h3',
      array(
        'choices' => $headingChoices
      )
    );

    $this->addControl(
      'icon_type',
      'icon-choose',
      __( 'Icon', csl18n() ),
      __( 'Icon to be displayed next to the Feature Headline.', csl18n() ),
      'lightbulb-o'
    );

  }

  public function render( $atts ) {

    extract( $atts );

    $shortcode = "[x_feature_headline level=\"$level\" looks_like=\"$looks_like\" icon=\"$icon_type\"{$extra}]{$content}[/x_feature_headline]";

    return $shortcode;

  }
}