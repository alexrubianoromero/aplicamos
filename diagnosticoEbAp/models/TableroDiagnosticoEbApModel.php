<?php
$raiz = dirname(dirname(dirname(__file__)));

require_once($raiz.'/conexion/Conexion.php');
require_once($raiz.'/diagnosticoEbAp/models/DiagnosticoEbApModel.php'); 
require_once($raiz.'/diagnosticoEbAp/models/ConceptoTableroEbApModel.php'); 

class TableroDiagnosticoEbApModel extends Conexion
{
    protected $diagnosticoEbApModel; 
    protected $conceptoTableroModel;

    public function __construct()
    {
        $this->diagnosticoEbApModel = new DiagnosticoEbAPModel(); 
        $this->conceptoTableroModel = new ConceptoTableroEbApModel();
    }
    public function grabarTableroDiagnostico($request)
    {
        $infoDiagnosticoEbAp = $this->diagnosticoEbApModel->traerDiagnosticoId($request['idDiagnostico']); 
        $NumeroTablero = $infoDiagnosticoEbAp['numeroTableros'] + 1 ; 
        $this->diagnosticoEbApModel->actualizarNumeroTablero($request['idDiagnostico'],$NumeroTablero);
        $numeroConceptos = $this->conceptoTableroModel->traerConteoConceptosTablero(); 
        // echo 'numero conceptos :'.$numeroConceptos;
        // die(); 
        $conteo = 1; 
          while($conteo <  $numeroConceptos)
          {
            $valor = $request['concepto'.$conteo];
            $sql = "insert into tablerosDiagnosticosEbAp 
            (idDiagnostico,noTablero,idConceptoTablero,valorConceptoTablero	) 
            values ('".$request['idDiagnostico']."','".$NumeroTablero."','".$conteo."','".$valor."')"; 
            $consulta = mysql_query($sql,$this->connectMysql()); 
            // echo '<br>'.$sql;
            $conteo = $conteo + 1; 
        } 
    }
    
    public function traerTablerosDiagnostico($idDiagnostico)
    {
        $sql = "select * from tablerosDiagnosticosEbAp  where idDiagnostico = '".$idDiagnostico."' order by id asc  "; 
        // die($sql);
        $consulta = mysql_query($sql,$this->connectMysql()); 
        $arrTableros = $this->get_table_assoc($consulta);
        return $arrTableros;  
    }


}