<?php

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(dirname(__FILE__)));
require_once(ROOT.DS.'lib'.DS.'init.php');

$local_uri = str_replace(basename(ROOT), '', $_SERVER['REQUEST_URI']);
$router = new Router($local_uri);

echo "<pre>";
print_r('Router:'.$router->getRoute().PHP_EOL);
print_r('Controller:'.$router->getController().PHP_EOL);
print_r('Action to be called:'.$router->getMethodPrefix().$router->getAction().PHP_EOL);
print_r('Params:');
print_r($router->getParams());