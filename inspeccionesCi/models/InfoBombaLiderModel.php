<?php
$raiz = dirname(dirname(dirname(__file__)));

require_once($raiz.'/conexion/Conexion.php');

class InfoBombaLiderModel extends Conexion
{


    function traerInfoBombaLiderId($idBombaLider)
    {
            $sql = "select * from infoBombaLider  where id = '".$idBombaLider."' " ;
            $consulta = mysql_query($sql,$this->connectMysql()); 
            $info = mysql_fetch_assoc($consulta);
            return $info; 
    }

    function grabarInfoBombaLider($request)
    {
        $sql = "insert into infoBombaLider (idDiagnostico,	operativaAutomatico,equipoListado
        ,modelo,marcaBomba,	potencia,transferencia
        ,ubicacion,tipoBomba,tipoSuccion,ultimaPitometrica,qmaxGpm
        ,presionMAxPsi,qNominalGpm,presionAl150,diametroSuccion
        ,diametroDescarga,materialTuberia,fugas,tipoCabezal		
        ,tanqueIndependiente,nanomentro,selloMecanico,manovacumetro
        ,rodamientosMotor,empaquetadura,comprobacionVentilador,valvulasDeCorte
        ,caudalimetro,valvulaAlivio,retornoTanque,idCondicionOperacion
        ,contactor,indicador,guardamotor,fusibles,temporizador,presostatos,caudalimetrotablero,tablero,display	

        ) 
            values ('".$request['idDiagnostico']."','".$request['operativaAutomatico']."','".$request['equipoListado']."'
                    ,'".$request['modelo']."','".$request['marcaBomba']."','".$request['potencia']."','".$request['transferencia']."'
                    ,'".$request['ubicacion']."','".$request['tipoBomba']."','".$request['tipoSuccion']."','".$request['ultimaPitometrica']."','".$request['qmaxGpm']."'
                    ,'".$request['presionMAxPsi']."','".$request['qNominalGpm']."','".$request['presionAl150']."','".$request['diametroSuccion']."'
                    ,'".$request['diametroDescarga']."','".$request['materialTuberia']."','".$request['fugas']."','".$request['tipoCabezal']."'
                    ,'".$request['tanqueIndependiente']."','".$request['nanomentro']."','".$request['selloMecanico']."','".$request['manovacumetro']."'
                    ,'".$request['rodamientosMotor']."','".$request['empaquetadura']."','".$request['comprobacionVentilador']."','".$request['valvulasDeCorte']."'
                    ,'".$request['caudalimetro']."','".$request['valvulaAlivio']."','".$request['retornoTanque']."','".$request['idCondicionOperacion']."'
                     ,'".$request['contactor']."'
                     ,'".$request['indicador']."'
                     ,'".$request['guardamotor']."'
                     ,'".$request['fusibles']."'
                     ,'".$request['temporizador']."'
                     ,'".$request['presostatos']."'
                     ,'".$request['caudalimetrotablero']."'
                     ,'".$request['tablero']."'
                     ,'".$request['display']."'
                ) ";

    //    die($sql); 
        $consulta = mysql_query($sql,$this->connectMysql());     
        $maximoId = $this->traerultimoIdLider();
        return $maximoId;     

    }

    function traerultimoIdLider()
    {
        $sql ="select max(id) as maximo  from infoBombaLider ";
        $consulta = mysql_query($sql,$this->connectMysql());   
        $maximo = mysql_fetch_assoc($consulta);
        $maximo = $maximo['maximo'];
        return $maximo;
    }

    


}


?>