<?php
$raiz = dirname(dirname(dirname(__file__)));
// require_once($raiz.'/hardware/views/hardwareView.php'); 
require_once($raiz.'/diagnosticoEbAll/models/DiagnosticoEbAllModel.php'); 
// require_once($raiz.'/diagnosticoEbAll/models/TableroEbAllModel.php'); 
require_once($raiz.'/clientes/models/ClienteModel.php'); 

class diagnosticoEbAllView
{
    protected $model; 
    protected $ClienteModel; 
    // protected $TableroModel;

    public function __construct()
    {
        $this->model = new DiagnosticoEbAllModel();
        $this->ClienteModel = new ClienteModel();
        // $this->TableroModel = new TableroEbAllModel();

    }

    
    public function pantallaDiagnosticoEbAll()
    {
        ?>
        <div id="divPantallaDiagEbAp" style="padding:5px;">
            <div id="botonesDiagEbAp">
                <div class="row">
                    <div class="col-lg-3 ofset-3">
                        <button class="btn btn-primary" onclick="formuNuevoDiagnosticoAll();">Nuevo Diagnostico </button>  
                    </div>
                    <div class="col-lg-3 ofset-3">
                        <button class="btn btn-primary" onclick="mostrarDiagnosticosAll();">Mostrar Diagnosticos </button>  
                    </div>

                </div>
            </div>
            <div id="divResultadosDiagEbAp">
                <?php
                    // $this->mostrarDiagnosticos();
                ?>
            </div>        

        </div>
        <?php
    }


}