<?php

// =============================================================================
// includes/customizer/register.php
// -----------------------------------------------------------------------------
// Sets up the options to be used in the Customizer.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Register Options
//       a. Lists
//       b. Sections
//       c. Options - Layout
// =============================================================================

// Register Options
// =============================================================================

//
// Lists.
//

$list_on_off = array(
  '1' => 'On',
  ''  => 'Off'
);

$list_button_styles = array(
  'real'        => __( '3D', csl18n() ),
  'flat'        => __( 'Flat', csl18n() ),
  'transparent' => __( 'Transparent', csl18n() )
);

$list_button_shapes = array(
  'square'  => __( 'Square', csl18n() ),
  'rounded' => __( 'Rounded', csl18n() ),
  'pill'    => __( 'Pill', csl18n() )
);

$list_button_sizes = array(
  'mini'    => __( 'Mini', csl18n() ),
  'small'   => __( 'Small', csl18n() ),
  'regular' => __( 'Regular', csl18n() ),
  'large'   => __( 'Large', csl18n() ),
  'x-large' => __( 'Extra Large', csl18n() ),
  'jumbo'   => __( 'Jumbo', csl18n() )
);


//
// Sections.
//

$cs['sec'][] = array( 'cs_customizer_section_layout',     __( 'Cornerstone &ndash; Layout', csl18n() ),     1 );
$cs['sec'][] = array( 'cs_customizer_section_typography', __( 'Cornerstone &ndash; Typography', csl18n() ), 2 );
$cs['sec'][] = array( 'cs_customizer_section_buttons',    __( 'Cornerstone &ndash; Buttons', csl18n() ),    3 );


//
// Options - Layout.
//

$cs['set'][] = array( 'cs_base_margin', '1.5em', 'refresh' );
$cs['con'][] = array( 'cs_base_margin', 'text', __( 'Base Margin', csl18n() ), 'cs_customizer_section_layout' );

$cs['set'][] = array( 'cs_container_width', '88%', 'refresh' );
$cs['con'][] = array( 'cs_container_width', 'text', __( 'Container Width', csl18n() ), 'cs_customizer_section_layout' );

$cs['set'][] = array( 'cs_container_max_width', '1200px', 'refresh' );
$cs['con'][] = array( 'cs_container_max_width', 'text', __( 'Container Max Width', csl18n() ), 'cs_customizer_section_layout' );



//
// Options - Typography.
//

$cs['set'][] = array( 'cs_link_color', '#ff2a13', 'refresh' );
$cs['con'][] = array( 'cs_link_color', 'color', __( 'Link Color', csl18n() ), 'cs_customizer_section_typography' );

$cs['set'][] = array( 'cs_link_color_hover', '#d80f0f', 'refresh' );
$cs['con'][] = array( 'cs_link_color_hover', 'color', __( 'Link Hover Color', csl18n() ), 'cs_customizer_section_typography' );



//
// Options - Buttons.
//

$cs['set'][] = array( 'cs_button_style', 'real', 'refresh' );
$cs['con'][] = array( 'cs_button_style', 'select', __( 'Button Style', csl18n() ), $list_button_styles, 'cs_customizer_section_buttons' );

$cs['set'][] = array( 'cs_button_shape', 'rounded', 'refresh' );
$cs['con'][] = array( 'cs_button_shape', 'select', __( 'Button Shape', csl18n() ), $list_button_shapes, 'cs_customizer_section_buttons' );

$cs['set'][] = array( 'cs_button_size', 'regular', 'refresh' );
$cs['con'][] = array( 'cs_button_size', 'select', __( 'Button Size', csl18n() ), $list_button_sizes, 'cs_customizer_section_buttons' );

$cs['set'][] = array( 'cs_button_color', '#ffffff', 'refresh' );
$cs['con'][] = array( 'cs_button_color', 'color', __( 'Button Text', csl18n() ), 'cs_customizer_section_buttons' );

$cs['set'][] = array( 'cs_button_bg_color', '#ff2a13', 'refresh' );
$cs['con'][] = array( 'cs_button_bg_color', 'color', __( 'Button Background', csl18n() ), 'cs_customizer_section_buttons' );

$cs['set'][] = array( 'cs_button_border_color', '#ac1100', 'refresh' );
$cs['con'][] = array( 'cs_button_border_color', 'color', __( 'Button Border', csl18n() ), 'cs_customizer_section_buttons' );

$cs['set'][] = array( 'cs_button_bottom_color', '#a71000', 'refresh' );
$cs['con'][] = array( 'cs_button_bottom_color', 'color', __( 'Button Bottom', csl18n() ), 'cs_customizer_section_buttons' );

$cs['set'][] = array( 'cs_button_color_hover', '#ffffff', 'refresh' );
$cs['con'][] = array( 'cs_button_color_hover', 'color', __( 'Button Text', csl18n() ), 'cs_customizer_section_buttons' );

$cs['set'][] = array( 'cs_button_bg_color_hover', '#ef2201', 'refresh' );
$cs['con'][] = array( 'cs_button_bg_color_hover', 'color', __( 'Button Background', csl18n() ), 'cs_customizer_section_buttons' );

$cs['set'][] = array( 'cs_button_border_color_hover', '#600900', 'refresh' );
$cs['con'][] = array( 'cs_button_border_color_hover', 'color', __( 'Button Border', csl18n() ), 'cs_customizer_section_buttons' );

$cs['set'][] = array( 'cs_button_bottom_color_hover', '#a71000', 'refresh' );
$cs['con'][] = array( 'cs_button_bottom_color_hover', 'color', __( 'Button Bottom', csl18n() ), 'cs_customizer_section_buttons' );