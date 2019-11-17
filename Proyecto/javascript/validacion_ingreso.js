function validar(){
  d = document.forms[0];
  
  x = 6;

  if (d.dni.value !="" && d.password.value != "") {
    envioDatos(d.dni.value, d.password.value);
  }else {
    alert("Debes completar los campos");
  }
}
function envioDatos(dni, password){
  var info_usuario = "dni="+dni+"&password="+password;
  peticion = new XMLHttpRequest();
  peticion.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        if (this.responseText === "true") {
          window.location="http://localhost/proyecto/php/ver_viajes.php";
        }else {
          alert(this.responseText);
        }
    }
  }
  peticion.open("POST", "../php/selectUsuario.php", true);
  peticion.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  peticion.send(info_usuario);
  }
  

