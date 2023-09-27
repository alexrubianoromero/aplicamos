function editarTecnico(idcliente)
{

    const http=new XMLHttpRequest();
    const url = '../tecnicos/tecnicosmovil.php';
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status ==200){
        document.getElementById("cuerpoModalTecnicos").innerHTML  = this.responseText;
        }
    };
    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send('opcion=editarTecnico'
    + "&idcliente="+idcliente
    );
}