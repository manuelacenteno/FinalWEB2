<?php

include_once 'lote.model.php';

class LoteController{

    private $model;

    private $view;

    function __construct(){

        $this->model =new LoteModel();

        $this->view =new LoteView();

        
    }

    function mostrarLote($id){

        /*pido la cantidad de lotes al modelo y lo imprimo en la vista*/

        $cant=$this->model->contarLotes($id);

        $cant_lote=$cant->cantidad;

        $this->view->mostrarCant($cant_lote);

        /*pido el detalle de cada lote*/
        $detalleLote=$this->model->detalleLote($id);

        $this->view->mostrarDetalle($detalleLote);

    }


}