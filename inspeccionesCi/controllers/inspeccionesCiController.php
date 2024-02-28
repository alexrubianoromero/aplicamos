<?php
$raiz = dirname(dirname(dirname(__file__)));
require_once($raiz.'/inspeccionesCi/views/inspeccionesCiView.php'); 
require_once($raiz.'/inspeccionesCi/models/InspeccionCiModel.php'); 
// require_once($raiz.'/diagnosticoEbAp/models/DiagnosticoEbApModel.php'); 
// require_once($raiz.'/diagnosticoEbAp/models/ImagenDiagnosticoEbApModel.php'); 
// require_once($raiz.'/diagnosticoEbAp/models/TableroDiagnosticoEbApModel.php'); 
// require_once($raiz.'/clientes/vista/ClientesVista.php'); 
// require_once($raiz.'/correo/EnviarCorreoPhpMailer.class.php'); 
require_once($raiz.'/vista/vista.php'); 
// die($raiz); 


class inspeccionesCiController extends vista
{
    protected $view;
    // protected $clienteView;
    protected $model;
    // protected $tableroDiagnosticoModel;
    // protected $imagenDiagnosticoModel;
    // protected $enviarCorreo; 

    public function __construct()
    {
        session_start();
        if(!isset($_SESSION['id_usuario']))
        {
            echo 'la sesion ha caducado';
            echo '<button class="btn btn-primary" onclick="irPantallaLogueo();">Continuar</button>';
            die();
        }

        $this->view = new inspeccionesCiView();
        // $this->clienteView = new CLientesVista();
        $this->model = new InspeccionCiModel();
        // $this->tableroDiagnosticoModel = new TableroDiagnosticoEbApModel();
        // $this->imagenDiagnosticoModel = new ImagenDiagnosticoEbApModel();
      
        // die('constructg');
        // echo 'desde controlador'; 
        // $this->view = new hardwareView();
        // $this->model = new HardwareModel();
        // $this->partesModel = new PartesModel();
        // $this->MovParteModel = new MovimientoParteModel();

        if($_REQUEST['opcion']=='pantallaInspeccionCI')
        {
            $this->view->pantallaInspeccionCI();
        }

        if($_REQUEST['opcion']=='formuNuevaInspeccionCi')
        {
           $this->view->formuNuevaInspeccionCi();
        }
        // if($_REQUEST['opcion']=='mostrarDiagnosticos')
        // {
        //     $this->mostrarDiagnosticos();
        // }
        if($_REQUEST['opcion']=='crearEncabezadoInspeccionIncencio')
        {
            //esto esta en desarrollo
            $maximoId = $this->model->crearEncabezadoInspeccionIncencio($_REQUEST,$_SESSION['id_usuario']);
            // $this->printR($maximoId); 
            $this->view->mostrarConceptosFormatoInspeccion($maximoId);
        }
        // if($_REQUEST['opcion']=='formuAdicionarTableroEbAp')
        // {
        //     // $maximoId = $this->model->crearEncabezadoDiagnosticoEbAp($_REQUEST,$_SESSION['id_usuario']);
        //     $this->view->mostrarConceptosDiagnosticoEbAp($_REQUEST['idDiagnostico']);
        // }
        // if($_REQUEST['opcion']=='verDiagnostico')
        // {
        //     // $maximoId = $this->model->crearEncabezadoDiagnosticoEbAp($_REQUEST,$_SESSION['id_usuario']);
        //     $this->view->verDiagnostico($_REQUEST['idDiagnostico']);
        // }
        
        // if($_REQUEST['opcion']=='grabarDiagnosticoEbAp')
        // {
            //     // echo '<pre>'; 
            //     // print_r($_REQUEST); 
            //     // echo'</pre>';
            //     // die(); 
            //     $this->grabarDiagnosticoEbAp($_REQUEST);
            // }
            // if($_REQUEST['opcion']=='filtrarDiagnosticosEbApPorFecha')
            // {
                //     $this->filtrarDiagnosticosEbApPorFecha($_REQUEST);
                // }
                if($_REQUEST['opcion']=='traerUltimoFormatoInspeccionCliente')
                {
                    $this->traerUltimoFormatoInspeccionCliente($_REQUEST);
                }
                // if($_REQUEST['opcion']=='verimagenesDiagnosticoEbAp')
                // {
                    //     $imagenes = $this->imagenDiagnosticoModel->traerImagenesDiagnosticoId($_REQUEST['idDiagnostico']);
                    //     //     echo '<pre>'; 
                    //     // print_r($imagenes); 
                    //     // echo'</pre>';
                    //     // die('imagenes '); 
                    //     $this->view->verimagenesDiagnosticoEbAp($imagenes,$_REQUEST['idDiagnostico']);
                    // }
                    
                    // if($_REQUEST['opcion']=='formuAgregarImagenDiagnostico')
                    // {
                        //     $this->view->formuAgregarImagenDiagnostico($_REQUEST['idDiagnostico']);
                        // }
                        // if($_REQUEST['opcion']=='traerInfoCompletaUltimoDiagnostico')
                        // {
                            //     $this->traerInfoCompletaUltimoDiagnostico($_REQUEST);
        // }
        // if($_REQUEST['opcion']=='enviarCorreoConDiagnostico')
        // {
            //     $this->enviarCorreoConDiagnostico($_REQUEST);
            // }
            
        }
        
        public function traerUltimoFormatoInspeccionCliente($request)
        {
            $ultDiagnostico = $this->model->traerUltimoFormatoInspeccionCliente($request['idCliente']);
            $this->view ->mostrarUltimoFormatoInspeccionCliente($ultDiagnostico);
        }
        // public function enviarCorreoConDiagnostico($request)
        // {
            //     //definir la funcionalidad para enviar correo 
    //     $email = 'alexrubianoromero@gmail.com';
    //     $infoCliente = $this->model->traerInfoClienteIdDiagnostico($request['idDiagnostico']); 
    //     // $this->printR($infoCliente['idcliente']); 
    //     $body = $this->bodyCorreo($infoCliente['idcliente'],$request['idDiagnostico']);
    //     // die($body); 
    //     $this->enviarCorreo = new EnviarCorreoPhpMailer($infoCliente['email'],$body);
    // }
    // //esa funcion es para mostrar toda la informacion del ultimo diagnostico del cliente 
    // public function traerInfoCompletaUltimoDiagnostico($request)
    // {
    //     // $infoDiagnostico = $this->model->traerDiagnosticoId($request['idDiagnostico']);
    //     //podria ser ver diagnostico 
    //     $this->view->verDiagnostico($request['idDiagnostico']);
    // }

    // public function filtrarDiagnosticosEbApPorFecha($request)
    // {
    //     $diagnosticos = $this->model->filtrarDiagnosticosEbApPorFecha($request);
    //     $this->clienteView->pintarDiagnosticosCliente($diagnosticos);
    // }

    // public function formuNuevoDiagnostico()
    // {
    //     $this->view->formuNuevoDiagnostico();
        
    // }
    // public function mostrarDiagnosticos()
    // {
    //     $this->view->mostrarDiagnosticos();

    // }
    // public function grabarDiagnosticoEbAp($request)
    // {
    //     // $this->view->mostrarDiagnosticos();

    //     // echo 'llego a grabar diagnostico ';
    //     $this->tableroDiagnosticoModel->grabarTableroDiagnostico($request); 
    //     $this->model->actualizarInfoEnDiagnostico($request);
    //     $this->view->mostrarDiagnosticos();
    //     // echo 'Registrado Exitosamente '; 

    // }

}
