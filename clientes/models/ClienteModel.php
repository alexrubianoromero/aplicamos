<?php

$raiz = dirname(dirname(dirname(__file__)));
// die($raiz); 
require_once($raiz.'/conexion/Conexion.php');

class ClienteModel extends Conexion
{

    public function traerClientes()
    {
        $sql = "select * from cliente0  ";
        $consulta = mysql_query($sql,$this->connectMysql());
        $clientes = $this->get_table_assoc($consulta);
        return $clientes;   
    }

}