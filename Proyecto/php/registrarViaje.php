<?php

  require_once "Viaje.php";
  require_once "RepositorioViaje.php";

  $id = $_POST['id'];
  $id_usuario = $_POST['id_usuario'];

  $r = new RepositorioViaje();
  if (!($r->checkViaje($id, $id_usuario))){
	echo "Ya estás registrado para este Viaje!";
  } else {
		$r->registrarViaje($id, $id_usuario);
	}

?>
