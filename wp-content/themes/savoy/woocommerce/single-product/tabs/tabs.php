<?php
/**
 * Single Product tabs
 *
 * @author 	WooThemes
 * @package WooCommerce/Templates
 * @version 2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $nm_theme_options;

/**
 * Filter tabs and allow third parties to add their own
 *
 * Each tab is an array containing title, callback and priority.
 * @see woocommerce_default_product_tabs()
 */
$tabs = apply_filters( 'woocommerce_product_tabs', array() );

if ( ! empty( $tabs ) ) : ?>

    <div class="woocommerce-tabs wc-tabs-wrapper">
        <div class="nm-product-tabs-col">
        	<div class="nm-row">
                <div class="col centered col-md-10 col-xs-12">
                    <ul class="tabs wc-tabs">
                        <?php foreach ( $tabs as $key => $tab ) : ?>
            
                            <li class="<?php echo esc_attr( $key ); ?>_tab">
                                <a href="#tab-<?php echo esc_attr( $key ); ?>"><?php echo apply_filters( 'woocommerce_product_' . $key . '_tab_title', esc_html( $tab['title'] ), $key ) ?></a>
                            </li>
            
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            
            <?php 
                foreach ( $tabs as $key => $tab ) :
                
                // Only add "entry-content" class for the "description" tab-panel
                $panel_class = ( $key == 'description' ) ? ' entry-content' : '';
            ?>
                <div class="panel wc-tab<?php echo esc_attr( $panel_class ); ?>" id="tab-<?php echo esc_attr( $key ); ?>">
                    <?php if ( $nm_theme_options['product_description_layout'] === 'boxed' ) : ?>
                    <div class="nm-row">
                        <div class="col centered col-md-10 col-xs-12">
                            <?php call_user_func( $tab['callback'], $key, $tab ); ?>
                        </div>
                    </div>
                    <?php 
                        else :
                            call_user_func( $tab['callback'], $key, $tab );
                        endif; 
                    ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

<?php endif; ?>
