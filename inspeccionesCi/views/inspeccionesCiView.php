<?php
$raiz = dirname(dirname(dirname(__file__)));
// require_once($raiz.'/hardware/views/hardwareView.php'); 
// require_once($raiz.'/diagnosticoEbAp/models/DiagnosticoEbApModel.php'); 
// require_once($raiz.'/diagnosticoEbAp/models/ConceptoTableroEbApModel.php'); 
require_once($raiz.'/clientes/models/ClienteModel.php'); 
require_once($raiz.'/movil/model/UsuarioModel.php'); 
require_once($raiz.'/inspeccionesCi/models/InspeccionCiModel.php'); 
require_once($raiz.'/vista/vista.php'); 

class inspeccionesCiView extends vista
{
    protected $model; 
    protected $ClienteModel; 
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
            FORMATO INSPECCION RED CONTRA INCENDIOS
            <div class="row" id="divPantallaDiagEbAp" style="padding:5px;">
                <div id="botonesDiagEbAp">
                    <div class="row">
                        <div class="col-lg-3 ofset-3">
                            <button class="btn btn-primary" onclick="formuNuevaInspeccionCi();">Nuevo Formato Inspeccion </button>  
                        </div>
                        <div class="col-lg-3 ofset-3">
                            <button class="btn btn-primary" onclick="mostrarFormatosCi();">Mostrar Formatos de Inspeccion </button>  
                        </div>
                        
                    </div>
                </div>
                <div class="row mt-3" id="divResultadosDiagEbAp">
                    <?php
                    $this->mostrarDiagnosticos();
                    
                    ?>
            </div>        
        </div>
        <?php    $this->modalSubirArchivo();  ?>    
        <?php    $this->modalUltimoDiagnostico();  ?>    
        <?php    $this->modalEnviarCorreo();  ?>    
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

    // function mostrarDiagnosticos()
    // {
    //     $diagnosticos = $this->model->traerDiagnosticos();    
    //     echo '<table class="table">'; 
    //     echo '<tr>'; 
    //     echo '<th>No</th>';
    //     echo '<th>Fecha</th>';
    //     echo '<th>Cliente</th>';
    //     echo '<th>Correo</th>';
       
    //     echo '<th>Ver</th>';
    //     echo '<th>Pdf</th>';
    //     echo '</tr>';
    //     foreach($diagnosticos as $diagnostico)
    //     {
    //         $infoCLiente = $this->ClienteModel->traerClienteId($diagnostico['idCliente']);             
    //         echo '<tr>'; 
    //         echo '<td>'.$diagnostico['id'].'</td>';
    //         echo '<td>'.$diagnostico['fecha'].'</td>';
    //         echo '<td>'.$infoCLiente['nombre'].'</td>';
    //         echo '<th><button class="btn btn-warning btn-sm"
    //                 data-toggle="modal"   
    //                 data-target="#modalEnviarCorreo"
    //                 onclick = "enviarCorreoConDiagnostico('.$diagnostico['id'].'); "
    //                 ">Correo</button></th>';
    //         echo '<td><button class ="btn btn-primary btn-sm" onclick ="verDiagnostico('.$diagnostico['id'].')">Ver</button></td>';
    //         echo '<td><a href="../diagnosticoEbAp/pdf/ordenPdf3.php?idDiagnostico='.$diagnostico['id'].'" target="_blank" >PDF</a></td>';
    //         echo '</tr>';    
    //     }
    //     echo '</table>';
    // }


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
        // $this->printR($infoDiagnostico);
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
        </div class="row">
            <!-- <form id="formularioDiagnostico" name ="formularioDiagnostico">
                <input type="hidden" id="idDiagnostico" name="idDiagnostico" value="<?php echo $idDiagnostico ?>" >

