<?php

class AdminsController extends Controller{
    public function index() {
          Router::redirect('/admins/login');
    }
    public function __construct(){
        session_start();
        if(!isset($_SESSION['admin']) && $_SERVER['REQUEST_URI'] != '/admins/login' ){
            Router::redirect('/admins/login');
        }
    }
    
    public function login() {
        if(isset($_SESSION['admin'])){
             Router::redirect('/admins/messages');
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $data = $_POST;
            $res = Admin::checkAdmin($data);
            if($res['success'] == false){
                if($res['message'] == 'no_user'){
                    $_SESSION['message']['error'] = 'Login is Incorrect';
                }else{
                    $_SESSION['message']['error'] = 'Password is Incorrect';
                }
            }else{
                $_SESSION['admin']['login'] = $res['login'];
                Router::redirect('/admins/messages');
            }
        }
    }
    
    public function messages() {
        $messages = Message::getAll();
        $this->data['messages'] = $messages;
    }
    
    public function message() {
        $id = App::getRouter()->getParams();
        $message = Message::getByID($id);
        var_dump($message);die;
        $this->data['messages'] = $messages;
    }
    
    public function logout() {
        session_destroy();
        outer::redirect('/');
    }
}
