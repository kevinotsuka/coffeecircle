<?php

/**
 * Access Cornerstone without a global variable
 * @return object  main Cornerstone instance.
 */
function CS() {
	return Cornerstone::instance();
}


/**
 * Text Domain helper method
 * @return string  text domain
 */
function csl18n() {
	return CS()->td();
}


/**
 * Get all the Font Awesome unicode values
 * @return array Hash list of icon aliases and unicode values
 */
function fa_all_unicode() {
  return CS()->common()->getFontIcons();
}


/**
 * Returns a unicode value for a font icon
 * @param  string $key Icon to lookup
 * @return string      String containing unicode reference for the requested icon
 */
function fa_unicode( $key ) {
  return CS()->common()->getFontIcon( $key );
}


/**
 * Get an HTML entity for an icon
 * @param  string $key Icon to lookup
 * @return string      HTML entity
 */
function fa_entity( $key ) {
  return '&#x' . fa_unicode( $key ) . ';';
}

/**
 * Template function that returns a data attribute for an icon
 * @param  string $key Icon to lookup
 * @return string      Data attribute string that can be placed inside an element tag
 */
function fa_data_icon( $key ) {
  return 'data-x-icon="' . fa_icon( $key ) . '"';
}


/**
 * Alternate for wp_localize_script that outputs a function to return the data
 * @param  string $handle          Handle for the item in WP scripts
 * @param  string $function_name   Name of the function to be added to the window object
 * @param  object $data            Object or array containing data to be converted to JSON
 * @return none
 */
function wp_script_data_function( $handle, $function_name, $data ) {

  global $wp_scripts;

  foreach ( (array) $data as $key => $value ) {
    if ( !is_scalar($value) )
      continue;
    $data[$key] = html_entity_decode( (string) $value, ENT_QUOTES, 'UTF-8');
  }

  $script = "var $function_name=function(){ return " . wp_json_encode( $data ) . ';}';

  $data = $wp_scripts->get_data( $handle, 'data' );

  if ( !empty( $data ) )
    $script = "$data\n$script";

  return $wp_scripts->add_data( $handle, 'data', $script );
}

/**
 * Get a posts excerpt without the_content filters being applied
 * This is useful if you need to retreive an excerpt from within
 * a shortcode.
 * @return string Post excerpt
 */
function cs_get_raw_excerpt() {

  add_filter( 'get_the_excerpt', 'cs_trim_raw_excerpt'  );
  remove_filter( 'get_the_excerpt', 'wp_trim_excerpt'  );

  $excerpt = get_the_excerpt();

  add_filter( 'get_the_excerpt', 'wp_trim_excerpt'  );
  remove_filter( 'get_the_excerpt', 'cs_trim_raw_excerpt'  );

  return $excerpt;
}

/**
 * Themeco customized version of the wp_trim_excerpt function in WordPress formatting.php
 * Generates an excerpt from the content, if needed.
 *
 * @param string $text Optional. The excerpt. If set to empty, an excerpt is generated.
 * @return string The excerpt.
 */
function cs_trim_raw_excerpt( $text = '' ) {
  $raw_excerpt = $text;
  if ( '' == $text ) {
    $text = get_the_content('');

    $text = strip_shortcodes( $text );

    //$text = apply_filters( 'the_content', $text );
    $text = str_replace(']]>', ']]&gt;', $text);

    $excerpt_length = apply_filters( 'excerpt_length', 55 );

    $excerpt_more = apply_filters( 'excerpt_more', ' ' . '[&hellip;]' );
    $text = wp_trim_words( $text, $excerpt_length, $excerpt_more );
  }

  return apply_filters( 'wp_trim_excerpt', $text, $raw_excerpt );
}

// Data Attribute Generator
// =============================================================================

function cs_generate_data_attributes( $element, $params = array() ) {

  $data = 'data-x-element="' . $element . '"';

  if ( ! empty( $params ) ) {
    $params_json = htmlspecialchars( json_encode( $params ), ENT_QUOTES, 'UTF-8' );
    $data .= ' data-x-params="' . $params_json . '"';
  }

  return $data;

}



// Data Attribute Generator (Popovers and Tooltips)
// =============================================================================

function cs_generate_data_attributes_extra( $type, $trigger, $placement, $title = '', $content = '' ) {

  if ( ! in_array( $type, array( 'tooltip', 'popover' ) ) )
    return '';

  $js_params = array(
    'type'      => ( $type == 'tooltip' ) ? 'tooltip' : 'popover',
    'trigger'   => $trigger,
    'placement' => $placement,
    'title'     => htmlspecialchars_decode( $title ), // to avoid double encoding.
    'content'   => htmlspecialchars_decode( $content )
  );

  return cs_generate_data_attributes( 'extra', $js_params );

}



// Background Video Output
// =============================================================================

function cs_bg_video( $video, $poster ) {

  $output = do_shortcode( '[x_video_player class="bg transparent" src="' . $video . '" poster="' . $poster . '" hide_controls="true" autoplay="true" loop="true" muted="true" no_container="true"]' );

  return $output;

}



// Build Shortcode
// =============================================================================

function cs_build_shortcode( $name, $attributes, $extra = '', $content = '' ) {

  $output = "[{$name}";

  foreach ($attributes as $attribute => $value) {
    $output .= " {$attribute}=\"{$value}\"";
  }

  if ($extra != '') {
    $output .= " {$extra}";
  }

  if ( $content == '' ) {
    $output .= "]";
  } else {
    $output .= "]{$content}[/{$name}]";
  }

  return $output;

}



// Animation Base Class
// =============================================================================

function cs_animation_base_class( $animation_string ) {

  if ( strpos( $animation_string, 'In' ) !== false ) {
    $base_class = ' animated-hide';
  } else {
    $base_class = '';
  }

  return $base_class;

}