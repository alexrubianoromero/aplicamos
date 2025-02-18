function formuNuevaInspeccionCi(){
    // alert('inspeccion'); 
    const http=new XMLHttpRequest();
    const url = '../inspeccionesCi/inspeccionesCi.php';
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status ==200){
              console.log(this.responseText);
           document.getElementById("divResultadosDiagEbAp").innerHTML  = this.responseText;
        }
    };
    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send("opcion=formuNuevaInspeccionCi"
    );
}

function traerUltimoFormatoInspeccionCliente()
{
    var idCliente = document.getElementById('idCliente').value;
    const http=new XMLHttpRequest();
    const url = '../inspeccionesCi/inspeccionesCi.php';
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status ==200){
            console.log(this.responseText);
            document.getElementById("div_ultimo_diagnostico_cliente").innerHTML  = this.responseText;
        }
    };
    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send("opcion=traerUltimoFormatoInspeccionCliente"
    +'&idCliente='+idCliente
    );
}
function grabarDiagnosticoInspeccion()
{
    // grabarDiagnosticoInspeccionBombaLider();
    grabarDiagnosticoInspeccionBombaJockey();
    // grabarInfoTableroLiderModel();
}

function grabarDiagnosticoInspeccionBombaLider()
{
    
    var idDiagnostico = document.getElementById('idDiagnostico').value;
    var operativaAutomatico = document.getElementById('operativaAutomatico').value;
    var equipoListado = document.getElementById('equipoListado').value;
    var modelo = document.getElementById('modelo').value;
    var marcaBomba = document.getElementById('marcaBomba').value;
    var potencia = document.getElementById('potencia').value;
    var transferencia = document.getElementById('transferencia').value;
    var ubicacion = document.getElementById('ubicacion').value;
    var tipoBomba = document.getElementById('tipoBomba').value;
    var tipoSuccion = document.getElementById('tipoSuccion').value;
    var ultimaPitometrica = document.getElementById('ultimaPitometrica').value;
    var qmaxGpm = document.getElementById('qmaxGpm').value;
    var presionMAxPsi = document.getElementById('presionMAxPsi').value;
    var qNominalGpm = document.getElementById('qNominalGpm').value;
    var presionAl150 = document.getElementById('presionAl150').value;
    var diametroSuccion = document.getElementById('diametroSuccion').value;
    var diametroDescarga = document.getElementById('diametroDescarga').value;
    var materialTuberia = document.getElementById('materialTuberia').value;
    var fugas = document.getElementById('fugas').value;
    var tipoCabezal = document.getElementById('tipoCabezal').value;
    var tanqueIndependiente = document.getElementById('tanqueIndependiente').value;
    var nanomentro = document.getElementById('nanomentro').value;
    var selloMecanico = document.getElementById('selloMecanico').value;
    var manovacumetro = document.getElementById('manovacumetro').value;
    var rodamientosMotor = document.getElementById('rodamientosMotor').value;
    var empaquetadura = document.getElementById('empaquetadura').value;
    var comprobacionVentilador = document.getElementById('comprobacionVentilador').value;
    var valvulasDeCorte = document.getElementById('valvulasDeCorte').value;
    var caudalimetro = document.getElementById('caudalimetro').value;
    var valvulaAlivio = document.getElementById('valvulaAlivio').value;
    var retornoTanque = document.getElementById('retornoTanque').value;
    var idCondicionOperacion = document.getElementById('idCondicionOperacion').value;
    var contactor = document.getElementById('contactorLider').value;
    var indicador = document.getElementById('indicadorLider').value;
    var guardamotor = document.getElementById('guardamotorLider').value;
    var fusibles = document.getElementById('fusiblesLider').value;
    var temporizador = document.getElementById('temporizadorLider').value;
    var presostatos = document.getElementById('presostatosLider').value;
    var caudalimetrotablero = document.getElementById('caudalimetrotableroLider').value;
    var tablero = document.getElementById('tableroLider').value;
    var display = document.getElementById('displayLider').value;

    var valida = validaCamposBombaLider();
    
    if(valida)
    {

        
        const http=new XMLHttpRequest();
        const url = '../inspeccionesCi/inspeccionesCi.php';
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status ==200){
                console.log(this.responseText);
                document.getElementById("div_ultimo_diagnostico_cliente").innerHTML  = this.responseText;
            }
        };
        http.open("POST",url);
        http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        http.send("opcion=grabarDiagnosticoInspeccionBombaLider"
            +'&idDiagnostico='+idDiagnostico
            +'&operativaAutomatico='+operativaAutomatico
            +'&equipoListado='+equipoListado
            +'&modelo='+modelo
            +'&marcaBomba='+marcaBomba
            +'&potencia='+potencia
            +'&transferencia='+transferencia
            +'&ubicacion='+ubicacion
            +'&tipoBomba='+tipoBomba
            +'&tipoSuccion='+tipoSuccion
            +'&ultimaPitometrica='+ultimaPitometrica
            +'&qmaxGpm='+qmaxGpm
            +'&presionMAxPsi='+presionMAxPsi
            +'&qNominalGpm='+qNominalGpm
            +'&presionAl150='+presionAl150
            +'&diametroSuccion='+diametroSuccion
            +'&diametroDescarga='+diametroDescarga
            +'&materialTuberia='+materialTuberia
            +'&fugas='+fugas
            +'&tipoCabezal='+tipoCabezal
            +'&tanqueIndependiente='+tanqueIndependiente
            +'&nanomentro='+nanomentro
            +'&selloMecanico='+selloMecanico
            +'&manovacumetro='+manovacumetro
            +'&rodamientosMotor='+rodamientosMotor
            +'&empaquetadura='+empaquetadura
            +'&comprobacionVentilador='+comprobacionVentilador
            +'&selloMecanico='+selloMecanico
            +'&valvulasDeCorte='+valvulasDeCorte
            +'&caudalimetro='+caudalimetro
            +'&valvulaAlivio='+valvulaAlivio
            +'&retornoTanque='+retornoTanque
            +'&idCondicionOperacion='+idCondicionOperacion
            +'&contactor='+contactor
            +'&indicador='+indicador
            +'&guardamotor='+guardamotor
            +'&fusibles='+fusibles
            +'&temporizador='+temporizador
            +'&presostatos='+presostatos
            +'&caudalimetrotablero='+caudalimetrotablero
            +'&tablero='+tablero
            +'&display='+display
        );

    }
}

