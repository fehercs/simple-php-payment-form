<?php


abstract class Controller {
    protected $method;

    public function __construct($method) {
        $this->method = $method;
    }

    protected function returnView($viewmodel, $fullview) {
        $view = 'views/' . get_class($this) . '.php';
        if ($fullview) {
            require('views/main.php');
        } else {
            require($view);
        }
    }
}