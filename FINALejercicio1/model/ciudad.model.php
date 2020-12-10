<?php

include_once 'helpers/db.helper.php';

class CiudadModel{

    private $dbHelper;

    function __construct(){
        $this->dbHelper = new DBHelper();
        $this->db = $this->dbHelper->connect();
    }

    function obtenerCiudad($id){ 

        $query = $this->db->prepare('SELECT * FROM ciudad WHERE id = ?');
        $query->execute([$id]);

 
        $ciudad = $query->fetch(PDO::FETCH_OBJ);

      
        return  $ciudad;
     
    }

    function obtenerTempConservacion($id){


        $query = $this->db->prepare('SELECT temperatura_conservacion FROM ciudad WHERE id = ?');

        $query->execute([$id]);
 
  
        $temperatura = $query->fetch(PDO::FETCH_OBJ);

      
        return  $temperatura;

     }

    
    
}