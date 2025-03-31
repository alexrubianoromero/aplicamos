function mostrarAlertas(){
    const http=new XMLHttpRequest();
    const url = '../alertas/alertas.php';
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status ==200){
              console.log(this.responseText);
           document.getElementById("div_resultados_alertas").innerHTML  = this.responseText;
        }
    };
    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send("opcion=mostrarAlertas"
    );
}
function formuNuevaAlerta(){
    const http=new XMLHttpRequest();
    const url = '../alertas/alertas.php';
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status ==200){
              console.log(this.responseText);
           document.getElementById("cuerpoModalAlertas").innerHTML  = this.responseText;
        }
    };
    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send("opcion=formuNuevaAlerta"
    );
}

function grabarNuevaAlerta(){
    var fecha =  document.getElementById("fechaAlerta").value;
    var idCliente =  document.getElementById("idCliente").value;
    var descripcion =  document.getElementById("descripcionAlerta").value;
    const http=new XMLHttpRequest();
    const url = '../alertas/alertas.php';
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status ==200){
              console.log(this.responseText);
           document.getElementById("cuerpoModalAlertas").innerHTML  = this.responseText;
        }
    };
    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send("opcion=grabarNuevaAlerta"
        + "&fecha="+fecha
        + "&idCliente="+idCliente
        + "&descripcion="+descripcion
    );
}
