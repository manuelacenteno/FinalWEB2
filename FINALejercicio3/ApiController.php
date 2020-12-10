<?php
require_once 'ApiModel.php';
require_once 'ApiView.php';

class ApiController{

    private $model;

    private $view;

    function __construct(){

        $this->model = new ApiModel();

        $this->view = new ApiView();

        $this->data= file_get_contents('php://input');
        
    }

    function obtenerData(){

        return json_decode($this->data);

    }

    function obtenerCentros(){

        $centros=$this->model->getAll();
       
        $this->view->response($centros,200);

    }

    function obtenerCentro($params=null){
        
        $id=$params[':ID'];
        

        $centro = $this->model->obtenerCentrosPorCiudad($id);
     
        
        if ($centro){
            $this->view->response($centro, 200);
        }else{
            $this->view->response("Error", 404);
        }
    }

}