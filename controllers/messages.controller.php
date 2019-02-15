<?php

class MessagesController extends Controller{
    
    public function create(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $data = $_POST;      
            $res =  Message::createNew($data);
            session_start();
            if($res){
                $_SESSION['message']['success'] = 'Thank you for submitting message';
            }else{
                $_SESSION['message']['error'] = 'Sorry there was an error sending your form.';
            }
        }
        Router::redirect('/');

        
    }
    
}
