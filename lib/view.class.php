<?php

class View{
    
    protected $data;
    
    protected $path;
    
    protected static function getDefaultViewPath(){
        $router = App::getRouter();
        if(!$router){
            return false;
        }
        $controller_dir = $router->getController();
        $template_name = $router->getMethodPrefix()->getAction().'.html';
        
        return VIEW_PATH.DS.$controller_dir.DS.$template_name;
    }
    
    public function __construct($data = array(), $path = null) {
        if(!$path){
            self::getDefaultViewPath();
        }
        
        if(!file_exists($path)){
            throw new Exception('the template not found in path: '.$path);
        }
        $this->path = $path;
        $this->data = $data;
    }
    
    public function render() {
        $data = $this->data;
        ob_start();
        include($this->path);
        $content = ob_end_clean();
        return $content;
    }
}
