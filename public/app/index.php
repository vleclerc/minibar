<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define('SRC_PATH', __DIR__ . '/../../src');

require_once SRC_PATH . '/vendor/autoload.php';
require_once SRC_PATH . '/autoloader.php';

function clear_dir($dir, $delete = false) {
    $dossier = $dir;
    $dir = opendir($dossier);
    while($file = readdir($dir)) {
        if(!in_array($file, array(".", ".."))){
            if(is_dir("$dossier/$file")) {
                clear_dir("$dossier/$file", true);
            } else {
                unlink("$dossier/$file");
            }
            
            
        }
    }
    closedir($dir);
    
    if($delete == true) {
        rmdir("$dossier/$file");
    }
}

$loader = new Twig_Loader_Filesystem('tpl');
$twig = new Twig_Environment($loader, array(
    'cache' => 'tpl_c',
));
clear_dir("tpl_c");

$pageId = 'app';

if(substr_count($pageId, 'public') > 0){
    return file_get_contents($pageId);
} else {
    echo $twig->render($pageId.'.html', array('pageId' => $pageId));
}

