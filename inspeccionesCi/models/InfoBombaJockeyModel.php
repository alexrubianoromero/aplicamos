<?php
$raiz = dirname(dirname(dirname(__file__)));

require_once($raiz.'/conexion/Conexion.php');

class InfoBombaJockeyModel extends Conexion
{


    function traerInfoBombaJockeyId($idBombaJockey)
    {
            $sql = "select * from infoBombaJockey  where id = '".$idBombaJockey."' " ;
            $consulta = mysql_query($sql,$this->connectMysql()); 
            $informacion = mysql_fetch_assoc($consulta);
            return $informacion; 
    }

    function grabarInfoBombaJockey($request)
    {
        $sql = "insert into infoBombaJockey (idDiagnostico,	operativaAutomatico,equipoListado
        ,modelo,marcaBomba,	potencia,tipoBomba,qmaxGpm ,presionMAxPsi,qNominalGpm,presionAl150
        ,diametroSuccion,diametroDescarga,materialTuberia,fugas,nanomentro,selloMecanico
        ,manovacumetro,rodamientosMotor,empaquetadura,comprobacionVentilador,valvulasDeCorte
        ,instrucciones,demarcacion,luzemergecia,areaenorden
          ,contactor,indicador,guardamotor,fusibles,temporizador,presostatos,transductor
        ) 
        values ('".$request['idDiagnostico']."','".$request['operativaAutomatico']."','".$request['equipoListado']."'
                    ,'".$request['modelo']."','".$request['marcaBomba']."','".$request['potencia']."'
                    ,'".$request['tipoBomba']."','".$request['qNominalGpm']."','".$request['presionMAxPsi']."'
                    ,'".$request['qNominalGpm']."','".$request['presionAl150']."','".$request['diametroSuccion']."'
                    ,'".$request['diametroDescarga']."','".$request['materialTuberia']."','".$request['fugas']."'
                    ,'".$request['nanomentro']."','".$request['selloMecanico']."','".$request['manovacumetro']."'
                    ,'".$request['rodamientosMotor']."','".$request['empaquetadura']."','".$request['comprobacionVentilador']."'
                    ,'".$request['valvulasDeCorte']."' ,'".$request['instrucciones']."' ,'".$request['demarcacion']."'
                     ,'".$request['luzemergecia']."' ,'".$request['areaenorden']."'
                     ,'".$request['contactor']."'
                     ,'".$request['indicador']."'
                     ,'".$request['guardamotor']."'
                     ,'".$request['fusibles']."'
                     ,'".$request['temporizador']."'
                     ,'".$request['presostatos']."'
                     ,'".$request['transductor']."'
        ) ";

    //    die($sql); 
        $consulta = mysql_query($sql,$this->connectMysql());          
        $maximoId = $this->traerultimoIdJockey();
        return $maximoId;  

    }



    function traerultimoIdJockey()
    {
        $sql ="select max(id) as maximo  from infoBombaJockey ";
        $consulta = mysql_query($sql,$this->connectMysql());   
        $maximo = mysql_fetch_assoc($consulta);
        $maximo = $maximo['maximo'];
        return $maximo;
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