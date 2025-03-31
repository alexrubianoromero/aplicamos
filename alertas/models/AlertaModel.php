<?php
$raiz = dirname(dirname(dirname(__file__)));

require_once($raiz.'/conexion/Conexion.php');

class AlertaModel extends Conexion
{
    public function traerAlertas()
    {
        $sql = "select * from alertas order by fechaDeAlerta desc";
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
    
    public function grabarNuevaAlerta($request)
    {
        $sql = "insert into alertas(idCliente,fechaDeAlerta,descripcion)  
        values ('".$request['idCliente']."','".$request['fecha']."','".$request['descripcion']."')";
        $consulta = mysql_query($sql,$this->connectMysql());
    }

    public function traerAlertasPorDia($fecha)
    {
        $sql = "select * from alertas where fechaDeAlerta	 = '".$fecha."'  ";
        $consulta = mysql_query($sql,$this->connectMysql());
        $alertas = $this->get_table_assoc($consulta);
        return $alertas;   
    }
    

}