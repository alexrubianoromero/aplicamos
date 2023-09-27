<?php
$raiz = dirname(dirname(dirname(__file__)));
require_once($raiz.'/diagnosticoEbAll/views/diagnosticoEbAllView.php'); 
require_once($raiz.'/diagnosticoEbAll/models/DiagnosticoEbAllModel.php'); 
// die($raiz); 

class diagnosticoEbAllController 
{
    protected $view;
    protected $model;

    public function __construct()
    {
        $this->view = new diagnosticoEbAllView();
        $this->model = new DiagnosticoEbAllModel();
        if($_REQUEST['opcion']=='pantallaDiagEbAll')
        {
            $this->view->pantallaDiagnosticoEbAll();
        }
    }

}    