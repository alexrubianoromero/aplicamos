function formuNuevoDiagnostico(){
    const http=new XMLHttpRequest();
    const url = '../diagnosticoEbAp/diagnosticoEbAp.php';
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status ==200){
              console.log(this.responseText);
           document.getElementById("divResultadosDiagEbAp").innerHTML  = this.responseText;
        }
    };
    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send("opcion=formuNuevoDiagnostico"
    );
}

function mostrarDiagnosticos(){
    const http=new XMLHttpRequest();
    const url = '../diagnosticoEbAp/diagnosticoEbAp.php';
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status ==200){
              console.log(this.responseText);
           document.getElementById("divResultadosDiagEbAp").innerHTML  = this.responseText;
        }
    };
    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send("opcion=mostrarDiagnosticos"
    );
}
function verDiagnostico(idDiagnostico){
    const http=new XMLHttpRequest();
    const url = '../diagnosticoEbAp/diagnosticoEbAp.php';
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status ==200){
              console.log(this.responseText);
           document.getElementById("divResultadosDiagEbAp").innerHTML  = this.responseText;
        }
    };
    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send("opcion=verDiagnostico"
    +'&idDiagnostico='+idDiagnostico
    );
}
function verimagenesDiagnosticoEbAp(idDiagnostico){
    const http=new XMLHttpRequest();
    const url = '../diagnosticoEbAp/diagnosticoEbAp.php';
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status ==200){
              console.log(this.responseText);
           document.getElementById("cuerpoModalVerImagenesDiagnostico").innerHTML  = this.responseText;
        }
    };
    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send("opcion=verimagenesDiagnosticoEbAp"
    +'&idDiagnostico='+idDiagnostico
    );
}

function formuAgregarImagenDiagnostico(idDiagnostico){
    // alert(idDiagnostico)
    const http=new XMLHttpRequest();
    const url = '../diagnosticoEbAp/diagnosticoEbAp.php';
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status ==200){
              console.log(this.responseText);
           document.getElementById("cuerpoModalVerImagenesDiagnostico").innerHTML  = this.responseText;
        }
    };
    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send("opcion=formuAgregarImagenDiagnostico"
    +'&idDiagnostico='+idDiagnostico
    );
}


function realizarCargaArchivoImagen()
{
    var inputFile = document.getElementById('imagen');

    if (inputFile.files.length > 0) {
        let formData = new FormData();
        formData.append("file", inputFile.files[0]); // En la posición 0; es decir, el primer elemento
        formData.append("opcion", 'cargarArchivo'); // En la posición 0; es decir, el primer elemento
        // fetch("cargues/cargues.php", {
        fetch("cargues/cargar_stickers.php", {
            method: 'POST',
            body: formData,
        })
            .then(respuesta => respuesta.text())
            .then(decodificado => {
                console.log(decodificado.archivo);
                document.getElementById("div_cargue_archivo").innerHTML = 'Cargue Realizado!!';
            });
    } else {
        alert("Selecciona un archivo");
    }
}



function formuAdicionarTableroEbAp(idDiagnostico){
    const http=new XMLHttpRequest();
    const url = '../diagnosticoEbAp/diagnosticoEbAp.php';
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status ==200){
              console.log(this.responseText);
           document.getElementById("divResultadosDiagEbAp").innerHTML  = this.responseText;
        }
    };
    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send("opcion=formuAdicionarTableroEbAp"
    +'&idDiagnostico='+idDiagnostico
    );
}

function crearEncabezadoDiagnosticoEbAp()
{
    var idCliente = document.getElementById('idCliente').value;
    var idUsuario = document.getElementById('idUsuario').value;
    var valida = validaInfoNuevoDiagnosticoEbAp();
    if(valida)
    { 
        const http=new XMLHttpRequest();
        const url = '../diagnosticoEbAp/diagnosticoEbAp.php';
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status ==200){
                console.log(this.responseText);
                document.getElementById("divResultadosDiagEbAp").innerHTML  = this.responseText;
            }
        };
        http.open("POST",url);
        http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        http.send("opcion=crearEncabezadoDiagnosticoEbAp"
        +'&idCliente='+idCliente
        +'&idUsuario='+idUsuario
        );
    }

}


function validaInfoNuevoDiagnosticoEbAp()
{
    if(document.getElementById("idCliente").value == '')
    {
       alert("Escoja un cliente") ;  
       document.getElementById("idCliente").focus();
       return 0;
    }
    if(document.getElementById("idUsuario").value == '')
    {
       alert("Escoja un usuario") ;  
       document.getElementById("idUsuario").focus();
       return 0;
    }
    return 1;
}

