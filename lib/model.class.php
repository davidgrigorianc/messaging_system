<?php

abstract class Model
{
    /**
     * Get the PDO database connection
     *
     * @return mixed
     */
    protected static function getDB()
    {
        static $db = null;
        if ($db === null) {
             $dsn = 'mysql:host='.Config::get('db_host').';dbname='.Config::get('db_name').';charset='.Config::get('db_char');
            $db = new PDO($dsn, Config::get('db_user'), Config::get('db_pass'));
            // Throw an Exception when an error occurs
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            
        }
        return $db;
    }
}