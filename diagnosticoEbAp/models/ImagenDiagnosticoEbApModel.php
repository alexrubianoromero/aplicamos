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
        $sql="select * from imagenesDiagnosticoEbAp where idDiagnostico =  '".$idDiagnostico."'  ";
        $consulta = mysql_query($sql,$this->connectMysql()); 
        $imagenes = $this->get_table_assoc($consulta);
        return $imagenes; 
    }


    public function grabaregistroImagenesDiagnostico($idDiagnostico,$nombreIma,$ruta)
    {
        $sql = "insert into imagenesDiagnosticoEbAp(idDiagnostico,nombre,rutaImagen) 
        values ('".$idDiagnostico."','".$nombreIma."','".$ruta."')";
        // die($sql); 
        $consulta = mysql_query($sql,$this->connectMysql());
    }



}

?>