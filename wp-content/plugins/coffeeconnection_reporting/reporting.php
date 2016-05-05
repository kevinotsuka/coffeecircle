<?php
/*
Plugin Name: Reporting plugin for Coffee Connection
Plugin URI: http://www.coffeeconnection.jp
Description: Sample plugin for generating reports
Author: vyoung
Version: 0.1
Author URI: http://www.coffeeconnection.jp/
*/
/**
 * Add additional custom field
 */
defined('ABSPATH') or die('No script kiddies please!');
add_action('admin_menu', 'test_button_menu');

function test_button_menu()
  {
  add_menu_page('Reporting Page', 'Coffee Connection Reports', 'manage_options', 'reports-button-slug', 'reports_admin_page');
  }

function reports_admin_page()
  {

  // This function creates the output for the admin page.
  // It also checks the value of the $_POST variable to see whether
  // there has been a form submission.
  // The check_admin_referer is a WordPress function that does some security
  // checking and is recommended good practice.
  // General check for user permissions.

  if (!is_admin())
    {
    wp_die(__('You do not have sufficient swagger to access this page.'));
    }

  // Start building the page

  echo '<div class="wrap">';
  echo '<h2>Coffee Connection Reporting Demo</h2>';

  // Check whether the button has been pressed AND also check the nonce

  if (!empty($_POST['cc_reports']) && !empty($_POST['_ccr_date']) && !empty($_POST['_ccr_user']) && check_admin_referer('cc_reports_clicked'))
    {

    // the button has been pressed AND we've passed the security check
    
    test_button_action();
    }

  echo '<form action="options-general.php?page=reports-button-slug" method="post">';

  // this is a WordPress security feature - see: https://codex.wordpress.org/WordPress_Nonces

  wp_nonce_field('cc_reports_clicked');
?>

    <input type="hidden" value="true" name="cc_reports" />
    <table class="form-table">
		<tr>
			<th><label for="reporting">Select Daterange and Customer</label></th>
			<td>
			<input type="month" name="_ccr_date" id="_ccr_date"/>

<?php
  $args = array();
  $users = get_users($args);
  if ($users)
    { ?>
    <select name="_ccr_user">
        <?php
    echo '<option value="All">All</option>';
    foreach($users as $user)
      {
      echo '<option value="' . $user->ID . '">' . $user->user_nicename . ' - ' . $user->user_email . '</option>';
      }
?>
    </select>
    <?php
    }

?>
				
			</td>
		</tr>
	</table>

  <?php
  submit_button('Submit');
  echo '</form>';
  echo '</div>';
  }

  

function get_SQL($begin, $end, $userid){
  global $wpdb;
  $query = "select customer_id, order_id, product_id, order_item_name, 
        qty, subtotal, tax, subtotal_tax, total, shipping_cost, post_date from (select {$wpdb->prefix}posts.id as order_id, {$wpdb->prefix}posts.post_date,  {$wpdb->prefix}woocommerce_order_items.order_item_name,
    max(if ({$wpdb->prefix}woocommerce_order_itemmeta.meta_key = '_qty',{$wpdb->prefix}woocommerce_order_itemmeta.meta_value, 0)) as 'qty',
    max(if ({$wpdb->prefix}woocommerce_order_itemmeta.meta_key = '_product_id',{$wpdb->prefix}woocommerce_order_itemmeta.meta_value, 0)) as 'product_id',
    max(if ({$wpdb->prefix}woocommerce_order_itemmeta.meta_key = '_line_subtotal',{$wpdb->prefix}woocommerce_order_itemmeta.meta_value, 0)) as 'subtotal',
    max(if ({$wpdb->prefix}woocommerce_order_itemmeta.meta_key = '_line_total',{$wpdb->prefix}woocommerce_order_itemmeta.meta_value, 0)) as 'total',
    max(if ({$wpdb->prefix}woocommerce_order_itemmeta.meta_key = '_line_tax',{$wpdb->prefix}woocommerce_order_itemmeta.meta_value, 0)) as 'tax',
    max(if ({$wpdb->prefix}woocommerce_order_itemmeta.meta_key = '_line_subtotal_tax',{$wpdb->prefix}woocommerce_order_itemmeta.meta_value, 0)) as 'subtotal_tax',
    max(if ({$wpdb->prefix}woocommerce_order_itemmeta.meta_key = 'cost',{$wpdb->prefix}woocommerce_order_itemmeta.meta_value, 0)) as 'shipping_cost',
    max(if ({$wpdb->prefix}postmeta.meta_key = '_customer_user',{$wpdb->prefix}postmeta.meta_value, 0)) as 'customer_id'
    
from {$wpdb->prefix}posts
  join {$wpdb->prefix}postmeta on ({$wpdb->prefix}posts.id = {$wpdb->prefix}postmeta.post_id)
  join {$wpdb->prefix}woocommerce_order_items on ({$wpdb->prefix}posts.id = {$wpdb->prefix}woocommerce_order_items.order_id )
  join {$wpdb->prefix}woocommerce_order_itemmeta on ({$wpdb->prefix}woocommerce_order_items.order_item_id = {$wpdb->prefix}woocommerce_order_itemmeta.order_item_id)
where
{$wpdb->prefix}posts.post_type='shop_order'   
  and post_date>='".$begin."' 
  and post_date<='".$end."'
group by {$wpdb->prefix}posts.id, {$wpdb->prefix}woocommerce_order_items.order_item_name) as orders
where orders.customer_id = ".$userid;
               return $wpdb->get_results($query);
}



