<?php
/*
Plugin Name: SendGrid
Plugin URI: http://wordpress.org/plugins/sendgrid-email-delivery-simplified/
Description: Email Delivery. Simplified. SendGrid's cloud-based email infrastructure relieves businesses of the cost and complexity of maintaining custom email systems. SendGrid provides reliable delivery, scalability and real-time analytics along with flexible APIs that make custom integration a breeze.
Version: 1.6.8
Author: SendGrid
Author URI: http://sendgrid.com
Text Domain: sendgrid-email-delivery-simplified
License: GPLv2
*/

if ( version_compare( phpversion(), '5.3.0', '<' ) ) {
  add_action( 'admin_notices', 'php_version_error' );
  
  /**
  * Display the notice if PHP version is lower than plugin need
  *
  * return void
  */
  function php_version_error()
  {
    echo '<div class="error"><p>' . __('SendGrid: Plugin requires PHP >= 5.3.0.') . '</p></div>';
  }
} 
else
{
  if ( get_option( 'sendgrid_curl_option' ) !== FALSE)
  {
    add_action( 'admin_notices', 'sendgrid_curl_error' );
    
    /**
    * Display the notice if curl extension is not enabled
    *
    * return void
    */
    function sendgrid_curl_error()
    {
      if ( !in_array( 'curl', get_loaded_extensions() ) and ( get_option( 'sendgrid_curl_option' ) == 'disabled' ) )
      {
        echo '<div class="error"><p>' . __( 'PHP-curl extension must be enabled in order to add attachments.' ) .
          '</p></div>';
      }
      else
      {
        delete_option( 'sendgrid_curl_option' );
      }
    }
  }

  require_once plugin_dir_path( __FILE__ ) . '/lib/class-sendgrid-tools.php';
  require_once plugin_dir_path( __FILE__ ) . '/lib/class-sendgrid-settings.php';
  require_once plugin_dir_path( __FILE__ ) . '/lib/class-sendgrid-statistics.php';
  require_once plugin_dir_path( __FILE__ ) . '/lib/overwrite-sendgrid-methods.php';
  require_once plugin_dir_path( __FILE__ ) . '/lib/class-sendgrid-smtp.php';

  // Initialize SendGrid Settings
  new Sendgrid_Settings( plugin_basename( __FILE__ ) );

  // Initialize SendGrid Statistics
  new Sendgrid_Statistics();
}
