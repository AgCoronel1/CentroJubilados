<?php

  require_once "medicamento.php";
  require_once "RepositorioUsuario.php";

  $nombre = $_POST['nombre'];

  $dosis = $_POST['dosis'];
  
 


  
  

  $m = new medicamento($nombre, $dosis);

  $r = new RepositorioUsuario();
  $r->guardarMed($m);

?>
