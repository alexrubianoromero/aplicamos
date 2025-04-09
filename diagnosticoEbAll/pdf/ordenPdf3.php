<?php
            // echo '<pre>';
            // print_r($_REQUEST); 
            // echo '</pre>';
            // die();
// $raiz= $_SERVER['DOCUMENT_ROOT'];
$_REQUEST['idDiagnostico'] = $_REQUEST['id']; 
date_default_timezone_set('America/Bogota');
// die($raiz);
$ruta = dirname(dirname(dirname(__FILE__)));
// die('ruta'.$ruta); 
require_once($ruta.'/fpdf/fpdf.php');
require_once($ruta .'/diagnosticoEbAll/models/DiagnosticoEbAllModel.php');
require_once($raiz.'/diagnosticoEbAll/models/ConceptoTableroEbAllModel.php'); 
require_once($raiz.'/clientes/models/ClienteModel.php'); 
require_once($raiz.'/diagnosticoEbAll/models/TableroDiagnosticoEbAllModel.php'); 
require_once($raiz.'/diagnosticoEbAll/models/ImagenDiagnosticoEbAllModel.php'); 
require_once($raiz.'/movil/model/UsuarioModel.php'); 

$diagnosticoModel = new DiagnosticoEbAllModel();
$clienteModel = new ClienteModel();
$usuarioModel = new UsuarioModel();
$conceptoTableroModel = new ConceptoTableroEbAllModel();
$tableroDiagnosticoModel = new TableroDiagnosticoEbAllModel();
$imagenModel = new ImagenDiagnosticoEbAllModel();

$infoDiagnostico = $diagnosticoModel->traerDiagnosticoId($_REQUEST['idDiagnostico']); 
$numeroTableros = $infoDiagnostico['numeroTableros']; 
$infoCliente = $clienteModel->traerClienteId($infoDiagnostico['idCliente']); 
$infoUsuario = $usuarioModel->traerusuarioId($infoDiagnostico['idAtendioVisita']);
$convenciones = "B=BUENO; R=REGULAR; M=MALO A=AUSENTE"; 
$numeroMaximoCasillasVisuales = 9;
        //   echo '<pre>';
        //     print_r($infoCliente); 
        //     echo '</pre>';
        //     die('antes de movimiento ');

