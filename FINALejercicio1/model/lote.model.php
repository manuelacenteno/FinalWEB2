<?php

include_once 'helpers/db.helper.php';

class LoteModel{

    private $dbHelper;

    function __construct(){
        $this->dbHelper = new DBHelper();
        $this->db = $this->dbHelper->connect();
    }


    function insertarLote($nro_lote, $año_vencimiento, $id_ciudad, $id_laboratorio){

        $query=$this->db->prepare('INSERT INTO TABLA (nro_lote, año_vencimiento, id_ciudad, id_laboratorio) VALUES(?,?,?,?)');
        
        $query->execute([$nro_lote, $año_vencimiento, $id_ciudad, $id_laboratorio]);
    
    }
    
}
