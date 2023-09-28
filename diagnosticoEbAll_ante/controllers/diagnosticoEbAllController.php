<?php
$raiz = dirname(dirname(dirname(__file__)));
require_once($raiz.'/diagnosticoEbAll/views/diagnosticoEbAllView.php'); 
require_once($raiz.'/diagnosticoEbAll/models/diagnosticoEbAllModel.php'); 
require_once($raiz.'/diagnosticoEbAll/models/TablerodiagnosticoEbAllModel.php'); 
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
        $this->model = new diagnosticoEbAllModel();
        $this->tableroDiagnosticoModel = new TablerodiagnosticoEbAllModel();
        // die('constructg');
        // echo 'desde controlador'; 
        // $this->view = new hardwareView();
        // $this->model = new HardwareModel();
        // $this->partesModel = new PartesModel();
        // $this->MovParteModel = new MovimientoParteModel();

        if($_REQUEST['opcion']=='pantalladiagnosticoEbAll')
        {
            die('llego aca controlador eball');
            $this->pantalladiagnosticoEbAll();
        }
        if($_REQUEST['opcion']=='formuNuevoDiagnostico')
        {
            $this->formuNuevoDiagnostico();
        }
        if($_REQUEST['opcion']=='mostrarDiagnosticos')
        {
            $this->mostrarDiagnosticos();
        }
        if($_REQUEST['opcion']=='crearEncabezadodiagnosticoEbAll')
        {
            $maximoId = $this->model->crearEncabezadodiagnosticoEbAll($_REQUEST,$_SESSION['id_usuario']);
            $this->view->mostrarConceptosdiagnosticoEbAll($maximoId);
        }
        if($_REQUEST['opcion']=='verDiagnostico')
        {
            // $maximoId = $this->model->crearEncabezadodiagnosticoEbAll($_REQUEST,$_SESSION['id_usuario']);
            $this->view->verDiagnostico($_REQUEST['idDiagnostico']);
        }
        
        if($_REQUEST['opcion']=='grabardiagnosticoEbAll')
        {
            // echo '<pre>'; 
            // print_r($_REQUEST); 
            // echo'</pre>';
            // die(); 
            $this->grabardiagnosticoEbAll($_REQUEST);
        }



    }
    
    public function pantalladiagnosticoEbAll()
    {
        // $diagnosticos = $this->model->traerDiagnosticos();
        $this->view->pantalladiagnosticoEbAll();
    }
    public function formuNuevoDiagnostico()
    {
        $this->view->formuNuevoDiagnostico();
        
    }
    public function mostrarDiagnosticos()
    {
        $this->view->mostrarDiagnosticos();

    }
    public function grabardiagnosticoEbAll($request)
    {
        // $this->view->mostrarDiagnosticos();

        // echo 'llego a grabar diagnostico ';
        $this->tableroDiagnosticoModel->grabarTableroDiagnostico($request); 
        $this->model->actualizarInfoEnDiagnostico($request);
        $this->view->mostrarDiagnosticos();
        // echo 'Registrado Exitosamente '; 

    }

}
