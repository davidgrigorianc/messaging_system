<?php
class Myerror{
    public static function exceptionHandler($exception) {
        $code = $exception->getCode();
        if(Config::get('debug')){
            echo '<div class="alert alert-danger">';
            echo '<b>Fatal error</b>:  Uncaught exception \'' . get_class($exception) . '\' with message ';
            echo $exception->getMessage() . '<br>';
            echo 'Stack trace:<pre>' . $exception->getTraceAsString() . '</pre>';
            echo 'thrown in <b>' . $exception->getFile() . '</b> on line <b>' . $exception->getLine() . '</b><br>';
            echo '</div>';
        }else{
            if($code == 404){
                View::renderTemplate('404.html');
            }
        }
        
    
    }
}