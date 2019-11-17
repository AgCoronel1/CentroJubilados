<?php

  require_once "viaje.php";
  require_once "RepositorioViaje.php";

  $idviaje = $_POST['idviaje'];
  $iduser = $_POST['iduser'];


  $r = new RepositorioViaje();
  
 $flag = $r->pago($idviaje, $iduser);
 $r->cambiarPago($idviaje, $iduser, $flag);

		
		
		

?>