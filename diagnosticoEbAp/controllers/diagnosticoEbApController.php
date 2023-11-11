<?php
$raiz = dirname(dirname(dirname(__file__)));
require_once($raiz.'/diagnosticoEbAp/views/diagnosticoEbApView.php'); 
require_once($raiz.'/diagnosticoEbAp/models/DiagnosticoEbApModel.php'); 
require_once($raiz.'/diagnosticoEbAp/models/TableroDiagnosticoEbApModel.php'); 
require_once($raiz.'/clientes/vista/ClientesVista.php'); 
// die($raiz); 

class diagnosticoEbApController 
{
    protected $view;
    protected $clienteView;
    protected $model;
    protected $tableroDiagnosticoModel;

    public function __construct()
    {
        session_start();

        $this->view = new diagnosticoEbApView();
        $this->clienteView = new CLientesVista();
        $this->model = new DiagnosticoEbApModel();
        $this->tableroDiagnosticoModel = new TableroDiagnosticoEbApModel();
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
        if($_REQUEST['opcion']=='crearEncabezadoDiagnosticoEbAp')
        {
            $maximoId = $this->model->crearEncabezadoDiagnosticoEbAp($_REQUEST,$_SESSION['id_usuario']);
            $this->view->mostrarConceptosDiagnosticoEbAp($maximoId);
        }
        if($_REQUEST['opcion']=='formuAdicionarTableroEbAp')
        {
            // $maximoId = $this->model->crearEncabezadoDiagnosticoEbAp($_REQUEST,$_SESSION['id_usuario']);
            $this->view->mostrarConceptosDiagnosticoEbAp($_REQUEST['idDiagnostico']);
        }
        if($_REQUEST['opcion']=='verDiagnostico')
        {
            // $maximoId = $this->model->crearEncabezadoDiagnosticoEbAp($_REQUEST,$_SESSION['id_usuario']);
            $this->view->verDiagnostico($_REQUEST['idDiagnostico']);
        }
        
        if($_REQUEST['opcion']=='grabarDiagnosticoEbAp')
        {
            // echo '<pre>'; 
            // print_r($_REQUEST); 
            // echo'</pre>';
            // die(); 
            $this->grabarDiagnosticoEbAp($_REQUEST);
        }
        if($_REQUEST['opcion']=='filtrarDiagnosticosEbApPorFecha')
        {
            $this->filtrarDiagnosticosEbApPorFecha($_REQUEST);
        }
        if($_REQUEST['opcion']=='traerUltimoDiagnosticoCliente')
        {
            $this->traerUltimoDiagnosticoCliente($_REQUEST);
        }


    }
    
    public function traerUltimoDiagnosticoCliente($request)
    {
        $ultDiagnostico = $this->model->traerUltimoDiagnosticoCliente($request['idCliente']);
        $this->view ->mostrarUltimoDiagnosticoCliente($ultDiagnostico);
    }
    public function filtrarDiagnosticosEbApPorFecha($request)
    {
        $diagnosticos = $this->model->filtrarDiagnosticosEbApPorFecha($request);
        $this->clienteView->pintarDiagnosticosCliente($diagnosticos);
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
    public function grabarDiagnosticoEbAp($request)
    {
        // $this->view->mostrarDiagnosticos();

        // echo 'llego a grabar diagnostico ';
        $this->tableroDiagnosticoModel->grabarTableroDiagnostico($request); 
        $this->model->actualizarInfoEnDiagnostico($request);
        $this->view->mostrarDiagnosticos();
        // echo 'Registrado Exitosamente '; 

    }

}
