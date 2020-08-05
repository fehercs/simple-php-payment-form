<?php
    require('config.php');
    // Autoload Core Classes
    spl_autoload_register(function($className){
        if (file_exists('classes/' . $className . '.php')) {
            require_once 'classes/' . $className . '.php';
        }
    });
    $core = new Core();