<?php

// using the woocommerce_order_refunded hook, we can trigger a function that will send a POST request to the webhook endpoint


// Using the woocommerce_order_refunded hook, we can trigger a function
add_action('woocommerce_order_refunded', 'upexi_ns_wc_refund_processed', 10, 2);

function upexi_ns_wc_refund_processed($order_id, $refund_id) {
    // Get the order object
    $order = wc_get_order($order_id);
    // Get all the order meta data
    $order_data = $order->get_data();
    // Get the refund object
    $refund = wc_get_order($refund_id);
    // Get all the refund meta data
    $refund_data = $refund->get_data();
    // Convert order data and refund data to readable string and error log
    error_log('Order: ' . print_r($order_data, true));
    error_log('Refund: ' . print_r($refund_data, true));
}



// // Create the endpoint for the webhook and add the callback function
// function upexi_ns_wc_refund_endpoint() {
//     register_rest_route('upexi_ns_wc_refund/v1', '/refund', array(
//         'methods' => 'POST',
//         'callback' => 'upexi_ns_wc_refund_webhook',
//     ));
// }
// add_action('rest_api_init', 'upexi_ns_wc_refund_endpoint');

// // Callback function for the endpoint
// function upexi_ns_wc_refund_webhook() {
//     // Functionality for handling POST request to the webhook endpoint
// };
