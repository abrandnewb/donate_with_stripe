<?php
include_once('../../../wp-load.php');
require_once 'stripe-php/init.php';

$donate_with_stripe_option = get_option('donate_with_stripe_option');
$stripe_secret_key = $donate_with_stripe_option['stripe_secret_key']; 

\Stripe\Stripe::setApiKey($stripe_secret_key);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $amount = $_POST['amount'];
    $amount_cents = $amount * 100; 
    
    
    $intent = \Stripe\PaymentIntent::create([
        'amount' => $amount_cents,
        'currency' => 'usd',
    ]);
    $data = ['client_secret' => $intent->client_secret];
    echo json_encode($data);
} 