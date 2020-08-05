<div class="view">
    <div>
        <div class="<?php echo (empty($viewmodel['converted_amount'])) ? 'hidden' : ''; ?> payment_feedback">
            <h3>Payment succesfull!</h3>
            <p>Payment amount: <?php printf('%.2f', $viewmodel['converted_amount']); echo ' ' . $viewmodel['target_currency']; ?></p>
        </div>
    </div>
    <form action="/paymentform/payment" method="post" class="form_container">
        <div class="form_group">
            <label for="card_number">Card Number</label>
            <input
                    type="text"
                    id="card_number"
                    name="card_number"
                    class="<?php echo (!empty($viewmodel['card_number_error'])) ? 'is-invalid' : ''; ?> input"
                    title="16 digit card number"
                    autocomplete="off"
                    value="<?php echo $viewmodel['card_number']; ?>"
                    <?php echo (!empty($viewmodel['converted_amount'])) ? 'disabled' : ''; ?>
                    required
            >
            <span class="input_error"><?php echo $viewmodel['card_number_error']; ?></span>
        </div>
        <div class="form_group">
            <label for="expiration">Expiration Date</label>
            <input
                    type="month"
                    id="expiration"
                    name="expiration"
                    class="<?php echo (!empty($viewmodel['expiration_error'])) ? 'is-invalid' : ''; ?> input"
                    value="<?php echo $viewmodel['expiration']; ?>"
                    <?php echo (!empty($viewmodel['converted_amount'])) ? 'disabled' : ''; ?>
                    max="9999-12"
                    required
            >
            <span class="input_error"><?php echo $viewmodel['expiration_error']; ?></span>
        </div>
        <div class="form_group">
            <label for="amount">Payment Amount <?php echo '(' . $viewmodel['source_currency'] . ')'; ?></label>
            <input
                    type="number"
                    id="amount"
                    name="amount"
                    class="<?php echo (!empty($viewmodel['amount_error'])) ? 'is-invalid' : ''; ?> input"
                    value="<?php echo $viewmodel['amount']; ?>"
                    <?php echo (!empty($viewmodel['converted_amount'])) ? 'disabled' : ''; ?>
                    autocomplete="off"
                    required
            >
            <span class="input_error"><?php echo $viewmodel['amount_error']; ?></span>
        </div>
        <div>
            <input type="submit" name="submit" class="button" value="Pay" <?php echo (!empty($viewmodel['converted_amount'])) ? 'disabled' : ''; ?>>
            <a href="<?php echo ROOT_URL ?>" class="button">Reset</a>
        </div>
    </form>
</div>
