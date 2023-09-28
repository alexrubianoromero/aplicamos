<?php
$raiz = dirname(dirname(dirname(__file__)));

require_once($raiz.'/conexion/Conexion.php');

class DiagnosticoEbAPModel extends Conexion
{
    public function traerDiagnosticos()
    {
        $sql = "select * from diagnosticoEbAp  where anulado = 0 order by id desc" ;
        $consulta = mysql_query($sql,$this->connectMysql()); 
        $diagnosticos = $this->get_table_assoc($consulta);
        return $diagnosticos; 
    }
    public function traerDiagnosticoId($idDiagnostico)
    {
        $sql = "select * from diagnosticoEbAp  where anulado = 0 and id ='".$idDiagnostico."'   " ;
        // die($sql); 
        $consulta = mysql_query($sql,$this->connectMysql()); 
        $diagnostico = mysql_fetch_assoc($consulta);
        return $diagnostico; 
    }
    
    public function crearEncabezadoDiagnosticoEbAp($request,$id_usuario)
    {
        $sql = "insert into diagnosticoEbAp (idCliente,idUsuarioCreacion)    
        values ('".$request['idCliente']."','".$id_usuario."') ";
        $consulta = mysql_query($sql,$this->connectMysql()); 
        $ultimoId = $this->traerUltimoIdDiagnosticoEbAp();
        return $ultimoId; 

    }
    
    public function traerUltimoIdDiagnosticoEbAp()
    {
        $sql = "select max(id) as maximo from diagnosticoEbAp";
        $consulta = mysql_query($sql,$this->connectMysql()); 
        $arrMax = mysql_fetch_assoc($consulta);
        return $arrMax['maximo'];  
    }
    
    public function actualizarNumeroTablero($idDiagnostico,$numero)
    {
        $sql = "update diagnosticoEbAp set numeroTableros  =  '".$numero."'  where id='".$idDiagnostico."'    ";
        $consulta = mysql_query($sql,$this->connectMysql()); 
    }
    
    public function actualizarInfoEnDiagnostico($request)
    {
        $sql ="update  diagnosticoEbAp  set conceptoTecnico = '".$request['conceptoTecnico']."'   
        where  id = '".$request['idDiagnostico']."' ";
        $consulta = mysql_query($sql,$this->connectMysql()); 
    }

}