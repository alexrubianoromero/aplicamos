<?php
$raiz = dirname(dirname(dirname(__file__)));
require_once($raiz.'/diagnosticoEbAp/views/diagnosticoEbApView.php'); 
require_once($raiz.'/diagnosticoEbAp/models/DiagnosticoEbApModel.php'); 
require_once($raiz.'/diagnosticoEbAp/models/ImagenDiagnosticoEbApModel.php'); 
require_once($raiz.'/diagnosticoEbAp/models/TableroDiagnosticoEbApModel.php'); 
require_once($raiz.'/movil/model/EmpresaModel.php');
require_once($raiz.'/clientes/vista/ClientesVista.php'); 
require_once($raiz.'/correo/EnviarCorreoPhpMailer.class.php'); 
// require_once($raiz.'/vista/vista.php'); 
// require_once($raiz.'/correo/model/CorreoModel.php'); 

class controllerPrueba
{
    public function __construct()
    {
        echo 'buenas desde prueba controlador ';
    }

    public function pruebaFuncion()
    {
        echo 'buenas ';
    }
}


?>