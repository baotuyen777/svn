<?php

include_once 'theme_config.php';
include_once 'include/widget.php';
//include_once 'include/Facebook/autoload.php';
add_filter('woocommerce_checkout_fields', 'custom_override_checkout_fields');

function custom_override_checkout_fields($fields) {
//    unset($fields['billing']['billing_first_name']);
//    unset($fields['billing']['billing_last_name']);
    unset($fields['billing']['billing_company']);
//    unset($fields['billing']['billing_address_1']);
    unset($fields['billing']['billing_address_2']);
    unset($fields['billing']['billing_city']);
//    unset($fields['billing']['billing_postcode']);
    unset($fields['billing']['billing_country']);
//    unset($fields['billing']['billing_state']);
//    unset($fields['billing']['billing_phone']);
//    unset($fields['order']['order_comments']);
//    unset($fields['billing']['billing_email']);
  
    return $fields;
}
function woocommerce_mini_cart( $args = array() ) {
    $defaults = array(
      'list_class' => ''
    );

    $args = wp_parse_args( $args, $defaults );
    wc_get_template( 'cart/mini-cart.php', $args );
  }
 