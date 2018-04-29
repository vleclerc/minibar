<?php
spl_autoload_register(function ($class_name) {
    
    var_dump($class_name);
    
    var_dump(dirname(__FILE__));
    
    if (file_exists($className . '.php')) {
        var_dump('index');
        require_once $class_name . '.php';
    }
    else if (file_exists('models/' . $className . '.php')) {
        var_dump('models');
        require_once 'models/' . $class_name . '.php';
    }
    else if (file_exists('controllers/' . $className . '.php')) {
        var_dump('controllers');
        require_once 'controllers/' . $class_name . '.php';
    } else {
        var_dump('not found');
    }
    
});