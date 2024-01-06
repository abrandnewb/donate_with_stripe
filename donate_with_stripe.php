<?php
/* 
* Plugin name: Donate with Stripe
* Description: Integrate Stripe payment for acceptig donation.
* Version: 1.0
* Author: Biniyam AH
*/
function stripe_scripts() {
    wp_register_script( 'stripejsv4', 'https://js.stripe.com/v3/', null, null, false );
    wp_enqueue_script('stripejsv4');
}
add_action('wp_enqueue_scripts', 'stripe_scripts');


function stripe_amount_scripts() {
    $donate_with_stripe_saved_options = get_option('donate_with_stripe_option', array());

    $stripe_publishable_key = isset($donate_with_stripe_saved_options['stripe_publishable_key']) ? $donate_with_stripe_saved_options['stripe_publishable_key'] : '';
    $confirmation_message = isset($donate_with_stripe_saved_options['confirmation_message']) ? $donate_with_stripe_saved_options['confirmation_message'] : '';

	wp_enqueue_style( 'dwstripe-style', plugin_dir_url(__FILE__) . '/css/style.css' );
    
    wp_enqueue_script( 'dwstripe-script', plugin_dir_url(__FILE__) . '/js/script.js', null, null, true);
    wp_localize_script( 'dwstripe-script', 'ajax_object', array( 
                            'ajax_url' => plugin_dir_url( __FILE__ ). 'process_payment.php', 
                            'confirmation_message' => $confirmation_message,
                            'stripe_publishable_key' => $stripe_publishable_key
                        ));
}
add_action( 'wp_enqueue_scripts', 'stripe_amount_scripts' );

function donate_with_stripe() {
    return include('templates/form.php');
}

add_shortcode('donate_with_stripe', 'donate_with_stripe');

//admin page
function donate_with_stripe_setting_page() {
    add_options_page('Donate with Stripe', 'Donate with Stripe', 'manage_options', 'donate-with-stripe-admin-page', 'donate_with_stripe_admin_page');
 }
 function donate_with_stripe_admin_page() {
     require_once plugin_dir_path(__FILE__) . '/templates/admin.php';
 }
 add_action('admin_menu', 'donate_with_stripe_setting_page');
 //register setting
 function donate_with_stripe_register_settings() {
     register_setting('donate_with_stripe_option_group', 'donate_with_stripe_option');
 }
 add_action('admin_init', 'donate_with_stripe_register_settings');