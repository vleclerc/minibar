<?php
spl_autoload_register(function ($class_name) {
    
    var_dump(dirname(__FILE__) . '/models/' . $className . '.php');
    var_dump(file_exists(dirname(__FILE__) . '/models/' . $className . '.php'));
    
    
    if (file_exists($className . '.php')) {
        var_dump('index');
        require_once $class_name . '.php';
    }
    else if (file_exists(dirname(__FILE__) . '/models/' . $className . '.php')) {
        var_dump('models');
        require_once dirname(__FILE__) . '/models/' . $class_name . '.php';
    }
    else if (file_exists(dirname(__FILE__) . '/controllers/' . $className . '.php')) {
        var_dump('controllers');
        require_once dirname(__FILE__) . '/controllers/' . $class_name . '.php';
    } else {
        var_dump('not found');
    }
    
});