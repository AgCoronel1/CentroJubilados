function verificar() {
  d = document.forms[0];
  var x=1;
  if(Number.isInteger(d.telefono.value) && Number.isInteger(d.dni.value)){
	alert("Error en los campos completados!");  
  } else if (d.apellido.value != "" && d.nombre.value != "" && d.password.value != "" && d.dni.value != "" && d.telefono.value != "" && d.nacimiento.value != "") {
    envioDatos(d.nombre.value, d.apellido.value,d.telefono.value,d.dni.value,d.nacimiento.value, d.password.value);
  }else {
    alert("Debes completar todos los campos !");
  }

function envioDatos(nombre, apellido,telefono,dni,nacimiento,password){
  var info_usuario = "nombre="+nombre+"&apellido="+apellido+"&dni="+dni+"&telefono="+telefono+"&nacimiento="+nacimiento+"&password="+password;
  peticion = new XMLHttpRequest();
  peticion.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        console.log(this.responseText);
        respuesta_servidor.innerHTML = this.responseText;
        }
  }
  peticion.open("POST", "../php/insertUsuario.php", true);
  peticion.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  peticion.send(info_usuario);
  }
}
