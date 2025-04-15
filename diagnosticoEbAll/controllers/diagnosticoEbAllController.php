<?php
$raiz = dirname(dirname(dirname(__file__)));
require_once($raiz.'/diagnosticoEbAll/views/diagnosticoEbAllView.php'); 
require_once($raiz.'/diagnosticoEbAll/models/DiagnosticoEbAllModel.php'); 
require_once($raiz.'/diagnosticoEbAll/models/TableroDiagnosticoEbAllModel.php'); 
require_once($raiz.'/diagnosticoEbAll/models/ImagenDiagnosticoEbAllModel.php'); 
require_once($raiz.'/movil/model/EmpresaModel.php');
require_once($raiz.'/correo/EnviarCorreoPhpMailer.class.php'); 
require_once($raiz.'/correo/model/CorreoModel.php'); 
require_once($raiz.'/vista/vista.php'); 
// die($raiz); 

class diagnosticoEbAllController  extends vista
{
    protected $view;
    protected $model;
    protected $tableroDiagnosticoModel;
    protected $imagenDiagnosticoModel;
    protected $enviarCorreo; 
    protected $CorreoModel; 
    protected $EmpresaModel; 

    public function __construct()
    {
        session_start();

        $this->view = new diagnosticoEbAllView();
        $this->model = new DiagnosticoEbAllModel();
        $this->tableroDiagnosticoModel = new TableroDiagnosticoEbAllModel();
        $this->imagenDiagnosticoModel = new ImagenDiagnosticoEbAllModel();
        $this->EmpresaModel = new EmpresaModel();
        $this->CorreoModel = new CorreoModel();
       

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
            // $maximoId = $this->model->crearEncabezadoDiagnosticoEbAp($_REQUEST,$_SESSION['id_usuario']);
            $maximoId = $this->model->crearEncabezadoDiagnosticoEbAp($_REQUEST,$_REQUEST['idUsuario']);
            // die('maximo'.$maximoId);
            $this->view->mostrarConceptosDiagnosticoEbAll($maximoId);
        }

        if($_REQUEST['opcion']=='formuAdicionarTableroEbAll')
        {
            // $maximoId = $this->model->crearEncabezadoDiagnosticoEbAp($_REQUEST,$_SESSION['id_usuario']);
            $this->view->mostrarConceptosDiagnosticoEbAll($_REQUEST['idDiagnostico']);
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

        if($_REQUEST['opcion']=='traerUltimoDiagnosticoClienteEbAll')
        {
            $this->traerUltimoDiagnosticoClienteEbAll($_REQUEST);
        }
        if($_REQUEST['opcion']=='enviarCorreoConDiagnosticoEbAll')
        {
            $this->enviarCorreoConDiagnosticoEbAll($_REQUEST);
        }

        if($_REQUEST['opcion']=='verimagenesDiagnosticoEbAll')
        {
            // echo 'llego aca controlador EbAll';
            $imagenes = $this->imagenDiagnosticoModel->traerImagenesDiagnosticoId($_REQUEST['idDiagnostico']);
            $this->view->verimagenesDiagnosticoEbAll($imagenes,$_REQUEST['idDiagnostico']);
            // $this->printR($imagenes); 
            //     echo '<pre>'; 
            // print_r($imagenes); 
            // echo'</pre>';
            // die('imagenes '); 
        }
        if($_REQUEST['opcion']=='formuAgregarImagenDiagnosticoEbAll')
        {
            $this->view->formuAgregarImagenDiagnosticoEbAll($_REQUEST['idDiagnostico']);
        }
        if($_REQUEST['opcion']=='realizarCargaArchivo')
        {
            $this->realizarCargaArchivo($_REQUEST);
        }

        if($_REQUEST['opcion']=='formuModificarObservaImagen')
        {
            $this->view->formuModificarObservaImagen($_REQUEST['idImagen']);
        }
        if($_REQUEST['opcion']=='modificarObservacionesImagen')
        {
            $this->modificarObservacionesImagen($_REQUEST);
        }




    }

    public function modificarObservacionesImagen($request)
    {
        $this->imagenDiagnosticoModel->modificarObservacionesImagenEbAll($request);
    }
    
    public function realizarCargaArchivo($request)
    {
        //traerinfoGanado
        $infodiagnostico = $this->model->traerDiagnosticoId($request['idDiagnostico']);
        $noSigImagen = $infodiagnostico['numeroImagenes']+1;
        //crear el nombre del archivo
        $nombreArchivo =  $request['idDiagnostico'].'-'.$noSigImagen.'-'.$_FILES['archivo']['name'];
        //actualizar el numero de imagenes en ganado

        $this->model->actualizarNumeroImagenesDiagEbAll($request['idDiagnostico'],$noSigImagen);

        //subir el archivo
        $this->subirArchivoDevolucion($nombreArchivo);
        //insertar en  la tabla de imagenes
        $maxId = $this->imagenDiagnosticoModel->grabaregistroImagenesDiagnosticoAll($request['idDiagnostico'],$nombreArchivo,'imagenes/imagenesDiagnosticoEbAll');
        // $this->dosisAplicadaModel->eliminarDosisAplicada($request['idSosisAplicada']);
        // echo 'Registro ELiminado';
        $this->imagenDiagnosticoModel->actualizarObservacionesImagen($maxId,$request['observaciones']);

    }

    public function subirArchivoDevolucion($nombre_archivo)
    {
        //  $this->printR($_FILES);
        //  $nombre_archivo = $_FILES['archivo']['name'];
            // if (move_uploaded_file($_FILES['archivo']['tmp_name'],  'archivos/'.$nombre_archivo)){
                // ../imagenes/imagenesDiagnosticoEbAp/imagen1.jpg
            if (move_uploaded_file($_FILES['archivo']['tmp_name'],  '../imagenes/imagenesDiagnosticoEbAll/'.$nombre_archivo)){
                echo "El archivo ha sido cargado correctamente.";
            }else{
                echo "Ocurrió algún error al subir el fichero. No pudo guardarse.";
            }
            // die('Archivo subido');

    }


    
    public function traerUltimoDiagnosticoClienteEbAll($request)
    {
        $ultDiagnostico = $this->model->traerUltimoDiagnosticoClienteEbAll($request['idCliente']);
        $this->view ->mostrarUltimoDiagnosticoClienteEbAll($ultDiagnostico);
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

    public function enviarCorreoConDiagnosticoEbAll($request)
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
        $body = $this->bodyCorreo($infoCliente['idcliente'],$request['idDiagnostico'],$infoCorreo['rutaPdfDiagAll']);
        // die('enviar correo controller12');
        //  die($body); 
        // die('correo cliente '.$infoCliente['email']);
        $this->enviarCorreo = new EnviarCorreoPhpMailer($infoCliente['email'],$body);
    }

}
