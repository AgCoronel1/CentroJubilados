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
  $todosUser = $r->getDatos();



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
  <script src="../javascript/registro_viaje.js" charset="utf-8"></script>
</head>
<body>

<div class="jumbotron text-center">
  <h1>MIS MEJORES AÑOS</h1>
     <p>Ver datos de usuarios</p> 
   

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



	
		<?php
		foreach ($todosUser as $unUser){
			$meds = $r->getMed($unUser['id']);
			if (empty($meds)){
				$nommed = "Sin medicamentos cargados";
			} else {
				$nommed = "";
			}
			
			
			echo "<div><div class='col-sm-4'>
		
				<br><br>
				<div class='card'>
				<div class='card-header'><h4>".
					$unUser['nombre'] ." ". $unUser['apellido']
				. "</h4></div>
				<div class='card-body'>
				<h5 class='card-title'>DNI: ".$unUser['dni']."</h5>
				<p class='card-text'>Fecha de Nacimiento: ".$unUser['nacimiento']." Telefono: ".$unUser['telefono']."<br>".$nommed; 
				foreach ($meds as $unMed){
					echo "Medicación: ". $unMed['nombre']. "<br> Dosis: ". $unMed['dosis'] . "<br>";
				}
				echo "</div>
				</div></div><br>";
		
		}
		
		?> 
		
		
		



</body>

</html>