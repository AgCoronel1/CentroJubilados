function verificar() {
  d = document.forms[0];
  if (d.destino.value != "" && d.salida.value != "" && d.llegada.value != "" && d.precio.value != "") {
    envioDatos(d.destino.value, d.salida.value, d.llegada.value, d.precio.value, d.desc.value, d.hotel.value);
  }else {
    alert("Debes completar todos los campos !");
  }

function envioDatos(destino, salida, llegada, precio, desc, hotel){
  var info = "destino="+destino+"&salida="+salida+"&llegada="+llegada+"&precio="+precio+"&desc="+desc+"&hotel="+hotel;
  peticion = new XMLHttpRequest();
  peticion.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        console.log(this.responseText);
        respuesta_servidor.innerHTML = this.responseText;
        }
  }
  peticion.open("POST", "../php/insertViaje.php", true);
  peticion.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  peticion.send(info);
  }
}