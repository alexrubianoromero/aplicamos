<?php
$raiz = dirname(dirname(dirname(__file__)));
require_once($raiz.'/tecnicos/vista/TecnicosVista.php');
require_once($raiz.'/tecnicos/modelo/TecnicosModelo.php');

class  TecnicosControllerMovil 
{
    private $vista;
    private $model; 
    public function __construct()
    {
        // echo 'llego a controlador de tecnicos '; 
        $this->vista = new TecnicosVista(); 
        $this->model = new TecnicosModelo();

        if($_REQUEST['opcion']=='pantallaPrincipalTecnicos'){
            $this->pantallaPrincipalTecnicos(); 
        }
        if($_REQUEST['opcion']=='editarTecnico'){
            $this->editarTecnico($_REQUEST); 
        }

    }

    public function pantallaPrincipalTecnicos()
    {
        // die('llegoa la funcion del controlador '); 
        $tecnicos =  $this->model->traerTecnicosNew();
        $this->vista->pantallaprincipalTecnicos($tecnicos);  
    }

    public function editarTecnico($request)
    {
        $tecnico = $this->model->traerTecnicoPorId($request['idcliente']);
        $this->vista->pantallaDatosTecnico($tecnico);

    }
}


?>