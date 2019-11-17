<?php

  require_once "Viaje.php";
  require_once "RepositorioViaje.php";

  $destino = $_POST['destino'];

  $salida = $_POST['salida'];
  
  $llegada = $_POST['llegada'];
  
  $precio = $_POST['precio'];
  
  $desc = $_POST['desc'];
  
  $hotel = $_POST['hotel'];


  
  

  $v = new Viaje($destino, $salida, $llegada, $precio, $desc, $hotel);

  $r = new RepositorioViaje();
  $r->guardarViaje($v);

?>