function grabarDiagnosticoInspeccionBombaJockey()
{
    
    var idDiagnostico = document.getElementById('idDiagnostico').value;
    var operativaAutomatico = document.getElementById('operativaAutomaticoJockey').value;
    var equipoListado = document.getElementById('equipoListadoJockey').value;
    var modelo = document.getElementById('modeloJockey').value;
    var marcaBomba = document.getElementById('marcaBombaJockey').value;
    var potencia = document.getElementById('potenciaJockey').value;
    var tipoBomba = document.getElementById('tipoBombaJockey').value;
    var qmaxGpm = document.getElementById('qmaxGpmJockey').value;
    var presionMAxPsi = document.getElementById('presionMAxPsiJockey').value;
    var qNominalGpm = document.getElementById('qNominalGpmJockey').value;
    var presionAl150 = document.getElementById('presionAl150Jockey').value;
    var diametroSuccion = document.getElementById('diametroSuccionJockey').value;
    var diametroDescarga = document.getElementById('diametroDescargaJockey').value;
    var materialTuberia = document.getElementById('materialTuberiaJockey').value;
    var fugas = document.getElementById('fugasJockey').value;
    var nanomentro = document.getElementById('nanomentroJockey').value;
    var selloMecanico = document.getElementById('selloMecanicoJockey').value;
    var manovacumetro = document.getElementById('manovacumetroJockey').value;
    var rodamientosMotor = document.getElementById('rodamientosMotorJockey').value;
    var empaquetadura = document.getElementById('empaquetaduraJockey').value;
    var comprobacionVentilador = document.getElementById('comprobacionVentiladorJockey').value;
    var valvulasDeCorte = document.getElementById('valvulasDeCorteJockey').value;
    var instrucciones = document.getElementById('instrucciones').value;
    var demarcacion = document.getElementById('demarcacion').value;
    var luzemergecia = document.getElementById('luzemergecia').value;
    var areaenorden = document.getElementById('areaenorden').value;

    var contactor = document.getElementById('contactorJockey').value;
    var indicador = document.getElementById('indicadorJockey').value;
    var guardamotor = document.getElementById('guardamotorJockey').value;
    var fusibles = document.getElementById('fusiblesJockey').value;
    var temporizador = document.getElementById('temporizadorJockey').value;
    var presostatos = document.getElementById('presostatosJockey').value;
    var transductor = document.getElementById('transductorJockey').value;
 

    
    // if(valida)
    // {

        
        const http=new XMLHttpRequest();
        const url = '../inspeccionesCi/inspeccionesCi.php';
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status ==200){
                console.log(this.responseText);
                document.getElementById("div_ultimo_diagnostico_cliente").innerHTML  = this.responseText;
            }
        };
        http.open("POST",url);
        http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        http.send("opcion=grabarDiagnosticoInspeccionBombaJockey"
            +'&idDiagnostico='+idDiagnostico
            +'&operativaAutomatico='+operativaAutomatico
            +'&equipoListado='+equipoListado
            +'&modelo='+modelo
            +'&marcaBomba='+marcaBomba
            +'&potencia='+potencia
            +'&tipoBomba='+tipoBomba
            +'&qmaxGpm='+qmaxGpm
            +'&presionMAxPsi='+presionMAxPsi
            +'&qNominalGpm='+qNominalGpm
            +'&presionAl150='+presionAl150
            +'&diametroSuccion='+diametroSuccion
            +'&diametroDescarga='+diametroDescarga
            +'&materialTuberia='+materialTuberia
            +'&fugas='+fugas
            +'&nanomentro='+nanomentro
            +'&selloMecanico='+selloMecanico
            +'&manovacumetro='+manovacumetro
            +'&rodamientosMotor='+rodamientosMotor
            +'&empaquetadura='+empaquetadura
            +'&comprobacionVentilador='+comprobacionVentilador
            +'&valvulasDeCorte='+valvulasDeCorte
            +'&instrucciones='+instrucciones
            +'&demarcacion='+demarcacion
            +'&luzemergecia='+luzemergecia
            +'&areaenorden='+areaenorden
            +'&contactor='+contactor
            +'&indicador='+indicador
            +'&guardamotor='+guardamotor
            +'&fusibles='+fusibles
            +'&temporizador='+temporizador
            +'&presostatos='+presostatos
            +'&transductor='+transductor
           
        );

    // }
}

