<?php
class Request {
    
    public $controller;
    
    public $action;
    
    public $parameter;
    
    public function __construct(){
        
        $uri = $_SERVER['REQUEST_URI'];
        if(substr($uri, 0, 1) == '/'){
            $uri = str_replace('/','',$uri);
        }
        
        switch($uri){
            case 'gpio':
                $this->controller = 'GpioController';
                break;
            default:
                $this->controller = 'IndexController';
        }
        
        switch($_SERVER['REQUEST_METHOD']){
            case 'POST':
                $this->action = 'postAction';
                break;
            case 'GET':
                $this->action = 'getAction';
                break;
            default:
        }
        
        $data = json_decode(file_get_contents('php://input'), true);
        $this->parameter = $data;
    }
}