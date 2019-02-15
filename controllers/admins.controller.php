<?php

class PagesController extends Controller{
    
    public function index() {       
        $this->data['test_content'] = 'pagescontroller->index';        
    }
    
    public function view() {
        $params = App::getRouter()->getParams();
        if(isset($params[0])){
            $alias = strtolower($params[0]);
            $this->data['content'] =  "we on page with '{$alias}' alias";
        }        
        
    }
    
}
