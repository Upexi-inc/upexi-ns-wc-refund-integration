<?php

// using the woocommerce_order_refunded hook, we can trigger a function that will send a POST request to the webhook endpoint


//create the endpoint for the webook and add the callback function
function upexi_ns_wc_refund_endpoint() {
    register_rest_route( 'upexi_ns_wc_refund/v1', '/refund', array(
        'methods' => 'POST',
        'callback' => 'upexi_ns_wc_refund_webhook',
    ) );
}
add_action( 'rest_api_init', 'upexi_ns_wc_refund_endpoint' );

//callback function that will send the POST request to the webhook endpoint
function upexi_ns_wc_refund_webhook() {
};

//add the webhook to the woocommerce_order_refunded hook
add_action( 'woocommerce_order_refunded', 'upexi_ns_wc_refund_webhook' );


