<?php

// $raiz= $_SERVER['DOCUMENT_ROOT'];
$_REQUEST['idDiagnostico'] = $_REQUEST['id']; 
date_default_timezone_set('America/Bogota');
// die($raiz);
$ruta = dirname(dirname(dirname(__FILE__)));
// die('ruta'.$ruta); 
require_once($ruta.'/fpdf/fpdf.php');
require_once($ruta .'/inspeccionesCi/models/InspeccionCiModel.php');
require_once($ruta .'/inspeccionesCi/models/InfoBombaLiderModel.php');
require_once($ruta .'/inspeccionesCi/models/InfoBombaJockeyModel.php');
require_once($ruta .'/inspeccionesCi/models/ImagenDiagnosticoCiModel.php');
// require_once($raiz.'/diagnosticoEbAp/models/ConceptoTableroEbApModel.php'); 
require_once($raiz.'/clientes/models/ClienteModel.php'); 
// require_once($raiz.'/diagnosticoEbAp/models/TableroDiagnosticoEbApModel.php'); 
require_once($raiz.'/movil/model/UsuarioModel.php'); 

$diagnosticoModel = new InspeccionCiModel();
$clienteModel = new ClienteModel();
$usuarioModel = new UsuarioModel();
$infoBombaLiderModel = new InfoBombaLiderModel();
$infoBombaJockeyModel = new InfoBombaJockeyModel();
$imagenModel = new ImagenDiagnosticoCiModel();
// $conceptoTableroModel = new ConceptoTableroEbApModel();
// $tableroDiagnosticoModel = new TableroDiagnosticoEbApModel();

$infoDiagnostico = $diagnosticoModel->traerFormatoInspeccionId($_REQUEST['idDiagnostico']); 
$infoBombaLider = $infoBombaLiderModel->traerInfoBombaLiderId($infoDiagnostico['idInfoBombaLider']);
$infoBombaJockey = $infoBombaJockeyModel->traerInfoBombaJockeyId($infoDiagnostico['idInfoBombaJockey']);

// $numeroTableros = $infoDiagnostico['numeroTableros']; 
$infoCliente = $clienteModel->traerClienteId($infoDiagnostico['idCliente']); 
$infoUsuario = $usuarioModel->traerusuarioId($infoDiagnostico['idAtendioVisita']);
$convenciones = "B=BUENO; R=REGULAR; M=MALO A=AUSENTE"; 
$numeroMaximoCasillasVisuales = 9;
        //   echo '<pre>';print_r($infoBombaJockey); echo '</pre>';die('');
