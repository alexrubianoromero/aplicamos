<?php
$raiz = dirname(dirname(dirname(__file__)));

require_once($raiz.'/conexion/Conexion.php');
require_once($raiz.'/diagnosticoEbAll/models/DiagnosticoEbAllModel.php'); 
require_once($raiz.'/diagnosticoEbAll/models/ConceptoTableroEbAllModel.php'); 

class TableroDiagnosticoEbAllModel extends Conexion
{
    protected $diagnosticoEbAllModel; 
    protected $conceptoTableroModel;

    public function __construct()
    {
        $this->diagnosticoEbAllModel = new DiagnosticoEbAllModel(); 
        $this->conceptoTableroModel = new ConceptoTableroEbAllModel();
    }
    public function grabarTableroDiagnostico($request)
    {
        $infoDiagnosticoEbAll = $this->diagnosticoEbAllModel->traerDiagnosticoId($request['idDiagnostico']); 
        $NumeroTablero = $infoDiagnosticoEbAll['numeroTableros'] + 1 ; 
        $this->diagnosticoEbAllModel->actualizarNumeroTablero($request['idDiagnostico'],$NumeroTablero);
        $numeroConceptos = $this->conceptoTableroModel->traerConteoConceptosTablero(); 
        // echo 'numero conceptos :'.$numeroConceptos;
        // die(); 
        $conteo = 1; 
          while($conteo <  $numeroConceptos)
          {
            $valor = $request['concepto'.$conteo];
            $sql = "insert into tablerosDiagnosticosEbAll
            (idDiagnostico,noTablero,idConceptoTablero,valorConceptoTablero	) 
            values ('".$request['idDiagnostico']."','".$NumeroTablero."','".$conteo."','".$valor."')"; 
            $consulta = mysql_query($sql,$this->connectMysql()); 
            // echo '<br>'.$sql;
            $conteo = $conteo + 1; 
        } 
    }
    
    public function traerTablerosDiagnostico($idDiagnostico)
    {
        $sql = "select * from tablerosDiagnosticosEbAll  where idDiagnostico = '".$idDiagnostico."' order by id asc  "; 
        // die($sql);
        $consulta = mysql_query($sql,$this->connectMysql()); 
        $arrTableros = $this->get_table_assoc($consulta);
        return $arrTableros;  
    }


}