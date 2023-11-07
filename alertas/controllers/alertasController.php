<?php
$raiz = dirname(dirname(dirname(__file__)));
require_once($raiz.'/alertas/views/alertasView.php'); 
// die('control'.$raiz);
// require_once($raiz.'/diagnosticoEbAll/models/DiagnosticoEbAllModel.php'); 
// require_once($raiz.'/diagnosticoEbAll/models/TableroDiagnosticoEbAllModel.php'); 
// die($raiz); 

class alertasController 
{
    protected $view;
    // protected $model;
    // protected $tableroDiagnosticoModel;

    public function __construct()
    {
        $this->view = new alertasView();

        if($_REQUEST['opcion']=='pantallaAlertas')
        {
            $this->view->pantallaAlertas();
        }
    }


    
    
}    