<?php ob_start(); ?>
<form id="payment-form" name="payment-form">
    
    <div class="field">
        <label>Card holder's name</label><br>
        <input type="text" id="fullname" name="fullname" class="fullname-input-box" required>
    </div>
    
    <div class="field">
        <label>Email</label><br>
        <input type="email" id="email" name="email" class="email-input-box" required>
    </div>

    <div class="field">
        <label>Amount</label><br>
        <input type="number" id="amount" name="amount" min="1" step="1" class="amount-input-box" required/>
    </div>
    
    <div class="field">
        <label>Card information</label><br>
        <div id="card-element"></div>
    </div>


    <div id="card-errors" role="alert"></div>

    <button id="card-button" name="card-button">Pay</button>
</form>

<?php return ob_get_clean(); ?>