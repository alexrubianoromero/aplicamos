div<?php
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
                <div class="container row" style="padding:5px;">
                    <div>
                        <button 
                            class="btn btn-primary" 
                            onclick="formuNuevaAlerta();"
                             data-toggle="modal"   
                            data-target="#modalAlertas"
                            >Nueva Alerta</button>
                    </div>
                    <div id="div_resultados_alertas">
                        <?php  $this->mostrarAlertas();  ?>
                    </div>
                </div>
                <?php  $this->modalAlertas();  ?>
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

    public function modalAlertas (){
        ?>
         <!-- <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal2">
         Launch demo modal
         </button> -->
          <div style="padding:5px;" class="modal fade " id="modalAlertas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                  <div class="modal-header" id="headerNuevoCliente">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="myModalLabel">Alertas </h4>
                  </div>
                  <div id="cuerpoModalAlertas" class="modal-body">
                  </div>
                  <div class="modal-footer" id="footerNuevoCliente">
                      <button type="button" class="btn btn-default" data-dismiss="modal" onclick = "mostrarAlertas();">Cerrar</button>
                      <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                  </div>
                  </div>
              </div>
          </div>
        <?php
    } 

    public function formuNuevaAlerta()
    {
        $clientes = $this->ClienteModel->traerClientes();
        ?>
        <div class ="row">
            <div class="form-group">
                <label>Fecha:</label>
                <input class ="form-control" type="date" id="fechaAlerta">
            </div>
            <div class="form-group">
                <label>Cliente:</label>
                 <select class="form-control" id="idCliente">
                     <option value="">Seleccione...</option>
                     <?php
                     foreach($clientes as $cliente)
                     {
                         echo '<option value="'.$cliente['idcliente'].'">'.$cliente['nombre'].'</option>';
                         
                     }
                    ?>
                 </select>
            </div>
            <div class="form-group">
                <label>Descripcion:</label>
                <textarea class ="form-control" id="descripcionAlerta"></textarea>
            </div>
            <div class="form-group">
                <button class="btn btn-primary" onclick="grabarNuevaAlerta()">Grabar Alerta</button>
            </div>         
        </div>
        <?php

    }


}
