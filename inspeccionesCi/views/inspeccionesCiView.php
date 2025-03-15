<?php
$raiz = dirname(dirname(dirname(__file__)));
// require_once($raiz.'/hardware/views/hardwareView.php'); 
// require_once($raiz.'/diagnosticoEbAp/models/DiagnosticoEbApModel.php'); 
// require_once($raiz.'/diagnosticoEbAp/models/ConceptoTableroEbApModel.php'); 
require_once($raiz.'/clientes/models/ClienteModel.php'); 
require_once($raiz.'/movil/model/UsuarioModel.php'); 
require_once($raiz.'/inspeccionesCi/models/InspeccionCiModel.php'); 
require_once($raiz.'/inspeccionesCi/models/ImagenDiagnosticoCiModel.php'); 
require_once($raiz.'/vista/vista.php'); 

class inspeccionesCiView extends vista
{
    protected $model; 
    protected $ClienteModel; 
    protected $imagenModel; 
    // protected $conceptoTableroModel;
    // protected $tableroDiagnosticoModel;
    protected $usuarioModel;

    public function __construct()
    {
        $this->model = new InspeccionCiModel();
        $this->ClienteModel = new ClienteModel();
        // $this->conceptoTableroModel = new ConceptoTableroEbApModel();
        // $this->tableroDiagnosticoModel = new TableroDiagnosticoEbApModel();
        $this->usuarioModel = new UsuarioModel();
        $this->imagenModel = new ImagenDiagnosticoCiModel();
    }



    public function pantallaInspeccionCI()
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
            <H3>FORMATO INSPECCION RED CONTRA INCENDIOS</H3>
            <div class="row" id="divPantallaDiagEbAp" style="padding:5px;">
                <div id="botonesDiagEbAp">
                    <div class="row">
                        <div class="col-lg-3 ofset-3">
                            <button class="btn btn-primary" onclick="formuNuevaInspeccionCi();">Nuevo Formato Inspeccion </button>  
                        </div>
                        <div class="col-lg-3 ofset-3">
                            <button class="btn btn-primary" onclick="mostrarInspeccionesCi();">Mostrar Formatos de Inspeccion </button>  
                        </div>
                        
                    </div>
                </div>
                <div class="row mt-3" id="divResultadosDiagEbAp">
                    <?php
                    $this->mostrarInspeccionesCi();
                    