function filtrarDiagnosticosEbApPorFecha(idCliente)
{
    var fechain = document.getElementById('fechain').value;
    var fechafin = document.getElementById('fechafin').value;
    const http=new XMLHttpRequest();
    const url = '../diagnosticoEbAp/diagnosticoEbAp.php';
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status ==200){
            console.log(this.responseText);
            document.getElementById("div_mostrar_info_diagnostico").innerHTML  = this.responseText;
        }
    };
    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send("opcion=filtrarDiagnosticosEbApPorFecha"
    +'&idCliente='+idCliente
    +'&fechain='+fechain
    +'&fechafin='+fechafin
    );
}
//esta funcion traer los datos basicos del ultimo mantenimiento del cliente 
function traerUltimoDiagnosticoCliente()
{
    var idCliente = document.getElementById('idCliente').value;
    const http=new XMLHttpRequest();
    const url = '../diagnosticoEbAp/diagnosticoEbAp.php';
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status ==200){
            console.log(this.responseText);
            document.getElementById("div_ultimo_diagnostico_cliente").innerHTML  = this.responseText;
        }
    };
    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send("opcion=traerUltimoDiagnosticoCliente"
    +'&idCliente='+idCliente
    );
}

//esta funcion ya muestra todo el diagnostico del ultimo cliente 
function traerInfoCompletaUltimoDiagnostico(idDiagnostico)
{
    // var idCliente = document.getElementById('idCliente').value;
    const http=new XMLHttpRequest();
    const url = '../diagnosticoEbAp/diagnosticoEbAp.php';
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status ==200){
            console.log(this.responseText);
            document.getElementById("cuerpoModalUltimoDiagnostico").innerHTML  = this.responseText;
        }
    };
    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send("opcion=traerInfoCompletaUltimoDiagnostico"
    +'&idDiagnostico='+idDiagnostico
    );
}
function enviarCorreoConDiagnostico(idDiagnostico)
{
    // var idCliente = document.getElementById('idCliente').value;
    const http=new XMLHttpRequest();
    const url = '../diagnosticoEbAp/diagnosticoEbAp.php';
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status ==200){
            console.log(this.responseText);
            document.getElementById("cuerpoModalEnviarCorreo").innerHTML  = this.responseText;
        }
    };
    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send("opcion=enviarCorreoConDiagnostico"
    +'&idDiagnostico='+idDiagnostico
    );
}
function formuModificarObservaImagen(idImagen)
{
    // var idCliente = document.getElementById('idCliente').value;
    const http=new XMLHttpRequest();
    const url = '../diagnosticoEbAp/diagnosticoEbAp.php';
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status ==200){
            console.log(this.responseText);
            document.getElementById("cuerpoModalVerImagenesDiagnostico").innerHTML  = this.responseText;
        }
    };
    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send("opcion=formuModificarObservaImagen"
    +'&idImagen='+idImagen
    );
}
function modificarObservacionesImagen(idImagen)
{
    var observaciones = document.getElementById('observacionesImagen').value;
    const http=new XMLHttpRequest();
    const url = '../diagnosticoEbAp/diagnosticoEbAp.php';
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status ==200){
            console.log(this.responseText);
            document.getElementById("cuerpoModalVerImagenesDiagnostico").innerHTML  = this.responseText;
        }
    };
    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send("opcion=modificarObservacionesImagen"
    +'&idImagen='+idImagen
    +'&observaciones='+observaciones
    );
}


