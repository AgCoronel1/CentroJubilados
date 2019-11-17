<?php

    require_once "ConsultaUsuarioRegistrado.php";

    $dni = $_POST['dni'];

    $password = $_POST['password'];
	//$password = password_hash($password, PASSWORD_DEFAULT);

    $r = new ConsultaUsuarioRegistrado();
    $r-> seleccionUsuario($dni, $password);

?>