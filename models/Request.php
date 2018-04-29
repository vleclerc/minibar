<?php
class Request {
    public $parameter;
    public $method;
    
    public function __construct(){
        $this->method = $_SERVER['REQUEST_METHOD'];
        
        
        var_dump($this->method);
        
        $data = json_decode(file_get_contents('php://input'), true);
        
        var_dump($data);
        
        $this->parameter = $data;
    }
}