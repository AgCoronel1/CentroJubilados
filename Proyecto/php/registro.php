<!DOCTYPE html>
<html lang="en">
<head>
  <title>Mis Mejores Años</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="../javascript/validacion_ingreso.js" charset="utf-8"></script>
</head>
<body>

<div class="jumbotron text-center">
  <h1>MIS MEJORES AÑOS</h1>
  <p>Ingreso</p> 
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" >Navegación</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="prueba.html">Registro <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Ingreso</a>
      </li>
   
   
  </div>
</nav>
</div>
  
<div class="container">
  <div class="row">
    <div class="col-sm-4">
		<h1> Ingresá tus datos </h1>
		<br><br>
		
		<form class="formulario" method="post">
           
			<input type="number" name="dni" value="" placeholder="Sin puntos ni espacios" required autofocus> DNI
            <br><br>
            <input type="password" name="password" placeholder="Contraseña" required> Contraseña
            <br><br>
            <button type="button" class='btn btn-primary' id="button" onclick="validar()">Ingresar</button>
            <br><br>
            <p id="respuesta_servidor"></p>
        </form>
    </div>
  </div>
</div>

</body>

</html>