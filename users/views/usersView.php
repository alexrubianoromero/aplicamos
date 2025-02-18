<?php
$raiz = dirname(dirname(dirname(__file__)));
 require_once($raiz.'/vista/vista.php');  
 require_once($raiz.'/sucursales/models/SucursalModel.php');  
 require_once($raiz.'/perfiles/models/PerfilModel.php');  


class usersView 
{
    private $sucursalModel; 
    private $perfilModel; 

    public function __construct()
    {
        $this->sucursalModel = new SucursalModel();
        $this->perfilModel = new PerfilModel();
    }

    public function usersMenu($users)
    {

        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
        </head>
        <body>
            
      
        <div class="row" style="padding:10px;" id="div_principal_usuarios321">

            <!-- <h3 align="right">Usuarios</h3> -->
            <div id="botones">
                <!-- Button trigger modal -->
                <button type="button" 
                    data-toggle="modal" 
                    data-target="#modalUsuario"
                    class="btn btn-primary" 
                    onclick="pedirInfoUsuario();"
                    >
                    Crear Usuario
                </button>
            </div>
            <div id="resultados">
                <table class="table table-striped hover-hover mt-3">
                    <thead>
                        <th>Nombre</th>
                        <th>Usuario</th>
                        <th>Perfil</th>
                        <!-- <th>Sucursal</th> -->
                    </thead>
                    <tbody>
                        
                        <?php
                      foreach($users as $user)
                      {
                        $infoSucursal = $this->sucursalModel->traerSucursalId($user['idSucursal']); 
                        $infoPerfil = $this->perfilModel->traerPerfilId($user['id_perfil']); 
                          echo '<tr>'; 
                          echo '<td>'.$user['nombre'].' '.$user['apellido']. '</td>';
                          echo '<td>'.$user['login'].'</td>';
                          echo '<td>'.$infoPerfil['nombre_perfil'].'</td>';
                        //   echo '<td>'.$infoSucursal['nombre'].'</td>';
                          echo '</tr>';  
                        }
                        ?>
                    </tbody>
                </table> 
            </div>
            
            
            <?php  $this->modalUsuario();  ?>
            
            
        </div>

        </body>
        <script src="../js/users.js"></script>
        </html>
        <?php
    }



    public function modalUsuario(){
        ?>
         <!-- <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal2">
         Launch demo modal
         </button> -->
          <div style="color:black;" class="modal fade " id="modalUsuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                  <div class="modal-header" id="headerNuevoCliente">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="myModalLabel">Cambio de Clave </h4>
                  </div>
                  <div id="modalBodyUsuario" class="modal-body">
                  </div>
                  <div class="modal-footer" id="footerNuevoCliente">
                    <button onclick="pantallaUsuarios();" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button onclick ="crearUsuario();" type="button" class="btn btn-primary">Crear Usuario</button>
                  </div>
                  </div>
              </div>
          </div>
        <?php
    }
    
    public function pedirInfoUsuario()
    {
        ?>
        <div class="row">
                <div class="col-md-6">
                    <label for="">Usuario:</label>
                      <input class ="form-control" type="text" id="nombreUsuario">          
                </div>
                <!-- <div class="col-md-6">
                    <label for="">Apellido:</label>
                      <input class ="form-control" type="text" id="apellidoUsuario">          
                </div> -->
       
                <div class="col-md-6">
                    <label for="">Password:</label>
                      <input class ="form-control" type="text" id="password">          
                </div>
                <!-- <div class="col-md-6">
                    <label for="">email:</label>
                      <input class ="form-control" type="text" id="email">          
                </div> -->
    
             
                <div class="col-md-6">
                <label for="">Perfil:</label>
                    <select id="idPerfil" class ="form-control">
                        <option value ="">Seleccione Perfil</option>
                        <?php
                            $perfiles = $this->perfilModel->traerPerfiles();
                            foreach($perfiles as $perfil)
                            {
                                echo '<option value ="'.$perfil['id_perfil'].'" >'.$perfil['nombre_perfil'].'</option>';
                            }
                        ?>

                    </select>   
                    
                </div>
        </div>

        <?php
    }


    public function cambiarClave()
    {
        // echo 'cambiar clave.. '; 
        ?>
        <div class="row " >
            <div class="col-lg-3 offset-lg-3" id="div_cambiarClave">
                <h3 class="text-center">CAMBIO DE CLAVE</h3>
                <div id="div_respuestas_cambioClave" style="color:blue;font-size:25px;">
                </div>
                <label>Digite clave Anterior</label>
                <div>
                    <input class="form-control" type="text" id="claveAnterior"  >
                </div>
                <label>Digite nueva clave</label>
                <div>
                    <input class="form-control"  type="text" id="nuevaClave"  >
                </div>
                <div class="mt-3">
                    <button class="btn btn-primary btn-block" onclick = "realizarCambiarClaveUsuario();" >Cambiar Clave</button>
                </div>
            </div>
        </div>

        <?php
    }

}

?>