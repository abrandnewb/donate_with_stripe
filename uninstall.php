<?php

 if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
    die;
}

$option_name = 'donate_with_stripe_option';

delete_option( $option_name );