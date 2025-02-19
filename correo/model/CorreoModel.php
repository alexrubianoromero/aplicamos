<?php

$raiz = dirname(dirname(dirname(__file__)));
require_once($raiz.'/conexion/Conexion.php');

class correoModel extends Conexion
{
    function traerInfoConfigCorreo()
    {
        // die ('buenas 123'); 
        $sql ="select * from correoConfig";
        $consulta = mysql_query($sql,$this->connectMysql());
        $arreglo = mysql_fetch_assoc($consulta);
        return $arreglo;
    }
}


?>