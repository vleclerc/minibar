<?php

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