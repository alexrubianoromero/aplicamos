<?php
$raiz = dirname(dirname(dirname(__file__)));

require_once($raiz.'/conexion/Conexion.php');

class TableroEbApModel extends Conexion
{

    public function traerTablerosEbAp()
    {
        $sql = "select * from tablerosEbAp ";
        $consulta = mysql_query($sql,$this->connectMysql());
        $tableros = $this->get_table_assoc($consulta);
        return $tableros;   
    }

}