<?php

class CS_Recent_Posts extends Cornerstone_Element_Base {

  public function data() {
    return array(
      'name'        => 'recent-posts',
      'title'       => __('Recent Posts', csl18n() ),
      'section'     => 'content',
      'description' => __( 'Recent Posts description.', csl18n() ),
      'supports'    => array( 'id', 'class', 'style' )
    );
  }

  public function controls() {

    $allowed_post_types = apply_filters( 'cs_recent_posts_post_types', array( 'post' => 'post' ) );
    if ( count($allowed_post_types) > 1 ) {

      $choices = array();

      foreach ($allowed_post_types as $key => $value) {
        $obj = get_post_type_object( $value );
        $choices[] = array( 'value' => $key, 'label' => $obj->labels->name );
      }

      $this->addControl(
        'post_type',
        'select',
        __( 'Post Type', csl18n() ),
        __( 'Choose between standard posts or portfolio posts.', csl18n() ),
        'post',
        array(
          'choices' => $choices
        )
      );
    }

    $this->addControl(
      'count',
      'select',
      __( 'Post Count', csl18n() ),
      __( 'Select how many posts to display.', csl18n() ),
      '2',
      array(
        'choices' => array(
          array( 'value' => '1', 'label' => __( '1', csl18n() ) ),
          array( 'value' => '2', 'label' => __( '2', csl18n() ) ),
          array( 'value' => '3', 'label' => __( '3', csl18n() ) ),
          array( 'value' => '4', 'label' => __( '4', csl18n() ) )
        )
      )
    );

    $this->addControl(
      'offset',
      'text',
      __( 'Offset', csl18n() ),
      __( 'Enter a number to offset initial starting post of your Recent Posts.', csl18n() ),
      ''
    );

    $this->addControl(
      'category',
      'text',
      __( 'Category', csl18n() ),
      __( 'To filter your posts by category, enter in the slug of your desired category. To filter by multiple categories, enter in your slugs separated by a comma.', csl18n() ),
      ''
    );

    $this->addControl(
      'orientation',
      'choose',
      __( 'Orientation', csl18n() ),
      __( 'Select the orientation or your Recent Posts.', csl18n() ),
      'horizontal',
      array(
        'columns' => '2', 'choices' => array(
          array( 'value' => 'horizontal', 'label' => __( 'Horizontal', csl18n() ), 'icon' => fa_entity( 'arrows-h' ) ),
          array( 'value' => 'vertical',   'label' => __( 'Vertical', csl18n() ),   'icon' => fa_entity( 'arrows-v' ) )
        )
      )
    );

    $this->addControl(
      'no_image',
      'toggle',
      __( 'Remove Featured Image', csl18n() ),
      __( 'Select to remove the featured image.', csl18n() ),
      false
    );

    $this->addControl(
      'fade',
      'toggle',
      __( 'Fade Effect', csl18n() ),
      __( 'Select to activate the fade effect.', csl18n() ),
      false
    );

  }

  public function render( $atts ) {

    extract( $atts );

    $type = ( isset( $post_type ) ) ? 'type="' . $post_type . '"' : '';

    $shortcode = "[x_recent_posts $type count=\"$count\" offset=\"$offset\" category=\"$category\" orientation=\"$orientation\" no_image=\"$no_image\" fade=\"$fade\"{$extra}]";

    return $shortcode;

  }

}