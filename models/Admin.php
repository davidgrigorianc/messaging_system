<?php

class Admin extends Model {
    protected $db;

    protected $data;
    
//    private $errors;

    public function __construct(){
        $this->db = Model::instance();
    }

    public function getByID($id){
        $db = static::getDB();
        $stmt = $db->prepare("SELECT login, password FROM admins WHERE id = ?");
        $res = $stmt->execute([$id]);    
        return $stmt->fetch();
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
    public function checkAdmin($data){
        
//        $exists =  $this->db->run("SELECT login, password FROM admins WHERE login = ?",array($data['login']))->fetch(); 
        $db = static::getDB();
        $stmt = $db->prepare("SELECT login, password FROM admins WHERE login = ?");
        $res = $stmt->execute([$data['login']]);
       
        $exists = $stmt->fetch();
        // check if exists admin with that login, if not exists return message
        if(!$exists){
            $data['success'] = false;
            $data['message'] = 'no_user';
        }else{
            $hash = $exists->password;
            if(password_verify($data['password'],$hash)){
                $data['success'] = true;
                $data['login'] = $exists->login;                
            }else{
                $data['success'] = false;
                $data['message'] = 'password_incorrect';
            }     
        }        
        
        return $data;
        
    }
    
    
    
}
