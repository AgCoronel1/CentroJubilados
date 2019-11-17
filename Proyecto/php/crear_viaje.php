<!DOCTYPE html>
<?php
   
    require_once "Usuario.php";

	require_once "RepositorioUsuario.php";


  session_start();

  $u = unserialize($_SESSION['usuario']);

  
  $dni = $u->getDNI();
  $nombre = $u->getNombre();
  $apellido = $u->getApellido();
  $id_usuario = $u->getId();
  $es_admin = $u->getAdmin();




  if (!isset($dni)) {
    header ("Location:../php/prueba.html");
  }
  
 
  $r = new RepositorioUsuario();
  
  



?>
<html lang="en">
<head>
  <title>Mis Mejores Años</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="../javascript/verificar_viaje.js" charset="utf-8"></script>
</head>
<body>

<div class="jumbotron text-center">
  <h1>MIS MEJORES AÑOS</h1>
    <p>Crear Viaje</p> 
  <p></p> 
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navegación</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="ver_viajes.php">Ver Viajes<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="cargar_med.php">Medicamentos</a>
      </li>
	  <?php
		if ($es_admin == 1){
			echo "<li class='nav-item'>
					<a class='nav-link' href='crear_viaje.php'>Agregar Viaje</a>
				 </li>";
			echo "<li class='nav-item'>
					<a class='nav-link' href='ver_datos_user.php'>Ver datos de Usuarios</a>
				 </li>";
			echo "<li class='nav-item'>
					<a class='nav-link' href='ver_registrados.php'>Registrados a viajes</a>
				 </li>";
		}
	  ?>
      <li class="nav-item">
        <a class="nav-link" href="cerrar_sesion.php">Cerrar Sesión</a>
      </li>
    </ul>
    <a class="navbar-text" href="ver_mis_datos.php">
     <?php
		echo $nombre . " " . $apellido;
	 ?>
    </a>
  </div>
</nav>
</div>
  
<div class="container">
  <div class="row">
    <div class="col-sm-4">
		<h1> Nuevo Viaje </h1>
		<br><br>
		
		<form class="formulario" method="post">
            <input type="text" name="destino" value="" placeholder="Destino" autofocus required> Destino
            <br><br>
            <input type="date" name="salida" value="" placeholder="Fecha Salida" required> Fecha de Salida
            <br><br>
			<input type="date" name="llegada" value="" placeholder="Fecha Llegada" required> Fecha de Llegada
            <br><br>
			<input type="number" name="precio" value="" placeholder="Precio" required> Precio
            <br><br>
			<input type="text" name="desc" value="" placeholder="Descripción"> Descripción
            <br><br>
			<input type="text" name="hotel" value="" placeholder="Hotel"> Hotel
            <br><br>
            <button type="button" id="button" onclick="verificar()">Registrar</button>
            <br><br>
            <p id="respuesta_servidor"></p>
        </form>
    </div>
  </div>
</div>

</body>

</html>