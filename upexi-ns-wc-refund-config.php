<?php

/**
 * Plugin Name: Upexi WooCommerce Refund Integration for NetSuite
 * Plugin URI: https://github.com/Upexi-inc/upexi-ns-wc-refund-integration
 * Description: Develop an endpoint for a webhook that automatically triggers when a refund is processed. This integration aims to streamline the workflow by ensuring real-time synchronization between our MoonWlkr (BE / WC) platform and NetSuite.
 * Author: Upexi Inc.
 * Version: 1.0
 */


define('NETSUITE_ENDPOINT', 'https://netsuite.upexi.com/api/refund');

//add the settings link to the plugins page next to the activate/deactivate links
function upexi_ns_wc_refund_add_settings_link( $links ) {
    $settings_link = '<a href="admin.php?page=upexi_ns_wc_refund">' . __( 'Settings' ) . '</a>';
    array_push( $links, $settings_link );
    return $links;
}

$plugin = plugin_basename( __FILE__ );
add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'upexi_ns_wc_refund_add_settings_link' );

//add the admin menu
function upexi_ns_wc_refund_add_admin_menu() {
    add_menu_page(
        'Upexi Refund Integration', //page title
        'Upexi Refund Integration', //menu title
        'manage_options', //capability
        'upexi_ns_wc_refund', //menu slug
        'upexi_ns_wc_refund_options_page',//settings page callback
        'dashicons-money-alt', //icon
    );
}
add_action( 'admin_menu', 'upexi_ns_wc_refund_add_admin_menu' );

function upexi_ns_wc_refund_options_page() {
    include(plugin_dir_path(__FILE__) . 'upexi-ns-wc-refund-settings.php');
}

include(plugin_dir_path(__FILE__) . 'upexi-ns-wc-refund-controller.php');

