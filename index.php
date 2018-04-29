<?php

require_once 'autoloader.php';

var_dump($_SERVER);
var_dump($_POST);
var_dump($_GET);
var_dump($_REQUEST);


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