function validaCamposBombaLider()
{
    if(document.getElementById("operativaAutomatico").value=='')
    {
        alert('Por favor digite operativaAutomatico ');
        document.getElementById("operativaAutomatico").focus();
        return false;
    }
    
    if(document.getElementById("equipoListado").value=='')
    {
        alert('Por favor digite equipoListado ');
        document.getElementById("equipoListado").focus();
        return false;
    }

    if(document.getElementById("modelo").value=='')
    {
        alert('Por favor digite modelo ');
        document.getElementById("modelo").focus();
        return false;
    }

    if(document.getElementById("marcaBomba").value=='')
    {
        alert('Por favor digite marcaBomba ');
        document.getElementById("marcaBomba").focus();
        return false;
    }

    if(document.getElementById("potencia").value=='')
    {
        alert('Por favor digite potencia ');
        document.getElementById("potencia").focus();
        return false;
    }
    if(document.getElementById("transferencia").value=='')
    {
        alert('Por favor digite transferencia ');
        document.getElementById("transferencia").focus();
        return false;
    }
    if(document.getElementById("ubicacion").value=='')
    {
        alert('Por favor digite ubicacion ');
        document.getElementById("ubicacion").focus();
        return false;
    }
    if(document.getElementById("tipoBomba").value=='')
    {
        alert('Por favor digite tipoBomba ');
        document.getElementById("tipoBomba").focus();
        return false;
    }
    if(document.getElementById("tipoSuccion").value=='')
    {
        alert('Por favor digite tipoSuccion ');
        document.getElementById("tipoSuccion").focus();
        return false;
    }
    if(document.getElementById("ultimaPitometrica").value=='')
    {
        alert('Por favor digite ultimaPitometrica ');
        document.getElementById("ultimaPitometrica").focus();
        return false;
    }
    if(document.getElementById("qmaxGpm").value=='')
    {
        alert('Por favor digite qmaxGpm ');
        document.getElementById("qmaxGpm").focus();
        return false;
    }
    if(document.getElementById("presionMAxPsi").value=='')
    {
        alert('Por favor digite presionMAxPsi ');
        document.getElementById("presionMAxPsi").focus();
        return false;
    }
    if(document.getElementById("qNominalGpm").value=='')
    {
        alert('Por favor digite qNominalGpm ');
        document.getElementById("qNominalGpm").focus();
        return false;
    }
    if(document.getElementById("presionAl150").value=='')
    {
        alert('Por favor digite presionAl150 ');
        document.getElementById("presionAl150").focus();
        return false;
    }
    if(document.getElementById("diametroSuccion").value=='')
    {
        alert('Por favor digite diametroSuccion ');
        document.getElementById("diametroSuccion").focus();
        return false;
    }
    if(document.getElementById("diametroDescarga").value=='')
    {
        alert('Por favor digite diametroDescarga ');
        document.getElementById("diametroDescarga").focus();
        return false;
    }
    if(document.getElementById("materialTuberia").value=='')
    {
        alert('Por favor digite materialTuberia ');
        document.getElementById("materialTuberia").focus();
        return false;
    }
    if(document.getElementById("fugas").value=='')
    {
        alert('Por favor digite fugas ');
        document.getElementById("fugas").focus();
        return false;
    }
    if(document.getElementById("tipoCabezal").value=='')
    {
        alert('Por favor digite tipoCabezal ');
        document.getElementById("tipoCabezal").focus();
        return false;
    }
    if(document.getElementById("tanqueIndependiente").value=='')
    {
        alert('Por favor digite tanqueIndependiente ');
        document.getElementById("tanqueIndependiente").focus();
        return false;
    }
    if(document.getElementById("nanomentro").value=='')
    {
        alert('Por favor digite nanomentro ');
        document.getElementById("nanomentro").focus();
        return false;
    }
    if(document.getElementById("selloMecanico").value=='')
    {
        alert('Por favor digite selloMecanico ');
        document.getElementById("selloMecanico").focus();
        return false;
    }
    if(document.getElementById("manovacumetro").value=='')
    {
        alert('Por favor digite manovacumetro ');
        document.getElementById("manovacumetro").focus();
        return false;
    }
    if(document.getElementById("rodamientosMotor").value=='')
    {
        alert('Por favor digite rodamientosMotor ');
        document.getElementById("rodamientosMotor").focus();
        return false;
    }
    if(document.getElementById("empaquetadura").value=='')
    {
        alert('Por favor digite empaquetadura ');
        document.getElementById("empaquetadura").focus();
        return false;
    }
    if(document.getElementById("comprobacionVentilador").value=='')
    {
        alert('Por favor digite comprobacionVentilador ');
        document.getElementById("comprobacionVentilador").focus();
        return false;
    }
    if(document.getElementById("selloMecanico").value=='')
    {
        alert('Por favor digite selloMecanico ');
        document.getElementById("selloMecanico").focus();
        return false;
    }
    if(document.getElementById("valvulasDeCorte").value=='')
    {
        alert('Por favor digite valvulasDeCorte ');
        document.getElementById("valvulasDeCorte").focus();
        return false;
    }
    if(document.getElementById("valvulasDeCorte").value=='')
    {
        alert('Por favor digite valvulasDeCorte ');
        document.getElementById("valvulasDeCorte").focus();
        return false;
    }
    if(document.getElementById("caudalimetro").value=='')
    {
        alert('Por favor digite caudalimetro ');
        document.getElementById("caudalimetro").focus();
        return false;
    }
    if(document.getElementById("valvulaAlivio").value=='')
    {
        alert('Por favor digite valvulaAlivio ');
        document.getElementById("valvulaAlivio").focus();
        return false;
    }
    if(document.getElementById("retornoTanque").value=='')
    {
        alert('Por favor digite retornoTanque ');
        document.getElementById("retornoTanque").focus();
        return false;
    }
    if(document.getElementById("idCondicionOperacion").value=='')
    {
        alert('Por favor digite idCondicionOperacion ');
        document.getElementById("idCondicionOperacion").focus();
        return false;
    }
    if(document.getElementById("contactorLider").value=='')
    {
        alert('Por favor digite contactor ');
        document.getElementById("contactorLider").focus();
        return false;
    }
    if(document.getElementById("indicadorLider").value=='')
    {
        alert('Por favor digite indicadorLider ');
        document.getElementById("indicadorLider").focus();
        return false;
    }
    if(document.getElementById("guardamotorLider").value=='')
    {
        alert('Por favor digite guardamotorLider ');
        document.getElementById("guardamotorLider").focus();
        return false;
    }
    if(document.getElementById("fusiblesLider").value=='')
    {
        alert('Por favor digite fusiblesLider ');
        document.getElementById("fusiblesLider").focus();
        return false;
    }
    if(document.getElementById("temporizadorLider").value=='')
    {
        alert('Por favor digite temporizadorLider ');
        document.getElementById("temporizadorLider").focus();
        return false;
    }
    if(document.getElementById("presostatosLider").value=='')
    {
        alert('Por favor digite presostatosLider ');
        document.getElementById("presostatosLider").focus();
        return false;
    }
    if(document.getElementById("caudalimetrotableroLider").value=='')
    {
        alert('Por favor digite caudalimetrotableroLider ');
        document.getElementById("caudalimetrotableroLider").focus();
        return false;
    }
    if(document.getElementById("tableroLider").value=='')
    {
        alert('Por favor digite tableroLider ');
        document.getElementById("tableroLider").focus();
        return false;
    }
    if(document.getElementById("displayLider").value=='')
    {
        alert('Por favor digite displayLider ');
        document.getElementById("displayLider").focus();
        return false;
    }


    return true;
}

