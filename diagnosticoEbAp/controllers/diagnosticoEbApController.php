<?php
$raiz = dirname(dirname(dirname(__file__)));
require_once($raiz.'/diagnosticoEbAp/views/diagnosticoEbApView.php'); 
require_once($raiz.'/diagnosticoEbAp/models/DiagnosticoEbApModel.php'); 
require_once($raiz.'/diagnosticoEbAp/models/ImagenDiagnosticoEbApModel.php'); 
require_once($raiz.'/diagnosticoEbAp/models/TableroDiagnosticoEbApModel.php'); 
require_once($raiz.'/movil/model/EmpresaModel.php');
require_once($raiz.'/clientes/vista/ClientesVista.php'); 
require_once($raiz.'/correo/EnviarCorreoPhpMailer.class.php'); 
require_once($raiz.'/vista/vista.php'); 
require_once($raiz.'/correo/model/CorreoModel.php'); 
// die($raiz); 

class diagnosticoEbApController extends vista
{
    protected $view;
    protected $clienteView;
    protected $model;
    protected $tableroDiagnosticoModel;
    protected $imagenDiagnosticoModel;
    protected $enviarCorreo; 
    protected $EmpresaModel; 
    protected $CorreoModel; 


    public function __construct()
    {
        session_start();

        $this->view = new diagnosticoEbApView();
        $this->clienteView = new CLientesVista();
        $this->model = new DiagnosticoEbApModel();
        $this->tableroDiagnosticoModel = new TableroDiagnosticoEbApModel();
        $this->imagenDiagnosticoModel = new ImagenDiagnosticoEbApModel();
        $this->EmpresaModel = new EmpresaModel();
        $this->CorreoModel = new CorreoModel();
      
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
        if($_REQUEST['opcion']=='verimagenesDiagnosticoEbAp')
        {
            $imagenes = $this->imagenDiagnosticoModel->traerImagenesDiagnosticoId($_REQUEST['idDiagnostico']);
            // $this->printR($imagenes); 
            //     echo '<pre>'; 
            // print_r($imagenes); 
            // echo'</pre>';
            // die('imagenes '); 
            $this->view->verimagenesDiagnosticoEbAp($imagenes,$_REQUEST['idDiagnostico']);
        }
        
        if($_REQUEST['opcion']=='formuAgregarImagenDiagnostico')
        {
            $this->view->formuAgregarImagenDiagnostico($_REQUEST['idDiagnostico']);
        }
        if($_REQUEST['opcion']=='traerInfoCompletaUltimoDiagnostico')
        {
            $this->traerInfoCompletaUltimoDiagnostico($_REQUEST);
        }
        if($_REQUEST['opcion']=='enviarCorreoConDiagnostico')
        {
            $this->enviarCorreoConDiagnostico($_REQUEST);
        }
        if($_REQUEST['opcion']=='realizarCargaArchivo')
        {
            $this->realizarCargaArchivo($_REQUEST);
        }
        
    }
    
    public function realizarCargaArchivo($request)
    {
        //traerinfoGanado
        $infodiagnostico = $this->model->traerDiagnosticoId($request['idDiagnostico']);
        $noSigImagen = $infodiagnostico['numeroImagenes']+1;
        //crear el nombre del archivo
        $nombreArchivo =  $request['idDiagnostico'].'-'.$noSigImagen.'-'.$_FILES['archivo']['name'];
        //actualizar el numero de imagenes en ganado

        $this->model->actualizarNumeroImagenesDiagEbAp($request['idDiagnostico'],$noSigImagen);

        //subir el archivo
        $this->subirArchivoDevolucion($nombreArchivo);
        //insertar en  la tabla de imagenes
        $maxId = $this->imagenDiagnosticoModel->grabaregistroImagenesDiagnostico($request['idDiagnostico'],$nombreArchivo,'imagenes/imagenesDiagnosticoEbAp');
        // $this->dosisAplicadaModel->eliminarDosisAplicada($request['idSosisAplicada']);
        // echo 'Registro ELiminado';
        //actualizar las observaciones de la imagen
        $this->imagenDiagnosticoModel->actualizarObservacionesImagen($maxId,$request['observaciones']);
        

    }

    public function subirArchivoDevolucion($nombre_archivo)
    {
        //  $this->printR($_FILES);
        //  $nombre_archivo = $_FILES['archivo']['name'];
            // if (move_uploaded_file($_FILES['archivo']['tmp_name'],  'archivos/'.$nombre_archivo)){
                // ../imagenes/imagenesDiagnosticoEbAp/imagen1.jpg
            if (move_uploaded_file($_FILES['archivo']['tmp_name'],  '../imagenes/imagenesDiagnosticoEbAp/'.$nombre_archivo)){
                echo "El archivo ha sido cargado correctamente.";
            }else{
                echo "Ocurrió algún error al subir el fichero. No pudo guardarse.";
            }
            // die('Archivo subido');

    }


    public function enviarCorreoConDiagnostico($request)
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
        $infoCliente = $this->model->traerInfoClienteIdDiagnostico($request['idDiagnostico']); 
        // $this->printR($infoCliente['idcliente']); 
        $body = $this->bodyCorreo($infoCliente['idcliente'],$request['idDiagnostico'],$infoCorreo['rutaPdfDiagAp']);
        // die('enviar correo controller12');
        //  die($body); 
        // die('correo cliente '.$infoCliente['email']);
        $this->enviarCorreo = new EnviarCorreoPhpMailer($infoCliente['email'],$body);
    }
    //esa funcion es para mostrar toda la informacion del ultimo diagnostico del cliente 
    public function traerInfoCompletaUltimoDiagnostico($request)
    {
        // $infoDiagnostico = $this->model->traerDiagnosticoId($request['idDiagnostico']);
        //podria ser ver diagnostico 
        $this->view->verDiagnostico($request['idDiagnostico']);
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
