<?php
spl_autoload_register(function ($class_name) {
    
    var_dump($class_name);
    
    if (file_exists($className . '.php')) {
        require_once $class_name . '.php';
    }
    if (file_exists('models/' . $className . '.php')) {
        require_once 'models/' . $class_name . '.php';
    }
    if (file_exists('controllers/' . $className . '.php')) {
        require_once 'controllers/' . $class_name . '.php';
    }
    
});