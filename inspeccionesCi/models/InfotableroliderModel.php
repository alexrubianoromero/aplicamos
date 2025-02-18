<?php
$raiz = dirname(dirname(dirname(__file__)));

require_once($raiz.'/conexion/Conexion.php');

class InfoTableroLiderModel extends Conexion
{


    function traerInfoBombaJockeyId($idBombaJockey)
    {
            $sql = "select * from infotablerolidermodel  where id = '".$idBombaJockey."' " ;
            $consulta = mysql_query($sql,$this->connectMysql()); 
            $informacion = mysql_fetch_assoc($consulta);
            return $informacion; 
    }

    function grabarInfoBombaJockey($request)
    {
        $sql = "insert into infotablerolidermodel (idDiagnostico,	operativaAutomatico,equipoListado
        ,modelo,marcaBomba,	potencia,tipoBomba,qmaxGpm ,presionMAxPsi,qNominalGpm,presionAl150
        ,diametroSuccion,diametroDescarga,materialTuberia,fugas,nanomentro,selloMecanico
        ,manovacumetro,rodamientosMotor,empaquetadura,comprobacionVentilador,valvulasDeCorte
        ,instrucciones,demarcacion,luzemergecia,areaenorden
        ) 
        values ('".$request['idDiagnostico']."','".$request['operativaAutomatico']."','".$request['equipoListado']."'
                    ,'".$request['modelo']."','".$request['marcaBomba']."','".$request['potencia']."'
                    ,'".$request['tipoBomba']."','".$request['qNominalGpm']."','".$request['presionMAxPsi']."'
                    ,'".$request['qNominalGpm']."','".$request['presionAl150']."','".$request['diametroSuccion']."'
                    ,'".$request['diametroDescarga']."','".$request['materialTuberia']."','".$request['fugas']."'
                    ,'".$request['nanomentro']."','".$request['selloMecanico']."','".$request['manovacumetro']."'
                    ,'".$request['rodamientosMotor']."','".$request['empaquetadura']."','".$request['comprobacionVentilador']."'
                    ,'".$request['valvulasDeCorte']."'
                     ,'".$request['instrucciones']."'
                     ,'".$request['demarcacion']."'
                     ,'".$request['luzemergecia']."'
                     ,'".$request['areaenorden']."'
        ) ";

    //    die($sql); 
        $consulta = mysql_query($sql,$this->connectMysql());          

    }

    
    // ,transferencia
    // ,ubicacion,tipoBomba,ultimaPitometrica,qmaxGpm
    // ,presionMAxPsi,qNominalGpm,presionAl150,diametroSuccion
    // ,diametroDescarga,materialTuberia,fugas,tipoCabezal		
    // ,tanqueIndependiente,nanomentro,selloMecanico,manovacumetro
    // ,rodamientosMotor,empaquetadura,comprobacionVentilador,valvulasDeCorte
    // ,caudalimetro,valvulaAlivio,retornoTanque,idCondicionOperacion	


    // ,'".$request['transferencia']."'
    //                 ,'".$request['ubicacion']."','".$request['tipoBomba']."','".$request['ultimaPitometrica']."','".$request['qmaxGpm']."'
    //                 ,'".$request['presionMAxPsi']."','".$request['qNominalGpm']."','".$request['presionAl150']."','".$request['diametroSuccion']."'
    //                 ,'".$request['diametroDescarga']."','".$request['materialTuberia']."','".$request['fugas']."','".$request['tipoCabezal']."'
    //                 ,'".$request['tanqueIndependiente']."','".$request['nanomentro']."','".$request['selloMecanico']."','".$request['manovacumetro']."'
    //                 ,'".$request['rodamientosMotor']."','".$request['empaquetadura']."','".$request['comprobacionVentilador']."','".$request['valvulasDeCorte']."'
    //                 ,'".$request['caudalimetro']."','".$request['valvulaAlivio']."','".$request['retornoTanque']."','".$request['idCondicionOperacion']."'

}


?>