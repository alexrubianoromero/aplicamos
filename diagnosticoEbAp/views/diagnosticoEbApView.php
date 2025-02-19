<?php
$raiz = dirname(dirname(dirname(__file__)));
// require_once($raiz.'/hardware/views/hardwareView.php'); 
require_once($raiz.'/diagnosticoEbAp/models/DiagnosticoEbApModel.php'); 
require_once($raiz.'/diagnosticoEbAp/models/ConceptoTableroEbApModel.php'); 
require_once($raiz.'/clientes/models/ClienteModel.php'); 
require_once($raiz.'/diagnosticoEbAp/models/TableroDiagnosticoEbApModel.php'); 
require_once($raiz.'/movil/model/UsuarioModel.php'); 

class diagnosticoEbApView
{
    protected $model; 
    protected $ClienteModel; 
    protected $conceptoTableroModel;
    protected $tableroDiagnosticoModel;
    protected $usuarioModel;

    public function __construct()
    {
        $this->model = new DiagnosticoEbApModel();
        $this->ClienteModel = new ClienteModel();
        $this->conceptoTableroModel = new ConceptoTableroEbApModel();
        $this->tableroDiagnosticoModel = new TableroDiagnosticoEbApModel();
        $this->usuarioModel = new UsuarioModel();
    }



    public function pantallaDiagnosticoEbAp()
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
            
            <div class="row" id="divPantallaDiagEbAp" style="padding:5px;">
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
                <div class="row mt-3" id="divResultadosDiagEbAp">
                    <?php
                    $this->mostrarDiagnosticos();
                    
