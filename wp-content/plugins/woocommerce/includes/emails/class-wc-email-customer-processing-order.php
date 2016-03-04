<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

if (!class_exists('WC_Email_Customer_Processing_Order')): /**
 * Customer Processing Order Email
 *
 * An email sent to the customer when a new order is received/paid for.
 *
 * @class       WC_Email_Customer_Processing_Order
 * @version     2.0.0
 * @package     WooCommerce/Classes/Emails
 * @author      WooThemes
 * @extends     WC_Email
 */ 
    class WC_Email_Customer_Processing_Order extends WC_Email
    {
        
        /**
         * Constructor
         */
        function __construct()
        {
            
            $this->id          = 'customer_processing_order';
            $this->title       = __('Processing order', 'woocommerce');
            $this->description = __('This is an order notification sent to customers containing their order details after payment.', 'woocommerce');
            
            $this->heading = __('Thank you for your order', 'woocommerce');
            $this->subject = __('Your {site_title} order receipt from {order_date}', 'woocommerce');
            
            $this->template_html  = 'emails/customer-processing-order.php';
            $this->template_plain = 'emails/plain/customer-processing-order.php';
            
            $this->states = WC()->countries->get_states('JP');
            
            
            // Triggers for this email
            add_action('woocommerce_order_status_pending_to_processing_notification', array(
                $this,
                'trigger'
            ));
            add_action('woocommerce_order_status_pending_to_on-hold_notification', array(
                $this,
                'trigger'
            ));
            
            // Call parent constructor
            parent::__construct();
        }
        
        /**
         * Trigger.
         */
        function trigger($order_id)
        {
            
            if ($order_id) {
                $this->object    = wc_get_order($order_id);
                $this->recipient = $this->object->billing_email;
                
                $this->find['order-date']   = '{order_date}';
                $this->find['order-number'] = '{order_number}';
                
                $this->replace['order-date']   = date_i18n(wc_date_format(), strtotime($this->object->order_date));
                $this->replace['order-number'] = $this->object->get_order_number();
                $customer_id = $this->object->post->post_author;
                $customer_code = get_the_author_meta('customercode', $customer_id);
                /** Send order details to notification server. **/
                $order_list = array();
                foreach ($this->object->get_items() as $val) {
                    $vendor_name = $val['roaster'];
                    $vendor_email = $val['roaster_email'];
                    if (!array_key_exists($vendor_name, $order_list)) {
                        $order_list[$vendor_name] = array(
                            'roaster' => $vendor_name,
                            'roaster_email' => $vendor_email,
                            'orders' => array()
                        );
                    }
                    $product_id = $val['product_id'];
                    $order_meta = get_post_custom($order_id);
                    $product_meta = get_post_custom($product_id);
                    
                    $orders = array(
                        'product_name' => $val['name'],
                        'product_code' => $product_meta['product_code'][0],
                        'unit_size' => $product_meta['unit_size'][0],
                        'unit_quantity' => $product_meta['unit_quantity'][0],
                        'currency' => $order_meta['_order_currency'][0],
                        'quantity' => $val['qty'],
                        'cost' => '&yen;' . $val['line_subtotal']
                    );
                    array_push($order_list[$vendor_name]['orders'], $orders);
                }
                
                $order_data = array(
                	'customer_code' => $customer_code,
                    'order_id' => $order_id,
                    'order_date' => date_i18n(wc_date_format(), strtotime($this->object->order_date)),
                    'notes' => $this->object->customer_note,
                    'customer_email' => $this->object->billing_email,
                    'customer_telephone' => $this->object->billing_phone,
                    'shipping_address' => $this->object->get_address(),
                    'orders' => $order_list,
                    'totals' => $this->object->get_order_item_totals()
                );
                
                if (array_key_exists($order_data['shipping_address']['state'], $this->states)) {
                    $order_data['shipping_address']['state'] = $this->states[$order_data['shipping_address']['state']];
                }
                
                $curl_url = "http://services.coffeeconnection.jp/newOrder2";
                $ch       = curl_init();
                curl_setopt($ch, CURLOPT_URL, $curl_url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_HEADER, false);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    "Content-type: application/json"
                ));
                curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
                curl_setopt($ch, CURLOPT_TIMEOUT, 20);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($order_data));
                error_log("orders: ". json_encode($order_data));
                
                $response = curl_exec($ch);
                $status   = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                
                if ($status != 204) {
                    //error_log("Error: call to URL $curl_url failed with status $status, response $response, curl_error " . curl_error($ch) . ", curl_errno " . curl_errno($ch));
                } else {
                    //error_log("Successfully sent order_data: " . json_encode($order_data) . " \nresponse: $response , status: $status");
                }
                curl_close($ch);
                
                
                
            }
            
            if (!$this->is_enabled() || !$this->get_recipient()) {
                return;
            }
            
            $this->send($this->get_recipient(), $this->get_subject(), $this->get_content(), $this->get_headers(), $this->get_attachments());
        }
        
        /**
         * get_content_html function.
         *
         * @access public
         * @return string
         */
        function get_content_html()
        {
            ob_start();
            wc_get_template($this->template_html, array(
                'order' => $this->object,
                'email_heading' => $this->get_heading(),
                'sent_to_admin' => false,
                'plain_text' => false
            ));
            return ob_get_clean();
        }
        
        /**
         * get_content_plain function.
         *
         * @access public
         * @return string
         */
        function get_content_plain()
        {
            ob_start();
            wc_get_template($this->template_plain, array(
                'order' => $this->object,
                'email_heading' => $this->get_heading(),
                'sent_to_admin' => false,
                'plain_text' => true
            ));
            return ob_get_clean();
        }
    }
endif;

return new WC_Email_Customer_Processing_Order();
