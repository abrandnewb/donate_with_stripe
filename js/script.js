var stripe = Stripe(ajax_object.stripe_publishable_key);
        var elements = stripe.elements();
        var card = elements.create('card');
        card.mount('#card-element');

        var form = document.getElementById('payment-form');
        var submitButton = document.getElementById('card-button');

        form.addEventListener('submit', function (event) {
            event.preventDefault();

            var amount = document.getElementById('amount').value;
    
            submitButton.disabled = true;
            submitButton.innerHTML = 'Processing...';

            fetch(ajax_object.ajax_url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'amount=' + amount,
            })
            .then(response => response.json())
            .then(function (result) {
                stripe.confirmCardPayment(result.client_secret, {
                    payment_method: {
                        card: card,
                    },
                }).then(function (result) {
                    if (result.error) {
                        console.error(result.error.message);
                    } else {
                        form.innerHTML = '<div class="confirmation-message">'+ ajax_object.confirmation_message + '</div>';
                    }
                });
            });
        });