<?php

class App{
    protected static $router;
    
    public static function getRouter() {
        self::$router;
    }
           
    public static function run($uri) {
        self::$router = new Router($uri);
        
        $controller_class = ucfirst(self::$router->getController())."Controller";
        $controller_method = strtolower(self::$router->getMethodPrefix().self::$router->getAction());
        
        //calling controller method
        $controller_object = new $controller_class();
        if(method_exists($controller_object, $controller_method)){
            $result = $controller_object->$controller_method();
        }
    }
}
