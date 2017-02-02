<?php
/*
  Plugin Name: Change Wording "Coupon Code" for WooCommercce
  Plugin URI: http://gulftobayweb.com
  Description: This plugin changes the words "Coupon Code" to desired wording.
  Version: 1.0.1
  Author: Torsten Dreier / Gulf To Bay Web
  Author URI: http://gulftobayweb.com
  Text Domain: change-wording
  */

function woocommerce_rename_coupon_message_on_checkout() {

	return 'Have a Promo Code?' . ' <a href="#" class="showcoupon">' . __( 'Click here to enter your code', 'woocommerce' ) . '</a>';
}
add_filter( 'woocommerce_checkout_coupon_message', 'woocommerce_rename_coupon_message_on_checkout' );

// rename the coupon field on the checkout page
function woocommerce_rename_coupon_field_on_checkout( $translated_text, $text, $text_domain ) {

	// bail if not modifying frontend woocommerce text
	if ( is_admin() || 'woocommerce' !== $text_domain ) {
		return $translated_text;
	}

	if ( 'Coupon code' === $text ) {
		$translated_text = 'Promo Code';
	
	} elseif ( 'Apply Coupon' === $text ) {
		$translated_text = 'Apply Promo Code';
	}

	return $translated_text;
}
add_filter( 'gettext', 'woocommerce_rename_coupon_field_on_checkout', 10, 3 );
?>