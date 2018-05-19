<?php
spl_autoload_register(function ($className) {
    if (file_exists($className . '.php')) {
        require_once $className . '.php';
    }
    else if (file_exists(dirname(__FILE__) . '/models/' . $className . '.php')) {
        require_once dirname(__FILE__) . '/models/' . $className . '.php';
    }
    else if (file_exists(dirname(__FILE__) . '/controllers/' . $className . '.php')) {
        require_once dirname(__FILE__) . '/controllers/' . $className . '.php';
    } else {
        var_dump('Fatal Error : '.$className.' not found'); die;
    }
    
});