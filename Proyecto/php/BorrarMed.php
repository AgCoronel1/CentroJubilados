<?php
require_once "Usuario.php";
require_once "RepositorioUsuario.php";


  $id = (int)$_POST['id'];




  $r = new RepositorioUsuario();
  $r->borrarMed($id);

 ?>