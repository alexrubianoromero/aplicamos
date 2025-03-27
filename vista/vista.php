<?php
$raiz = dirname(dirname(__file__));
// die('vista'.$raiz);
require_once($raiz.'/correo/model/CorreoModel.php');
// require_once($raiz.'/correo/model/CorreoConfigNew.php');

// require_once($raiz.'/diagnosticoEbAp/models/DiagnosticoEbApModel.php'); 



class vista
{
    protected $correo;

    public function __construct()
    {
        $this->correo = new correoModel();
    }

    public function get_table_assoc($datos)
    {
                     $arreglo_assoc='';
                        $i=0;	
                        while($row = mysql_fetch_assoc($datos)){		
                            $arreglo_assoc[$i] = $row;
                            $i++;
                        }
                    return $arreglo_assoc;
    }
public function draw_table($datos)
                {
                
                            echo '<table border = "1" class="table">';
                                $titulos = array_keys($datos[0]);
                                    echo '<tr>';
                                    foreach   ($titulos as $d ) { 
                                        echo "<td>".strtoupper($d)."</TD>"; 
                                    } 
                                    
                                    
                                    echo '</tr>';
                                    foreach   ($datos as $d ) {   
                                        echo '<tr>';
                                        foreach   ($d as $r ) {
                                        echo "<td>$r</TD>";
                                        }
                                        echo '</tr>';		
                                    }
                                    echo '</table>';

                
                }

                public function printR($arreglo)
                {
                    echo '<pre>';
                    print_r($arreglo); 
                    echo '</pre>';
                    die(); 
                }


                public function bodyCorreo($idcliente,$idDiagnostico,$rutaCorreo)
                {
                    // $infoCorreo = $this->correo->prueba();
                    // die('llego  a body correo  despues de info '); 
                    // $ruta = dirname(dirname(__FILE__));
                    // echo '<pre>';
                    // print_r($infoCorreo); 
                    // echo '</pre>';
                    // die(); 
                    $body = '
                            Aplicamos Ingenieria informa atentamente que seha realizado el siguiente diagnostico
                            <br><br>
                            Para descargarlo por favor haga click en el siguiente enlace:  
                            
                            <a style="font-size:30px;" href ="'.$rutaCorreo.$idDiagnostico.'" target="_blank">Ver pdf diagnostico</a>
                            ';
                    return $body;

                }

}

?>