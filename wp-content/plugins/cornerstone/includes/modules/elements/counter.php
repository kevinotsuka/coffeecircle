<?php

class CS_Counter extends Cornerstone_Element_Base {

  public function data() {
    return array(
      'name'        => 'counter',
      'title'       => __( 'Counter', csl18n() ),
      'section'     => 'information',
      'description' => __( 'Counter description.', csl18n() ),
      'supports'    => array( 'id', 'class', 'style' )
    );
  }

  public function controls() {

    $this->addControl(
      'num_start',
      'number',
      __( 'Starting Number', csl18n() ),
      __( 'Enter in the number that you would like your counter to start from.', csl18n() ),
      '0'
    );

    $this->addControl(
      'num_end',
      'number',
      __( 'Ending Number', csl18n() ),
      __( 'Enter in the number that you would like your counter to end at. This must be higher than your starting number.', csl18n() ),
      '1000'
    );

    $this->addControl(
      'num_speed',
      'number',
      __( 'Counter Speed', csl18n() ),
      __( 'The amount of time to transition between numbers in milliseconds.', csl18n() ),
      '1500'
    );

    $this->addControl(
      'num_prefix',
      'text',
      __( 'Number Prefix', csl18n() ),
      __( 'Prefix your number with a symbol or text.', csl18n() ),
      ''
    );

    $this->addControl(
      'num_suffix',
      'text',
      __( 'Number Suffix', csl18n() ),
      __( 'Suffix your number with a symbol or text.', csl18n() ),
      ''
    );

    $this->addControl(
      'num_color',
      'color',
      __( 'Number Color', csl18n() ),
      __( 'Select the color of your number.', csl18n() ),
      ''
    );

    $this->addControl(
      'text_above',
      'text',
      __( 'Text Above', csl18n() ),
      __( 'Optionally include text above your number.', csl18n() ),
      __( 'There Are', csl18n() )
    );

    $this->addControl(
      'text_below',
      'text',
      __( 'Text Below', csl18n() ),
      __( 'Optionally include text below your number.', csl18n() ),
      __( 'Options', csl18n() )
    );

    $this->addControl(
      'text_color',
      'color',
      __( 'Text Color', csl18n() ),
      __( 'Select the color of your text above and below the number if you have include any.', csl18n() ),
      ''
    );

  }

  public function render( $atts ) {

    extract( $atts );

    $shortcode = "[x_counter num_start=\"$num_start\" num_end=\"$num_end\" num_speed=\"$num_speed\" num_prefix=\"$num_prefix\" num_suffix=\"$num_suffix\" num_color=\"$num_color\" text_above=\"$text_above\" text_below=\"$text_below\" text_color=\"$text_color\"{$extra}]";

    return $shortcode;

  }

}