$pdf=new FPDF();
$pdf->AddPage();
    $posx = 10; 
    $posy = 5;
    $tamano = 35;
    $pdf->Image('../../movil/imagen/logonuevo.png',$posx,$posy,$tamano);
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(35);
    $pdf->Cell(35,6,'Razon Social:',1,0,'');
    $pdf->Cell(80,6,substr($infoCliente['nombre'],0,40),1,0,'');
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
    $pdf->SetFont('Arial','B',11);
    $pdf->Cell(115,6,'DIAGNOSTICO EQUIPO DE BOMBEO AGUAS LLUVIAS',0,1,'C');

    
    
    
    $tamLetra = 9;
    $alto = '6'; 
    $anchoValores = 15;
    $pdf->Ln(2);
    
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(60,$alto,'TABLEROS',1,0,'L');
    for($i=1;$i< $numeroMaximoCasillasVisuales;$i++)
    {
        $pdf->Cell($anchoValores,$alto,'B'.$i,1,0,'C');
    }
    
    $pdf->Cell($anchoValores,$alto,'B'.$i,1,1,'C');
    // $pdf->Ln(5);
    $conceptosTableroEbAp = $conceptoTableroModel->traerConceptosTablerosEbALL(); 
    $pdf->SetFont('Arial','',$tamLetra);
    foreach($conceptosTableroEbAp as $concepto)
    {
        $pdf->Cell(60,$alto,$concepto['descripcion'],1,0,'L');
        for($i=1;$i< $numeroMaximoCasillasVisuales;$i++)
        {
            if($i <= $numeroTableros)
            {
                $valor = $tableroDiagnosticoModel->traerTableroIdConcepNumTableroIdDiag($concepto['id'],$i,$_REQUEST['idDiagnostico']);
                $pdf->Cell($anchoValores,$alto,$valor['valorConceptoTablero'],1,0,'C');
            }
            else{
                $pdf->Cell($anchoValores,$alto,'',1,0,'C');
            }
        }
        $valor = $tableroDiagnosticoModel->traerTableroIdConcepNumTableroIdDiag($concepto['id'],$i,$_REQUEST['idDiagnostico']);
        $pdf->Cell($anchoValores,$alto,$valor['valorConceptoTablero'],1,1,'C');
        
    }
    // $pdf->Ln(5);
    $pdf->Cell(25,6,'VARIADOR:',0,0,'');
    $infoDiagnostico['variador']==1?$valor = 'X': $valor='';
    $pdf->Cell(15,6,$valor,0,0,'');
    $pdf->Cell(40,6,'ARRANQUE DIRECTO:',0,0,'');
    $infoDiagnostico['arranqueDirecto']==1?$valor = 'X': $valor='';
    $pdf->Cell(15,6,$valor,0,0,'');
    $pdf->Cell(40,6,'ESTRELLA TRIANGULO:',0,0,'');
    $infoDiagnostico['estrellaTriangulo']==1?$valor = 'X': $valor='';
    $pdf->Cell(15,6,$valor,0,1,'');

    $pdf->Cell(25,6,'Hidroflow:',0,0,'');
    $infoDiagnostico['hidroflow']==1?$valor = 'X': $valor='';
    $pdf->Cell(15,6,$valor,0,0,'');
    $pdf->Cell(20,6,'Capacidad:',0,0,'');
    $pdf->Cell(20,6,$infoDiagnostico['capacidad'],0,0,'');
    $pdf->Cell(25,6,'Marca Bombas:',0,0,'');
    $pdf->Cell(15,6,$infoDiagnostico['marcaBombas'],0,1,'');
    
    $pdf->Cell(25,6,'HP:',0,0,'');
    $pdf->Cell(15,6,$infoDiagnostico['hp'],0,0,'');
    $pdf->Cell(20,6,'Fugas:',0,0,'');
    $pdf->Cell(20,6,$infoDiagnostico['fugas'],0,0,'');
    $pdf->Cell(30,6,'Presion de trabajo:',0,0,'');
    $pdf->Cell(20,6,$infoDiagnostico['presionTrabajo'],0,1,'');
    
    $pdf->Cell(30,6,'Marca del tablero:',0,0,'');
    $pdf->Cell(120,6,$infoDiagnostico['marcaTablero'],0,1,'');
    
    $pdf->Cell(30,6,'Material tuberia:',0,0,'');
    $pdf->Cell(120,6,$infoDiagnostico['materialTuberia'],0,1,'');

    $pdf->Cell(190,6,'Concepto Tecnico Agua Potable:',1,1,'C');
    $pdf->MultiCell(190,6,iconv("UTF-8", "ISO-8859-1//TRANSLIT",$infoDiagnostico['conceptoTecnico']),0,'J','');
    // $vertical =  $pdf->GetY();
    // $pdf->SetY($vertical+5,'');
    
    $pdf->SetAutoPageBreak();
    $pdf->Ln(2);
    $posicionVertical = $pdf->GetY();
    $pdf->Cell(190,6,'IMAGENES DIAGNOSTICO',1,1,'C');
    
    $raiz123 = dirname(dirname(dirname(__file__)));
    $imagenes = $imagenModel->traerImagenesDiagnosticoId($_REQUEST['idDiagnostico']);
    $posInicial = 20;
    $tamano= 40;
    $variaY = 20;
    $n=1;
    foreach($imagenes as $imagen)
    {
        $rutaImagen = '../../'.$imagen['rutaImagen'].'/'.$imagen['nombre'];
        // $pdf->Cell(180,6,   $rutaImagen,1,1,'C');
        $pdf->Ln(2);
        $pdf->Image($rutaImagen,'70',$posicionVertical+10 ,'',$tamano);
        $pdf->setY($posicionVertical +10);
        $pdf->Cell(100,6,$imagen['observaciones'],0,'','1');

        $posicionVertical = $posicionVertical + $tamano+2;

        $pdf->Cell(30);
        $variaY = $variaY + $tamano +4;
        // $posVertical = $tamano * $n;
        $n=$n+2;
        // $posVertical = $tamano * $n;
        // $n=$n+1;
    }


    $pdf->Output();
    ?>