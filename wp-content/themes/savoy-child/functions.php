<?php
	
	/* Styles
	=============================================================== */
	
	function nm_child_theme_styles() {
		 // Enqueue child theme styles
		 wp_enqueue_style( 'nm-child-theme', get_stylesheet_directory_uri() . '/style.css' );
		 	wp_enqueue_script( 'owl-carousel', get_stylesheet_directory_uri() . '/js/owl-carousel.js', array( 'jquery' ) );
	}
	add_action( 'wp_enqueue_scripts', 'nm_child_theme_styles', 1000 ); // Note: Use priority "1000" to include the stylesheet after the parent theme stylesheets
	

	add_action( 'init', 'custom_taxonomy_Item' );
	function custom_taxonomy_Item()  {
	$labels = array(
	    'name'                       => 'Items',
	    'singular_name'              => 'Item',
	    'menu_name'                  => 'Item',
	    'all_items'                  => 'All Items',
	    'parent_item'                => 'Parent Item',
	    'parent_item_colon'          => 'Parent Item:',
	    'new_item_name'              => 'New Item Name',
	    'add_new_item'               => 'Add New Item',
	    'edit_item'                  => 'Edit Item',
	    'update_item'                => 'Update Item',
	    'separate_items_with_commas' => 'Separate Item with commas',
	    'search_items'               => 'Search Items',
	    'add_or_remove_items'        => 'Add or remove Items',
	    'choose_from_most_used'      => 'Choose from the most used Items',
	);
	$args = array(
	    'labels'                     => $labels,
	    'hierarchical'               => true,
	    'public'                     => true,
	    'show_ui'                    => true,
	    'show_admin_column'          => true,
	    'show_in_nav_menus'          => true,
	    'show_tagcloud'              => true,
	);
	register_taxonomy( 'item', 'product', $args );
	register_taxonomy_for_object_type( 'item', 'product' );
	}


/**
 * Disable free shipping for select products
 *
 * @param bool $is_available
 */
function my_free_shipping( $is_available ) {
	global $woocommerce;
	// set the product ids that are ineligible
	$ineligible = array( '3537' );
	// get cart contents
	$cart_items = $woocommerce->cart->get_cart();
	
	// loop through the items looking for one in the ineligible array
	foreach ( $cart_items as $key => $item ) {
		if( in_array( $item['product_id'], $ineligible ) ) {
			return false;
		}
	}
	// nothing found return the default value
	return $is_available;
}
add_filter( 'woocommerce_shipping_free_shipping_is_available', 'my_free_shipping', 20 );

/**
* Function to redirect users whether logged in or not 
*/
function switch_homepage() {

if ( is_user_logged_in() ) {
    $page = get_page_by_title( 'welcome');
    update_option( 'page_on_front', $page->ID );
    update_option( 'show_on_front', 'page' );
	} 
	
}

add_action( 'init', 'switch_homepage' );