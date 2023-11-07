<?php
$raiz = dirname(dirname(dirname(__file__)));

require_once($raiz.'/conexion/Conexion.php');

class AlertaModel extends Conexion
{
    public function traerAlertas()
    {
        $sql = "select * from alertas ";
        $consulta = mysql_query($sql,$this->connectMysql());
        $alertas = $this->get_table_assoc($consulta);
        return $alertas;   
    }
    
    public function traerAlertasIdCliente($id)
    {
        $sql = "select * from alertas where idCliente = '".$id."'  ";
        $consulta = mysql_query($sql,$this->connectMysql());
        $alertas = $this->get_table_assoc($consulta);
        return $alertas;   
    }
    

}