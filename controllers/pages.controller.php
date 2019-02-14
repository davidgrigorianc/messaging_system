<?php

class PagesController extends Controller{
    
    public function index() {
        echo 'pagescontroller->index';
    }
    
    public function view() {
        $params = App::getRouter()->getParams();
        if(isset($params[0])){
            $alias = strtolower($params[0]);
            echo "we on page with '{$alias}' alias";
        }
        
        
    }
    
}
