<?php

  require_once "Viaje.php";
  require_once "RepositorioViaje.php";

  $id = $_POST['id'];
  $id_usuario = $_POST['id_usuario'];

  $r = new RepositorioViaje();
  $r->cancelarViaje($id, $id_usuario);

?>