function crearEncabezadoInspeccionIncencio()
{
    var idCliente = document.getElementById('idCliente').value;
    if(idCliente =='')
    { alert('Escoja un cliente'); }else
    {
        const http=new XMLHttpRequest();
        const url = '../inspeccionesCi/inspeccionesCi.php';
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status ==200){
                console.log(this.responseText);
                document.getElementById("divResultadosDiagEbAp").innerHTML  = this.responseText;
            }
        };
        http.open("POST",url);
        http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        http.send("opcion=crearEncabezadoInspeccionIncencio"
        +'&idCliente='+idCliente
        );
    }

}

function mostrarInspeccionesCi()
{
        const http=new XMLHttpRequest();
        const url = '../inspeccionesCi/inspeccionesCi.php';
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status ==200){
                  console.log(this.responseText);
               document.getElementById("divResultadosDiagEbAp").innerHTML  = this.responseText;
            }
        };
        http.open("POST",url);
        http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        http.send("opcion=mostrarInspeccionesCi"
        );
}


function verimagenesDiagnosticoCi(idDiagnostico){
    const http=new XMLHttpRequest();
    const url = '../inspeccionesCi/inspeccionesCi.php';
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status ==200){
              console.log(this.responseText);
           document.getElementById("cuerpoModalVerImagenesDiagnosticoCi").innerHTML  = this.responseText;
        }
    };
    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send("opcion=verimagenesDiagnosticoCi"
    +'&idDiagnostico='+idDiagnostico
    );
}

