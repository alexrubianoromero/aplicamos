<?php
$raiz = dirname(dirname(dirname(__file__)));

require_once($raiz.'/conexion/Conexion.php');
// require_once($raiz.'/diagnosticoEbAp/models/DiagnosticoEbApModel.php'); 
// require_once($raiz.'/diagnosticoEbAp/models/ConceptoTableroEbApModel.php'); 

class ImagenDiagnosticoEbApModel extends Conexion
{
    // protected $ImagendiagnosticoEbApModel; 

    public function __construct()
    {
        // $this->diagnosticoEbApModel = new DiagnosticoEbAPModel(); 
        // $this->conceptoTableroModel = new ConceptoTableroEbApModel();
    }

    public function traerImagenesDiagnosticoId($idDiagnostico)
    {
        $sql="select * from imagenesDiagnosticoEbAp where idDiagnostico =  '".$idDiagnostico."'  order by id desc";
        $consulta = mysql_query($sql,$this->connectMysql()); 
        $imagenes = $this->get_table_assoc($consulta);
        return $imagenes; 
    }
    public function traerInfoImagenId($idImagen)
    {
        $sql="select * from imagenesDiagnosticoEbAp where id =  '".$idImagen."' ";
        $consulta = mysql_query($sql,$this->connectMysql()); 
        $imagen =   mysql_fetch_assoc($consulta);
        return $imagen; 
    }
    public function modificarObservacionesImagen($request)
    {
        $sql="update imagenesDiagnosticoEbAp set observaciones = '".$request['observaciones']."'    
        where id =  '".$request['idImagen']."' ";
        $consulta = mysql_query($sql,$this->connectMysql()); 
        
    }


    public function grabaregistroImagenesDiagnostico($idDiagnostico,$nombreIma,$ruta)
    {
        $sql = "insert into imagenesDiagnosticoEbAp(idDiagnostico,nombre,rutaImagen) 
        values ('".$idDiagnostico."','".$nombreIma."','".$ruta."')";
        // die($sql); 
        $consulta = mysql_query($sql,$this->connectMysql());
        $maxId = $this->traerUltimoIdImagen();
        return $maxId;
    }
    public function traerUltimoIdImagen(){
        $sql ="select max(id) as maxId from imagenesDiagnosticoEbAp ";
        $consulta = mysql_query($sql,$this->connectMysql()); 
        $arreglo = mysql_fetch_assoc($consulta);
        return $arreglo['maxId']; 
    }
    public function actualizarObservacionesImagen($maxId,$observaciones)
    {
        $sql = "update imagenesDiagnosticoEbAp set observaciones  = '".$observaciones."'  
         where id = '".$maxId."'   ";
        //  die($sql); 
         $consulta = mysql_query($sql,$this->connectMysql()); 
    }



}

?>