<!DOCTYPE html>
<?php
    require_once "RepositorioViaje.php";
    require_once "viaje.php";
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
  
  $v = new RepositorioViaje();
  $viajes = $v->getViajes();
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
  <script src="../javascript/cambiarDatos.js" charset="utf-8"></script>
</head>
<body>

<div class="jumbotron text-center">
  <h1>MIS MEJORES AÑOS</h1>
  <p>Cambiar Datos</p> 

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
<p class='font-weight-bold' id='respuesta_servidor'> 
<h5> Cambiar mis datos </h5>
<h6> Agregar TODOS los datos nuevos <h6>
<h7> Si algún dato no debe ser cambiado, agregarlo como estaba de todas formas.</h7> <br>
<h7> Luego de cambiar los datos, cerrar y volver a iniciar sesión</h7>
<br><br><br>

	<form class="formulario" method="post">
            <input type="text" name="nombre" value="" placeholder="Nombre" autofocus required> Nombre
            <br><br>
            <input type="text" name="apellido" value="" placeholder="Apellido" required> Apellido
            <br><br>
			<input type="number" name="dni" value="" placeholder="Sin puntos ni espacios" required> DNI
            <br><br>
			<input type="number" name="telefono" value="" placeholder="Teléfono" required> Teléfono
            <br><br>
			<input type="date" name="nacimiento" value="" placeholder="Fecha Nacimiento" required> Fecha de Nacimiento
            <br><br>
            <input type="password" name="password" placeholder="Contraseña" required> Contraseña
            <br><br>
            <button type="button" class='btn btn-primary' id="button" onclick="cambio_datos()" href='cerrar_sesion.php'>Cambiar</button>
            <br><br>
            <p id="respuesta_servidor"></p>
    </form>
	
	
<h5> Borrar Medicamentos </h5>

	
		<?php
		
		$meds = $r->getMed($id_usuario);
			if (empty($meds)){
				$nommed = "Sin medicamentos cargados";
			} else {
				$nommed = "";
			}
		
		
		foreach ($meds as $unMed){
		echo "<div><div class='col-sm-4'>
		
				<br><br>
				<div class='card'>
				<div class='card-header'><h4>".
					$nombre ." ". $apellido
				. "</h4></div>
				<div class='card-body'>
				<h5 class='card-title'>Nombre del Medicamento: <br>".$unMed['nombre']."</h5><br>
				<p class='card-text'> Dosis: ". $unMed['dosis'] ."</p><br>"; 
				echo "</div>
				</div></div><br>";
				
		echo "<a class='btn btn-primary' href='cambiar_datos.php' onclick='borrarMed($unMed[idmed])'> Borrar </a> ";
		}
		?> 
		




</body>

</html>