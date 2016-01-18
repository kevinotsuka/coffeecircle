<?php
/**
 * Shortcode Generator Mapping API
 */

function csg_map( $shortcode ) {
	Cornerstone_Shortcode_Generator::instance()->map()->add( $shortcode );
}

function csg_remove( $shortcode ) {
	Cornerstone_Shortcode_Generator::instance()->map()->remove( $shortcode );
}