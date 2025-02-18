<?php
$raiz = dirname(dirname(dirname(__file__)));

require_once($raiz.'/conexion/Conexion.php');

class InspeccionCiModel extends Conexion
{
    public function traerInspecciones()
    {
        $sql = "select * from inspeccionesCi  where anulado = 0 order by id desc" ;
        // die($sql);
        $consulta = mysql_query($sql,$this->connectMysql()); 
        $inspecciones = $this->get_table_assoc($consulta);
        return $inspecciones; 
    }
    public function traerUltimoFormatoInspeccionCliente($idCliente)
    {
        $sql = "select * from inspecccionesCi  where anulado = 0  and idCliente = '".$idCliente."' order by id desc limit 1" ;
        $consulta = mysql_query($sql,$this->connectMysql()); 
        $formato = mysql_fetch_assoc($consulta);
        return $formato; 
    }
    // public function filtrarDiagnosticosEbApPorFecha($request)
    // {
    //     $sql = "select * from diagnosticoEbAp  d
    //             where d.anulado = 0 
    //             and d.idCliente = '".$request['idCliente']."'
    //             and d.fecha >= '".$request['fechain']."'
    //             and d.fecha <= '".$request['fechafin']."'
    //             order by d.id desc" ;
    //             // die($sql);
    //     $consulta = mysql_query($sql,$this->connectMysql()); 
    //     $diagnosticos = $this->get_table_assoc($consulta);
    //     return $diagnosticos; 
    // }
    public function traerFormatoInspeccionId($idDiagnostico)
    {
        $sql = "select * from inspeccionesCi  where anulado = 0 and id ='".$idDiagnostico."'   " ;
        // die($sql); 
        $consulta = mysql_query($sql,$this->connectMysql()); 
        $diagnostico = mysql_fetch_assoc($consulta);
        return $diagnostico; 
    }
    
    public function crearEncabezadoInspeccionIncencio($request,$id_usuario)
    {
        $sql = "insert into inspeccionesCi (idCliente,idUsuarioCreacion,idAtendioVisita)    
        values ('".$request['idCliente']."','".$id_usuario."','".$id_usuario."') ";
        // die($sql); 
        $consulta = mysql_query($sql,$this->connectMysql()); 
        $ultimoId = $this->traerUltimoIdFormatoDiagnostico();
        return $ultimoId; 

    }
    
    public function traerUltimoIdFormatoDiagnostico()
    {
        $sql = "select max(id) as maximo from inspeccionesCi";
        $consulta = mysql_query($sql,$this->connectMysql()); 
        $arrMax = mysql_fetch_assoc($consulta);
        return $arrMax['maximo'];  
    }

    public function asignarIdBombaLiderAInspeccion($idInspeccion,$idBombaLider)
    {
        $sql ="update inspeccionesCi set idInfoBombaLider = '".$idBombaLider."'  where id='".$idInspeccion."'  ";
        $consulta = mysql_query($sql,$this->connectMysql()); 
    }
    public function asignarIdBombaJockeyAInspeccion($idInspeccion,$idBombaJcokey)
    {
        $sql ="update inspeccionesCi set idInfoBombaJcokey = '".$idBombaJcokey."'  where id='".$idInspeccion."'  ";
        $consulta = mysql_query($sql,$this->connectMysql()); 
    }
    
    function actualizarNumeroImagenesDiagCi($idDiagnostico,$noImagenes)
    {
        $sql = "update inspeccionesCi set numeroImagenes = '".$noImagenes."' where id= '".$idDiagnostico."' " ; 
        $consulta = mysql_query($sql,$this->connectMysql()); 
    }

    
    // public function actualizarNumeroTablero($idDiagnostico,$numero)
    // {
    //     $sql = "update diagnosticoEbAp set numeroTableros  =  '".$numero."'  where id='".$idDiagnostico."'    ";
    //     $consulta = mysql_query($sql,$this->connectMysql()); 
    // }
    
    // public function actualizarInfoEnDiagnostico($request)
    // {
    //     $sql ="update  diagnosticoEbAp  set conceptoTecnico = '".$request['conceptoTecnico']."'   
    //     where  id = '".$request['idDiagnostico']."' ";
    //     $consulta = mysql_query($sql,$this->connectMysql()); 
    // }
    
    // public function traerInfoClienteIdDiagnostico($idDiagnostico)
    // {
    //     $sql = "select c.* from diagnosticoEbAp d 
    //     inner join cliente0 c on (c.idcliente = d.idCliente)
    //     where d.id = '".$idDiagnostico."'
    //     "; 
    //     // die($sql); 
    //     $consulta = mysql_query($sql,$this->connectMysql()); 
    //     $infoCLiente = mysql_fetch_assoc($consulta);
    //     return $infoCLiente;
    // }
}