            </form> -->
            <div class="col-lg-5" style="border:1px solid black;">
                <?php
                  $this->formuInformacionBombaLider();
                  ?>
            </div>
            <div class="col-lg-offset-1 col-lg-5" style="border:1px solid black;">
                <?php
                  $this->formuInformacionBombaJockey();
                  ?>
            </div>
        </div>
        <div class="row">
            <!-- <button type="submit" class="btn btn-primary" onclick="grabarDiagnosticoEbAp();">GRABAR DIAGNOSTICO</button> -->
            <button  class="btn btn-primary" onclick="grabarDiagnosticoEbAp();">GRABAR DIAGNOSTICO</button>
        </div>
     <?php               
    }

    public function formuInformacionBombaLider()
    {
     ?>
     <div >
        <div><H3>INFORMACION BOMBA LIDER</H3></div>
        <div class="row">
            <label for="" class="col-lg-8">Se encuentra operativa en automatico</label>
            <div class="col-lg-4">
                <select name="" id="operativaAutomatico" class="form-control">
                    <option value="">Seleccione...</option>
                    <option value="SI">SI</option>
                    <option value="NO">NO</option>
                    
                </select>
            </div>
        </div>
        <div class="col-lg-4">
            <!-- <label for="" >Equipo Listado</label> -->
            <input type="text" class="form-control" placeholder = "EQUIPO LISTADO">
        </div>
        <div class="col-lg-4">
            <!-- <label for="" >Modelo</label> -->
            <input type="text"  class="form-control" placeholder = "MODELO">
        </div>
        <div class="col-lg-4">
            <!-- <label for="" >Marca de la bomba</label> -->
            <input type="text"  class="form-control"placeholder = "MARCA BOMBA">
        </div>
        <div class="col-lg-5">
            <label for="" >Potencia(HP)</label>
            <input type="text"  class="form-control">
        </div>
        <div class="col-lg-5">
            <label for="" >Transferencia</label>
            <input type="text"  class="form-control">
        </div>
        <div class="col-lg-5">
            <label for="" >Ubicacion</label>
            <input type="text"  class="form-control">
        </div>
        <div class="col-lg-5">
            <label for="" >Tipo de Bomba</label>
            <select name="" id="tipoBomba" class="form-control">
                    <option value="">Seleccione...</option>
                    <option value="Vertical">Vertical</option>
                    <option value="Horizontal">Horizontal</option>
                    <option value="Eje Libre">Eje Libre</option>
                    <option value="Carcaza Partida">Carcaza Partida</option>
                    
                </select>
        </div>
        <div class="col-lg-5">
            <label for="" >Tipo de Succion(+-)</label>
            <input type="text"  class="form-control">
        </div>
        <div class="col-lg-5">
            <label for="" >Q MAX(GPM)</label>
            <input type="text"  class="form-control">
        </div>
        <div class="col-lg-5">
            <label for="" >PRESION MAX(PSI)</label>
            <input type="text"  class="form-control">
        </div>
        <div class="col-lg-5">
            <label for="" >Q NOMINAL (GPM)</label>
            <input type="text"  class="form-control">
        </div>
        <div class="col-lg-5">
            <label for="" >PRESION AL 150%(PSI)</label>
            <input type="text"  class="form-control">
        </div>
        <div class="col-lg-5">
            <label for="" >DIAMETRO DE SUCCION</label>
            <input type="text"  class="form-control">
        </div>
        <div class="col-lg-5">
            <label for="" >DIAMETRO DE DESCARGA</label>
            <input type="text"  class="form-control">
        </div>
        <div class="col-lg-5">
            <label for="" >MATERIAL DE LA TUBERIA</label>
            <input type="text"  class="form-control">
        </div>
        <div class="col-lg-5">
            <label for="" >FUGAS</label>
            <input type="text"  class="form-control">
        </div>
        <div class="col-lg-5">
            <label for="" >CABEZAL DE PRUEBAS</label>
            <select name="" id="tipoCabezal" class="form-control">
                    <option value="">Seleccione...</option>
                    <option value="BUENO">BUENO</option>
                    <option value="REGULAR">REGULAR</option>
                    <option value="MALO">MALO</option>
                </select>
        </div>
        <div class="col-lg-5">
            <label for="" >MANOMETRO</label>
            <input type="text"  class="form-control">
        </div>
    
        <div class="col-lg-5">
            <label for="" >SELLO MECANICO / P.ESTOPA</label>
            <select name="" id="selloMecanico" class="form-control">
                    <option value="">Seleccione...</option>
                    <option value="BUENO">BUENO</option>
                    <option value="REGULAR">REGULAR</option>
                    <option value="MALO">MALO</option>
                </select>
        </div>
        <div class="col-lg-5">
            <label for="" >MANOVACUOMETRO</label>
            <input type="text"  class="form-control">
        </div>
        <div class="col-lg-5">
            <label for="" >RODAMIENTOS DE MOTOR</label>
            <input type="text"  class="form-control">
        </div>
        <div class="col-lg-5">
            <label for="" >EMPAQUETADURA</label>
            <input type="text"  class="form-control">
        </div>
        <div class="col-lg-5">
            <label for="" >VALVULAS DE CORTE </label>
            <input type="text"  class="form-control">
        </div>
        <div class="col-lg-5">
            <label for="" >CAUDALIMETRO</label>
            <input type="text"  class="form-control">
        </div>
        <div class="col-lg-5">
            <label for="" >VALVULA DE ALIVIO</label>
            <input type="text"  class="form-control">
        </div>
        <div class="col-lg-5">
            <label for="" >RETORNO A TANQUE</label>
            <input type="text"  class="form-control">
        </div>
    
     </div>
     <?php
    }
    public function formuInformacionBombaJockey()
    {
     ?>
     <div >
        <div><h3>INFORMACION BOMBA JOCKEY</h3></div>
        <div class="row">
            <label for="" class="col-lg-8">Se encuentra operativa en automatico</label>
            <div class="col-lg-4">
                <select name="" id="operativaAutomatico">
                    <option value="">Seleccione...</option>
                    <option value="SI">SI</option>
                    <option value="NO">NO</option>
    
                </select>
            </div>
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

}