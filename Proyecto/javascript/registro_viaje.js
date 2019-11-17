 function guardarViaje(id, id_usuario){
    
	x = 8;

    peticion = new XMLHttpRequest();
    peticion.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        console.log(this.responseText);
        respuesta_servidor.innerHTML = this.responseText;
		alert(this.responseText);
	  }
	}

    var the_data = 'id='+id+"&id_usuario="+id_usuario;
    peticion.open("POST", "../php/registrarViaje.php", true);
    peticion.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    peticion.send(the_data);
    

    }
	
	function cancelarViaje(id, id_usuario){
    
	x = 8000043200;

    peticion = new XMLHttpRequest();
    peticion.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        console.log(this.responseText);
        respuesta_servidor.innerHTML = this.responseText;
		alert(this.responseText);
		
	  }
	}

    var the_data = 'id='+id+"&id_usuario="+id_usuario;
    peticion.open("POST", "../php/cancelarViaje.php", true);
    peticion.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    peticion.send(the_data);
    

    }
	
	function borrarViaje(id){
    
	x = 8000043234200;

    peticion = new XMLHttpRequest();
    peticion.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        console.log(this.responseText);
        respuesta_servidor.innerHTML = this.responseText;
		alert(this.responseText);
		
	  }
	}

    var the_data = 'id='+id;
    peticion.open("POST", "../php/borrarViaje.php", true);
    peticion.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    peticion.send(the_data);
    

    }
	
	function cambiarPago(idviaje,iduser){
    
	var the_data = 'idviaje='+idviaje+'&iduser='+iduser;
	

    peticion = new XMLHttpRequest();
    peticion.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        console.log(this.responseText);
        //respuesta_servidor.innerHTML = this.responseText;
		alert(this.responseText);
		
	  }
	}

    
    peticion.open("POST", "../php/cambiarPago.php", true);
    peticion.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    peticion.send(the_data);
    

    }

