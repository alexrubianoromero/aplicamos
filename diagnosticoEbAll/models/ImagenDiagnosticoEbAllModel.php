<?php
$raiz = dirname(dirname(dirname(__file__)));

require_once($raiz.'/conexion/Conexion.php');
// require_once($raiz.'/diagnosticoEbAp/models/DiagnosticoEbApModel.php'); 
// require_once($raiz.'/diagnosticoEbAp/models/ConceptoTableroEbApModel.php'); 

class ImagenDiagnosticoEbAllModel extends Conexion
{
    // protected $ImagendiagnosticoEbApModel; 

    public function __construct()
    {
        // $this->diagnosticoEbApModel = new DiagnosticoEbAPModel(); 
        // $this->conceptoTableroModel = new ConceptoTableroEbApModel();
    }

    public function traerImagenesDiagnosticoId($idDiagnostico)
    {
        $sql="select * from imagenesDiagnosticoEbAll where idDiagnostico =  '".$idDiagnostico."'  ";
        $consulta = mysql_query($sql,$this->connectMysql()); 
        $imagenes = $this->get_table_assoc($consulta);
        return $imagenes; 
    }
    public function traerInfoImagenId($idImagen)
    {
        $sql="select * from imagenesDiagnosticoEbAll where id =  '".$idImagen."' ";
        $consulta = mysql_query($sql,$this->connectMysql()); 
        $imagen =   mysql_fetch_assoc($consulta);
        return $imagen; 
    }


    public function grabaregistroImagenesDiagnosticoAll($idDiagnostico,$nombreIma,$ruta)
    {
        $sql = "insert into imagenesDiagnosticoEbAll(idDiagnostico,nombre,rutaImagen) 
        values ('".$idDiagnostico."','".$nombreIma."','".$ruta."')";
        // die($sql); 
        $consulta = mysql_query($sql,$this->connectMysql());
        $maxId = $this->traerUltimoIdImagen();
        return $maxId;
    }

    public function traerUltimoIdImagen(){
        $sql ="select max(id) as maxId from imagenesDiagnosticoEbAll ";
        $consulta = mysql_query($sql,$this->connectMysql()); 
        $arreglo = mysql_fetch_assoc($consulta);
        return $arreglo['maxId']; 
    }

    public function actualizarObservacionesImagen($maxId,$observaciones)
    {
        $sql = "update imagenesDiagnosticoEbAll set observaciones  = '".$observaciones."'  
         where id = '".$maxId."'   ";
        //  die($sql); 
         $consulta = mysql_query($sql,$this->connectMysql()); 
    }

    public function modificarObservacionesImagenEbAll($request)
    {
        $sql="update imagenesDiagnosticoEbAll set observaciones = '".$request['observaciones']."'    
        where id =  '".$request['idImagen']."' ";
        $consulta = mysql_query($sql,$this->connectMysql()); 
        
    }



}

?>