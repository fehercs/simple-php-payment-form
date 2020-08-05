<?php


class PaymentFormModel {
    // Variable for storing form input data and model variables; shared with appropriate view
    private $data = [
        'card_number' => '',
        'expiration' => '',
        'amount' => '',
        'source_currency' => 'HUF',
        'target_currency' => 'EUR'
    ];
    public function index() {
        return $this->data;
    }

    public function payment() {
        $this->data = array_merge($this->data, filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING));
        // If form input is valid
        if ($this->validate()) {
            // Instantiate a Converter for API access
            $converter = new Converter();
            $this->data['converted_amount'] = $converter->convert($this->data['source_currency'], $this->data['target_currency'], $this->data['amount']);
        }
        return $this->data;
    }
    // Validate form input
    private function validate() {
        // Validate Card Number
        if (empty($this->data['card_number'])) {
            $this->data['card_number_error'] = 'Please enter a 16 digit card number';
        } elseif (!(strlen($this->data['card_number']) == 16)) {
            $this->data['card_number_error'] = 'Card Number must be 16 digits long';
        }
        // Validate Expiration Date
        if (empty($this->data['expiration'])) {
            $this->data['expiration_error'] = "Please enter your card's expiration date";
        } else {
            $expiration = explode('-', $this->data['expiration']);
            $timezone = new DateTimeZone('Europe/London');
            $expiration = DateTime::createFromFormat(
                'mY',
                $expiration[1] . $expiration[0],
                $timezone
            )->modify('+1 month first day of midnight');
            if ($expiration < new DateTime('now', $timezone)) {
                $this->data['expiration_error'] = "Card has expired";
            }
        }
        // Validate Amount
        if (empty($this->data['amount'])) {
            $this->data['amount_error'] = 'Please enter an amount between 1 and 1.000.000';
        } elseif ((int)$this->data['amount'] < 1 || (int)$this->data['amount'] > 1000000) {
            $this->data['amount_error'] = 'Please enter an amount between 1 and 1.000.000';
        }
        // Check if errors exist
        if (empty($this->data['card_number_error']) && empty($this->data['expiration_error']) && empty($this->data['amount_error'])) {
            return true;
        }
        return false;
    }
}