                    ?>
            </div>        
        </div>
        <?php    $this->modalSubirArchivo();  ?>    
        <?php    $this->modalUltimoDiagnostico();  ?>    
        <?php    $this->modalEnviarCorreo();  ?>    
        <?php    $this->modalVerImagenesDiagnosticoCi();  ?>    
    </body>
    </html>
        <?php
    }

    public function modalSubirArchivo (){
        ?>
         <!-- <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal2">
         Launch demo modal
         </button> -->
          <div  class="modal fade " id="modalSubirArchivo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                  <div class="modal-header" id="headerNuevoCliente">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="myModalLabel">Informacion</h4>
                  </div>
                  <div id="cuerpoModalSubirArchivo" class="modal-body">
                  </div>
                  <div class="modal-footer" id="footerNuevoCliente">
                      <button type="button" class="btn btn-default" data-dismiss="modal" onclick = "pantallaClientes();">Cerrar</button>
                      <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                  </div>
                  </div>
              </div>
          </div>
        <?php

    } 
    public function modalEnviarCorreo (){
        ?>
         <!-- <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal2">
         Launch demo modal
         </button> -->
          <div  class="modal fade " id="modalEnviarCorreo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                  <div class="modal-header" id="headerNuevoCliente">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="myModalLabel">Envio de Correo </h4>
                  </div>
                  <div id="cuerpoModalEnviarCorreo" class="modal-body">
                  </div>
                  <div class="modal-footer" id="footerNuevoCliente">
                      <button type="button" class="btn btn-default" data-dismiss="modal" onclick = "">Cerrar</button>
                      <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                  </div>
                  </div>
              </div>
          </div>
        <?php

    } 
    public function modalUltimoDiagnostico (){
        ?>
         <!-- <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal2">
         Launch demo modal
         </button> -->
          <div  class="modal fade " id="modalUltimoDiagnostico" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                  <div class="modal-header" id="headerNuevoCliente">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="myModalLabel">Informacion</h4>
                  </div>
                  <div id="cuerpoModalUltimoDiagnostico" class="modal-body">
                  </div>
                  <div class="modal-footer" id="footerNuevoCliente">
                      <button type="button" class="btn btn-default" data-dismiss="modal" onclick = "pantallaClientes();">Cerrar</button>
                      <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                  </div>
                  </div>
              </div>
          </div>
        <?php

    } 

    public function modalVerImagenesDiagnosticoCi(){
        ?>
         <!-- <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal2">
         Launch demo modal
         </button> -->
          <div  class="modal fade " id="modalVerImagenesDiagnosticoCi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                  <div class="modal-header" id="headerNuevoCliente">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="myModalLabel">Imagenes </h4>
                  </div>
                  <div id="cuerpoModalVerImagenesDiagnosticoCi" class="modal-body">
                  </div>
                  <div class="modal-footer" id="footerNuevoCliente">
                      <button type="button" class="btn btn-default" data-dismiss="modal" onclick = "">Cerrar</button>
                      <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                  </div>
                  </div>
              </div>
          </div>
        <?php
    } 



    function mostrarInspeccionesCi()
    {
        $diagnosticos = $this->model->traerInspecciones();  
            //      echo '<pre>'; print_r($diagnosticos); echo '</pre>';
            // die(); 
        echo '<table class="table">'; 
        echo '<tr>'; 
        echo '<th>No.</th>';
        echo '<th>Fecha</th>';
        echo '<th>Cliente</th>';
        echo '<th>Imagenes</th>';
        echo '<th>Correo</th>';
       
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
            echo '<th><button class="btn btn-warning btn-sm"
                    data-toggle="modal"   
                    data-target="#modalEnviarCorreo"
                    onclick = "enviarCorreoConDiagnostico('.$diagnostico['id'].'); "
                    ">Correo</button></th>';

                    echo '<td><button class="btn btn-success btn-sm"
                    data-toggle="modal"   
                    data-target="#modalVerImagenesDiagnosticoCi"
                    onclick = " verimagenesDiagnosticoCi('.$diagnostico['id'].'); "
                    ">Imagenes</button></td>';        
            // echo '<td><button class ="btn btn-primary btn-sm" onclick ="verDiagnostico('.$diagnostico['id'].')">Ver</button></td>';
            echo '<td><a href="../inspeccionesCi/pdf/inspeccionCiPdf.php?idDiagnostico='.$diagnostico['id'].'" target="_blank" >PDF</a></td>';
            echo '</tr>';    
        }
        echo '</table>';
    }


    public function formuNuevaInspeccionCi()
    {
         $clientes = $this->ClienteModel->traerClientes(); 
        //  $this->printR($clientes); 
       
        ?>
        <div class="row mt-3"  id="div_principal_diagnosticoEbAp">
            <P>FORMATO INSPECCION RED CONTRA INCENDIO</P>

            <div class="row">
                <label for="" class="col-lg-3">
                    Razon Social:
                </label>
                <div class="col-lg-9">
                    <select id="idCliente" name="idCliente" style="color:black;" class="form-control" onchange="traerUltimoFormatoInspeccionCliente();">
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
            <div id="div_ultimo_diagnostico_cliente">

            </div>
            <br>
            <div class="row mt-3">
                <button class ="btn btn-primary" onclick="crearEncabezadoInspeccionIncencio();">Continuar</button>
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
        $infoDiagnostico = $this->model->traerFormatoInspeccionId($idDiagnostico); 
        // $this->printR($infoDiagnostico);
        $infoCLiente = $this->ClienteModel->traerClienteId($infoDiagnostico['idCliente']); 
        // $infoTablerosDiagnostico = $this->tableroDiagnosticoModel->traerTablerosDiagnostico($idDiagnostico);   
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

    public function mostrarConceptosFormatoInspeccion($idDiagnostico)
    {
        $infoDiagnostico = $this->model->traerFormatoInspeccionId($idDiagnostico); 
        // $this->printR($infoDiagnostico);f
        //   echo '<pre>'; 
        //     print_r($infoDiagnostico); 
        //     echo'</pre>';
        //     die(); 
        $infoCLiente = $this->ClienteModel->traerClienteId($infoDiagnostico['idCliente']); 
     ?>   
        
        <?php  $this->mostrarInfoEncabezado($idDiagnostico);  ?>

        <div class="row" style="padding:5px;">
        <div class="row">
            <!-- CONVENCIONES: B= BUENO; R= REGULAR; M= MALO; A= AUSENTE; N/A= NO APLICA   -->
        <div class="row">
            <!-- <form id="formularioDiagnostico" name ="formularioDiagnostico">
                
                </form> -->
                <input type="hidden" id="idDiagnostico" name="idDiagnostico" value="<?php echo $idDiagnostico ?>" >

            <div class="col-lg-5" style="border:1px solid black; font-size:12px;">
                <?php
                if($infoDiagnostico['idInfoBombaLider']==0){
                    // $this->formuInformacionBombaLider();
                    $this->formuInformacionBombaLiderPruebas();
                }else{
                    echo 'Bomba lider ya quedo grabado ';
                }
                  ?>
            </div>
            <div class="col-lg-offset-1 col-lg-5" style="border:1px solid black; font-size:12px;">
                <?php
                    if($infoDiagnostico['idInfoBombaJockey']==0){
                        //   $this->formuInformacionBombaJockey();
                        $this->formuInformacionBombaJockeyPruebas();
                    }
                    else {
                        echo 'Bomba jockey grabada ';
                    }
                  ?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-5" style="border:1px solid black; font-size:12px;">
               <?php 
                // $this->formuInfoTableroLider(); 
                if($infoDiagnostico['idInfoBombaLider']==0){
                    $this->formuInfoTableroLiderPruebas(); 
                }else{
                    echo 'tablero lider grabado ';
                }

               ?>
           
            </div>
            <div class="col-lg-offset-1 col-lg-5" style="border:1px solid black; font-size:12px;">
                <?php  
                 if($infoDiagnostico['idInfoBombaJockey']==0){
                    $this->formuInfoTableroJockeyPruebas(); 
                 }
                 else { 
                    echo 'Bomba Jockey grabada ';
                 }
                ?>
            </div>
        </div>
        <div class="row">
            <textarea class="form-control mt-3" id="observacionesICI" rows="5" placeholder="observaciones"></textarea>
        </div>
        <div class="row">
            <!-- <button type="submit" class="btn btn-primary" onclick="grabarDiagnosticoEbAp();">GRABAR DIAGNOSTICO</button> -->
            <!-- <button  class="btn btn-primary" onclick="grabarDiagnosticoEbAp();">GRABAR DIAGNOSTICO</button> -->
            <button  class="btn btn-primary" onclick="grabarDiagnosticoInspeccion();">GRABAR DIAGNOSTICO</button>
        </div>
     <?php               
    }

    public function formuInformacionBombaLider()
    {
    $ancho = 4; 
     ?>
     <div >
        <div><H3>INFORMACION BOMBA LIDER</H3></div>
        <div class="row">
            <label for="" class="col-lg-8">Se encuentra operativa en automatico</label>
            <div class="col-lg-3">
                <select  id="operativaAutomatico" class="form-control">
                    <option value="">Sel...</option>
                    <option value="SI">SI</option>
                    <option value="NO">NO</option>
                    
                </select>
            </div>
        </div>
        <div class="row">

            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >Equipo Listado</label>
                <input id="equipoListado"  type="text" class="form-control" placeholder = " ">
            </div>
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >Modelo</label>
                <input type="text"  class="form-control" placeholder = "" id="modelo">
            </div>
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >Marca bomba</label>
                <input type="text"  class="form-control" id="marcaBomba">
            </div>
        </div>
        
        <div class="row">

            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >Potencia(HP)</label>
                <input type="text"  class="form-control" id="potencia">
            </div>
            <div class="col-lg-<?php  echo $ancho; ?>">
            <label for="" >Transferencia</label>
            <input type="text"  class="form-control" id="transferencia">
        </div>
        <div class="col-lg-<?php  echo $ancho; ?>">
            <label for="" >Ubicacion</label>
            <input type="text"  class="form-control" id="ubicacion">
        </div>
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >Tipo de Bomba</label>
                <select name="" id="tipoBomba" class="form-control">
                    <option value="">Seleccione...</option>
                    <option value="Vertical">Vertical</option>
                    <option value="Horizontal">Horizontal</option>
                    <option value="Eje Libre">Eje Libre</option>
                    <option value="Carcaza Partida">Carcaza Partida</option>
                    
                </select>
            </div>
            
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >Tipo Succion(+-)</label>
                <input type="text"  class="form-control" id="tipoSuccion">
            </div>
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >U Prue Pitometrica</label>
                <input type="text"  class="form-control" id="ultimaPitometrica">
            </div>

            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >Q MAX(GPM)</label>
                <input type="text"  class="form-control" id = "qmaxGpm">
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >PRESION MAX(PSI)</label>
                <input type="text"  class="form-control" id="presionMAxPsi">
            </div>
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >Q NOMINAL (GPM)</label>
                <input type="text"  class="form-control" id="qNominalGpm">
            </div>
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >PRESION AL 150%(PSI)</label>
                <input type="text"  class="form-control" id="presionAl150">
            </div>
        </div>
        <div class="row">

        
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >DIAMETRO DE SUCCION</label>
                <input type="text"  class="form-control" id="diametroSuccion">
            </div>
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >DIAMETRO DE DESCARGA</label>
                <input type="text"  class="form-control" id="diametroDescarga">
            </div>
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >MATERIAL DE LA TUBERIA</label>
                <input type="text"  class="form-control" id="materialTuberia">
            </div>
        </div>
        <div class="row">

        
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >FUGAS</label>
                <input type="text"  class="form-control" id="fugas">
            </div>
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >CABEZAL PRUEBAS</label>
                <select name="" id="tipoCabezal" class="form-control">
                    <option value="">Seleccione...</option>
                    <option value="BUENO">BUENO</option>
                    <option value="REGULAR">REGULAR</option>
                    <option value="MALO">MALO</option>
                </select>
            </div>
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >TANQUE INDEPENDIENTE</label>
                <input type="text"  class="form-control"  id="tanqueIndependiente">
            </div>
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >MANOMETRO</label>
                <input type="text"  class="form-control" id="nanomentro">
            </div>
        </div>
        <div class="row">

         
            
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >SELLO MECANICO / P.ESTOPA</label>
                <select name="" id="selloMecanico" class="form-control">
                    <option value="">Seleccione...</option>
                    <option value="BUENO">BUENO</option>
                    <option value="REGULAR">REGULAR</option>
                    <option value="MALO">MALO</option>
                </select>
            </div>
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >MANOVACUOMETRO</label>
                <input type="text"  class="form-control" id="manovacumetro">
            </div>
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >RODAMIENTOS DE MOTOR</label>
                <input type="text"  class="form-control" id="rodamientosMotor">
            </div>
        </div>

        <div class="row">
           
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >EMPAQUETADURA</label>
                <input type="text"  class="form-control" id="empaquetadura">
            </div>
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >COMPROBACION VENTILADOR</label>
                <input type="text"  class="form-control" id="comprobacionVentilador">
            </div>
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >VALVULAS CORTE </label>
                <input type="text"  class="form-control" id="valvulasDeCorte">
            </div>
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >CAUDALIMETRO</label>
                <input type="text"  class="form-control" id="caudalimetro">
            </div>
        </div>

        <div class="row">

          
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >VALVULA DE ALIVIO</label>
                <input type="text"  class="form-control" id="valvulaAlivio">
            </div>
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >RETORNO TANQUE</label>
                <input type="text"  class="form-control" id="retornoTanque">
            </div>
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >CONDICIONES OPERACION</label>
                <select name="" id="idCondicionOperacion" class="form-control">
                        <option value="">Seleccione...</option>
                        <option value="BUENO">BUENO</option>
                        <option value="REGULAR">REGULAR</option>
                        <option value="MALO">MALO</option>
                </select>
            </div>

        </div>

      
    
     </div>
     <?php
    }

    public function formuInformacionBombaLiderPruebas()
    {
    $ancho = 4; 
     ?>
     <div >
        <div><H3>INFORMACION BOMBA LIDER</H3></div>
        <div class="row">
            <label for="" class="col-lg-8">Se encuentra operativa en automatico</label>
            <div class="col-lg-3">
                <select  id="operativaAutomatico" class="form-control">
                    <option value="">Sel...</option>
                    <option selected value="SI">SI</option>
                    <option value="NO">NO</option>
                    
                </select>
            </div>
        </div>
        <div class="row">

            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >Equipo Listado</label>
                <input id="equipoListado"  type="text" class="form-control" placeholder = " " value="1">
            </div>
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >Modelo</label>
                <input type="text"  class="form-control" placeholder = "" id="modelo" value="2">
            </div>
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >Marca bomba</label>
                <input type="text"  class="form-control" id="marcaBomba" value="3">
            </div>
        </div>
        
        <div class="row">

            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >Potencia(HP)</label>
                <input type="text"  class="form-control" id="potencia" value="4">
            </div>
            <div class="col-lg-<?php  echo $ancho; ?>">
            <label for="" >Transferencia</label>
            <input type="text"  class="form-control" id="transferencia" value="5">
        </div>
        <div class="col-lg-<?php  echo $ancho; ?>">
            <label for="" >Ubicacion</label>
            <input type="text"  class="form-control" id="ubicacion" value="6">
        </div>
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >Tipo de Bomba</label>
                <select name="" id="tipoBomba" class="form-control">
                    <option value="">Seleccione...</option>
                    <option selected value="Vertical">Vertical</option>
                    <option value="Horizontal">Horizontal</option>
                    <option value="Eje Libre">Eje Libre</option>
                    <option value="Carcaza Partida">Carcaza Partida</option>
                    
                </select>
            </div>
            
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >Tipo Succion(+-)</label>
                <input type="text"  class="form-control" id="tipoSuccion" value="7">
            </div>
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >U Prue Pitometrica</label>
                <input type="text"  class="form-control" id="ultimaPitometrica" value="8">
            </div>

            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >Q MAX(GPM)</label>
                <input type="text"  class="form-control" id = "qmaxGpm" value="9">
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >PRESION MAX(PSI)</label>
                <input type="text"  class="form-control" id="presionMAxPsi" value="10">
            </div>
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >Q NOMINAL (GPM)</label>
                <input type="text"  class="form-control" id="qNominalGpm" value="11">
            </div>
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >PRESION AL 150%(PSI)</label>
                <input type="text"  class="form-control" id="presionAl150" value="12">
            </div>
        </div>
        <div class="row">

        
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >DIAMETRO DE SUCCION</label>
                <input type="text"  class="form-control" id="diametroSuccion" value="13">
            </div>
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >DIAMETRO DE DESCARGA</label>
                <input type="text"  class="form-control" id="diametroDescarga" value="14">
            </div>
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >MATERIAL DE LA TUBERIA</label>
                <input type="text"  class="form-control" id="materialTuberia" value="15">
            </div>
        </div>
        <div class="row">

        
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >FUGAS</label>
                <input type="text"  class="form-control" id="fugas" value="16">
            </div>
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >CABEZAL PRUEBAS</label>
                <select name="" id="tipoCabezal" class="form-control">
                    <option  value="">Seleccione...</option>
                    <option selected value="BUENO">BUENO</option>
                    <option value="REGULAR">REGULAR</option>
                    <option value="MALO">MALO</option>
                </select>
            </div>
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >TANQUE INDEPENDIENTE</label>
                <input type="text"  class="form-control"  id="tanqueIndependiente" value="17">
            </div>
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >MANOMETRO</label>
                <input type="text"  class="form-control" id="nanomentro" value="18">
            </div>
        </div>
        <div class="row">

         
            
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >SELLO MECANICO / P.ESTOPA</label>
                <select name="" id="selloMecanico" class="form-control">
                    <option value="">Seleccione...</option>
                    <option selected value="BUENO">BUENO</option>
                    <option value="REGULAR">REGULAR</option>
                    <option value="MALO">MALO</option>
                </select>
            </div>
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >MANOVACUOMETRO</label>
                <input type="text"  class="form-control" id="manovacumetro" value="19">
            </div>
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >RODAMIENTOS DE MOTOR</label>
                <input type="text"  class="form-control" id="rodamientosMotor" value="20">
            </div>
        </div>

        <div class="row">
           
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >EMPAQUETADURA</label>
                <input type="text"  class="form-control" id="empaquetadura" value="21">
            </div>
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >COMPROBACION VENTILADOR</label>
                <input type="text"  class="form-control" id="comprobacionVentilador" value="22">
            </div>
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >VALVULAS CORTE </label>
                <input type="text"  class="form-control" id="valvulasDeCorte" value="23">
            </div>
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >CAUDALIMETRO</label>
                <input type="text"  class="form-control" id="caudalimetro" value="24">
            </div>
        </div>

        <div class="row">

          
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >VALVULA DE ALIVIO</label>
                <input type="text"  class="form-control" id="valvulaAlivio" value="25">
            </div>
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >RETORNO TANQUE</label>
                <input type="text"  class="form-control" id="retornoTanque" value="26">
            </div>
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >CONDICIONES OPERACION</label>
                <select name="" id="idCondicionOperacion" class="form-control">
                        <option value="">Seleccione...</option>
                        <option selected value="BUENO">BUENO</option>
                        <option value="REGULAR">REGULAR</option>
                        <option value="MALO">MALO</option>
                </select>
            </div>

        </div>

      
    
     </div>
     <?php
    }

    public function formuInformacionBombaJockey()
    {
        $ancho= 4;
     ?>
     <div >
        <div><h3>INFORMACION BOMBA JOCKEY</h3></div>
        <div class="row">
        <div class="row">
            <label for="" class="col-lg-8">Se encuentra operativa en automatico</label>
            <div class="col-lg-3">
                <select name="" id="operativaAutomaticoJockey" class="form-control">
                    <option value="">Sel...</option>
                    <option value="SI">SI</option>
                    <option value="NO">NO</option>
                    
                </select>
            </div>
        </div>
        <div class="row">

            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >Equipo Listado</label>
                <input id="equipoListadoJockey"  type="text" class="form-control" placeholder = " ">
            </div>
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >Modelo</label>
                <input type="text"  class="form-control" placeholder = "" id="modeloJockey">
                
            </div>
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >Marca bomba</label>
                <input type="text"  class="form-control" id="marcaBombaJockey">
            </div>
        </div>

        <div class="row">

            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >Potencia(HP)</label>
                <input type="text"  class="form-control" id="potenciaJockey">
            </div>


            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >Tipo de Bomba</label>
                <select name="" id="tipoBombaJockey" class="form-control">
                    <option value="">Seleccione...</option>
                    <option value="Vertical">Vertical</option>
                    <option value="Horizontal">Horizontal</option>
                 
                    
                </select>
            </div>
            
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >Q MAX(GPM)</label>
                <input type="text"  class="form-control" id="qmaxGpmJockey">
            </div>
        </div>

        <div class="row">
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >PRESION MAX(PSI)</label>
                <input type="text"  class="form-control" id="presionMAxPsiJockey">
            </div>
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >Q NOMINAL(GPM)</label>
                <input type="text"  class="form-control" id="qNominalGpmJockey">
            </div>
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >PRESION AL 150%(PSI)</label>
                <input type="text"  class="form-control" id="presionAl150Jockey">
            </div>
        </div>
            
        <div class="row">
           
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >DIAMETRO DE SUCCION</label>
                <input type="text"  class="form-control" id="diametroSuccionJockey">
            </div>
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >DIAMETRO DE DESCARGA</label>
                <input type="text"  class="form-control" id="diametroDescargaJockey">
            </div>
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >MATERIAL DE LA TUBERIA</label>
                <input type="text"  class="form-control" id="materialTuberiaJockey">
            </div>
        </div>
        <div class="row">

        
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >FUGAS</label>
                <input type="text"  class="form-control" id="fugasJockey">
            </div>
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >MANOMETRO</label>
                <input type="text"  class="form-control" id="nanomentroJockey">
            </div>
            
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >SELLO MECANICO</label>
                <select name="" id="selloMecanicoJockey" class="form-control">
                    <option value="">Sel...</option>
                    <option value="BUENO">BUENO</option>
                    <option value="REGULAR">REGULAR</option>
                    <option value="MALO">MALO</option>
                </select>
            </div>
        </div>
        <div class="row">

        
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >MANOVACUOMETRO</label>
                <input type="text"  class="form-control" id="manovacumetroJockey">
            </div>
            <div class="col-lg-<?php  echo $ancho; ?>">
            <label for="" >RODAMIENTOS DE MOTOR</label>
            <input type="text"  class="form-control" id="rodamientosMotorJockey">
            </div>
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >EMPAQUETADURA</label>
                <input type="text"  class="form-control" id="empaquetaduraJockey">
            </div>
        </div>

        <div class="row">

            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >COMPROBACION VENTILADOR</label>
                <input type="text"  class="form-control" id="comprobacionVentiladorJockey">
            </div>
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >VALVULAS DE CORTE </label>
                <input type="text"  class="form-control" id="valvulasDeCorteJockey">
            </div>
            
        </div>
    
     </div>
     <br>
    <div class="row"><H3>INFORMACION PARA MANIPULACION</H3></div>
        <div class="row form-group">
            <label class="col-lg-9">INSTRUCCIONES DE MANIPULACION</label>
            <div class="col-lg-3">
                <input type="text" class="form-control" id="instrucciones">
            </div>
        </div>
        <div class="row form-group">
            <label class="col-lg-9">DEMARCACION DE LOS ELEMENTOS</label>
            <div class="col-lg-3">
                <input type="text" class="form-control" id="demarcacion">
            </div>
        </div>
        <div class="row form-group">
            <label class="col-lg-9">LUZ DE EMERGENCIA</label>
            <div class="col-lg-3">
                <input type="text" class="form-control" id="luzemergecia">
            </div>
        </div>
        <div class="row form-group">
            <label class="col-lg-9">AREA EN ORDEN Y ASEADA</label>
            <div class="col-lg-3">
                <input type="text" class="form-control" id="areaenorden">
            </div>
        </div>
    </div>
     <?php
    }
    public function formuInformacionBombaJockeyPruebas()
    {
        $ancho= 4;
     ?>
     <div >
        <div><h3>INFORMACION BOMBA JOCKEY</h3></div>
        <div class="row">
        <div class="row">
            <label for="" class="col-lg-8">Se encuentra operativa en automatico</label>
            <div class="col-lg-3">
                <select name="" id="operativaAutomaticoJockey" class="form-control">
                    <option value="">Sel...</option>
                    <option selected value="SI">SI</option>
                    <option value="NO">NO</option>
                    
                </select>
            </div>
        </div>
        <div class="row">

            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >Equipo Listado</label>
                <input id="equipoListadoJockey"  type="text" class="form-control" placeholder = " " value ="1">
            </div>
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >Modelo</label>
                <input type="text"  class="form-control" placeholder = "" id="modeloJockey" value ="2">
                
            </div>
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >Marca bomba</label>
                <input type="text"  class="form-control" id="marcaBombaJockey" value ="3">
            </div>
        </div>

        <div class="row">

            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >Potencia(HP)</label>
                <input type="text"  class="form-control" id="potenciaJockey" value ="4">
            </div>


            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >Tipo de Bomba</label>
                <select name="" id="tipoBombaJockey" class="form-control">
                    <option value="">Seleccione...</option>
                    <option selected value="Vertical">Vertical</option>
                    <option value="Horizontal">Horizontal</option>
                 
                    
                </select>
            </div>
            
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >Q MAX(GPM)</label>
                <input type="text"  class="form-control" id="qmaxGpmJockey" value ="5">
            </div>
        </div>

        <div class="row">
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >PRESION MAX(PSI)</label>
                <input type="text"  class="form-control" id="presionMAxPsiJockey" value ="6">
            </div>
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >Q NOMINAL(GPM)</label>
                <input type="text"  class="form-control" id="qNominalGpmJockey" value ="7">
            </div>
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >PRESION AL 150%(PSI)</label>
                <input type="text"  class="form-control" id="presionAl150Jockey" value ="8">
            </div>
        </div>
            
        <div class="row">
           
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >DIAMETRO DE SUCCION</label>
                <input type="text"  class="form-control" id="diametroSuccionJockey" value ="9">
            </div>
            <div class="col-lg-<?php  echo $ancho; ?>"> 
                <label for="" >DIAMETRO DE DESCARGA</label>
                <input type="text"  class="form-control" id="diametroDescargaJockey" value ="10">
            </div>
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >MATERIAL DE LA TUBERIA</label>
                <input type="text"  class="form-control" id="materialTuberiaJockey" value ="11">
            </div>
        </div>
        <div class="row">

        
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >FUGAS</label>
                <input type="text"  class="form-control" id="fugasJockey" value ="12">
            </div>
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >MANOMETRO</label>
                <input type="text"  class="form-control" id="nanomentroJockey" value ="13">
            </div>
            
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >SELLO MECANICO</label>
                <select name="" id="selloMecanicoJockey" class="form-control">
                    <option value="">Sel...</option>
                    <option selected value="BUENO">BUENO</option>
                    <option value="REGULAR">REGULAR</option>
                    <option value="MALO">MALO</option>
                </select>
            </div>
        </div>
        <div class="row">

        
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >MANOVACUOMETRO</label>
                <input type="text"  class="form-control" id="manovacumetroJockey" value ="14">
            </div>
            <div class="col-lg-<?php  echo $ancho; ?>">
            <label for="" >RODAMIENTOS DE MOTOR</label>
            <input type="text"  class="form-control" id="rodamientosMotorJockey" value ="15">
            </div>
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >EMPAQUETADURA</label>
                <input type="text"  class="form-control" id="empaquetaduraJockey" value ="16">
            </div>
        </div>

        <div class="row">

            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >COMPROBACION VENTILADOR</label>
                <input type="text"  class="form-control" id="comprobacionVentiladorJockey" value ="17">
            </div>
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >VALVULAS DE CORTE </label>
                <input type="text"  class="form-control" id="valvulasDeCorteJockey" value ="18">
            </div>
            
        </div>
    
     </div>
     <br>
    <div class="row"><H3>INFORMACION PARA MANIPULACION</H3></div>
        <div class="row form-group">
            <label class="col-lg-9">INSTRUCCIONES DE MANIPULACION</label>
            <div class="col-lg-3">
                <input type="text" class="form-control" id="instrucciones" value ="19">
            </div>
        </div>
        <div class="row form-group">
            <label class="col-lg-9">DEMARCACION DE LOS ELEMENTOS</label>
            <div class="col-lg-3">
                <input type="text" class="form-control" id="demarcacion" value ="20">
            </div>
        </div>
        <div class="row form-group">
            <label class="col-lg-9">LUZ DE EMERGENCIA</label>
            <div class="col-lg-3">
                <input type="text" class="form-control" id="luzemergecia" value ="21">
            </div>
        </div>
        <div class="row form-group">
            <label class="col-lg-9">AREA EN ORDEN Y ASEADA</label>
            <div class="col-lg-3">
                <input type="text" class="form-control" id="areaenorden" value ="22">
            </div>
        </div>
    </div>
     <?php
    }

    public function formuInfoTableroLider()
    {
        $ancho= 4;
        ?>
        <div class="row">
            <H3>INFORMACION TABLERO LIDER</H3>
        </div>
        <div class="row">
            
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >CONTACTOR</label>
                <input type="text"  class="form-control" id="contactorLider">
            </div>
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >INDICADOR LUMINOSO</label>
                <input type="text"  class="form-control" id="indicadorLider">
            </div>
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >GUARDAMOTOR</label>
                <input type="text"  class="form-control" id="guardamotorLider">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >FUSIBLES/MINIBREAKERS</label>
                <input type="text"  class="form-control" id="fusiblesLider">
            </div>
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >TEMPORIZADOR</label>
                <input type="text"  class="form-control" id="temporizadorLider">
            </div>
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >PRESOSTATOS</label>
                <input type="text"  class="form-control" id="presostatosLider">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >CAUDALIMETRO</label>
                <input type="text"  class="form-control" id="caudalimetrotableroLider">
            </div>
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >TABLERO LIBRE DE ALARMAS</label>
                <input type="text"  class="form-control" id="tableroLider">
            </div>
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >DISPLAY DEL TABLERO</label>
                <input type="text"  class="form-control" id="displayLider">
            </div>
        </div>
        <?php
    }
    public function formuInfoTableroLiderPruebas()
    {
        $ancho= 4;
        ?>
        <div class="row">
            <H3>INFORMACION TABLERO LIDER</H3>
        </div>
        <div class="row">
            
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >CONTACTOR</label>
                <input type="text"  class="form-control" id="contactorLider" value="1">
            </div>
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >INDICADOR LUMINOSO</label>
                <input type="text"  class="form-control" id="indicadorLider" value="2">
            </div>
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >GUARDAMOTOR</label>
                <input type="text"  class="form-control" id="guardamotorLider" value="3">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >FUSIBLES/MINIBREAKERS</label>
                <input type="text"  class="form-control" id="fusiblesLider" value="4">
            </div>
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >TEMPORIZADOR</label>
                <input type="text"  class="form-control" id="temporizadorLider" value="5">
            </div>
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >PRESOSTATOS</label>
                <input type="text"  class="form-control" id="presostatosLider" value="6">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >CAUDALIMETRO</label>
                <input type="text"  class="form-control" id="caudalimetrotableroLider" value="7">
            </div>
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >TABLERO LIBRE DE ALARMAS</label>
                <input type="text"  class="form-control" id="tableroLider" value="8">
            </div>
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >DISPLAY DEL TABLERO</label>
                <input type="text"  class="form-control" id="displayLider" value="9">
            </div>
        </div>
        <?php
    }

    public function formuInfoTableroJockey()
    {
        $ancho= 4;
        ?>
        <div class="row">
            <H3>INFORMACION TABLERO JOCKEY</H3>
        </div>
        <div class="row">
            
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >CONTACTOR</label>
                <input type="text"  class="form-control" id="contactorJockey">
            </div>
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >INDICADOR LUMINOSO</label>
                <input type="text"  class="form-control" id="indicadorJockey">
            </div>
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >GUARDAMOTOR</label>
                <input type="text"  class="form-control" id="guardamotorJockey">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >FUSIBLES/MINIBREAKERS</label>
                <input type="text"  class="form-control" id="fusiblesJockey">
            </div>
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >TEMPORIZADOR</label>
                <input type="text"  class="form-control" id="temporizadorJockey">
            </div>
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >PRESOSTATOS</label>
                <input type="text"  class="form-control" id="presostatosJockey">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >TRANSDUCTOR</label>
                <input type="text"  class="form-control" id="transductorJockey">
            </div>
          
        </div>
        <?php
    }
    public function formuInfoTableroJockeyPruebas()
    {
        $ancho= 4;
        ?>
        <div class="row">
            <H3>INFORMACION TABLERO JOCKEY</H3>
        </div>
        <div class="row">
            
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >CONTACTOR</label>
                <input type="text"  class="form-control" id="contactorJockey"  value="1">
            </div>
            <div class="col-lg-<?php  echo $ancho; ?>"> 
                <label for="" >INDICADOR LUMINOSO</label>
                <input type="text"  class="form-control" id="indicadorJockey" value="2">
            </div>
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >GUARDAMOTOR</label>
                <input type="text"  class="form-control" id="guardamotorJockey" value="3">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >FUSIBLES/MINIBREAKERS</label>
                <input type="text"  class="form-control" id="fusiblesJockey" value="4">
            </div>
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >TEMPORIZADOR</label>
                <input type="text"  class="form-control" id="temporizadorJockey" value="5">
            </div>
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >PRESOSTATOS</label>
                <input type="text"  class="form-control" id="presostatosJockey" value="6">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-<?php  echo $ancho; ?>">
                <label for="" >TRANSDUCTOR</label>
                <input type="text"  class="form-control" id="transductorJockey" value="7">
            </div>
          
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
            // print_r($numeroTableros); 
            // echo'</pre>';
            // die(); 
        $this->mostrarInfoEncabezado($idDiagnostico);
       ?>
       <div class="row">
        DIAGNOSTICO EQUIPO DE BOMBEO AGUA POTABLE 
        <button 
            class="btn btn-primary"
            onclick="formuAdicionarTableroEbAp(<?php  echo $idDiagnostico;   ?>);"
            >ADICIONAR TABLERO
        </button>
        <button 
            class="btn btn-primary"
            onclick="verimagenesDiagnosticoEbAp(<?php  echo $idDiagnostico;   ?>);"
            >IMAGENES
        </button>
       </div>
       <div class="row" id="imagenes_diagnosticoEbAp">
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
                        $conceptosTableroEbAp = $this->conceptoTableroModel->traerConceptosTablerosEbAp(); 
                        foreach($conceptosTableroEbAp as $concepto)
                        {
                            // $numeroTableros
                            // $infoConcepto = $this->conceptoTableroModel->traerConceptoTablerosEbApId($tablero['idConceptoTablero']); 
                            echo '<tr>' ; 
                            echo '<td>'.$concepto['descripcion'].'</td>';     
                            // for($i=1;$i<= $numeroTableros;$i++)
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

    public function mostrarUltimoFormatoInspeccionCliente($diagnostico)
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
                        <td><button 
                            class="btn btn-primary btn-sm"
                            data-toggle="modal" 
                            data-target="#modalUltimoDiagnostico"
                            onclick="traerInfoCompletaUltimoDiagnostico(<?php   echo $diagnostico['id'] ?>);"
                            ><?php   echo $diagnostico['fecha'] ?>
                           </button>
                        </td>
                        <td><?php   echo $usuario['nombre'] ?></td>
                        <td><?php   echo $diagnostico['conceptoTecnico'] ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <?php
    }



    public function verimagenesDiagnosticoEbAp($imagenes,$idDiagnostico)
    {
        echo '<div class="row"><button 
                                class="btn btn-primary"
                                data-bs-toggle="modal" 
                                data-bs-target="#modalSubirArchivo"
                                onclick ="formuAgregarImagenDiagnostico('.$idDiagnostico.');"
                                >
                                Nueva Imagen
                                </button>
                                </div> '; 
        // echo 'Aqui mostrara las imagenes del diagnostico '; 
        foreach($imagenes as $imagen)
        {
            $raiz123 = dirname(dirname(dirname(__file__)));
            // die($raiz123); 
            $rutaImagen = $raiz123.'/imagenes/imagenesDiagnosticoEbAp/'.$imagen['rutaImagen'];
            echo '<div style="border:1px solid; width:200px; display:inline">'; 
            // echo '<img src="'.$rutaImagen.'" > '; 
            echo '<img src="../imagenes/imagenesDiagnosticoEbAp/'.$imagen['rutaImagen'].'"  width="200px"> '; 
            echo '</div>';
        }
        
    }


    public function formuAgregarImagenDiagnostico()
    {
        // echo 'subir archivo '; 
        ?>
        <div id="div_cargue_archivo">
                <input name="imagen" id="imagen" type="file">
                <br><br><br><br>
                <!-- <button onclick="procesarformu();" >Procesar</button> -->
                <br><br>
                <!-- <button id="btnEnviar">Enviar!!</button> -->
                <!-- </form> -->
                <div id="div_muestre_resultado"></div>
                <span id="demo"></span>
        </div>
        
        <?php

    }

    
    public function verimagenesDiagnosticoCi($imagenes,$idDiagnostico)
    {
        echo '<div class="row"><button 
                                class="btn btn-primary"
                                onclick ="formuAgregarImagenDiagnosticoCi('.$idDiagnostico.');"
                                >
                                Nueva Imagen
                                </button>
                                </div> '; 
                                // data-bs-toggle="modal" 
                                // data-bs-target="#modalSubirArchivo"
        // echo 'Aqui mostrara las imagenes del diagnostico '; 
        foreach($imagenes as $imagen)
        {
            $raiz123 = dirname(dirname(dirname(__file__)));
            // die($raiz123); 
            // $rutaImagen = $raiz123.'/imagenes/imagenesDiagnosticoEbAp/'.$imagen['rutaImagen'];
            $rutaImagen = $raiz123.$imagen['rutaImagen'];
            // echo '<div style="border:1px solid; width:200px; display:inline">'; 
            echo '<br>';
            echo '<div  class="row" >'; 
            // echo '<img src="'.$rutaImagen.'" > '; 
            // echo '<img src="../'.$imagen['rutaImagen']."/".$imagen['nombre'].'"  width="200px"> '; 
            echo '<img src="../'.$imagen['rutaImagen']."/".$imagen['nombre'].'"  width="90%"> '; 
            echo '</div>';
        }
        
    }

    public function formuAgregarImagenDiagnosticoCi($idDiagnostico)
    {
        // echo 'subir archivo '; 
        ?>
            <div id="div_cargue_archivo">
                    <!-- <input name="imagen" id="imagen" type="file">
                    <br><br><br><br>
                    <button onclick="subirFotoDiagnosticoEbAp();" >Subir Foto</button>
                    <br><br>
                    <div id="div_muestre_resultado"></div>
                    <span id="demo"></span> -->
                    <form  enctype="multipart/form-data"/>
                    <input name="archivo" id="archivo" type="file"/>
                    <!-- <input type="submit" name="subir" value="Subir imagen"/> -->
                    </form>
                    <button  
                            class ="btn btn-primary"    
                            onclick="realizarCargaArchivoCi(<?php echo $idDiagnostico; ?>);"
                            >SUBIR IMAGEN </button>
            </div>
        <?php
    }


}