<?php

include_once 'helpers/db.helper.php';

class LoteModel{

    private $dbHelper;

    function __construct(){
        $this->dbHelper = new DBHelper();
        $this->db = $this->dbHelper->connect();
    }

    function contarLotes($id_ciudad){

        $query = $this->db->prepare('SELECT COUNT(*) AS cantidad FROM lote WHERE id_ciudad = ?');
        $query->execute([$id_ciudad]);

 
        $lotes = $query->fetchAll(PDO::FETCH_OBJ);

      
        return  $lotes;
     
    }


    function obtenerLotes($id_ciudad){

        $query = $this->db->prepare('SELECT  * FROM lote WHERE id_ciudad = ?');
        $query->execute([$id_ciudad]);

 
        $lotes = $query->fetchAll(PDO::FETCH_OBJ);

      
        return  $lotes;
     
    }

    function detalleLote($id){

        $query=$this->db->prepare('SELECT * FROM lote WHERE id = ?');
        $query->execute([$id]);
    
        $lote=$query->fetch(PDO::FETCH_OBJ);
    
        return $lote;
    


    }

}