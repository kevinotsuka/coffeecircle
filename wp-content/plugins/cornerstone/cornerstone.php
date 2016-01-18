<?php

/*

Plugin Name: Cornerstone
Plugin URI: http://theme.co/cornerstone
Description: The WordPress Page Builder
Author: Themeco
Author URI: http://theme.co/
Version: 1.0.5
X Plugin: cornerstone
Text Domain: cornerstone
Domain Path: lang

*/

// Prevent direct access
if ( ! defined( 'ABSPATH' ) ) exit;

// Load main plugin class
require_once 'includes/class-cornerstone.php';

// Fire it up
Cornerstone::run( __FILE__ );