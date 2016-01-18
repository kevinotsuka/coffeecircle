<?php

class CS_Skill_Bar extends Cornerstone_Element_Base {

  public function data() {
    return array(
      'name'        => 'skill-bar',
      'title'       => __( 'Skill Bar', csl18n() ),
      'section'     => 'information',
      'description' => __( 'Skill Bar description.', csl18n() ),
      'supports'    => array( 'id', 'class', 'style' )
    );
  }

  public function controls() {

    $this->addControl(
      'heading',
      'text',
      __( 'Heading', csl18n() ),
      __( 'Enter the heading of your Skill Bar.', csl18n() ),
      __( 'Skill Bar Title', csl18n() )
    );

    $this->addControl(
      'percent',
      'text',
      __( 'Percent', csl18n() ),
      __( 'Enter the percentage of your skill and be sure to include the percentage sign (e.g. 90%).', csl18n() ),
      '90%'
    );

    $this->addControl(
      'bar_text',
      'text',
      __( 'Bar Text', csl18n() ),
      __( 'Enter in some alternate text in place of the percentage inside the Skill Bar.', csl18n() ),
      ''
    );

    $this->addControl(
      'bar_bg_color',
      'color',
      __( 'Bar Background Color', csl18n() ),
      __( 'Select the background color of your Skill Bar.', csl18n() ),
      ''
    );

  }

  public function render( $atts ) {

    extract( $atts );

    $shortcode = "[x_skill_bar heading=\"$heading\" percent=\"$percent\" bar_text=\"$bar_text\" bar_bg_color=\"{$bar_bg_color}\"{$extra}]";

    return $shortcode;

  }

}