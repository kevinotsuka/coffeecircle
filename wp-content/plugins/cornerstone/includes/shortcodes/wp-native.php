<?php

// =============================================================================
// FUNCTIONS/SHORTCODES-NATIVE.PHP
// -----------------------------------------------------------------------------
// Native shortcode alterations.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. [audio]
//   02. [video]
// =============================================================================

// [audio]
// =============================================================================

//
// 1. Library.
// 2. Output.
// 3. Class.
//

function x_wp_audio_shortcode_library() { // 1
  wp_enqueue_script( 'mediaelement' );
  return false;
}

add_filter( 'wp_audio_shortcode_library', 'x_wp_audio_shortcode_library' );


function x_wp_audio_shortcode( $html ) { // 2
  return '<div class="x-audio player" data-x-element="x_mejs">' . $html . '</div>';
}

add_filter( 'wp_audio_shortcode', 'x_wp_audio_shortcode' );


function x_wp_audio_shortcode_class() { // 3
  return 'x-mejs x-wp-audio-shortcode advanced-controls';
}

add_filter( 'wp_audio_shortcode_class', 'x_wp_audio_shortcode_class' );



// [video]
// =============================================================================

//
// 1. Library.
// 2. Output.
// 3. Class.
//

function x_wp_video_shortcode_library() { // 1
  wp_enqueue_script( 'mediaelement' );
  return false;
}

add_filter( 'wp_video_shortcode_library', 'x_wp_video_shortcode_library' );


function x_wp_video_shortcode( $output ) { // 2
  return '<div class="x-video player" data-x-element="x_mejs">' . preg_replace('/<div(.*?)>/', '<div class="x-video-inner">', $output ) . '</div>';
}

add_filter( 'wp_video_shortcode', 'x_wp_video_shortcode' );


function x_wp_video_shortcode_class() { // 3
  return 'x-mejs x-wp-video-shortcode advanced-controls';
}

add_filter( 'wp_video_shortcode_class', 'x_wp_video_shortcode_class' );