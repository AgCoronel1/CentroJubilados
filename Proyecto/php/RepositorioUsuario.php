<?php

  require_once 'Repositorio.php';
  require_once 'Usuario.php';
 

class RepositorioUsuario extends Repositorio
{

  public function guardarUsuario(Usuario $u){

    if (is_null(self::$conexion)) {
      return "No se pudo agregar al usuario" . self::$chau_conexion;
    }

    try {

      self::$conexion->beginTransaction();

      $sentencia = self::$conexion->prepare("INSERT INTO usuarios (nombre, apellido, dni, nacimiento, telefono, pass)
      VALUES (:nombre, :apellido, :dni, :nacimiento, :telefono, :pass)");

      $nombre = $u->getNombre();
      $apellido = $u->getApellido();
	  $dni = $u->getDNI();
	  $nacimiento = $u->getNacimiento();
	  $telefono = $u->getTel();
      $password = $u->getPassword();
	  
      //Antes: $sentencia->bindParam(':nombre', getNombre()); Solo acepta variables
      //Probe con el array $datos con los getters y tiraba error en la contraseña compuesta por numeros...
      $sentencia->bindParam(':nombre', $nombre);
      $sentencia->bindParam(':apellido', $apellido);
	  $sentencia->bindParam(':dni', $dni);
	  $sentencia->bindParam(':nacimiento', $nacimiento);
	  $sentencia->bindParam(':telefono', $telefono);
      $sentencia->bindParam(':pass', $password);

      $resultado = $sentencia->execute();

      self::$conexion->commit();

      if ($resultado) {
        echo "Usuario registrado !";
      }

    } catch (PDOException $e) {
       self::$conexion->rollback();
       echo "Error: " . $e->getMessage();
    }
  }
  
  public function guardarMed(medicamento $m){

    if (is_null(self::$conexion)) {
      return "No se pudo agregar el medicamento" . self::$chau_conexion;
    }
	
		session_start();

	    $u = unserialize($_SESSION['usuario']);

		$usuario_id = $u->getId();
		

    try {

      self::$conexion->beginTransaction();

      $sentencia = self::$conexion->prepare("INSERT INTO medicamentos (nombre, dosis, iduser)
      VALUES (:nombre, :dosis, :iduser)");

      $nombre = $m->getNombre();
      $dosis = $m->getDosis();
	 
	  
      //Antes: $sentencia->bindParam(':nombre', getNombre()); Solo acepta variables
      //Probe con el array $datos con los getters y tiraba error en la contraseña compuesta por numeros...
      $sentencia->bindParam(':nombre', $nombre);
      $sentencia->bindParam(':dosis', $dosis);
	  $sentencia->bindParam(':iduser', $usuario_id);
	 

      $resultado = $sentencia->execute();

      self::$conexion->commit();

      if ($resultado) {
        echo "Medicamento registrado!";
      }

    } catch (PDOException $e) {
       self::$conexion->rollback();
       echo "Error: " . $e->getMessage();
    }
  }
  
  public function getDatos(){

	  if (is_null(self::$conexion)) {
      return "No se pudo recuperar los datos" . self::$chau_conexion;
	  }

	  try {

		self::$conexion->beginTransaction();

		$sentencia = self::$conexion->prepare("SELECT * FROM usuarios");

    $sentencia->execute();

    $estados = $sentencia->fetchAll();

		self::$conexion->commit();

    return $estados;

    } catch (PDOException $e){

        self::$conexion->rollback();

        echo "Error: " . $e->getMessage();

	  }
  }
  
  
  
   public function getDatosReg($id_viaje){

	  if (is_null(self::$conexion)) {
      return "No se pudo recuperar los datos" . self::$chau_conexion;
	  }

	  try {

		self::$conexion->beginTransaction();

		$sentencia = self::$conexion->prepare("SELECT iduser FROM user_viaje WHERE idviaje = $id_viaje");

    $sentencia->execute();

    $estados = $sentencia->fetchAll();

		self::$conexion->commit();

    return $estados;

    } catch (PDOException $e){

        self::$conexion->rollback();

        echo "Error: " . $e->getMessage();

	  }
  }
  
  public function contador($id_viaje){

	  if (is_null(self::$conexion)) {
      return "No se pudo recuperar los datos" . self::$chau_conexion;
	  }

	  try {

		self::$conexion->beginTransaction();

		$sentencia = self::$conexion->prepare("SELECT COUNT(iduser) FROM user_viaje WHERE idviaje = $id_viaje");

    $sentencia->execute();

    $estados = $sentencia->fetchAll();

		self::$conexion->commit();

    return $estados[0][0];

    } catch (PDOException $e){

        self::$conexion->rollback();

        echo "Error: " . $e->getMessage();

	  }
  }
  
   public function getDatosUnUser($id){

	  if (is_null(self::$conexion)) {
      return "No se pudo recuperar los datos" . self::$chau_conexion;
	  }

	  try {

		self::$conexion->beginTransaction();

		$sentencia = self::$conexion->prepare("SELECT * FROM usuarios WHERE id = $id");

    $sentencia->execute();

    $estados = $sentencia->fetchAll();

		self::$conexion->commit();

    return $estados;

    } catch (PDOException $e){

        self::$conexion->rollback();

        echo "Error: " . $e->getMessage();

	  }
  }
  
   public function getMed($id_user){

	  if (is_null(self::$conexion)) {
      return "No se pudo recuperar los datos" . self::$chau_conexion;
	  }

	  try {

		self::$conexion->beginTransaction();

		$sentencia = self::$conexion->prepare("SELECT * FROM medicamentos WHERE iduser = $id_user");

    $sentencia->execute();

    $estados = $sentencia->fetchAll();

		self::$conexion->commit();
		
	

    return $estados;

    } catch (PDOException $e){

        self::$conexion->rollback();

        echo "Error: " . $e->getMessage();

	  }
  }
  
  public function actualizarUsuario($nombre, $apellido, $dni, $telefono, $nacimiento, $password){

    session_start();

    if (is_null(self::$conexion)) {
      return "No se pudo actualizar al usuario" . self::$chau_conexion;
    }
    $x = unserialize($_SESSION['usuario']);

    $id_usuario = $x->getId();

    try {

      self::$conexion->beginTransaction();

      

      $x->setPassword($password);
      $pass = $x->getPassword();
        
		$sentencia = self::$conexion->prepare("UPDATE usuarios SET nombre = :nombre, apellido = :apellido, dni = :dni, nacimiento = :nacimiento, telefono = :telefono, pass = :pass WHERE id = $id_usuario");

        $sentencia->bindParam(':nombre', $nombre);
        $sentencia->bindParam(':apellido', $apellido);
		$sentencia->bindParam(':dni', $dni);
		$sentencia->bindParam(':nacimiento', $nacimiento);
		$sentencia->bindParam(':telefono', $telefono);
		$sentencia->bindParam(':pass', $pass);

        $resultado = $sentencia->execute();

        self::$conexion->commit();

        if ($resultado) {
         echo "Datos actualizados!";
       }else {
         echo "Error al actualizar los datos !";
       }

    } catch (PDOException $e) {
      self::$conexion->rollback();
      echo "Error: " . $e->getMessage();
    }
  }
  
  public function borrarMed($id){

    if (is_null(self::$conexion)) {
      return "No se pudo borrar" . self::$chau_conexion;
    }

    try {

    self::$conexion->beginTransaction();

    $sentencia = self::$conexion->prepare("DELETE FROM medicamentos WHERE idmed = $id");


        $resultado = $sentencia->execute();

        self::$conexion->commit();

        if ($resultado) {
         echo "Medicamento Borrado!";
       }else {
         echo "Error al actualizar los datos !";
       }


   

    } catch (PDOException $e){

        self::$conexion->rollback();

        echo "Error: " . $e->getMessage();

    }
  }
  
  
 

 



}
?>

