<?php

class Message extends Model{
    /**
     * Get all the users as an associative array
     *
     * @return array
     */
    public static function getAll(){
        $db = static::getDB();
        $stmt = $db->prepare('SELECT id, firstname, lastname, email, created, LEFT(message, 600) AS message  FROM messages');
        $res = $stmt->execute();
        return  $stmt->fetchAll();
    }
    
    public static function createNew($args) {
        $db = static::getDB();
        $args['created'] = date('Y-m-d H:i:s');
        $stmt = $db->prepare('INSERT INTO messages (firstname, lastname, email, message, created) VALUES (:firstname, :lastname, :email, :message, :created)');
        $res = $stmt->execute($args);
        return $res;
    }
    
    public function getByID($id){
        $db = static::getDB();
        $stmt = $db->prepare("SELECT * FROM messages WHERE id = ? LIMIT 1");
        $res = $stmt->execute($id);    
        return $stmt->fetch();
    }
}