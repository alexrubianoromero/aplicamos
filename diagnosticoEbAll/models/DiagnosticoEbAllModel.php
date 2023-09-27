<?php
$raiz = dirname(dirname(dirname(__file__)));

require_once($raiz.'/conexion/Conexion.php');

class DiagnosticoEbAllModel extends Conexion
{
    public function traerDiagnosticosEbAll()
    {
        $sql = "select * from diagnosticoEbAll  where anulado = 0" ;
        $consulta = mysql_query($sql,$this->connectMysql()); 
        $diagnosticos = $this->get_table_assoc($consulta);
        return $diagnosticos; 
    }
}