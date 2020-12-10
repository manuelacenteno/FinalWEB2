<?php

class DBHelper {

    public function __construct() {
    }

    public function connect(){
        //1- Abro la conexion
        $db = new PDO('mysql:host=localhost;'.'dbname=db_ministerio;charset=utf8', 'root', '');
        return $db;
    }

}    