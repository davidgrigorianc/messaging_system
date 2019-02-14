<?php

class Message extends Model{
    /**
     * Get all the users as an associative array
     *
     * @return array
     */
    public static function getAll()
    {
        $db = static::getDB();
        $stmt = $db->query('SELECT * FROM messages');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}