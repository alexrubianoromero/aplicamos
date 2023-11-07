<?php
$raiz = dirname(dirname(dirname(__file__)));
// require_once($raiz.'/hardware/views/hardwareView.php'); 
require_once($raiz.'/alertas/models/AlertaModel.php'); 
// require_once($raiz.'/diagnosticoEbAll/models/ConceptoTableroEbAllModel.php'); 
require_once($raiz.'/clientes/models/ClienteModel.php'); 
// require_once($raiz.'/diagnosticoEbAll/models/TableroDiagnosticoEbAllModel.php'); 

class alertasView
{
    protected $model; 
    protected $ClienteModel; 
    // protected $conceptoTableroModel;
    // protected $tableroDiagnosticoModel;

    public function __construct()
    {
        $this->model = new AlertaModel();
        $this->ClienteModel = new ClienteModel();
        // $this->conceptoTableroModel = new ConceptoTableroEbAllModel();
        // $this->tableroDiagnosticoModel = new TableroDiagnosticoEbAllModel();
    }

    public function pantallaAlertas()
    {
        ?>
       <!DOCTYPE html>
       <html lang="en">
           <head>
               <meta charset="UTF-8">
               <meta name="viewport" content="width=device-width, initial-scale=1.0">
               <title>Document</title>
            </head>
            <body>
                <div class="row">
                    <div>
                        <button class="btn btn-primary" onclick="formuAlerta(); " >Nueva Alerta</button>
                    </div>
                    <div class="mt-3">
                        <?php  $this->mostrarAlertas();  ?>
                    </div>
                </div>
        </body>
        </html> 
        <?php
    }
    
    public function mostrarAlertas()
    {
        $alertas =  $this->model->traerAlertas();
        echo '<table class="table table-striped">'; 
        echo '<tr>'; 
        echo '<th>Fecha</th>';
        echo '<th>Cliente</th>';
        echo '<th>Descripcion</th>';
        echo '</tr>';
        foreach($alertas as $alerta)
        {
            $infoCliente = $this->ClienteModel->traerClienteId($alerta['idCliente']);  
            echo '<tr>';
            echo '<td>'.$alerta['fechaDeAlerta'].'</td>'; 
            echo '<td>'.$infoCliente['nombre'].'</td>'; 
            echo '<td>'.$alerta['descripcion'].'</td>'; 
            echo '</tr>';     
        }
        echo '</table>';

    }


}
