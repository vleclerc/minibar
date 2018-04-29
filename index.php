<?php

require_once 'autoloader.php';

$request = new Request();

$controller = new $request->action;
$controller->$request->action($request->parameter);

