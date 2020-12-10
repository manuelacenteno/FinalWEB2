<?php
include_once 'helpers/db.helper.php';

class CiudadModel{

    private $dbHelper;

    function __construct(){
        $this->dbHelper = new DBHelper();
        $this->db = $this->dbHelper->connect();
    }



    function obtenerCiudades(){

        $query = $this->db->prepare('SELECT * FROM ciudad');
        $query->execute();

        $ciudades = $query->fetchAll(PDO::FETCH_OBJ);

        return  $ciudades;
     
    }

}