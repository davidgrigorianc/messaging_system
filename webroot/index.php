<?php

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(dirname(__FILE__)));
define('VIEW_PATH', ROOT.DS.'views');
define('webroot', $_SERVER['DOCUMENT_ROOT']);

require_once(ROOT.DS.'lib'.DS.'init.php');

//$local_uri = str_replace('/', '', $_SERVER['REQUEST_URI']);
//$router = new Router($local_uri);
//
//echo "<pre>";
//print_r('Router:'.$router->getRoute().PHP_EOL);
//print_r('Controller:'.$router->getController().PHP_EOL);
//print_r('Action to be called:'.$router->getMethodPrefix().$router->getAction().PHP_EOL);
//print_r('Params:');
//print_r($router->getParams());

App::run($_SERVER['REQUEST_URI']);