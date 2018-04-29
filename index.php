<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'autoloader.php';

$request = new Request();

$controller = new $request->action;
$controller->{$request->action}($request->parameter);

