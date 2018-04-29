<?php
class Request {
    
    public $action;
    
    public $method;
    
    public $parameter;
    
    public function __construct(){
        
        switch($_SERVER['REQUEST_URI']){
            case 'gpio':
                $this->action = 'GpioController';
                break;
            default:
                $this->action = 'IndexController';
        }
        
        switch($_SERVER['REQUEST_METHOD']){
            case 'POST':
                $this->method = 'postAction';
                break;
            case 'GET':
                $this->method = 'getAction';
                break;
            default:
        }
        
        $data = json_decode(file_get_contents('php://input'), true);
        $this->parameter = $data;
    }
}