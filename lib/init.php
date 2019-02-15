<?php


spl_autoload_register(function ($class_name) {
    $lib_path = ROOT.DS.'lib'.DS.strtolower($class_name).'.class.php';
    $controllers_path = ROOT.DS.'controllers'.DS. str_replace('controller', "", strtolower($class_name)).'.controller.php';
    $model_path = ROOT.DS.'models'.DS.$class_name.'.php';
    
    if(file_exists($lib_path)){
        require_once($lib_path); 
    }elseif(file_exists($controllers_path)){
        require_once($controllers_path); 
    }elseif(file_exists($model_path)){
          require_once($model_path); 
    }else{
        if(!file_exists($controllers_path)){
            throw new Exception('Controller '.$class_name.' is not exists',404);
        }
        throw new Exception('Failed to include class: '.$class_name);
    }
    
});
require_once(ROOT.DS.'config'.DS.'config.php');

set_exception_handler('Myerror::exceptionHandler');

