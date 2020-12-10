<?php

include_once 'helpers/db.helper.php';

class LaboratorioModel{

    private $dbHelper;

    function __construct(){
        $this->dbHelper = new DBHelper();
        $this->db = $this->dbHelper->connect();
    }


    function obtenerLaboratorio($id){ 

         $query = $this->db->prepare('SELECT * FROM laboratorio WHERE id = ?');
         $query->execute([$id]);
 
  
         $laboratorio = $query->fetch(PDO::FETCH_OBJ);
 
       
         return  $laboratorio;
      
     }
     
     function obtenerTempRequerida($id){


        $query = $this->db->prepare('SELECT temperatura_requerida FROM laboratorio WHERE id = ?');

        $query->execute([$id]);
 
  
        $temperatura = $query->fetch(PDO::FETCH_OBJ);

      
        return  $temperatura;

     }


    
}