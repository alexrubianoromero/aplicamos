<?php
$raiz = dirname(dirname(dirname(__file__)));
require_once($raiz.'/alertas/views/alertasView.php'); 
require_once($raiz.'/alertas/models/AlertaModel.php'); 
// die('control'.$raiz);
// require_once($raiz.'/diagnosticoEbAll/models/DiagnosticoEbAllModel.php'); 
// require_once($raiz.'/diagnosticoEbAll/models/TableroDiagnosticoEbAllModel.php'); 
// die($raiz); 

class alertasController 
{
    protected $view;
    protected $model; 
    // protected $model;
    // protected $tableroDiagnosticoModel;

    public function __construct()
    {
        $this->view = new alertasView();
        $this->model = new AlertaModel();

        if($_REQUEST['opcion']=='pantallaAlertas' )
        {
            $this->view->pantallaAlertas();
        }
        if($_REQUEST['opcion']=='mostrarAlertas' )
        {
            $this->view->mostrarAlertas();
        }
        if($_REQUEST['opcion']=='formuNuevaAlerta')
        {
            $this->view->formuNuevaAlerta();
        }
        if($_REQUEST['opcion']=='grabarNuevaAlerta')
        {
            $this->model->grabarNuevaAlerta($_REQUEST);
            echo 'Alerta Grabada';
        }
    }


    
    
}    