function grabarDiagnosticoEbAp(){
    // alert('grabar diagnostico');

    var idDiagnostico = document.getElementById('idDiagnostico').value;
    
    var concepto1 = document.getElementById('concepto1').value;
    var concepto2 = document.getElementById('concepto2').value;
    var concepto3 = document.getElementById('concepto3').value;
    var concepto4 = document.getElementById('concepto4').value;
    var concepto5 = document.getElementById('concepto5').value;
    var concepto6 = document.getElementById('concepto6').value;
    var concepto7 = document.getElementById('concepto7').value;
    var concepto8 = document.getElementById('concepto8').value;
    var concepto9 = document.getElementById('concepto9').value;
    var concepto10 = document.getElementById('concepto10').value;
    var concepto11 = document.getElementById('concepto11').value;
    var concepto12 = document.getElementById('concepto12').value;
    var concepto13 = document.getElementById('concepto13').value;
    var concepto14 = document.getElementById('concepto14').value;
    var concepto15 = document.getElementById('concepto15').value;
    var concepto16 = document.getElementById('concepto16').value;
    var concepto17 = document.getElementById('concepto17').value;
    var concepto18 = document.getElementById('concepto18').value;
    var concepto19 = document.getElementById('concepto19').value;
    var concepto20 = document.getElementById('concepto20').value;
    var concepto21 = document.getElementById('concepto21').value;
    var concepto22 = document.getElementById('concepto22').value;
    var concepto23 = document.getElementById('concepto23').value;
    var concepto24 = document.getElementById('concepto24').value;
    var concepto25 = document.getElementById('concepto25').value;
    var concepto26 = document.getElementById('concepto26').value;
    var concepto27 = document.getElementById('concepto27').value;
    var concepto28 = document.getElementById('concepto28').value;
    var concepto29 = document.getElementById('concepto29').value;
    var concepto30 = document.getElementById('concepto30').value;
    var conceptoTecnico = document.getElementById('conceptoTecnico').value;

    var checkVariador = 0; if(document.getElementById('checkVariador').checked){ checkVariador=1; }
    var checkArranque = 0; if(document.getElementById('checkArranque').checked){ checkArranque=1; }
    var checkEstrella = 0; if(document.getElementById('checkEstrella').checked){ checkEstrella=1; }
    var checkHidroflow = 0; if(document.getElementById('checkHidroflow').checked){ checkHidroflow=1; }
    var capacidad = document.getElementById('capacidad').value;
    var marcaBomba = document.getElementById('marcaBomba').value;
    var hp = document.getElementById('hp').value;
    var fugas = document.getElementById('fugas').value;
    var marcasTableros = document.getElementById('marcasTableros').value;
    var presiondetrabajoOn = document.getElementById('presiondetrabajoOn').value;
    var presiondetrabajoOff = document.getElementById('presiondetrabajoOff').value;
    var materialTuberia = document.getElementById('materialTuberia').value;


    
    
    const http=new XMLHttpRequest();
    const url = '../diagnosticoEbAp/diagnosticoEbAp.php';
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status ==200){
            console.log(this.responseText);
            document.getElementById("divResultadosDiagEbAp").innerHTML  = this.responseText;
        }
    };
    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send("opcion=grabarDiagnosticoEbAp"
    +'&idDiagnostico='+idDiagnostico

    +'&concepto1='+concepto1
    +'&concepto2='+concepto2
    +'&concepto3='+concepto3
    +'&concepto4='+concepto4
    +'&concepto5='+concepto5
    +'&concepto6='+concepto6
    +'&concepto7='+concepto7
    +'&concepto8='+concepto8
    +'&concepto9='+concepto9
    +'&concepto10='+concepto10
    +'&concepto11='+concepto11
    +'&concepto12='+concepto12
    +'&concepto13='+concepto13
    +'&concepto14='+concepto14
    +'&concepto15='+concepto15
    +'&concepto16='+concepto16
    +'&concepto17='+concepto17
    +'&concepto18='+concepto18
    +'&concepto19='+concepto19
    +'&concepto20='+concepto20
    +'&concepto21='+concepto21
    +'&concepto22='+concepto22
    +'&concepto23='+concepto23
    +'&concepto24='+concepto24
    +'&concepto25='+concepto25
    +'&concepto26='+concepto26
    +'&concepto27='+concepto27
    +'&concepto28='+concepto28
    +'&concepto29='+concepto29
    +'&concepto30='+concepto30

    +'&conceptoTecnico='+conceptoTecnico

    +'&checkVariador='+checkVariador
    +'&checkArranque='+checkArranque
    +'&checkEstrella='+checkEstrella
    +'&checkHidroflow='+checkHidroflow
    +'&capacidad='+capacidad
    +'&marcaBomba='+marcaBomba
    +'&hp='+hp
    +'&fugas='+fugas
    +'&marcasTableros='+marcasTableros
    +'&presiondetrabajoOn='+presiondetrabajoOn
    +'&presiondetrabajoOff='+presiondetrabajoOff
    +'&presiondetrabajoOn='+presiondetrabajoOn
    +'&materialTuberia='+materialTuberia

    );
}



function realizarCargaArchivo(idDiagnostico)
{
    // var idPedidoDev = document.getElementById('idPedidoDev').value;
    // var idItemDev = document.getElementById('idItemDev').value;
    // var obseDevolucion = document.getElementById('obseDevolucion').value;
    // alert(idDiagnostico);
    var valida = validaObservacionesImagen();
    if(valida)
    {
        var inputFile = document.getElementById('archivo');
        var observaciones = document.getElementById('observacionesDeLaImagen').value;
        if (inputFile.files.length > 0) {
            let formData = new FormData();
            formData.append("archivo", inputFile.files[0]); // En la posición 0; es decir, el primer elemento
            formData.append("opcion", 'realizarCargaArchivo'); // En la posición 0; es decir, el primer elemento
            formData.append("idDiagnostico", idDiagnostico); // En la posición 0; es decir, el primer elemento
            formData.append("observaciones", observaciones); // En la posición 0; es decir, el primer elemento
            // formData.append("idPedidoDev", idPedidoDev); // En la posición 0; es decir, el primer elemento
            // formData.append("idItemDev", idItemDev); // En la posición 0; es decir, el primer elemento
            // formData.append("obseDevolucion", obseDevolucion); // En la posición 0; es decir, el primer elemento
            // '../diagnosticoEbAp/diagnosticoEbAp.php';
            fetch("../diagnosticoEbAp/diagnosticoEbAp.php", {
                method: 'POST',
                body: formData,
            })
            .then(respuesta => respuesta.text())
            .then(decodificado => {
                console.log(decodificado.archivo);
                document.getElementById("cuerpoModalVerImagenesDiagnostico").innerHTML = 'Imagen Almacenada!!';
            });
        } else {
            alert("Selecciona un archivo");
        }
        
        setTimeout(() => {
            verimagenesDiagnosticoEbAp(idDiagnostico); 
        }, 300);
    }
}



function validaObservacionesImagen()
{
    if(document.getElementById("observacionesDeLaImagen").value == '')
    {
       alert("Digite Observaciones Imagen") ;  
       document.getElementById("observacionesDeLaImagen").focus();
       return 0;
    }
    return 1;
}

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
