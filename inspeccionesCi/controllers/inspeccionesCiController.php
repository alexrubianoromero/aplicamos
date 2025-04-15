<?php
$raiz = dirname(dirname(dirname(__file__)));
require_once($raiz.'/inspeccionesCi/views/inspeccionesCiView.php'); 
require_once($raiz.'/inspeccionesCi/models/InspeccionCiModel.php'); 
require_once($raiz.'/inspeccionesCi/models/InfoBombaLiderModel.php'); 
require_once($raiz.'/inspeccionesCi/models/InfoBombaJockeyModel.php'); 
require_once($raiz.'/inspeccionesCi/models/ImagenDiagnosticoCiModel.php'); 
// require_once($raiz.'/diagnosticoEbAp/models/DiagnosticoEbApModel.php'); 
// require_once($raiz.'/diagnosticoEbAp/models/ImagenDiagnosticoEbApModel.php'); 
// require_once($raiz.'/diagnosticoEbAp/models/TableroDiagnosticoEbApModel.php'); 
// require_once($raiz.'/clientes/vista/ClientesVista.php'); 
require_once($raiz.'/movil/model/EmpresaModel.php');
require_once($raiz.'/correo/model/CorreoModel.php'); 
require_once($raiz.'/correo/EnviarCorreoPhpMailer.class.php'); 
require_once($raiz.'/vista/vista.php'); 
// die($raiz); 


class inspeccionesCiController extends vista
{
    protected $view;
    // protected $clienteView;
    protected $model;
    protected $infoLiderModel;
    protected $infoJockeyModel;
    protected $imagenModel; 
    protected $enviarCorreo; 
    protected $EmpresaModel; 
    protected $CorreoModel; 
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
        $this->infoLiderModel = new InfoBombaLiderModel();
        $this->infoJockeyModel = new InfoBombaJockeyModel();
        $this->imagenModel = new ImagenDiagnosticoCiModel();
        $this->EmpresaModel = new EmpresaModel();
        $this->CorreoModel = new CorreoModel();
      
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
     
        if($_REQUEST['opcion']=='crearEncabezadoInspeccionIncencio')
        {
            //esto esta en desarrollo
            // $maximoId = $this->model->crearEncabezadoInspeccionIncencio($_REQUEST,$_SESSION['id_usuario']);
            $maximoId = $this->model->crearEncabezadoInspeccionIncencio($_REQUEST,$_REQUEST['idUsuario']);
            // $this->printR($maximoId); 
            $this->view->mostrarConceptosFormatoInspeccion($maximoId);
        }


        // if($_REQUEST['opcion']=='grabarDiagnosticoInspeccion')
        // {
        //     //   echo '<pre>'; print_r($_REQUEST); echo '</pre>';
        //     // die();
        //     $this->infoLiderModel->grabarInfoBombaLider($_REQUEST);
        // }

        if($_REQUEST['opcion']=='grabarDiagnosticoInspeccionBombaLider')
        {
            $infoInspeccion =    $this->model->traerInspeccionId($_REQUEST['idDiagnostico']);
            // echo '<pre>'; print_r($infoInspeccion); echo '</pre>';
            // die();

            if($infoInspeccion['idInfoBombaLider'] == 0)
            {
                echo 'no tiene asociado informacion de bomba lider al diagnostico ';
                $idBombaLider =  $this->infoLiderModel->grabarInfoBombaLider($_REQUEST);
                //asignarle el id de bomvalider a la inspeccion ci 
                $this->model->asignarIdBombaLiderAInspeccion($_REQUEST['idDiagnostico'],$idBombaLider);
            }
        }



        if($_REQUEST['opcion']=='grabarDiagnosticoInspeccionBombaJockey')
        {
            $infoInspeccion =    $this->model->traerInspeccionId($_REQUEST['idDiagnostico']);
            // echo '<pre>'; print_r($infoInspeccion); echo '</pre>';die();

            if($infoInspeccion['idInfoBombaJockey'] == 0)
            {
                $infoInspeccion =    $this->model->traerInspeccionId($_REQUEST['idDiagnostico']);
                $idBombaJockey = $this->infoJockeyModel->grabarInfoBombaJockey($_REQUEST);
                $this->model->asignarIdBombaJockeyAInspeccion($_REQUEST['idDiagnostico'],$idBombaJockey);
            }

            $this->model->actualizarObservacionesDiagCi($_REQUEST['idDiagnostico'],$_REQUEST['observacionesICI']);

        }


       
        if($_REQUEST['opcion']=='traerUltimoFormatoInspeccionCliente')
        {
            $this->traerUltimoFormatoInspeccionCliente($_REQUEST);
        }

        if($_REQUEST['opcion']=='mostrarInspeccionesCi')
        {
           $this->view->mostrarInspeccionesCi();
        }

