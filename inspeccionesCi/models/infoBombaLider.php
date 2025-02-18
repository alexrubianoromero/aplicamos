<?php
$raiz = dirname(dirname(dirname(__file__)));

require_once($raiz.'/conexion/Conexion.php');

class InspeccionCiModel extends Conexion
{


    function traerInfoBombaLiderId($idBombaLider)
    {
            $sql = "select * from infoBombaLider  where id = '".$idBombaLider."' " ;
            $consulta = mysql_query($sql,$this->connectMysql()); 
            $inspecciones = mysql_fetch_assoc($consulta);
            return $inspeccion; 
    }


}


?>