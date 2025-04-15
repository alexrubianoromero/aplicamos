<?php
$raiz = dirname(dirname(dirname(__file__)));
// require_once($raiz.'/hardware/views/hardwareView.php'); 
require_once($raiz.'/diagnosticoEbAll/models/DiagnosticoEbAllModel.php'); 
require_once($raiz.'/diagnosticoEbAll/models/ConceptoTableroEbAllModel.php'); 
require_once($raiz.'/clientes/models/ClienteModel.php'); 
require_once($raiz.'/diagnosticoEbAll/models/TableroDiagnosticoEbAllModel.php'); 
require_once($raiz.'/movil/model/UsuarioModel.php'); 
require_once($raiz.'/diagnosticoEbAll/models/ImagenDiagnosticoEbAllModel.php'); 

class diagnosticoEbAllView
{
    protected $model; 
    protected $ClienteModel; 
    protected $conceptoTableroModel;
    protected $tableroDiagnosticoModel;
    protected $usuarioModel;
    protected $imagenDiagnosticoModel;

    public function __construct()
    {
        $this->model = new DiagnosticoEbAllModel();
        $this->ClienteModel = new ClienteModel();
        $this->conceptoTableroModel = new ConceptoTableroEbAllModel();
        $this->tableroDiagnosticoModel = new TableroDiagnosticoEbAllModel();
        $this->usuarioModel = new UsuarioModel();
        $this->imagenDiagnosticoModel = new ImagenDiagnosticoEbAllModel();
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
                    <STRONG>EB AGUAS LLUVIAS</STRONG>
                </div>
            </div>
            <div class="row mt-3" id="divResultadosDiagEbAll">
                <?php
                     $this->mostrarDiagnosticos();
                ?>
            </div>
            <?php    $this->modalVerImagenesDiagnosticoCi();  ?>    
            <?php    $this->modalEnviarCorreo();  ?>    
            <?php    $this->modalVerImagenesDiagnostico();  ?>    

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
                  <div id="cuerpoModalVerImagenesDiagnosticoAll" class="modal-body">
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
            onclick = "enviarCorreoConDiagnosticoEbAll('.$diagnostico['id'].'); "
            ">Correo</button></td>';

            echo '<td><button class="btn btn-success btn-sm"
            data-toggle="modal"   
            data-target="#modalVerImagenesDiagnosticoCi"
            onclick = " verimagenesDiagnosticoEbAll('.$diagnostico['id'].'); "
            ">Imagenes</button></td>';


            echo '<td><button class ="btn btn-primary" onclick ="verDiagnosticoEbAll('.$diagnostico['id'].')">Ver</button></td>';
            echo '<td><a href="../diagnosticoEbAll/pdf/ordenPdf3.php?id='.$diagnostico['id'].'" target="_blank" >PDF</a></td>';
            echo '</tr>';    
        }
        echo '</table>';
    }

    
    public function formuNuevoDiagnostico()
    {
         $clientes = $this->ClienteModel->traerClientes(); 
         $usuarios = $this->usuarioModel->traerUsuarios();
       
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
            <div class="row mt-3">
                <label for="" class="col-lg-3">
                    Tecnico :
                </label>
                <div class="col-lg-9">
                    <select id="idUsuario" name="idUsuario" style="color:black;" class="form-control" onchange="traerUltimoDiagnosticoCliente();">
                        <option value= "">Sleccione...</option>
                        <?php
                        foreach($usuarios as $usuario)
                        {
                            echo '<option value="'.$usuario['id_usuario'].'" >'.$usuario['login'].'</option>';
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
                    if($infoDiagnostico['numeroTableros']==0){$this->formuTablerosEbAll();}
                    else { $this->formuTablerosEbAll($idDiagnostico);}
                  ?>
                </form>
            </div>
            <div class="row">
                <!-- <button type="submit" class="btn btn-primary" onclick="grabarDiagnosticoEbAp();">GRABAR DIAGNOSTICO</button> -->
                <button  class="btn btn-primary" onclick="grabarDiagnosticoEbAll();">GRABAR DIAGNOSTICO</button>
            </div>
        <?php               
    }

    public function formuTablerosEbAll($idDiagnostico=0)
    {
        if($idDiagnostico>0){
            $infoDiagnostico = $this->model->traerDiagnosticoId($idDiagnostico);
            // echo '<pre>'; 
            //  print_r($infoDiagnostico); 
            //  echo'</pre>';
            //  die();
        }
        $conceptos = $this->conceptoTableroModel->traerTablerosEbAll()
        ?>
        <div class="row" style="color:black;" >

                <table class="table table-striped">
                <?php
                foreach($conceptos as $concepto)
                {
                    echo '<tr>'; 
                    echo '<td>'.$concepto['descripcion'].'</td>';
                    echo '<td>';
                    if($concepto['campoValor']==1)
                    {
                        echo '<input type="text" id="concepto'.$concepto['id'].'"  class="form-control" placeholder="campovalor ">  ';
                    }
                    else
                    {
                    echo '<select id="concepto'.$concepto['id'].'" name="concepto'.$concepto['id'].'" class="form-control">
                                    <option value ="">Seleccione...</option>
                                    <option value ="B">Bueno</option>
                                    <option value ="R">Regular</option>
                                    <option value ="M">Malo</option>
                                    <option value ="A">Ausente</option>
                                    <option value ="NA">No Aplica</option>
                                    </select>';
                    }              
                    echo '</td>';
                    echo '</tr>';  
                }
                ?>
                </table>
        </div>    
                

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
                    <!-- aqui deberia colocar lo que falta si es el caso   -->
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

    public function verimagenesDiagnosticoEbAll($imagenes,$idDiagnostico)
    {
        echo '<div class="row"><button 
                                class="btn btn-primary"
                                onclick ="formuAgregarImagenDiagnosticoEbAll('.$idDiagnostico.');"
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
            echo '<div>'.$imagen['observaciones'].'</div>';
            echo '<div><button 
                        onclick="formuModificarObservaImagenEbAll('.$imagen['id'].');" 
                        class="btn btn-primary">Modificar Observaciones
                        </button>
                </div>';

            echo '</div>';
        }
        
    }


    public function formuAgregarImagenDiagnosticoEbAll($idDiagnostico)
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
                       
                    <textarea class="form-control" id="observacionesDeLaImagen" placeholder="Observaciones Imagen " ></textarea>
                    <br>
                    <form  enctype="multipart/form-data"/>
                    <input name="archivo" id="archivo" type="file"/>
                    <!-- <input type="submit" name="subir" value="Subir imagen"/> -->
                    </form>
                    <button  
                            class ="btn btn-primary"    
                            onclick="realizarCargaArchivoEbAll(<?php echo $idDiagnostico; ?>);"
                            >SUBIR IMAGEN </button>
            </div>
        <?php
    }

    function formuModificarObservaImagen($id)
    {
        $infoImagen=  $this->imagenDiagnosticoModel->traerInfoImagenId($id);
        ?>
        <div>
            <input type="hidden" id="idImagen" value="<?php   echo $id  ?>">

                <label></label>
                <input class="form-control" type="text" id="observacionesImagen" value = "<?php   echo $infoImagen['observaciones'] ?>">

            </div>
            <div><button class="btn btn-primary" onclick="modificarObservacionesImagenEbAll(<?php echo $id; ?>);">Modificar</button></div>
        <?php
    }

}