<?php
/**
 * Plugin Name: Open Payout For Xero, QuickBooks and FreshBooks
 * Plugin URI: https://wordpress.org/plugins/open-payout
 * Description: Open Payout connects your woocommerce store to Xero, QuickBooks or FreshBooks. You handle the store, we'll handle your accounting.
 * Version: 1.4.6
 * Author: Open Payout
 * Author URI: https://openpayout.com
 * Developer: David Gates
 * Developer URI: https://openpayout.com
 * Text Domain: woocommerce-extension
 * Domain Path: /languages
 *
 * WC requires at least: 5.1
 * WC tested up to: 8.2
 *
 * License: GNU General Public License v3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


/**
 * Check if WooCommerce is active
 **/
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
	add_action( 'admin_menu', 'openpayout_menu_page' );

	function get_openpayout_host() {
		return 'https://openpayout.com';
	}

	function openpayout_menu_page() {
		add_submenu_page( 'woocommerce', 'Open Payout', 'Open Payout', 'administrator', 'openpayout', 'openpayout_page' );
	}

	function openpayout_page() {
		echo '<div style="float:left;">';
		echo '<img src="', plugins_url( 'images/OpenPayout_Primary_1Col.png', __FILE__ ), '" alt="Open Payout" style="height:100px">';
		echo '<p>Open Payout connects your woo commerce store to Xero or QuickBooks';
		echo '<h2>To start connect to your Accounting Platform:</h2>';
		echo '<a href="', get_openpayout_host(), '/source/woocommerce/plugin/xero?url=', urlencode( get_home_url() ), '" target="_blank">';
		echo '<img src="', plugins_url( 'images/xero_signup.png', __FILE__ ), '" alt="Connect to Xero" style="height:50px">';
		echo '</a><br/>';
		echo '<a href="', get_openpayout_host(), '/source/woocommerce/plugin/intuit?url=', urlencode( get_home_url() ), '" target="_blank">';
		echo '<img src="', plugins_url( 'images/QBOConnectOptimized.png', __FILE__ ), '" alt="Connect to QuickBooks" style="height:50px">';
		echo '</a><br/>';
		echo '<h3>Don\'t have an Accounting Platform?</h3>';
		echo '<a href="https://www.xero.com/signup?xtid=x30openpayout" style="background: #13b5ea; padding: 10px 50px; font-weight: bold; color: white; border-radius: 5px; font-size:large; text-decoration: none;" target="_blank">Try Xero for Free</a>';
		echo '</div>';
		echo '<div style="max-width: 640px; display: inline-block; margin-top:20px; margin-left:50px">';
		echo '<h3>Watch the video to learn how Open Payout works</h3>';
		echo '<video controls preload="metadata" style="width: 640px; max-width: 100vm" poster="https://openpayout.com/images/dashboard.png">';
		echo '	<source src="https://openpayout.com/video/OpenPayoutForWooCommerce.mp4" type="video/mp4">';
		echo '  Your browser can\'t play our tutorial but you can probably use Open Payout just fine';
		echo '</video>';
		echo '</div>';
	}
}