function formuAgregarImagenDiagnosticoCi(idDiagnostico){
    // alert(idDiagnostico)
    const http=new XMLHttpRequest();
    const url = '../inspeccionesCi/inspeccionesCi.php';
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status ==200){
              console.log(this.responseText);
           document.getElementById("cuerpoModalVerImagenesDiagnosticoCi").innerHTML  = this.responseText;
        }
    };
    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send("opcion=formuAgregarImagenDiagnosticoCi"
    +'&idDiagnostico='+idDiagnostico
    );
}

function realizarCargaArchivoCi(idDiagnostico)
{
    // var idPedidoDev = document.getElementById('idPedidoDev').value;
    // var idItemDev = document.getElementById('idItemDev').value;
    // var obseDevolucion = document.getElementById('obseDevolucion').value;
    // alert(idDiagnostico);
    var inputFile = document.getElementById('archivo');
    if (inputFile.files.length > 0) {
        let formData = new FormData();
        formData.append("archivo", inputFile.files[0]); // En la posición 0; es decir, el primer elemento
        formData.append("opcion", 'realizarCargaArchivoCi'); // En la posición 0; es decir, el primer elemento
        formData.append("idDiagnostico", idDiagnostico); // En la posición 0; es decir, el primer elemento
        // formData.append("idPedidoDev", idPedidoDev); // En la posición 0; es decir, el primer elemento
        // formData.append("idItemDev", idItemDev); // En la posición 0; es decir, el primer elemento
        // formData.append("obseDevolucion", obseDevolucion); // En la posición 0; es decir, el primer elemento
        // '../diagnosticoEbAp/diagnosticoEbAp.php';
        fetch("../inspeccionesCi/inspeccionesCi.php", {
            method: 'POST',
            body: formData,
        })
            .then(respuesta => respuesta.text())
            .then(decodificado => {
                console.log(decodificado.archivo);
                document.getElementById("cuerpoModalVerImagenesDiagnosticoCi").innerHTML = 'Imagen Almacenada!!';
            });
    } else {
        alert("Selecciona un archivo");
    }

    setTimeout(() => {
        verimagenesDiagnosticoEbAp(idDiagnostico); 
    }, 300);
}

