<?php
$raiz = dirname(dirname(dirname(__file__)));
// require_once($raiz.'/hardware/views/hardwareView.php'); 
require_once($raiz.'/diagnosticoEbAll/models/DiagnosticoEbAllModel.php'); 
require_once($raiz.'/diagnosticoEbAll/models/ConceptoTableroEbAllModel.php'); 
require_once($raiz.'/clientes/models/ClienteModel.php'); 
require_once($raiz.'/diagnosticoEbAll/models/TableroDiagnosticoEbAllModel.php'); 
require_once($raiz.'/movil/model/UsuarioModel.php'); 

class diagnosticoEbAllView
{
    protected $model; 
    protected $ClienteModel; 
    protected $conceptoTableroModel;
    protected $tableroDiagnosticoModel;
    protected $usuarioModel;

    public function __construct()
    {
        $this->model = new DiagnosticoEbAllModel();
        $this->ClienteModel = new ClienteModel();
        $this->conceptoTableroModel = new ConceptoTableroEbAllModel();
        $this->tableroDiagnosticoModel = new TableroDiagnosticoEbAllModel();
        $this->usuarioModel = new UsuarioModel();
    }

    public function pantallaDiagnosticoEbAll()
    {
        ?>
        <div class="row" id="divPantallaDiagEbAll" style="padding:5px;">
            <div id="botonesDiagEbAll">
                <div class="row">
                    <div class="col-lg-3 ofset-3">
                        <button class="btn btn-primary" onclick="formuNuevoDiagnosticoEbAll();">Nuevo Diagnostico </button>  
                    </div>
                    <div class="col-lg-3 ofset-3">
                        <button class="btn btn-primary" onclick="mostrarDiagnosticosEbAll();">Mostrar Diagnosticos </button>  
                    </div>

                </div>
            </div>
            <div class="row mt-3" id="divResultadosDiagEbAll">
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
        echo '<th>No</th>';
        echo '<th>Fecha</th>';
        echo '<th>Cliente</th>';
        // echo '<th>Ver</th>';
        echo '<th>Pdf</th>';
        echo '</tr>';
        foreach($diagnosticos as $diagnostico)
        {
            $infoCLiente = $this->ClienteModel->traerClienteId($diagnostico['idCliente']);             
            echo '<tr>'; 
            echo '<td>'.$diagnostico['id'].'</td>';
            echo '<td>'.$diagnostico['fecha'].'</td>';
            echo '<td>'.$infoCLiente['nombre'].'</td>';
            // echo '<td><button class ="btn btn-primary" onclick ="verDiagnosticoEbAll('.$diagnostico['id'].')">Ver</button></td>';
            echo '<td><a href="../diagnosticoEbAll/pdf/ordenPdf3.php?idDiagnostico='.$diagnostico['id'].'" target="_blank" >PDF</a></td>';
            echo '</tr>';    
        }
        echo '</table>';
    }

    
    public function formuNuevoDiagnostico()
    {
         $clientes = $this->ClienteModel->traerClientes(); 
       
        ?>
        <div class="row mt-3"  id="div_principal_diagnosticoEbAll">
            <P>DIAGNOSTICO EQUIPO BOMBEO AGUAS LLUVIAS</P>

            <div class="row">
                <label for="" class="col-lg-3">
                    Razon Social:
                </label>
                <div class="col-lg-9">
                    <select id="idCliente" name="idCliente" style="color:black;" class="form-control"  onchange="traerUltimoDiagnosticoClienteEbAll();">
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
            <br>
            <div id="div_ultimo_diagnostico_clienteEbAll">
            </div>
            <br>
            <div class="row mt-3">
                <button class ="btn btn-primary" onclick="crearEncabezadoDiagnosticoEbAll();">Continuar</button>
            </div>

            <!-- <div class="row">
                <label for="" class="col-lg-3">
                    Direccion:
                </label>
                <label for="" class="col-lg-9" id="labelDireccion"></label>
            </div> -->
            
        </div>
        <?php
    }

    public function mostrarInfoEncabezado($idDiagnostico)
    {
        $infoDiagnostico = $this->model->traerDiagnosticoId($idDiagnostico); 
        $infoCLiente = $this->ClienteModel->traerClienteId($infoDiagnostico['idCliente']); 
        $infoTablerosDiagnostico = $this->tableroDiagnosticoModel->traerTablerosDiagnostico($idDiagnostico);   
        $infoUsuario = $this->usuarioModel->traerusuarioId($infoDiagnostico['idAtendioVisita']);  
        ?>
        <div class="row mt-3" style="padding:5px; font-size:20px;" >
            <div class="col-lg-3">
                  <img width="100"   src = "../movil/imagen/logonuevo.png">  
                  <!-- <label>Nit: 901077768-7</label>
                  <label>Nit: Cel : 3132140149</label> -->
            </div>
            <div class="col-lg-6" >
                Razon Social_: <?php echo $infoCLiente['nombre'] ?>
                <br>
                Direccion: <?php echo $infoCLiente['direccion'] ?>
                <br>
             
                Atendio Visita: <?php echo $infoUsuario['nombre'] ?>
            </div>
            <div class="col-lg-3">
                No : <?php  echo $idDiagnostico ?>
                <br>
                Fecha:   <?php  echo $infoDiagnostico['fecha'] ?>
            </div>
       </div>
        <?php
    }


