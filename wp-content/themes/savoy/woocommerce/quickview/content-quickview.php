<?php
/**
 *	The template for displaying quickview product content
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post, $product, $nm_theme_options;

$class = 'product' . ' product-' . $product->product_type;

?>

<div id="product-<?php the_ID(); ?>" <?php post_class( $class ); ?>>
	<div class="nm-qv-product-image">
		<?php wc_get_template( 'quickview/product-image.php' ); ?>
	</div>
    
    <div class="nm-qv-summary">
        <div id="nm-qv-product-summary" class="product-summary">
            <div class="nm-qv-summary-top">
                <?php
					woocommerce_template_single_title();
					woocommerce_template_single_price();
                ?>
            </div>
            <div class="nm-qv-summary-content <?php echo esc_attr( $nm_theme_options['product_quickview_summary_layout'] ); ?>">
                <?php
					woocommerce_template_single_excerpt();
					woocommerce_template_single_rating();
					woocommerce_template_single_add_to_cart();
					woocommerce_template_single_sharing();
                ?>
            </div>
        </div>
    </div>
</div>