// function mostrarDiagnosticos(){
//     const http=new XMLHttpRequest();
//     const url = '../diagnosticoEbAp/diagnosticoEbAp.php';
//     http.onreadystatechange = function(){
//         if(this.readyState == 4 && this.status ==200){
//               console.log(this.responseText);
//            document.getElementById("divResultadosDiagEbAp").innerHTML  = this.responseText;
//         }
//     };
//     http.open("POST",url);
//     http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//     http.send("opcion=mostrarDiagnosticos"
//     );
// }
// function verDiagnostico(idDiagnostico){
//     const http=new XMLHttpRequest();
//     const url = '../diagnosticoEbAp/diagnosticoEbAp.php';
//     http.onreadystatechange = function(){
//         if(this.readyState == 4 && this.status ==200){
//               console.log(this.responseText);
//            document.getElementById("divResultadosDiagEbAp").innerHTML  = this.responseText;
//         }
//     };
//     http.open("POST",url);
//     http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//     http.send("opcion=verDiagnostico"
//     +'&idDiagnostico='+idDiagnostico
//     );
// }
// function verimagenesDiagnosticoEbAp(idDiagnostico){
//     const http=new XMLHttpRequest();
//     const url = '../diagnosticoEbAp/diagnosticoEbAp.php';
//     http.onreadystatechange = function(){
//         if(this.readyState == 4 && this.status ==200){
//               console.log(this.responseText);
//            document.getElementById("imagenes_diagnosticoEbAp").innerHTML  = this.responseText;
//         }
//     };
//     http.open("POST",url);
//     http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//     http.send("opcion=verimagenesDiagnosticoEbAp"
//     +'&idDiagnostico='+idDiagnostico
//     );
// }
// function formuAgregarImagenDiagnostico(idDiagnostico){
//     // alert(idDiagnostico)
//     const http=new XMLHttpRequest();
//     const url = '../diagnosticoEbAp/diagnosticoEbAp.php';
//     http.onreadystatechange = function(){
//         if(this.readyState == 4 && this.status ==200){
//               console.log(this.responseText);
//            document.getElementById("imagenes_diagnosticoEbAp").innerHTML  = this.responseText;
//         }
//     };
//     http.open("POST",url);
//     http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//     http.send("opcion=formuAgregarImagenDiagnostico"
//     +'&idDiagnostico='+idDiagnostico
//     );
// }


// function realizarCargaArchivoImagen()
// {
//     var inputFile = document.getElementById('imagen');

