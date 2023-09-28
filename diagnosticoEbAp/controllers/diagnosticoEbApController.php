<?php
$raiz = dirname(dirname(dirname(__file__)));
require_once($raiz.'/diagnosticoEbAp/views/diagnosticoEbApView.php'); 
require_once($raiz.'/diagnosticoEbAp/models/DiagnosticoEbApModel.php'); 
// die($raiz); 

class diagnosticoEbApController 
{
    protected $view;
    protected $model;

    public function __construct()
    {
        $this->view = new diagnosticoEbApView();
        $this->model = new DiagnosticoEbApModel();
        // die('constructg');
        // echo 'desde controlador'; 
        // $this->view = new hardwareView();
        // $this->model = new HardwareModel();
        // $this->partesModel = new PartesModel();
        // $this->MovParteModel = new MovimientoParteModel();

        if($_REQUEST['opcion']=='pantallaDiagnosticoEbAp')
        {
            $this->pantallaDiagnosticoEbAp();
        }
        if($_REQUEST['opcion']=='formuNuevoDiagnostico')
        {
            $this->formuNuevoDiagnostico();
        }
        if($_REQUEST['opcion']=='mostrarDiagnosticos')
        {
            $this->mostrarDiagnosticos();
        }
        if($_REQUEST['opcion']=='grabarDiagnosticoEbAp')
        {
            $this->grabarDiagnosticoEbAp();
        }



    }
    
    public function pantallaDiagnosticoEbAp()
    {
        // $diagnosticos = $this->model->traerDiagnosticos();
        $this->view->pantallaDiagnosticoEbAp();
    }
    public function formuNuevoDiagnostico()
    {
        $this->view->formuNuevoDiagnostico();
        
    }
    public function mostrarDiagnosticos()
    {
        $this->view->mostrarDiagnosticos();

    }
    public function grabarDiagnosticoEbAp()
    {
        // $this->view->mostrarDiagnosticos();

    }

}
