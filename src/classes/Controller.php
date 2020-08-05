<?php


abstract class Controller {
    protected $method;

    public function __construct($method) {
        $this->method = $method;
    }

    protected function returnView($viewmodel) {
        $view = 'views/' . get_class($this) . '.php';
        require('views/main.php');
    }
}