//     if (inputFile.files.length > 0) {
//         let formData = new FormData();
//         formData.append("file", inputFile.files[0]); // En la posición 0; es decir, el primer elemento
//         formData.append("opcion", 'cargarArchivo'); // En la posición 0; es decir, el primer elemento
//         // fetch("cargues/cargues.php", {
//         fetch("cargues/cargar_stickers.php", {
//             method: 'POST',
//             body: formData,
//         })
//             .then(respuesta => respuesta.text())
//             .then(decodificado => {
//                 console.log(decodificado.archivo);
//                 document.getElementById("div_cargue_archivo").innerHTML = 'Cargue Realizado!!';
//             });
//     } else {
//         alert("Selecciona un archivo");
//     }
// }



// function formuAdicionarTableroEbAp(idDiagnostico){
//     const http=new XMLHttpRequest();
//     const url = '../diagnosticoEbAp/diagnosticoEbAp.php';
//     http.onreadystatechange = function(){
//         if(this.readyState == 4 && this.status ==200){
//               console.log(this.responseText);
//            document.getElementById("divResultadosDiagEbAp").innerHTML  = this.responseText;
//         }
//     };
//     http.open("POST",url);
//     http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//     http.send("opcion=formuAdicionarTableroEbAp"
//     +'&idDiagnostico='+idDiagnostico
//     );
// }


// function filtrarDiagnosticosEbApPorFecha(idCliente)
// {
//     var fechain = document.getElementById('fechain').value;
//     var fechafin = document.getElementById('fechafin').value;
//     const http=new XMLHttpRequest();
//     const url = '../diagnosticoEbAp/diagnosticoEbAp.php';
//     http.onreadystatechange = function(){
//         if(this.readyState == 4 && this.status ==200){
//             console.log(this.responseText);
//             document.getElementById("div_mostrar_info_diagnostico").innerHTML  = this.responseText;
//         }
//     };
//     http.open("POST",url);
//     http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//     http.send("opcion=filtrarDiagnosticosEbApPorFecha"
//     +'&idCliente='+idCliente
//     +'&fechain='+fechain
//     +'&fechafin='+fechafin
//     );
// }
//esta funcion traer los datos basicos del ultimo mantenimiento del cliente 


// //esta funcion ya muestra todo el diagnostico del ultimo cliente 
// function traerInfoCompletaUltimoDiagnostico(idDiagnostico)
// {
//     // var idCliente = document.getElementById('idCliente').value;
//     const http=new XMLHttpRequest();
//     const url = '../diagnosticoEbAp/diagnosticoEbAp.php';
//     http.onreadystatechange = function(){
//         if(this.readyState == 4 && this.status ==200){
//             console.log(this.responseText);
//             document.getElementById("cuerpoModalUltimoDiagnostico").innerHTML  = this.responseText;
//         }
//     };
//     http.open("POST",url);
//     http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//     http.send("opcion=traerInfoCompletaUltimoDiagnostico"
//     +'&idDiagnostico='+idDiagnostico
//     );
// }
// function enviarCorreoConDiagnostico(idDiagnostico)
// {
//     // var idCliente = document.getElementById('idCliente').value;
//     const http=new XMLHttpRequest();
//     const url = '../diagnosticoEbAp/diagnosticoEbAp.php';
//     http.onreadystatechange = function(){
//         if(this.readyState == 4 && this.status ==200){
//             console.log(this.responseText);
//             document.getElementById("cuerpoModalEnviarCorreo").innerHTML  = this.responseText;
//         }
//     };
//     http.open("POST",url);
//     http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//     http.send("opcion=enviarCorreoConDiagnostico"
//     +'&idDiagnostico='+idDiagnostico
//     );
// }


// function grabarDiagnosticoEbAp(){
//     // alert('grabar diagnostico');

//     var idDiagnostico = document.getElementById('idDiagnostico').value;
    
