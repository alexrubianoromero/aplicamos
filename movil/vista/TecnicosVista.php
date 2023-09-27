<?php
$raiz = dirname(dirname(dirname(__file__)));
require_once($raiz.'/vista/vista.php');
class TecnicosVista extends vista 
{


    public function pantallaprincipalTecnicos($tecnicos = [])
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
            <div> 
                <div>

                </div>
                <div>
                   <table class="table">
                    <thead>
                        <tr>
                            <td>Cedula</td>
                            <td>Nombre</td>
                            <td>Telefono</td>
                            <td>%</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($tecnicos as $tecnico)
                            {
                                echo '<tr>';
                                echo '<td><button 
                                    class = "btn btn-primary"
                                    data-toggle="modal" data-target="#myModalTecnicos"
                                    onclick = "editarTecnico('.$tecnico['idcliente'].')"; 
                                >';
                                echo $tecnico['identi'];
                                echo '</button></td>';
                                echo '<td>'.$tecnico['nombre'].'</td>';
                                echo '<td>'.$tecnico['telefono'].'</td>';
                                echo '<td>'.$tecnico['porcentaje_nomina'].'</td>';
                                echo '</tr>';
                            }

                         ?>   
                    </tbody>
                   </table>
                </div>
            </div>
            <?php  $this->modalTecnicos();  ?>
        </body>
        </html>
        <?php
    }

    
    public function modalTecnicos ()
    {
        ?>
         <!-- <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal2">
         Launch demo modal
         </button> -->
          <div  class="modal fade " id="myModalTecnicos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                  <div class="modal-header" id="headerNuevoCliente">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="myModalLabel">Consultar</h4>
                  </div>
                  <div id="cuerpoModalTecnicos" class="modal-body" style="color:black;">
                      
                      
                  </div>
                  <div class="modal-footer" id="footerNuevoCliente">
                      <button type="button" class="btn btn-default" data-dismiss="modal" onclick="verTalleres();">Cerrar</button>
                      <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                  </div>
                  </div>
              </div>
          </div>
        <?php
    }

    public function mostrarTecnicos($arregloTecnicos){
        $arreglo = '';
        $i=0;
        echo '<select id="">';
            while($tecnicos = mysql_fetch_assoc($arregloTecnicos))
            {
                //  $arreglo[$i]['idcliente'] =   $tecnicos['idcliente']; 
                //  $arreglo[$i]['nombre'] =   $tecnicos['nombre']; 
                echo '<option value = "'.$tecnicos['idcliente'].'"  >'.$tecnicos['nombre'].'</option>';
            }
            echo '</select>';
            // echo '<pre>';
            // print_r();
            // echo '</pre>';
    }

    public function pantallaDatosTecnico($tecnico)
    {
        echo $tecnico['nombre'];
    }

}





?>