<?php

$pumpId = $argv['1'];
$during = $argv['2'];

$command = escapeshellcmd(dirname(__FILE__).'scriptgpio '.$pumpId.' '.$during);

echo $command;

$output = shell_exec($command);
echo $output;
