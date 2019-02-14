<?php

class Admin extends Model {
    protected $db;

    protected $data;
    
//    private $errors;

    public function __construct(){
        $this->db = Model::instance();
    }

    public function find($id){        
        $this->data = $this->db->run("SELECT * FROM admins WHERE id = ?", [$id])->fetch();
    }
    
    // function to create admin
    /**
    private function createAdmin($login, $password){
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO admins (login, password) VALUES (?,?)";        
        $args = array($login, $hash);
        $res = $this->db->run($sql, $args);
        return $res;
    }
    */
    public function checkAdmin($login, $password){
        $exists =  $this->db->run("SELECT login, password FROM admins WHERE login = ?",array($login))->fetch(); 
        // check if exists admin with that login, if not exists return message
        if(!$exists){
//            $this->errors[] = 'No user with this login found';
        }        
        $hash = $exists->password;
        if(password_verify($password,$hash)){
            return true;
        }else{
//             $this->errors[] = 'password is incorrect';
        }       
        
    }
    
    
    
}
