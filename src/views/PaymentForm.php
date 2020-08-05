<div>
    <form action="/paymentform/payment" method="post">
        <div>
            <label for="card_number">Card Number</label>
            <input
                    type="text"
                    id="card_number"
                    name="card_number"
                    class="<?php echo (!empty($viewmodel['card_number_error'])) ? 'is-invalid' : ''; ?>"
                    title="16 digit card number"
                    autocomplete="off"
                    value="<?php echo $viewmodel['card_number']; ?>"
                    required
            >
            <span class="input_error"><?php echo $viewmodel['card_number_error']; ?></span>
        </div>
        <div>
            <label for="expiration">Expiration Date</label>
            <input
                    type="month"
                    id="expiration"
                    name="expiration"
                    class="<?php echo (!empty($viewmodel['expiration_error'])) ? 'is-invalid' : ''; ?>"
                    value="<?php echo $viewmodel['expiration']; ?>"
                    required
            >
            <span class="input_error"><?php echo $viewmodel['expiration_error']; ?></span>
        </div>
        <div>
            <label for="amount">Payment Amount <?php echo '(' . $viewmodel['source_currency'] . ')'; ?></label>
            <input
                    type="number"
                    id="amount"
                    name="amount"
                    class="<?php echo (!empty($viewmodel['amount_error'])) ? 'is-invalid' : ''; ?>"
                    value="<?php echo $viewmodel['amount']; ?>"
                    required
            >
            <span class="input_error"><?php echo $viewmodel['amount_error']; ?></span>
        </div>
        <div>
            <input type="submit" name="submit" value="Pay">
            <a href="<?php echo ROOT_URL ?>">Reset</a>
        </div>
    </form>
</div>