$letraTitulo = '10';
$pdf=new FPDF();
$pdf->AddPage();
    $posx = 10; 
    $posy = 5;
    $tamano = 35;
    $tamLetraEncab = 9;
    $pdf->Image('../../movil/imagen/logonuevo.png',$posx,$posy,$tamano);
    $pdf->SetFont('Arial','',$tamLetraEncab);
    $pdf->Cell(35);
    $pdf->SetFont('Arial','B',$tamLetraEncab);
    $pdf->Cell(35,6,'Razon Social:',1,0,'');
    $pdf->SetFont('Arial','',$tamLetraEncab);
    $pdf->Cell(80,6,substr($infoCliente['nombre'],0,35),1,0,'');
    $pdf->Cell(10);
    $pdf->Cell(25,6,'No: '.$_REQUEST['idDiagnostico'],1,1,'');
    
    $pdf->Cell(35);
    $pdf->Cell(35,6,'Direccion:',1,0,'');
    $pdf->Cell(80,6,substr($infoCliente['direccion'],0,40),1,0,'');
    $pdf->Cell(10);
    $pdf->Cell(25,6,'Fecha',1,1,'');
    
    $pdf->Cell(35);
    $pdf->Cell(55,6,'Persona que atendio la visita:',1,0,'');
    $pdf->Cell(60,6,substr($infoUsuario['nombre'],0,40),1,0,'');
    $pdf->Cell(10);
    $pdf->Cell(25,6,$infoDiagnostico['fecha'],1,1,'');
    
    $pdf->Cell(35);
    $pdf->Cell(35,6,'CONVENCIONES:',1,0,'');
    $pdf->Cell(80,6,$convenciones,1,1,'');
    
    $pdf->Ln(2);
    $pdf->Cell(35);
    $pdf->SetFont('Arial','B',$letraTitulo);
    $pdf->Cell(115,6,'FORMATO INSPECCION RED CONTRA INCENDIO',0,1,'C');

    
    // $infoBombaLider['equipoListado']
    
    $tamLetra = 7;
    $valorCelda1 = '24';
    $valorCelda2 = '24';
    $alto = '6'; 
    $alto2 = '40';
    $anchoValores = 15;
    $pdf->Ln(2);
    $pdf->Cell(95,$alto,'INFORMACION BOMBA LIDER ',1,0,'C');
    $pdf->Cell(95,$alto,'INFORMACION BOMBA JOCKEY ',1,1,'C');
    $pdf->SetFont('Arial','B',$tamLetra);
    $pdf->Cell(60,$alto,'SE ENCUETRA OPERATIVA EN AUTOMATICO ',1,0,'L');
    $pdf->Cell(35,$alto,$infoBombaLider['operativaAutomatico'],1,0,'L');
    //jockey
    $pdf->Cell(60,$alto,'SE ENCUETRA OPERATIVA EN AUTOMATICO ',1,0,'L');
    $pdf->Cell(35,$alto,$infoBombaJockey['operativaAutomatico'],1,1,'L');
    //lider
    $pdf->Cell($valorCelda1,$alto,'EQUIPO LISTADO',1,0,'L');
    $pdf->Cell($valorCelda2,$alto,$infoBombaLider['equipoListado'],1,0,'L');
    $pdf->Cell(23,$alto,'MODELO',1,0,'L');
    $pdf->Cell($valorCelda2,$alto,$infoBombaLider['modelo'],1,0,'L');
    //jockey
    $pdf->Cell($valorCelda1,$alto,'EQUIPO LISTADO',1,0,'L');
    $pdf->Cell($valorCelda2,$alto,$infoBombaJockey['equipoListado'],1,0,'L');
    $pdf->Cell(23,$alto,'MODELO',1,0,'L');
    $pdf->Cell($valorCelda2,$alto,$infoBombaJockey['modelo'],1,1,'L');
    //lider
    $pdf->Cell($valorCelda1,$alto,'MARCA DE LA B.',1,0,'L');
    $pdf->Cell($valorCelda2,$alto,$infoBombaLider['marcaBomba'],1,0,'L');
    $pdf->Cell(23,$alto,'POTENCIA',1,0,'L');
    $pdf->Cell($valorCelda2,$alto, $infoBombaLider['potencia'],1,0,'L');

    //jockey
    $pdf->Cell($valorCelda1,$alto,'MARCA DE LA B.',1,0,'L');
    $pdf->Cell($valorCelda2,$alto,$infoBombaJockey['marcaBomba'],1,0,'L');
    $pdf->Cell(23,$alto,'POTENCIA',1,0,'L');
    $pdf->Cell($valorCelda2,$alto, $infoBombaJockey['potencia'],1,1,'L');
    
    $pdf->Cell($valorCelda1,$alto,'TRANSFERENCIA.',1,0,'L');
    $pdf->Cell($valorCelda2,$alto,$infoBombaLider['transferencia'],1,0,'L');
    $pdf->Cell(23,$alto,'UBICACION',1,0,'L');
    $pdf->Cell($valorCelda2,$alto, $infoBombaLider['ubicacion'],1,0,'L');

    //JOCKEY
    $pdf->Cell($valorCelda1,$alto,'TIPO DE BOMBA',1,0,'L');
    $pdf->Cell($valorCelda2,$alto, $infoBombaJockey['tipoBomba'],1,0,'L');
    $pdf->Cell(23,$alto,'',1,0,'L');
    $pdf->Cell($valorCelda2,$alto, $infoBombaJockey[''],1,1,'L');
    //LIDER
    $pdf->Cell($valorCelda1,$alto,'TIPO DE BOMBA',1,0,'L');
    $pdf->Cell($valorCelda2,$alto, $infoBombaLider['tipoBomba'],1,0,'L');
    $pdf->Cell(23,$alto,'',1,0,'L');
    $pdf->Cell($valorCelda2,$alto, $infoBombaLider[''],1,0,'L');

    $pdf->Cell($valorCelda1,$alto,'QMAX(GPM)',1,0,'L');
    $pdf->Cell($valorCelda2,$alto, $infoBombaJockey['qmaxGpm'],1,0,'L');
    $pdf->Cell(23,$alto,'PRES.MAX(PSI)',1,0,'L');
    $pdf->Cell($valorCelda2,$alto, $infoBombaJockey['presionMAxPsi'],1,1,'L');
    
    $pdf->Cell($valorCelda1,$alto,'TIPO DE SUCCION',1,0,'L');
    $pdf->Cell($valorCelda2,$alto, $infoBombaLider['tipoSuccion'],1,0,'L');
    $pdf->Cell(23,$alto,'P.PITOMETRICA',1,0,'L');
    $pdf->Cell($valorCelda2,$alto, $infoBombaLider['ultimaPitometrica'],1,0,'L');

    $pdf->Cell($valorCelda1,$alto,'D. SUCCION',1,0,'L');
    $pdf->Cell($valorCelda2,$alto, $infoBombaJockey['diametroSuccion'],1,0,'L');
    $pdf->Cell(23,$alto,'D. DESCARGA',1,0,'L');
    $pdf->Cell($valorCelda2,$alto, $infoBombaJockey['diametroDescarga'],1,1,'L');

    $pdf->Cell($valorCelda1,$alto,'QMAX(GPM)',1,0,'L');
    $pdf->Cell($valorCelda2,$alto, $infoBombaLider['qmaxGpm'],1,0,'L');
    $pdf->Cell(23,$alto,'PRES.MAX(PSI)',1,0,'L');
    $pdf->Cell($valorCelda2,$alto, $infoBombaLider['presionMAxPsi'],1,0,'L');

    $pdf->Cell($valorCelda1,$alto,'MAT.TUBERIA',1,0,'L');
    $pdf->Cell($valorCelda2,$alto, $infoBombaJockey['materialTuberia'],1,0,'L');
    $pdf->Cell(23,$alto,'FUGAS',1,0,'L');
    $pdf->Cell($valorCelda2,$alto, $infoBombaJockey['fugas'],1,1,'L');

    $pdf->Cell($valorCelda1,$alto,'Q NOMINAL(GPM)',1,0,'L');
    $pdf->Cell($valorCelda2,$alto, $infoBombaLider['qNominalGpm'],1,0,'L');
    $pdf->Cell(23,$alto,'P. AL 150% (PSI)',1,0,'L');
    $pdf->Cell($valorCelda2,$alto, $infoBombaLider['presionAl150'],1,0,'L');

    $pdf->Cell($valorCelda1,$alto,'MANOMETRO',1,0,'L');
    $pdf->Cell($valorCelda2,$alto, $infoBombaJockey['nanomentro'],1,0,'L');
    $pdf->Cell(23,$alto,'SELLO MECANICO',1,0,'L');
    $pdf->Cell($valorCelda2,$alto, $infoBombaJockey['selloMecanico'],1,1,'L');

    $pdf->Cell($valorCelda1,$alto,'D. SUCCION',1,0,'L');
    $pdf->Cell($valorCelda2,$alto, $infoBombaLider['diametroSuccion'],1,0,'L');
    $pdf->Cell(23,$alto,'D. DESCARGA',1,0,'L');
    $pdf->Cell($valorCelda2,$alto, $infoBombaLider['diametroDescarga'],1,0,'L');

    $pdf->Cell($valorCelda1,$alto,'MANOVACUOME',1,0,'L');
    $pdf->Cell($valorCelda2,$alto, $infoBombaJockey['manovacumetro'],1,0,'L');
    $pdf->Cell(23,$alto,'ROD. DE MOTOR',1,0,'L');
    $pdf->Cell($valorCelda2,$alto, $infoBombaJockey['rodamientosMotor'],1,1,'L');


    $pdf->Cell($valorCelda1,$alto,'MAT.TUBERIA',1,0,'L');
    $pdf->Cell($valorCelda2,$alto, $infoBombaLider['materialTuberia'],1,0,'L');
    $pdf->Cell(23,$alto,'FUGAS',1,0,'L');
    $pdf->Cell($valorCelda2,$alto, $infoBombaLider['fugas'],1,0,'L');

    $pdf->Cell($valorCelda1,$alto,'EMPAQUETADURA',1,0,'L');
    $pdf->Cell($valorCelda2,$alto, $infoBombaJockey['empaquetadura'],1,0,'L');
    $pdf->Cell(23,$alto,'COMP VENTILA',1,0,'L');
    $pdf->Cell($valorCelda2,$alto, $infoBombaJockey['comprobacionVentilador'],1,1,'L');

    $pdf->Cell($valorCelda1,$alto,'CAB PRUEBAS',1,0,'L');
    $pdf->Cell($valorCelda2,$alto, $infoBombaLider['materialTuberia'],1,0,'L');
    $pdf->Cell(23,$alto,'T INDEPENDIENTE',1,0,'L');
    $pdf->Cell($valorCelda2,$alto, $infoBombaLider['fugas'],1,0,'L');

    
    $pdf->Cell($valorCelda1,$alto,'VALVULAS CORTE',1,0,'L');
    $pdf->Cell($valorCelda2,$alto,$infoBombaJockey['valvulasDeCorte'] ,1,0,'L');
    $pdf->Cell(23,$alto,'',1,0,'L');
    $pdf->Cell($valorCelda2,$alto, '',1,1,'L');



    $pdf->Cell($valorCelda1,$alto,'MANOMETRO',1,0,'L');
    $pdf->Cell($valorCelda2,$alto, $infoBombaLider['nanomentro'],1,0,'L');
    $pdf->Cell(23,$alto,'SELLO MECANICO',1,0,'L');
    $pdf->Cell($valorCelda2,$alto, $infoBombaLider['selloMecanico'],1,0,'L');

    $pdf->SetFont('Arial','B',$letraTitulo);
    $pdf->Cell(95,$alto,'INFORMACION PARA MANIPULACION ',1,1,'C');
    $pdf->SetFont('Arial','B',$tamLetra);

    $pdf->Cell($valorCelda1,$alto,'MANOVACUOMET',1,0,'L');
    $pdf->Cell($valorCelda2,$alto, $infoBombaLider['manovacumetro'],1,0,'L');
    $pdf->Cell(23,$alto,'ROD.DE MOTOR',1,0,'L');
    $pdf->Cell($valorCelda2,$alto, $infoBombaLider['rodamientosMotor'],1,0,'L');

    $pdf->Cell(($valorCelda1*2),$alto,'INSTRUCCIONES DE  MANIPULACION ',1,0,'L');
    $pdf->Cell(($valorCelda2*2-1),$alto, $infoBombaJockey['instrucciones'],1,1,'L');

    $pdf->Cell($valorCelda1,$alto,'EMPAQUETADURA',1,0,'L');
    $pdf->Cell($valorCelda2,$alto, $infoBombaLider['empaquetadura'],1,0,'L');
    $pdf->Cell(23,$alto,'COMP VENTILAD',1,0,'L');
    $pdf->Cell($valorCelda2,$alto, $infoBombaLider['comprobacionVentilador'],1,0,'L');

    $pdf->Cell(($valorCelda1*2),$alto,'DEMARCACION ELEMENTOS ',1,0,'L');
    $pdf->Cell(($valorCelda2*2-1),$alto, $infoBombaJockey['demarcacion'],1,1,'L');

    $pdf->Cell($valorCelda1,$alto,'VALVULAS CORTE',1,0,'L');
    $pdf->Cell($valorCelda2,$alto, $infoBombaLider['valvulasDeCorte'],1,0,'L');
    $pdf->Cell(23,$alto,'CAUDALIMETRO',1,0,'0');
    $pdf->Cell($valorCelda2,$alto, $infoBombaLider['caudalimetro'],1,0,'L');

    $pdf->Cell(($valorCelda1*2),$alto,'LUZ EMERGENCIA ',1,0,'L');
    $pdf->Cell(($valorCelda2*2-1),$alto, $infoBombaJockey['luzemergecia'],1,1,'L');

    $pdf->Cell($valorCelda1,$alto,'VALVULAS ALIVIO',1,0,'L');
    $pdf->Cell($valorCelda2,$alto, $infoBombaLider['valvulaAlivio'],1,0,'L');
    $pdf->Cell(23,$alto,'RETORNO TANQ',1,0,'L');
    $pdf->Cell($valorCelda2,$alto, $infoBombaLider['retornoTanque'],1,0,'L');

    $pdf->Cell(($valorCelda1*2),$alto,'AREA EN ORDEN Y ASEADA ',1,0,'L');
    $pdf->Cell(($valorCelda2*2-1),$alto, $infoBombaJockey['areaenorden'],1,1,'L');


    $pdf->SetFont('Arial','B',$letraTitulo);
    $pdf->Cell(95,$alto,'INFORMACION TABLERO LIDER ',1,0,'C');
   
    $pdf->Cell(95,$alto,'INFORMACION TABLERO JOCKEY ',1,1,'C');
    $pdf->SetFont('Arial','B',$tamLetra);

    $pdf->Cell($valorCelda1,$alto,'CONTACTOR',1,0,'L');
    $pdf->Cell($valorCelda2,$alto, $infoBombaLider['contactor'],1,0,'L');
    $pdf->Cell(23,$alto,'IND. LUMINOSO',1,0,'L');
    $pdf->Cell($valorCelda2,$alto, $infoBombaLider['indicador'],1,0,'L');

    $pdf->Cell($valorCelda1,$alto,'CONTACTOR',1,0,'L');
    $pdf->Cell($valorCelda2,$alto, $infoBombaJockey['contactor'],1,0,'L');
    $pdf->Cell(23,$alto,'IND. LUMINOSO',1,0,'L');
    $pdf->Cell($valorCelda2,$alto, $infoBombaJockey['indicador'],1,1,'L');



    $pdf->Cell($valorCelda1,$alto,'GUARDAMOTOR',1,0,'L');
    $pdf->Cell($valorCelda2,$alto, $infoBombaLider['guardamotor'],1,0,'L');
    $pdf->Cell(23,$alto,'FUSIBLES/MINIBR',1,0,'L');
    $pdf->Cell($valorCelda2,$alto, $infoBombaLider['fusibles'],1,0,'L');
    
    $pdf->Cell($valorCelda1,$alto,'GUARDAMOTOR',1,0,'L');
    $pdf->Cell($valorCelda2,$alto, $infoBombaJockey['guardamotor'],1,0,'L');
    $pdf->Cell(23,$alto,'FUSIBLES/MINIBR',1,0,'L');
    $pdf->Cell($valorCelda2,$alto, $infoBombaJockey['fusibles'],1,1,'L');




    // foreach($conceptosTableroEbAp as $concepto)
    $pdf->Cell($valorCelda1,$alto,'TEMPORIZADOR',1,0,'L');
    $pdf->Cell($valorCelda2,$alto, $infoBombaLider['temporizador'],1,0,'L');
    $pdf->Cell(23,$alto,'PRESOSTATOS',1,0,'L');
    $pdf->Cell($valorCelda2,$alto, $infoBombaLider['presostatos'],1,0,'L');
   
   
    $pdf->Cell($valorCelda1,$alto,'TEMPORIZADOR',1,0,'L');
    $pdf->Cell($valorCelda2,$alto, $infoBombaJockey['temporizador'],1,0,'L');
    $pdf->Cell(23,$alto,'PRESOSTATOS',1,0,'L');
    $pdf->Cell($valorCelda2,$alto, $infoBombaJockey['presostatos'],1,1,'L');


    $pdf->Cell($valorCelda1,$alto,'CAUDALIMETRO',1,0,'L');
    $pdf->Cell($valorCelda2,$alto, $infoBombaLider['caudalimetrotablero'],1,0,'L');
    $pdf->Cell(23,$alto,'TAB. LIBRE ALA',1,0,'L');
    $pdf->Cell($valorCelda2,$alto, $infoBombaLider['tablero'],1,0,'L');

    $pdf->Cell(($valorCelda1*2),$alto,'TRANSDUCTOR',1,0,'L');
    $pdf->Cell(($valorCelda2*2-1),$alto, $infoBombaJockey['transductor'],1,1,'L');


    $pdf->Cell($valorCelda1,$alto,'DISPLAY',1,0,'L');
    $pdf->Cell($valorCelda2,$alto, $infoBombaLider['display'],1,0,'L');
    $pdf->Cell(23,$alto,'',1,0,'L');
    $pdf->Cell($valorCelda2,$alto, $infoBombaLider[''],1,0,'L');


    $pdf->Cell($valorCelda1,$alto,'',1,0,'L');
    $pdf->Cell($valorCelda2,$alto, $infoBombaJockey[''],1,0,'L');
    $pdf->Cell(23,$alto,'',1,0,'L');
    $pdf->Cell($valorCelda2,$alto, $infoBombaJockey[''],1,1,'L');


    // $pdf->SetFont('Arial','B',$letraTitulo);
    $pdf->Cell(190,$alto,'OBSERVACIONES',1,1,'C');
    // $pdf->SetFont('Arial','B',$tamLetra);


    $pdf->MultiCell(190,$alto, iconv("UTF-8", "ISO-8859-1//TRANSLIT",$infoDiagnostico['observaciones']), 1, 'J');

    $pdf->Ln(2);
    $posicionVertical = $pdf->GetY();
    $pdf->Cell(190,6,'IMAGENES DIAGNOSTICO',1,1,'C');
    
    $raiz123 = dirname(dirname(dirname(__file__)));
    $imagenes = $imagenModel->traerImagenesDiagnosticoCi($_REQUEST['idDiagnostico']);
    $posInicial = 20;
    $tamano= 40;
    $variaY = 20;
    $n=1;
    foreach($imagenes as $imagen)
    {
        $rutaImagen = '../../'.$imagen['rutaImagen'].'/'.$imagen['nombre'];
        $pdf->setY($posicionVertical +10);
        $pdf->Cell(100,6,$imagen['observaciones'],0,'','1');
        // $pdf->Cell(180,6,   $rutaImagen,1,1,'C');
        $pdf->Ln(2);
        $pdf->Image($rutaImagen,'70',$posicionVertical+10 ,'',$tamano);
        $posicionVertical = $posicionVertical + $tamano+2;
        // $posVertical = $tamano * $n;
        // $n=$n+1;
    }


    // foreach($conceptosTableroEbAp as $concepto)
    // {
    //     $pdf->Cell(60,$alto,$concepto['descripcion'],1,0,'L');
    //     for($i=1;$i< $numeroMaximoCasillasVisuales;$i++)
    //     {
    //         if($i <= $numeroTableros)
    //         {
    //             $valor = $tableroDiagnosticoModel->traerTableroIdConcepNumTableroIdDiag($concepto['id'],$i,$_REQUEST['idDiagnostico']);
    //             $pdf->Cell($anchoValores,$alto,$valor['valorConceptoTablero'],1,0,'C');
    //         }
    //         else{
    //             $pdf->Cell($anchoValores,$alto,'',1,0,'C');
    //         }
    //     }
    //     $valor = $tableroDiagnosticoModel->traerTableroIdConcepNumTableroIdDiag($concepto['id'],$i,$_REQUEST['idDiagnostico']);
    //     $pdf->Cell($anchoValores,$alto,$valor['valorConceptoTablero'],1,1,'C');
        
    // }



    // $pdf->Cell(25,6,'VARIADOR:',0,0,'');
    // $infoDiagnostico['variador']==1?$valor = 'X': $valor='';
    // $pdf->Cell(15,6,$valor,0,0,'');
    // $pdf->Cell(40,6,'ARRANQUE DIRECTO:',0,0,'');
    // $infoDiagnostico['arranqueDirecto']==1?$valor = 'X': $valor='';
    // $pdf->Cell(15,6,$valor,0,0,'');
    // $pdf->Cell(40,6,'ESTRELLA TRIANGULO:',0,0,'');
    // $infoDiagnostico['estrellaTriangulo']==1?$valor = 'X': $valor='';
    // $pdf->Cell(15,6,$valor,0,1,'');

    // $pdf->Cell(25,6,'Hidroflow:',0,0,'');
    // $infoDiagnostico['hidroflow']==1?$valor = 'X': $valor='';
    // $pdf->Cell(15,6,$valor,0,0,'');
    // $pdf->Cell(20,6,'Capacidad:',0,0,'');
    // $pdf->Cell(20,6,$infoDiagnostico['capacidad'],0,0,'');
    // $pdf->Cell(25,6,'Marca Bombas:',0,0,'');
    // $pdf->Cell(15,6,$infoDiagnostico['marcaBombas'],0,1,'');
    
    // $pdf->Cell(25,6,'HP:',0,0,'');
    // $pdf->Cell(15,6,$infoDiagnostico['hp'],0,0,'');
    // $pdf->Cell(20,6,'Fugas:',0,0,'');
    // $pdf->Cell(20,6,$infoDiagnostico['fugas'],0,0,'');
    // $pdf->Cell(30,6,'Presion de trabajo:',0,0,'');
    // $pdf->Cell(20,6,$infoDiagnostico['presionTrabajo'],0,1,'');
    
    // $pdf->Cell(30,6,'Marca del tablero:',0,0,'');
    // $pdf->Cell(120,6,$infoDiagnostico['marcaTablero'],0,1,'');
    
    // $pdf->Cell(30,6,'Material tuberia:',0,0,'');
    // $pdf->Cell(120,6,$infoDiagnostico['materialTuberia'],0,1,'');

    // $pdf->Cell(180,6,'Concepto Tecnico Agua Potable:',1,1,'C');
    // $pdf->MultiCell(180,6,$infoDiagnostico['conceptoTecnico'],0,'J','');



    $pdf->Output();
    ?>