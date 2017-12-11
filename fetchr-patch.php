<?php
/*
Plugin Name: Fetchr patch express
Description: Plugin for improving Fetchr shiping method
Version: 1.0
Plugin URI: https://github.com/artsiom254/fetchr-patch
*/
$active_plugins = apply_filters('active_plugins', get_option('active_plugins'));
if (in_array('woocommerce/woocommerce.php', $active_plugins) && in_array('fetchr/fetchr.php', $active_plugins)) {
    require_once('app/bootstrap.php');

    add_action('woocommerce_order_status_processing', 'fetchr_custom_processing');

    new WC_Fetchr_Shipping_Method();
}