                    ?>
            </div>        
        </div>
        <?php    $this->modalSubirArchivo();  ?>    
        <?php    $this->modalUltimoDiagnostico();  ?>    
        <?php    $this->modalEnviarCorreo();  ?>    
        <?php    $this->modalVerImagenesDiagnostico();  ?>    
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
    public function modalVerImagenesDiagnostico(){
        ?>
         <!-- <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal2">
         Launch demo modal
         </button> -->
          <div  class="modal fade " id="modalVerImagenesDiagnostico" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                  <div class="modal-header" id="headerNuevoCliente">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="myModalLabel">Imagenes </h4>
                  </div>
                  <div id="cuerpoModalVerImagenesDiagnostico" class="modal-body">
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

    function mostrarDiagnosticos()
    {
        $diagnosticos = $this->model->traerDiagnosticos();    
        echo '<table class="table">'; 
        echo '<tr>'; 
        echo '<th>No</th>';
        echo '<th>Fecha</th>';
        echo '<th>Cliente</th>';
        echo '<th>Correo</th>';
        echo '<th>Imagenes</th>';
       
        echo '<th>Ver</th>';
        echo '<th>Pdf</th>';
        echo '</tr>';
        foreach($diagnosticos as $diagnostico)
        {
            $infoCLiente = $this->ClienteModel->traerClienteId($diagnostico['idCliente']);             
            echo '<tr>'; 
            echo '<td>'.$diagnostico['id'].'</td>';
            echo '<td>'.$diagnostico['fecha'].'</td>';
            echo '<td>'.$infoCLiente['nombre'].'</td>';
            
            echo '<td><button class="btn btn-warning btn-sm"
            data-toggle="modal"   
            data-target="#modalEnviarCorreo"
            onclick = "enviarCorreoConDiagnostico('.$diagnostico['id'].'); "
            ">Correo</button></td>';
            
            echo '<td><button class="btn btn-success btn-sm"
                    data-toggle="modal"   
                    data-target="#modalVerImagenesDiagnostico"
                    onclick = " verimagenesDiagnosticoEbAp('.$diagnostico['id'].'); "
                    ">Imagenes</button></td>';

            echo '<td><button class ="btn btn-primary btn-sm" onclick ="verDiagnostico('.$diagnostico['id'].')">Ver</button></td>';
            echo '<td><a href="../diagnosticoEbAp/pdf/ordenPdf3.php?idDiagnostico='.$diagnostico['id'].'" target="_blank" >PDF</a></td>';
            echo '</tr>';    
        }
        echo '</table>';
    }


    public function formuNuevoDiagnostico()
    {
         $clientes = $this->ClienteModel->traerClientes(); 
       
        ?>
        <div class="row mt-3"  id="div_principal_diagnosticoEbAp">
            <P>DIAGNOSTICO EQUIPO BOMBEO AGUA POTABLE</P>

            <div class="row">
                <label for="" class="col-lg-3">
                    Razon Social:
                </label>
                <div class="col-lg-9">
                    <select id="idCliente" name="idCliente" style="color:black;" class="form-control" onchange="traerUltimoDiagnosticoCliente();">
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
                <button class ="btn btn-primary" onclick="crearEncabezadoDiagnosticoEbAp();">Continuar</button>
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
    public function mostrarConceptosDiagnosticoEbAp($idDiagnostico)
    {
        $infoDiagnostico = $this->model->traerDiagnosticoId($idDiagnostico); 
        //   echo '<pre>'; 
        //     print_r($infoDiagnostico); 
        //     echo'</pre>';
        //     die(); 
        $infoCLiente = $this->ClienteModel->traerClienteId($infoDiagnostico['idCliente']); 
     ?>   
        
        <?php  $this->mostrarInfoEncabezado($idDiagnostico);  ?>

        <div class="row" style="padding:5px;">
        <div class="row">
            CONVENCIONES: B= BUENO; R= REGULAR; M= MALO; A= AUSENTE; N/A= NO APLICA  
        </div>
            <form id="formularioDiagnostico" name ="formularioDiagnostico">
                <input type="hidden" id="idDiagnostico" name="idDiagnostico" value="<?php echo $idDiagnostico ?>" >

                <?php
                  $this->formuTablerosEbAp();
                  ?>
            </form>
        </div>
        <div class="row">
            <!-- <button type="submit" class="btn btn-primary" onclick="grabarDiagnosticoEbAp();">GRABAR DIAGNOSTICO</button> -->
            <button  class="btn btn-primary" onclick="grabarDiagnosticoEbAp();">GRABAR DIAGNOSTICO</button>
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
        <hr></hr>
        <div class="row mt-3">
            <div class="col-lg-3" align="left">
                <label for="checkVariador">VARIADOR</label>
                <input type="checkbox" id="checkVariador" name ="checkVariador" >
            </div>    
            <div class="col-lg-3" align="left">
                <label for="checkArranque">ARRANQUE DIRECTO:</label>
                <input type="checkbox" id="checkArranque" name="checkArranque" >
            </div>    
            <div class="col-lg-3" align="left">
                <label for="checkEstrella">ESTRELLA TRIANGULO:</label>
                <input type="checkbox" id="checkEstrella" name="checkEstrella" >   
            </div>    
            <div class="col-lg-3" align="left">
            </div>    
        </div>

        <hr></hr>        
        <div class="row mt-3">
            <div class="col-lg-2" align="left">
                <label for="checkHidroflow" >HIDROFLOW:</label>
                <input type="checkbox" id="checkHidroflow" name="checkHidroflow">
            </div>
            <div class="col-lg-2" align="left">
                <label>CAPACIDAD:</label>
                <input type="text" id="capacidad" class="form-control" >
            </div>
            <div class="col-lg-8 form-group" align="left">
                <label>MARCA DE LAS BOMBAS:</label>
                <input type="text" id="marcaBomba" name="marcaBomba" class="form-control" >
            </div>
        </div>   
         
        <div class="row mt-1">    
            <div class="col-lg-1" align="left">
                <label>HP:</label>
                <input type="text" id="hp" name="hp" class="form-control" >
            </div>
            <div class="col-lg-1" align="left">
                <label >FUGAS:</label>
                <div  align="left">
                    <select id="fugas" name="fugas"  class="form-control" >
                        <option value="">...</option>
                        <option value="S">Si</option>
                        <option value="N">No</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-3" align="left">
                <label>MARCA DEL TABLERO:</label>
                <input type="text" id="marcasTableros" name="marcasTableros" class="form-control" >
            </div>
            
            <div class="col-lg-6" align="left">
                <div>
                    <label for="">PRESION DEL TRABAJO</label>
                </div>
            
                <div class="col-lg-3">
                    <label class="col-lg-1">ON</label>
                    <div class="col-lg-8">
                        <input type="text" id="presiondetrabajoOn" name="presiondetrabajoOn" class="form-control" >
                    </div>
                </div>
                <div class="col-lg-3">
                    <label class="col-lg-2">OFF</label>
                    <div class="col-lg-8">
                        <input type="text" id="presiondetrabajoOff" name="presiondetrabajoOff" class="form-control" >
                    </div>
                </div>
            </div>

        </div>      
         <br>       
        <div class="row mt-3">
            <div class="col-lg-3">
                <label for="">MATERIAL TUBERIA</label>
                <input type="text" id="materialTuberia" name="materialTuberia" class="form-control" >

            </div>
        </div>
        <br>
        <div class="row mt-3">
            <textarea id="conceptoTecnico" name="conceptoTecnico" class ="form-control" rows="5" placeholder = "   CONCEPTO TECNICO AGUA POTABLE "></textarea>
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
            data-toggle="modal"   
            data-target="#modalVerImagenesDiagnostico"
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

    public function mostrarUltimoDiagnosticoCliente($diagnostico)
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
                                onclick ="formuAgregarImagenDiagnostico('.$idDiagnostico.');"
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


    public function formuAgregarImagenDiagnostico($idDiagnostico)
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
                            onclick="realizarCargaArchivo(<?php echo $idDiagnostico; ?>);"
                            >SUBIR IMAGEN </button>
            </div>
        <?php
    }

}