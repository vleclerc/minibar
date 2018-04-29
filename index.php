<?php

spl_autoload_register(function ($class_name) {
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
    

class Request {
    public $parameter;
    public $method;
    
    public function __construct(){
        $this->method = $_SERVER['REQUEST_METHOD'];
        
        $data = json_decode(file_get_contents('php://input'), true);
        
        $this->parameter = $data;
    }
}

$request = new Request();

$gpioController = new GpioController();

switch($request->method){
    case 'POST':
        $gpioController->postAction($request);
        break;
    case 'GET':
        $gpioController->getAction($request);
        break;
    default:
}
