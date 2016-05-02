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
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

add_action ( 'show_user_profile', 'my_show_reports' );
add_action ( 'edit_user_profile', 'my_show_reports' );

function my_show_reports( $user )
{
?>
	<h3>Reporting options</h3>
	<table class="form-table">
		<tr>
			<th><label for="customercode">Generate Invoice for Date range</label></th>
			<td>
			<input type="month" name="month" id="month"/>
			<input type="year" name="year" id="year"/>
				
				<span class="description">Please Select Date</span>
			</td>
		</tr>
	</table>
<?php
}

