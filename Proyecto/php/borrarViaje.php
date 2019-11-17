<?php

  require_once "Viaje.php";
  require_once "RepositorioViaje.php";

  $id = $_POST['id'];
 

  $r = new RepositorioViaje();
  $r->borrarViaje($id);

?>