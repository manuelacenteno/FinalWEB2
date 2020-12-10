<?php

class CiudadController{

    private $model;
    private $view;
    private $modelLote;

    function __construct(){

        $this->model = new CidadModel();

        $this->view = new CiudadView();

        $this->modelLote = new LoteModel();

        
    }

    function mostrarCiudades($id){

        /*pido los lotes de cada ciudad para verificar que si hay lotes imprima la ciudad*/
        $lotes=$this->modelLote->obtenerLotes($id);

        if(!empty($lotes)){

            $ciudades=$this->model-> obtenerCiudades();

            $this->view-> mostrarCiudades($ciudades);

        }
        

    }













}