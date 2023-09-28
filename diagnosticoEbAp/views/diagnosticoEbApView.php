<?php
$raiz = dirname(dirname(dirname(__file__)));
// require_once($raiz.'/hardware/views/hardwareView.php'); 
require_once($raiz.'/diagnosticoEbAp/models/DiagnosticoEbApModel.php'); 
require_once($raiz.'/diagnosticoEbAp/models/ConceptoTableroEbApModel.php'); 
require_once($raiz.'/clientes/models/ClienteModel.php'); 

class diagnosticoEbApView
{
    protected $model; 
    protected $ClienteModel; 
    protected $conceptoTableroModel;

    public function __construct()
    {
        $this->model = new DiagnosticoEbApModel();
        $this->ClienteModel = new ClienteModel();
        $this->conceptoTableroModel = new ConceptoTableroEbApModel();
    }

    public function pantallaDiagnosticoEbAp()
    {
        ?>
        <div id="divPantallaDiagEbAp" style="padding:5px;">
            <div id="botonesDiagEbAp">
                <div class="row">
                    <div class="col-lg-3 ofset-3">
                        <button class="btn btn-primary" onclick="formuNuevoDiagnostico();">Nuevo Diagnostico </button>  
                    </div>
                    <div class="col-lg-3 ofset-3">
                        <button class="btn btn-primary" onclick="mostrarDiagnosticos();">Mostrar Diagnosticos </button>  
                    </div>

                </div>
            </div>
            <div id="divResultadosDiagEbAp">
                <?php
                    $this->mostrarDiagnosticos();
                ?>
            </div>        

        </div>
        <?php
    }

    function mostrarDiagnosticos()
    {
        $diagnosticos = $this->model->traerDiagnosticos();    
        echo '<table class="table">'; 
        echo '<tr>'; 
        echo '<td>No</td>';
        echo '<td>Fecha</td>';
        echo '<td>Cliente</td>';
        echo '<td>ConcepTecnico</td>';
        echo '</tr>';
        foreach($diagnosticos as $diagnostico)
        {
            echo '<tr>'; 
            echo '<td>'.$diagnostico['idDiagnosticoEbAp'].'</td>';
            echo '<td>'.$diagnostico['fecha'].'</td>';
            echo '<td>'.$diagnostico['idCliente'].'</td>';
            echo '<td>'.$diagnostico['conceptoTecnico'].'</td>';
            echo '</tr>';    
        }
        echo '</table>';
    }


    public function formuNuevoDiagnostico()
    {
         $clientes = $this->ClienteModel->traerClientes(); 
       
        ?>
        <div id="div_principal_diagnosticoEbAp">
            <P>DIAGNOSTICO EQUIPO BOMBEO AGUA POTABLE</P>

            <div class="row">
                <label for="" class="col-lg-3">
                    Razon Social:
                </label>
                <div class="col-lg-9">
                    <select id="idCliente" name="idCliente" style="color:black;" class="form-control">
                        <option value= "">Sleccione...</option>
                        <?php
                        foreach($clientes as $cliente)
                        {
                            echo '<option value="'.$cliente['idcliente'].'" >'.$cliente['nombre'].'</option>';
                        }

                        ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <label for="" class="col-lg-3">
                    Direccion:
                </label>
                <label for="" class="col-lg-9" id="labelDireccion"></label>
            </div>
            <div class="row" style="padding:5px;">
                  <?php
                      $this->formuTablerosEbAp();
                  ?>
            </div>
            <div class="row">
                <button class="btn btn-primary" onclick="grabarDiagnosticoEbAp();">GRABAR DIAGNOSTICO</button>
            </div>            

        </div>
        <?php
    }

    public function formuTablerosEbAp()
    {
        $conceptos = $this->conceptoTableroModel->traerTablerosEbAp()
        ?>
        <div class="row" style="color:black;" >

                <table class="table table-striped">
                <?php
                foreach($conceptos as $concepto)
                {
                    echo '<tr>'; 
                    echo '<td>'.$concepto['descripcion'].'</td>';
                    echo '<td><select id="concepto'.$concepto['id'].'" name="concepto'.$concepto['id'].'" class="form-control">
                                    <option value ="">Seleccione...</option>
                                    <option value ="B">Bueno</option>
                                    <option value ="R">Regular</option>
                                    <option value ="M">Malo</option>
                                    <option value ="A">Ausente</option>
                                    <option value ="NA">No Aplica</option>
                                    </select>
                            </td>';
                    echo '</tr>';  
                }
                ?>
                </table>
        </div>    
        <div class="row">
            <div class="col-lg-4">
                <label>Variador:</label>
                <input type="checkbox" id="checkVariador" name ="checkVariador">
            </div>
            <div class="col-lg-4">
                <label>Arranque Directo:</label>
                <input type="checkbox" id="checkArranque" name="checkArranque">
            </div>
            <div class="col-lg-4">
                <label>Estrella Triangulo:</label>
                <input type="checkbox" id="checkEstrella" name="checkEstrella">
            </div>
        </div>      

        <div class="row">
            <div class="col-lg-2">
                <label>Hidroflow:</label>
                <input type="checkbox" id="checkHidroflow" name="checkHidroflow">
            </div>
            <div class="col-lg-2">
                <label>Capacidad:</label>
                <input type="text" id="capacidad" size="4px">
            </div>
            <div class="col-lg-2">
                <label>Marca de las bombas:</label>
                <input type="text" id="marcaBomba" name="marcaBomba"  size="4px">
            </div>
            <div class="col-lg-2">
                <label>HP:</label>
                <input type="text" id="hp" name="hp"  size="4px">
            </div>
            <div class="col-lg-4">
                <label>Fugas:</label>
                <select id="fugas" name="fugas">
                    <option value="">...</option>
                    <option value="S">Si</option>
                    <option value="N">No</option>
                </select>
            </div>
        </div>       
      <?php
    }
}    