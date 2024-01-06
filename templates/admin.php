
<div class="wrap">
    <h1>Donate with Stripe Settings</h1>
    <form method="post" action="options.php">
        <?php 
            settings_fields('donate_with_stripe_option_group'); 

            $donate_with_stripe_option = get_option('donate_with_stripe_option', array());
            
            $donate_with_stripe_saved_options = get_option('donate_with_stripe_option', array());
            $stripe_publishable_key = isset($donate_with_stripe_saved_options['stripe_publishable_key']) ? $donate_with_stripe_saved_options['stripe_publishable_key'] : '';
            $stripe_secret_key = isset($donate_with_stripe_saved_options['stripe_secret_key']) ? $donate_with_stripe_saved_options['stripe_secret_key'] : ''; 
            $confirmation_message = isset($donate_with_stripe_saved_options['confirmation_message']) ? $donate_with_stripe_saved_options['confirmation_message'] : '';
        ?>
        <table class="form-table">
            <tr>
                <th><label for="donate_with_stripe_stripe_publishable_key">Stripe publishable key:</label></th>
                <td>
                    <input type="text" name="donate_with_stripe_option[stripe_publishable_key]" value="<?php echo esc_attr($stripe_publishable_key); ?>" required />
                </td>
            </tr>
            <tr>
                <th><label for="donate_with_stripe_stripe_secret_key">Stripe Secret key:</label></th>
                <td>
                    <input type="text" name="donate_with_stripe_option[stripe_secret_key]" value="<?php echo esc_attr($stripe_secret_key); ?>" />
                </td>
            </tr>
            <tr>
                <th><label for="donate_with_stripe_confirmation_message">Confirmation message:</label></th>
                <td>
                    <input type="text" name="donate_with_stripe_option[confirmation_message]" value="<?php echo esc_attr($confirmation_message); ?>" />    
                </td>
            </tr>            
        </table>

        <?php submit_button(); ?>
    </form>
</div>