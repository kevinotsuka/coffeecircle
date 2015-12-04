<?php
/**
 * Single Product Image
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.14
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $post, $woocommerce, $product, $nm_page_includes, $nm_theme_options;

$nm_page_includes['product-gallery'] = true;

// Image column
$image_column_class = ( isset( $nm_theme_options['product_image_column_size'] ) ) ? 'col-lg-' . $nm_theme_options['product_image_column_size'] . ' col-xs-12' : 'col-lg-6 col-xs-12';

// Image zoom
if ( $nm_theme_options['product_image_zoom'] === '1' ) {
	$zoom_enabled = true;
	$image_column_class .= ' zoom-enabled';
} else {
	$zoom_enabled = false;
}

?>
<div class="nm-product-thumbnails-col col-xs-1">
	<?php do_action( 'woocommerce_product_thumbnails' ); ?>
</div>

<div class="nm-product-images-col <?php echo esc_attr( $image_column_class ); ?>">
    <div class="images">
    	<?php woocommerce_show_product_sale_flash(); ?>
        
        <div id="nm-product-images-slider" class="slick-slider slick-arrows-small">
        <?php
            // Featured image
            if ( has_post_thumbnail() ) {
            
                $image = get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ) );
                
                if ( $zoom_enabled ) {
                    $zoom_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
                    $zoom_link_open = sprintf( '<a href="%s" class="nm-image-zoom zoom" data-size="%sx%s">', esc_url( $zoom_image[0] ), intval( $zoom_image[1] ), intval( $zoom_image[2] ) );
                    $zoom_link_close = '<i class="nm-font nm-font-plus"></i></a>';
                } else {
                    $zoom_link_open = $zoom_link_close = '';
                }
                
                echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<div>%s%s%s</div>', $zoom_link_open, $image, $zoom_link_close ), $post->ID );
                
            } else {
                
                echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<div><img src="%s" alt="%s" /></div>', wc_placeholder_img_src(), esc_attr__( 'Placeholder', 'woocommerce' ) ), $post->ID );
            
            }
            
            // Gallery images
            $attachment_ids = $product->get_gallery_attachment_ids();
            
            if ( $attachment_ids ) {
                foreach ( $attachment_ids as $attachment_id ) {
                    $image_link = wp_get_attachment_url( $attachment_id );
        
                    if ( ! $image_link ) {
						continue;
					}
                            
                    $image = wp_get_attachment_image( $attachment_id, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ) );
                    
                    if ( $zoom_enabled ) {
                        $zoom_image = wp_get_attachment_image_src( $attachment_id, 'full' );
                        $zoom_link_open = sprintf( '<a href="%s" class="nm-image-zoom zoom" data-size="%sx%s">', esc_url( $zoom_image[0] ), intval( $zoom_image[1] ), intval( $zoom_image[2] ) );
                        $zoom_link_close = '<i class="nm-font nm-font-plus"></i></a>';
                    } else {
                        $zoom_link_open = $zoom_link_close = '';
                    }
                    
                    echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<div>%s%s%s</div>', $zoom_link_open, $image, $zoom_link_close ), $post->ID );
                }
                
            }
        ?>
        </div>
    </div>
</div>
