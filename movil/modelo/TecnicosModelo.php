<?php
$raiz = dirname(dirname(dirname(__file__)));
require_once($raiz.'/conexion/Conexion.php');

class TecnicosModelo extends Conexion
{
    public function __construct(){

    }

    public function traerTecnicos($conexion = ''){
        $sql = "SELECT * FROM tecnicos "; 
        // echo '<br>'.$sql;
        // die();
        $consulta = mysql_query($sql,$this->connectMysql());
        return $consulta;  
    }
    public function traerTecnicosNew()
    {
        $sql = "select * from tecnicos "; 
        $consulta = mysql_query($sql,$this->connectMysql());
        $arregloTecnicos = $this->get_table_assoc($consulta);
        return $arregloTecnicos;  
    }
    public function traerTecnicoPorId($id)
    {
        $sql = "select * from tecnicos where idcliente = '".$id."'  "; 
        $consulta = mysql_query($sql,$this->connectMysql());
        $arregloTecnicos = mysql_fetch_assoc($consulta);
        return $arregloTecnicos;  

    }

}







?>