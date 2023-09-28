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
function grabarDiagnosticoEbAp(){
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
    );
}