//     var concepto1 = document.getElementById('concepto1').value;
//     var concepto2 = document.getElementById('concepto2').value;
//     var concepto3 = document.getElementById('concepto3').value;
//     var concepto4 = document.getElementById('concepto4').value;
//     var concepto5 = document.getElementById('concepto5').value;
//     var concepto6 = document.getElementById('concepto6').value;
//     var concepto7 = document.getElementById('concepto7').value;
//     var concepto8 = document.getElementById('concepto8').value;
//     var concepto9 = document.getElementById('concepto9').value;
//     var concepto10 = document.getElementById('concepto10').value;
//     var concepto11 = document.getElementById('concepto11').value;
//     var concepto12 = document.getElementById('concepto12').value;
//     var concepto13 = document.getElementById('concepto13').value;
//     var concepto14 = document.getElementById('concepto14').value;
//     var concepto15 = document.getElementById('concepto15').value;
//     var concepto16 = document.getElementById('concepto16').value;
//     var concepto17 = document.getElementById('concepto17').value;
//     var concepto18 = document.getElementById('concepto18').value;
//     var concepto19 = document.getElementById('concepto19').value;
//     var concepto20 = document.getElementById('concepto20').value;
//     var concepto21 = document.getElementById('concepto21').value;
//     var concepto22 = document.getElementById('concepto22').value;
//     var concepto23 = document.getElementById('concepto23').value;
//     var concepto24 = document.getElementById('concepto24').value;
//     var concepto25 = document.getElementById('concepto25').value;
//     var concepto26 = document.getElementById('concepto26').value;
//     var concepto27 = document.getElementById('concepto27').value;
//     var concepto28 = document.getElementById('concepto28').value;
//     var concepto29 = document.getElementById('concepto29').value;
//     var concepto30 = document.getElementById('concepto30').value;

//     var conceptoTecnico = document.getElementById('conceptoTecnico').value;
    
    
//     const http=new XMLHttpRequest();
//     const url = '../diagnosticoEbAp/diagnosticoEbAp.php';
//     http.onreadystatechange = function(){
//         if(this.readyState == 4 && this.status ==200){
//             console.log(this.responseText);
//             document.getElementById("divResultadosDiagEbAp").innerHTML  = this.responseText;
//         }
//     };
//     http.open("POST",url);
//     http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//     http.send("opcion=grabarDiagnosticoEbAp"
//     +'&idDiagnostico='+idDiagnostico

//     +'&concepto1='+concepto1
//     +'&concepto2='+concepto2
//     +'&concepto3='+concepto3
//     +'&concepto4='+concepto4
//     +'&concepto5='+concepto5
//     +'&concepto6='+concepto6
//     +'&concepto7='+concepto7
//     +'&concepto8='+concepto8
//     +'&concepto9='+concepto9
//     +'&concepto10='+concepto10
//     +'&concepto11='+concepto11
//     +'&concepto12='+concepto12
//     +'&concepto13='+concepto13
//     +'&concepto14='+concepto14
//     +'&concepto15='+concepto15
//     +'&concepto16='+concepto16
//     +'&concepto17='+concepto17
//     +'&concepto18='+concepto18
//     +'&concepto19='+concepto19
//     +'&concepto20='+concepto20
//     +'&concepto21='+concepto21
//     +'&concepto22='+concepto22
//     +'&concepto23='+concepto23
//     +'&concepto24='+concepto24
//     +'&concepto25='+concepto25
//     +'&concepto26='+concepto26
//     +'&concepto27='+concepto27
//     +'&concepto28='+concepto28
//     +'&concepto29='+concepto29
//     +'&concepto30='+concepto30

//     +'&conceptoTecnico='+conceptoTecnico
//     );
// }


// let form = document.getElementById('formularioDiagnostico');

// form.addEventListener('submit', (e) =>{
//   e.preventDefault();
//   alert('grabar diagnostico');
//   let data = new FormData(e.currentTarget);
//   data.append('opcion', 'grabarDiagnosticoEbAp');


//   let request;
//   if(window.XMLHttpRequest) request = new XMLHttpRequest();
//   else request = new ActiveXObject('Microsoft.XMLHTTP'); 

//   request.addEventListener('load',()=>{
//     console.log(request);
//     document.getElementById("div_respuestas").innerHTML  = this.responseText;

//   });

//   request.open(
//     'POST',
//     '../diagnosticoEbAp/diagnosticoEbAp.php',
//     'true',
//     request.responseType='json'
//   );

//   request.send(data);

//   for (var value of data.values()) {
//     console.log(value);
//  }

// });
