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