function test_button_action() {
  $jpstates =  WC()->countries->get_states('JP');
  $begin = ($_POST['_ccr_date'].'-01');
  $begindate = new DateTime($begin);
  $end = $begindate->format( 'Y-m-t' );
  $userid = $_POST['_ccr_user'];
  $userlist = array();

  $dataset = array();
  if ($userid == 'All') {
  	$args = array();
    $users = get_users($args);
    foreach($users as $user) {
         $results = get_SQL($begin, $end, $user->ID);
         if (count($results) > 1) {
           $usermeta = array_map(function($a){ return $a[0]; }, get_user_meta($user->ID));
           
           foreach($results as $key=>$value) {
           	 $results[$key]->unit_size =   get_post_meta($results[$key]->product_id, 'unit_size', true);
           }

           $dataset[$user->ID]->orders = $results;
           $dataset[$user->ID]->begin_date = $begin;
           $dataset[$user->ID]->end_date = $end;
    	   $dataset[$user->ID]->email = $user->user_email;
    	   $dataset[$user->ID]->display_name = $user->user_nicename;
           $dataset[$user->ID]->billing_first_name = $usermeta['billing_first_name'];
           $dataset[$user->ID]->billing_last_name = $usermeta['billing_last_name'];
		   $dataset[$user->ID]->billing_company = $usermeta['billing_company'];
		   $dataset[$user->ID]->billing_email = $usermeta['billing_email'];
		   $dataset[$user->ID]->billing_phone = $usermeta['billing_phone'];
		   $dataset[$user->ID]->billing_country = WC()->countries->countries[ $usermeta['billing_country'] ];
		   $state =  WC()->countries->get_states($usermeta['billing_country']);
		   $dataset[$user->ID]->billing_address_1 = $usermeta['billing_address_1'];
		   $dataset[$user->ID]->billing_address_2 = $usermeta['billing_address_2'];
		   $dataset[$user->ID]->billing_city = $usermeta['billing_city'];
		   $dataset[$user->ID]->billing_state = $usermeta['billing_state'];
		   if (array_key_exists($usermeta['billing_state'], $state)) {
             $dataset[$user->ID]->billing_state = $state[$usermeta['billing_state']];
           }
		   $dataset[$user->ID]->billing_postcode = $usermeta['billing_postcode'];
         }
    }
  } else if (ctype_digit($_POST['_ccr_user'])){
  	    $results = get_SQL($begin, $end, $_POST['_ccr_user']);
         if (count($results) > 1) {
           $user = get_user_by('id', $_POST['_ccr_user']);
           $usermeta =  array_map(function($a){ return $a[0]; }, get_user_meta($_POST['_ccr_user']));
           foreach($results as $key=>$value) {
           	 $results[$key]->unit_size =   get_post_meta($results[$key]->product_id, 'unit_size', true);
           }
           $dataset[$_POST['_ccr_user']]->orders = $results;
           $dataset[$_POST['_ccr_user']]->begin_date = $begin;
           $dataset[$_POST['_ccr_user']]->end_date = $end;
           $dataset[$_POST['_ccr_user']]->email = $user->user_email;
           $dataset[$_POST['_ccr_user']]->display_name = $user->user_nicename;
		   $dataset[$_POST['_ccr_user']]->billing_first_name = $usermeta['billing_first_name'];
		   $dataset[$_POST['_ccr_user']]->billing_last_name = $usermeta['billing_last_name'];
		   $dataset[$_POST['_ccr_user']]->billing_company = $usermeta['billing_company'];
		   $dataset[$_POST['_ccr_user']]->billing_email = $usermeta['billing_email'];
		   $dataset[$_POST['_ccr_user']]->billing_phone = $usermeta['billing_phone'];

		   $dataset[$_POST['_ccr_user']]->billing_country = WC()->countries->countries[ $usermeta['billing_country'] ];
		   $state =  WC()->countries->get_states($usermeta['billing_country']);
		   $dataset[$_POST['_ccr_user']]->billing_address_1 = $usermeta['billing_address_1'];
		   $dataset[$_POST['_ccr_user']]->billing_address_2 = $usermeta['billing_address_2'];
		   $dataset[$_POST['_ccr_user']]->billing_city = $usermeta['billing_city'];
		   $dataset[$_POST['_ccr_user']]->billing_state = $usermeta['billing_state'];
		   if (array_key_exists($usermeta['billing_state'], $state)) {
             $dataset[$_POST['_ccr_user']]->billing_state = $state[$usermeta['billing_state']];
           }
		   $dataset[$_POST['_ccr_user']]->billing_postcode = $usermeta['billing_postcode'];  	       
         }
  }
  echo json_encode($dataset);

  echo '<br/><div id="message" class="updated fade"><p>' . 'Generating report ' . $_POST['_ccr_date'] . ' for the following customers: ' . $_POST['_ccr_user'] . '</p></div>';
  }

?>