<?php


class Router {
    protected $uri;

    protected $controller;

    protected $action;

    protected $params;
    
    protected $route;
     
    protected $method_prefix;

    public function getUri() {
        return $this->controller;
    }
    
    public function getController() {
        return $this->controller;
    }
    
    public function getAction() {
        return $this->action;
    }
    
    public function getParams() {
        return $this->params;
    }
    
    public function getRoute() {
        return $this->route;
    }
    
    public function getMethodPrefix() {
        return $this->method_prefix;
    }
    
    public function __construct($uri) {
        $this->uri = urldecode(trim($uri,'/'));
       
//       get defaults       
        $routes = Config::get('routes');  
        $this->route =  Config::get('default_route');
        $this->method_prefix = $routes[$this->route] ?? '';
       
        
        $this->controller =  Config::get('default_controller');
        $this->action =  Config::get('default_action');
       
        $uri_parts = explode('?', $uri);
        $path = $uri_parts[0];
        
        $path_parts = explode('/', $path);
        
        if(count($path_parts)){
           
            // first element - route
           if(in_array(strtolower(current($path_parts)), array_keys($routes))){
               $this->route = strtolower(current($path_parts));
               $this->method_prefix = $routes[$this->route] ?? '';
               array_shift($path_parts);
           }
           //next element - controller
           if(current($path_parts)){
               $this->controller = strtolower(current($path_parts));
               array_shift($path_parts);
           }
           //next element - action
           if(current($path_parts)){
               $this->action = strtolower(current($path_parts));
               array_shift($path_parts);
           }
           // next - params
           $this->params = $path_parts;
           
           
           
        }
       
       
    }
}
