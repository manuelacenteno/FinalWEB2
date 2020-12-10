<?php

include_once 'lote.model.php';
include_once 'lote.view.php';
include_once 'ciudad.model.php';
include_once 'laboratorio.model.php';

class LoteController{


    private $model;
    private $view;
    private $authHelper;

    function __construct(){

        $this->model = new LoteModel();

        $this->view = new LoteView();

        $this->modelCiudad = new CiudadModel();

        $this->modelLaboratorio = new LaboratorioModel();

        $this->authHelper->chequearLogin();/*chequeo que este loggeado*/

        
    }

    function agregar($id){

        /*verifico que sea administrador*/
        //$admin=$this->authHelper->chequearAdmin();

        //if($admin=1){} //puse las llaves juntas para que no salte error

            $nro_lote=$_POST['nro_lote'];
            $año_vencimiento=$_POST['vencimiento'];
            $id_ciudad=$_POST['ciudad'];
            $id_laboratorio=$_POST['laboratorio'];

            /*verifico que no falten datos*/
            if(empty($nro_lote)||empty($año_vencimiento)||empty($id_ciudad)||empty($id_laboratorio)){

                $this->view->mostrarError('Faltan Datos');
                die();
            }

            /*verifico que exista la ciudad y el laboratorio*/
            $ciudad=$this->modelCiudad->obtenerCiudad($id);

            $laboratorio=$this->modelLaboratorio->obtenerLaboratorio($id);

            if(!empty($ciudad)&&!empty($laboratorio)){

                /*verifico que sean iguales las temperaturas*/
                $temp_conservacion=$this->modelCiudad->obtenerTempConservacion($id);
                $temp_requerida=$this->modelLaboratorio->obtenerTempRequerida($id);
                if($temp_conservacion==$temp_requerida){

                    $this->model->insertarLote($nro_lote, $año_vencimiento, $id_ciudad, $id_laboratorio);
            
                    header("location: " .BASE_URL);
                }
            }
            else{
                $this->view->mostrarError('No existe ciudad o laboratorio');
                die();

            }
            
            

        

    }














}