        if($_REQUEST['opcion']=='verimagenesDiagnosticoCi')
        {
            $imagenes = $this->imagenModel->traerImagenesDiagnosticoCi($_REQUEST['idDiagnostico']);
            // $this->printR($imagenes); 
            //     echo '<pre>'; 
            // print_r($imagenes); 
            // echo'</pre>';
            // die('imagenes '); 
            $this->view->verimagenesDiagnosticoCi($imagenes,$_REQUEST['idDiagnostico']);
        }
        if($_REQUEST['opcion']=='formuAgregarImagenDiagnosticoCi')
        {
            $this->view->formuAgregarImagenDiagnosticoCi($_REQUEST['idDiagnostico']);
        }
        if($_REQUEST['opcion']=='mostrarConceptosFormatoInspeccion')
        {
            $this->view->mostrarConceptosFormatoInspeccion($_REQUEST['idDiagnostico']);
        }

        if($_REQUEST['opcion']=='realizarCargaArchivoCi')
        {
            $this->realizarCargaArchivoCi($_REQUEST);
        }

        if($_REQUEST['opcion']=='enviarCorreoConDiagnosticoCi')
        {
            $this->enviarCorreoConDiagnosticoCi($_REQUEST);
        }

        if($_REQUEST['opcion']=='formuModificarObservaImagenCi')
        {
            $this->view->formuModificarObservaImagenCi($_REQUEST['idImagen']);
        }
        if($_REQUEST['opcion']=='modificarObservacionesImagenCi')
        {
            $this->modificarObservacionesImagenCi($_REQUEST);
        }

        
          
    } //este debe ser el fin de construct
    
    
    public function modificarObservacionesImagenCi($request)
    {
        $this->imagenModel->modificarObservacionesImagenCi($request);
    }
    

    
    public function realizarCargaArchivoCi($request)
    {
        //traerinfoGanado
        $infodiagnostico = $this->model->traerFormatoInspeccionId($request['idDiagnostico']);

        $noSigImagen = $infodiagnostico['numeroImagenes']+1;
        //crear el nombre del archivo
        $nombreArchivo =  $request['idDiagnostico'].'-'.$noSigImagen.'-'.$_FILES['archivo']['name'];
        //actualizar el numero de imagenes en ganado

        $this->model->actualizarNumeroImagenesDiagCi($request['idDiagnostico'],$noSigImagen);

        //subir el archivo
        $this->subirArchivoDevolucionCi($nombreArchivo);
        //insertar en  la tabla de imagenes
        $maxId = $this->imagenModel->grabaregistroImagenesDiagnosticoCi($request['idDiagnostico'],$nombreArchivo,'imagenes/imagenesDiagnosticoCi');
        // $this->dosisAplicadaModel->eliminarDosisAplicada($request['idSosisAplicada']);
        // echo 'Registro ELiminado';
        $this->imagenModel->actualizarObservacionesImagen($maxId,$request['observaciones']);

    }

    public function subirArchivoDevolucionCi($nombre_archivo)
    {
        //  $this->printR($_FILES);
        //  $nombre_archivo = $_FILES['archivo']['name'];
            // if (move_uploaded_file($_FILES['archivo']['tmp_name'],  'archivos/'.$nombre_archivo)){
                // ../imagenes/imagenesDiagnosticoEbAp/imagen1.jpg
            if (move_uploaded_file($_FILES['archivo']['tmp_name'],  '../imagenes/imagenesDiagnosticoCi/'.$nombre_archivo)){
                echo "El archivo ha sido cargado correctamente.";
            }else{
                echo "Ocurrió algún error al subir el fichero. No pudo guardarse.";
            }
            // die('Archivo subido');

    }

    public function traerUltimoFormatoInspeccionCliente($request)
    {
            $ultDiagnostico = $this->model->traerUltimoFormatoInspeccionCliente($request['idCliente']);
            $this->view ->mostrarUltimoFormatoInspeccionCliente($ultDiagnostico);
    }
   

    public function enviarCorreoConDiagnosticoCi($request)
    {
        $infoCorreo = $this->CorreoModel->traerInfoConfigCorreo();
        //    echo '<pre>'; 
        //     print_r($infoCorreo); 
        //     echo'</pre>';
        //     die(); 
        // die('llego a controlador de enviar correo ');
        $infoEmpresa = $this->EmpresaModel->traerInfoEmpresa(); 
        //definir la funcionalidad para enviar correo 
        $email = $infoEmpresa['correoEnviarInfo'];
        // die ('email cliente '.$email);
        $infoCliente = $this->model->traerInfoClienteIdDiagnosticoCi($request['idDiagnostico']); 
        // die($infoCorreo['rutaPdfDiagCi']);
        // $this->printR($infoCliente['idcliente']); 
        $body = $this->bodyCorreo($infoCliente['idcliente'],$request['idDiagnostico'],$infoCorreo['rutaPdfDiagCi']);
        // die('enviar correo controller12');
        //  die($body); 
        // die('correo cliente '.$infoCliente['email']);
        $this->enviarCorreo = new EnviarCorreoPhpMailer($infoCliente['email'],$body);
    }

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
