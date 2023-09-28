<?php
$raiz = dirname(dirname(dirname(__file__)));

require_once($raiz.'/conexion/Conexion.php');

class ConceptoTableroEbAllModel extends Conexion
{
    public function traerTablerosEbAp()
    {
        $sql = "select * from conceptosTablerosEbAll ";
        $consulta = mysql_query($sql,$this->connectMysql());
        $tableros = $this->get_table_assoc($consulta);
        return $tableros;   
    }
    
    public function traerConteoConceptosTablero()
    {
        $sql = "select count(*) as numero from conceptosTablerosEbAll where activo = 1   "; 
        $consulta = mysql_query($sql,$this->connectMysql());
        $arrNum = mysql_fetch_assoc($consulta);
        return $arrNum['numero'];  
    }
    
    public function traerConceptoTablerosEbApId($id)
    {
        $sql = "select * from conceptosTablerosEbAll  where id= '".$id."'    ";
        $consulta = mysql_query($sql,$this->connectMysql());
        $concepto = mysql_fetch_assoc($consulta);
        return $concepto;   
    }

}