<?php

require_once 'autoloader.php';

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