    public function mostrarConceptosDiagnosticoEbAll($idDiagnostico)
    {
        $infoDiagnostico = $this->model->traerDiagnosticoId($idDiagnostico); 
        //   echo '<pre>'; 
        //     print_r($infoDiagnostico); 
        //     echo'</pre>';
        //     die(); 
        $infoCLiente = $this->ClienteModel->traerClienteId($infoDiagnostico['idCliente']); 
     ?>   

        <?php  $this->mostrarInfoEncabezado($idDiagnostico);  ?>  
            <!-- <div class="row" style="padding:5px;">
                    <label for="" class="col-lg-3">
                        Razon Social:
                    </label>
                    <div class="col-lg-9">
                        <label><?php    echo $infoCLiente['nombre']  ?> </label>
                    </div>

            </div> -->

            <div class="row" style="padding:5px;">
                <div class="row">
                    CONVENCIONES: B= BUENO; R= REGULAR; M= MALO; A= AUSENTE; N/A= NO APLICA  
                </div>

                <form id="formularioDiagnostico" name ="formularioDiagnostico">
                    <input type="hidden" id="idDiagnostico" name="idDiagnostico" value="<?php echo $idDiagnostico ?>" >

                    <?php
                    $this->formuTablerosEbAll();
                    ?>
                </form>
            </div>
            <div class="row">
                <!-- <button type="submit" class="btn btn-primary" onclick="grabarDiagnosticoEbAp();">GRABAR DIAGNOSTICO</button> -->
                <button  class="btn btn-primary" onclick="grabarDiagnosticoEbAll();">GRABAR DIAGNOSTICO</button>
            </div>
        <?php               
    }

    public function formuTablerosEbAll()
    {
        $conceptos = $this->conceptoTableroModel->traerTablerosEbAll()
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
        <!-- <div class="row">
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
        </div>       -->
        <div class="row">
         
            <textarea id="conceptoTecnico" name="conceptoTecnico" class ="form-control" rows="5" placeholder = "   CONCEPTO TECNICO AGUAS LLUVIAS  "></textarea>
        </div> 
      <?php
    }

    
    public function verDiagnostico($idDiagnostico)
    {
        // echo '<br>NUmero '.$idDiagnostico; 
        $infoDiagnostico = $this->model->traerDiagnosticoId($idDiagnostico); 
        $numeroTableros = $infoDiagnostico['numeroTableros']; 
        $infoCLiente = $this->ClienteModel->traerClienteId($infoDiagnostico['idCliente']); 
        $infoTablerosDiagnostico = $this->tableroDiagnosticoModel->traerTablerosDiagnostico($idDiagnostico);  
        $numeroMaximoCasillasVisuales = 9;
            //    echo '<pre>'; 
            // print_r($infoTablerosDiagnostico); 
            // echo'</pre>';
            // die(); 

            $this->mostrarInfoEncabezado($idDiagnostico);
       ?>
       <div class="row">
        DIAGNOSTICO EQUIPO DE BOMBEO AGUA LLUVIA
        <button 
            class="btn btn-primary"
            onclick="formuAdicionarTableroEbAll(<?php  echo $idDiagnostico;   ?>);"
            >ADICIONAR TABLERO</button>
       </div>

       <div class="row">
            <table class="table table-striped">
                <thead>
                    <th>CONCEPTO</th>
                    <?php
                        for($i=1;$i<= $numeroMaximoCasillasVisuales;$i++)
                        {
                            echo '<th>B'.$i.'</th>';
                        }
                    ?>
                </thead>
                <tbody>
                    <?php
                        $conceptosTableroEbAll = $this->conceptoTableroModel->traerConceptosTablerosEbAll(); 
                        foreach($conceptosTableroEbAll as $concepto)
                        {
                            // $numeroTableros
                            // $infoConcepto = $this->conceptoTableroModel->traerConceptoTablerosEbApId($tablero['idConceptoTablero']); 
                            echo '<tr>' ; 
                            echo '<td>'.$concepto['descripcion'].'</td>';     
                            for($i=1;$i<= $numeroMaximoCasillasVisuales;$i++)
                            {
                                if($i <= $numeroTableros)
                                {
                                    $valor = $this->tableroDiagnosticoModel->traerTableroIdConcepNumTableroIdDiag($concepto['id'],$i,$idDiagnostico);
                                    echo '<td>'.$valor['valorConceptoTablero'].'</td>';    
                                }
                                else{
                                    echo '<td></td>';     
                                }     
                            }
                            echo '</tr>';
                        }
                    ?>

                </tbody>
            </table>
       </div>

       <div class="row">
           <textarea class="form-control" rows="5"><?php echo $infoDiagnostico['conceptoTecnico']  ?></textarea>
       </div>

       <?php
    }    

    public function mostrarUltimoDiagnosticoClienteEbAll($diagnostico)
    {

        $usuario =  $this->usuarioModel->traerusuarioId($diagnostico['idAtendioVisita']); 
        //   echo '<pre>'; 
        //     print_r($diagnostico); 
        //     echo'</pre>';
        //     die(); 
        ?>
        <div class="row">
            <label>Ultimo Diagnostico</label>
            <table class="table">
                <thead>
                    <tr>
                        <td>Fecha:</td>
                        <td>Atendio:</td>
                        <td>Concepto:</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php   echo $diagnostico['fecha'] ?></td>
                        <td><?php   echo $usuario['nombre'] ?></td>
                        <td><?php   echo $diagnostico['conceptoTecnico'] ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <?php
    }

}