<?php
/*
Plugin Name: Custom Profile field as a Registration Field
Plugin URI: http://blog.ashfame.com/2010/11/add-custom-field-registration-wordpress/
Description: Sample plugin for adding a custom profile field to WordPress and on the registration page
Author: Ashfame
Version: 0.1
Author URI: http://blog.ashfame.com/
*/

/**
 * Add additional custom field
 */

add_action ( 'show_user_profile', 'my_show_extra_profile_fields' );
add_action ( 'edit_user_profile', 'my_show_extra_profile_fields' );

function my_show_extra_profile_fields ( $user )
{
?>
	<h3>Extra profile information</h3>
	<table class="form-table">
		<tr>
			<th><label for="customercode">Customer Code</label></th>
			<td>
				<input type="text" name="customercode" id="customercode" value="<?php echo esc_attr( get_the_author_meta( 'customercode', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">Please enter customer code.</span>
			</td>
		</tr>
	</table>
<?php
}

add_action ( 'personal_options_update', 'my_save_extra_profile_fields' );
add_action ( 'edit_user_profile_update', 'my_save_extra_profile_fields' );

function my_save_extra_profile_fields( $user_id )
{
	if ( !current_user_can( 'edit_user', $user_id ) )
		return false;
	/* Copy and paste this line for additional fields. Make sure to change 'customercode' to the field ID. */
	update_usermeta( $user_id, 'customercode', $_POST['customercode'] );
}

/**
 * Add custom field to registration form
 */

add_action('register_form','show_first_name_field');
add_action('register_post','check_fields',10,3);
add_action('user_register', 'register_extra_fields');

function show_first_name_field()
{
?>
	<p>
	<label>Customer Code<br/>
	<input id="customercode" type="text" tabindex="30" size="25" value="<?php echo $_POST['customercode']; ?>" name="customercode" />
	</label>
	</p>
<?php
}

function check_fields ( $login, $email, $errors )
{
	global $customercode;
	if ( $_POST['customercode'] == '' )
	{
		$errors->add( 'empty_realname', "<strong>ERROR</strong>: Please Enter your Customer Code" );
	}
	else
	{
		$customercode = $_POST['customercode'];
	}
}

function register_extra_fields ( $user_id, $password = "", $meta = array() )
{
	update_user_meta( $user_id, 'customercode', $_POST['customercode'] );
}

?>