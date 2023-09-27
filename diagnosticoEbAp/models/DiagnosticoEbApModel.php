<?php
$raiz = dirname(dirname(dirname(__file__)));

require_once($raiz.'/conexion/Conexion.php');

class DiagnosticoEbAPModel extends Conexion
{
    public function traerDiagnosticos()
    {
        $sql = "select * from diagnosticoEbAp  where anulado = 0" ;
        $consulta = mysql_query($sql,$this->connectMysql()); 
        $diagnosticos = $this->get_table_assoc($consulta);
        return $diagnosticos; 
    }
}