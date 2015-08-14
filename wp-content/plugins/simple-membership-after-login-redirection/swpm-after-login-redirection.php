<?php

/*
  Plugin Name: Simple Membership After Login Redirection
  Version: v1.2
  Plugin URI: https://simple-membership-plugin.com/
  Author: smp7, wp.insider
  Author URI: https://simple-membership-plugin.com/
  Description: An addon for the simple membership plugin to do the after login redirection to a specific page based on the member's level.
 */

if (!defined('ABSPATH'))
    exit; //Exit if accessed directly

define('SWPM_ALR_CONTEXT', 'swpm_alr');

add_action('swpm_after_login', 'swpm_alr_do_after_login_redirection');
add_filter('swpm_after_login_url', 'swpm_after_login_url');
if (is_admin()) {//Do admin side stuff
    add_filter('swpm_admin_add_membership_level_ui', 'swpm_alr_admin_add_membership_level_ui');
    add_filter('swpm_admin_edit_membership_level_ui', 'swpm_alr_admin_edit_membership_level_ui', 10, 2);

    add_filter('swpm_admin_add_membership_level', 'swpm_alr_admin_add_membership_level');
    add_filter('swpm_admin_edit_membership_level', 'swpm_alr_admin_edit_membership_level', 10, 2);
}

function swpm_alr_admin_add_membership_level_ui($to_filter) {
    return $to_filter . '<tr>
            <th scope="row">After Login Redirection Page</th>
            <td>
            <input type="text" class="regular-text" name="custom[swpm_alr_after_login_page_field]" value="" />
            <p class="description">Enter the URL of the page where you want members of this level to be redirected to after they login.</p>
            </td>
            </tr>';
}

function swpm_alr_admin_edit_membership_level_ui($to_filter, $id) {
    $fields = SwpmMembershipLevelCustom::get_value_by_context($id, SWPM_ALR_CONTEXT);
    $swpm_alr_after_login_page_field = isset($fields['swpm_alr_after_login_page_field']) ? $fields['swpm_alr_after_login_page_field']['meta_value'] : '';
    return $to_filter . '<tr>
            <th scope="row">After Login Redirection Page</th>
            <td>
            <input type="text" class="regular-text" name="custom[swpm_alr_after_login_page_field]" value="' . $swpm_alr_after_login_page_field . '" />
            <p class="description">Enter the URL of the page where you want members of this level to be redirected to after they login.</p>
            </td>
            </tr>';
}

function swpm_alr_admin_add_membership_level($to_filter) {
    $custom_field = $_POST['custom']['swpm_alr_after_login_page_field'];
    $field = array(
        'meta_key' => 'swpm_alr_after_login_page_field', // required
        'meta_value' => sanitize_text_field($custom_field), //required
        'meta_context' => SWPM_ALR_CONTEXT, // optional but recommended
        'meta_label' => '', // optional
        'meta_type' => 'text'// optional
    );
    $to_filter['swpm_alr_after_login_page_field'] = $field;
    return $to_filter;
}

function swpm_alr_admin_edit_membership_level($to_filter, $id) {
    $custom_field = $_POST['custom']['swpm_alr_after_login_page_field'];
    $field = array(
        'meta_key' => 'swpm_alr_after_login_page_field', // required
        'meta_value' => sanitize_text_field($custom_field), //required
        'meta_context' => SWPM_ALR_CONTEXT, // optional but recommended
        'meta_label' => '', // optional
        'meta_type' => 'text'// optional
    );
    $to_filter['swpm_alr_after_login_page_field'] = $field;
    return $to_filter;
}

function swpm_alr_do_after_login_redirection() {
    if (class_exists('BLog')) {
        SwpmLog::log_simple_debug("After login redirection addon. Checking if member need to be redirected.", true);
    }

    $auth = SwpmAuth::get_instance();
    if ($auth->is_logged_in()) {
        $level = $auth->get('membership_level');
        $level_id = $level;
        $key = 'swpm_alr_after_login_page_field';
        $after_login_page_url = SwpmMembershipLevelCustom::get_value_by_key($level_id, $key);
        if (!empty($after_login_page_url)) {
            wp_redirect($after_login_page_url);
            exit;
        }
    }
}

function swpm_after_login_url($url) {
    $auth = SwpmAuth::get_instance();
    if ($auth->is_logged_in()) {
        $level = $auth->get('membership_level');
        $level_id = $level;
        $key = 'swpm_alr_after_login_page_field';
        $after_login_page_url = SwpmMembershipLevelCustom::get_value_by_key($level_id, $key);
        if (!empty($after_login_page_url)) {
            return $after_login_page_url;
        }
    }
    return $url;
}
