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

function crearEncabezadoDiagnosticoEbAp()
{
    var idCliente = document.getElementById('idCliente').value;
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
    );
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
    );
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
