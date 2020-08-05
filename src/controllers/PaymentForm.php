<?php
require_once './models/PaymentForm.php';

class PaymentForm extends Controller {
    public function index() {
        $viewmodel = new PaymentFormModel();
        $this->returnView($viewmodel->index());
    }

    public function payment() {
        $viewmodel = new PaymentFormModel();
        $this->returnView($viewmodel->payment());
    }
}