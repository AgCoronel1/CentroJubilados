function verificar() {
  d = document.forms[0];
  if (d.nombre.value != "" && d.dosis.value != "") {
    envioDatos(d.nombre.value, d.dosis.value);
  }else {
    alert("Debes completar todos los campos!");
  }

function envioDatos(nombre, dosis){
  var info = "nombre="+nombre+"&dosis="+dosis;
  peticion = new XMLHttpRequest();
  peticion.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        console.log(this.responseText);
        respuesta_servidor.innerHTML = this.responseText;
        }
  }
  peticion.open("POST", "../php/insertMed.php", true);
  peticion.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  peticion.send(info);
  }
}