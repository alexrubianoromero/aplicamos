function formuNuevoDiagnosticoEbAll(){
    const http=new XMLHttpRequest();
    const url = '../diagnosticoEbAll/diagnosticoEbAll.php';
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status ==200){
              console.log(this.responseText);
           document.getElementById("divResultadosDiagEbAll").innerHTML  = this.responseText;
        }
    };
    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send("opcion=formuNuevoDiagnostico"
    );
}

function mostrarDiagnosticosEbAll(){
    const http=new XMLHttpRequest();
    const url = '../diagnosticoEbAll/diagnosticoEbAll.php';
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status ==200){
              console.log(this.responseText);
           document.getElementById("divResultadosDiagEbAll").innerHTML  = this.responseText;
        }
    };
    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send("opcion=mostrarDiagnosticos"
    );
}
function verDiagnosticoEbAll(idDiagnostico){
    const http=new XMLHttpRequest();
    const url = '../diagnosticoEbAll/diagnosticoEbAll.php';
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status ==200){
              console.log(this.responseText);
           document.getElementById("divResultadosDiagEbAll").innerHTML  = this.responseText;
        }
    };
    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send("opcion=verDiagnostico"
    +'&idDiagnostico='+idDiagnostico
    );
}

function crearEncabezadoDiagnosticoEbAll()
{
    var idCliente = document.getElementById('idCliente').value;
    if(idCliente == '')
    {
      alert('Por favor escoja un cliente');   
    }else{

        const http=new XMLHttpRequest();
        const url = '../diagnosticoEbAll/diagnosticoEbAll.php';
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status ==200){
                console.log(this.responseText);
                document.getElementById("divResultadosDiagEbAll").innerHTML  = this.responseText;
            }
        };
        http.open("POST",url);
        http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        http.send("opcion=crearEncabezadoDiagnosticoEbAll"
        +'&idCliente='+idCliente
        );
    }
}
    
function grabarDiagnosticoEbAll(){
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
  

    var conceptoTecnico = document.getElementById('conceptoTecnico').value;
    
    
    const http=new XMLHttpRequest();
    const url = '../diagnosticoEbAll/diagnosticoEbAll.php';
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status ==200){
            console.log(this.responseText);
            document.getElementById("divResultadosDiagEbAll").innerHTML  = this.responseText;
        }
    };
    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send("opcion=grabarDiagnosticoEbAll"
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
   
    +'&conceptoTecnico='+conceptoTecnico
    );
}


// // let form = document.getElementById('formularioDiagnostico');

// // form.addEventListener('submit', (e) =>{
// //   e.preventDefault();
// //   alert('grabar diagnostico');
// //   let data = new FormData(e.currentTarget);
// //   data.append('opcion', 'grabarDiagnosticoEbAp');


// //   let request;
// //   if(window.XMLHttpRequest) request = new XMLHttpRequest();
// //   else request = new ActiveXObject('Microsoft.XMLHTTP'); 

// //   request.addEventListener('load',()=>{
// //     console.log(request);
// //     document.getElementById("div_respuestas").innerHTML  = this.responseText;

// //   });

// //   request.open(
// //     'POST',
// //     '../diagnosticoEbAp/diagnosticoEbAp.php',
// //     'true',
// //     request.responseType='json'
// //   );

// //   request.send(data);

// //   for (var value of data.values()) {
// //     console.log(value);
// //  }

// // });

function traerUltimoDiagnosticoClienteEbAll()
{
    var idCliente = document.getElementById('idCliente').value;
    const http=new XMLHttpRequest();
    const url = '../diagnosticoEbAll/diagnosticoEbAll.php';
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status ==200){
            console.log(this.responseText);
            document.getElementById("div_ultimo_diagnostico_clienteEbAll").innerHTML  = this.responseText;
        }
    };
    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send("opcion=traerUltimoDiagnosticoClienteEbAll"
    +'&idCliente='+idCliente
    );
}