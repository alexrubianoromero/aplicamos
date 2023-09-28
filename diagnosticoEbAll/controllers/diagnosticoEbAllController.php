<?php
$raiz = dirname(dirname(dirname(__file__)));
require_once($raiz.'/diagnosticoEbAll/views/diagnosticoEbAllView.php'); 
require_once($raiz.'/diagnosticoEbAll/models/DiagnosticoEbAllModel.php'); 
require_once($raiz.'/diagnosticoEbAll/models/TableroDiagnosticoEbAllModel.php'); 
// die($raiz); 

class diagnosticoEbAllController 
{
    protected $view;
    protected $model;
    protected $tableroDiagnosticoModel;

    public function __construct()
    {
        session_start();

        $this->view = new diagnosticoEbAllView();
        $this->model = new DiagnosticoEbAllModel();
        $this->tableroDiagnosticoModel = new TableroDiagnosticoEbAllModel();
       

        if($_REQUEST['opcion']=='pantallaDiagnosticoEbAll')
        {
            // die('llego a controlador ');
            $this->pantallaDiagnosticoEbAll();
        }
        if($_REQUEST['opcion']=='formuNuevoDiagnostico')
        {
            $this->formuNuevoDiagnostico();
        }
        if($_REQUEST['opcion']=='mostrarDiagnosticos')
        {
            $this->mostrarDiagnosticos();
        }
        if($_REQUEST['opcion']=='crearEncabezadoDiagnosticoEbAll')
        {
            $maximoId = $this->model->crearEncabezadoDiagnosticoEbAp($_REQUEST,$_SESSION['id_usuario']);
            // die('maximo'.$maximoId);
            $this->view->mostrarConceptosDiagnosticoEbAll($maximoId);
        }
        if($_REQUEST['opcion']=='verDiagnostico')
        {
            // $maximoId = $this->model->crearEncabezadoDiagnosticoEbAp($_REQUEST,$_SESSION['id_usuario']);
            $this->view->verDiagnostico($_REQUEST['idDiagnostico']);
        }
        
        if($_REQUEST['opcion']=='grabarDiagnosticoEbAll')
        {
            // echo '<pre>'; 
            // print_r($_REQUEST); 
            // echo'</pre>';
            // die(); 
            $this->grabarDiagnosticoEbAll($_REQUEST);
        }



    }
    
    public function pantallaDiagnosticoEbAll()
    {
        // $diagnosticos = $this->model->traerDiagnosticos();
        $this->view->pantallaDiagnosticoEbAll();
    }
    public function formuNuevoDiagnostico()
    {
        $this->view->formuNuevoDiagnostico();
        
    }
    public function mostrarDiagnosticos()
    {
        $this->view->mostrarDiagnosticos();
    }
    public function grabarDiagnosticoEbAll($request)
    {
        // die('llego a grabar '); 
        $this->tableroDiagnosticoModel->grabarTableroDiagnostico($request); 
        $this->model->actualizarInfoEnDiagnostico($request);
        $this->view->mostrarDiagnosticos();
    }

}
