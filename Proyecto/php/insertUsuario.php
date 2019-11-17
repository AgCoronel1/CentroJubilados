<?php

  require_once "Usuario.php";
  require_once "RepositorioUsuario.php";

  $nombre = $_POST['nombre'];

  $apellido = $_POST['apellido'];
  
  $dni = $_POST['dni'];
  
  $telefono = $_POST['telefono'];
  
  $nacimiento = $_POST['nacimiento'];

  $password = $_POST['password'];
  
  

  $u = new Usuario($nombre, $apellido, $dni, $telefono, $nacimiento, $password);

  $r = new RepositorioUsuario();
  $r->guardarUsuario($u);

?>
