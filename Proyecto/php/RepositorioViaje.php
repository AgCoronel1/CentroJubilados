<?php

  require_once 'Repositorio.php';
  require_once 'viaje.php';
 
 

class RepositorioViaje extends Repositorio
{

  public function guardarViaje(Viaje $v){

    if (is_null(self::$conexion)) {
      return "No se pudo agregar al usuario" . self::$chau_conexion;
    }

    try {

      self::$conexion->beginTransaction();

      $sentencia = self::$conexion->prepare("INSERT INTO viajes (destino, fsalida, fllegada, descripcion, precio, hotel)
      VALUES (:destino, :fsalida, :fllegada, :descripcion, :precio, :hotel)");

      $destino = $v->getDestino();
      $fsalida = $v->getSalida();
	  $fllegada = $v->getLlegada();
	  $precio = $v->getPrecio();
	  $descripcion = $v->getDesc();
	  $hotel = $v->getHotel();
     
	  
      //Antes: $sentencia->bindParam(':nombre', getNombre()); Solo acepta variables
      //Probe con el array $datos con los getters y tiraba error en la contraseña compuesta por numeros...
      $sentencia->bindParam(':destino', $destino);
      $sentencia->bindParam(':fsalida', $fsalida);
	  $sentencia->bindParam(':fllegada', $fllegada);
	  $sentencia->bindParam(':precio', $precio);
	  $sentencia->bindParam(':descripcion', $descripcion);
      $sentencia->bindParam(':hotel', $hotel);
	  

      $resultado = $sentencia->execute();

      self::$conexion->commit();

      if ($resultado) {
        echo "Viaje registrado !";
      }

    } catch (PDOException $e) {
       self::$conexion->rollback();
       echo "Error: " . $e->getMessage();
    }
  }
  
  public function getViajes(){

	  if (is_null(self::$conexion)) {
      return "No se pudo recuperar los viajes" . self::$chau_conexion;
	  }

	  try {

		self::$conexion->beginTransaction();

		$sentencia = self::$conexion->prepare("SELECT * FROM viajes");

    $sentencia->execute();

    $viajes = $sentencia->fetchAll();

	self::$conexion->commit();

    return $viajes;

    } catch (PDOException $e){

        self::$conexion->rollback();

        echo "Error: " . $e->getMessage();

	  }
  }
  
    public function registrarViaje($id, $id_usuario){

    if (is_null(self::$conexion)) {
      return "No se pudo registrar el Viaje" . self::$chau_conexion;
    }
	
	
	
    try {

      self::$conexion->beginTransaction();

      $sentencia = self::$conexion->prepare("INSERT INTO user_viaje (iduser, idviaje)
      VALUES (:iduser, :idviaje)");
     
	  
      //Antes: $sentencia->bindParam(':nombre', getNombre()); Solo acepta variables
      //Probe con el array $datos con los getters y tiraba error en la contraseña compuesta por numeros...
      $sentencia->bindParam(':iduser', $id_usuario);
      $sentencia->bindParam(':idviaje', $id);

      $resultado = $sentencia->execute();

      self::$conexion->commit();

      if ($resultado) {
        echo "Registrado para el viaje!";
      }

    } catch (PDOException $e) {
       self::$conexion->rollback();
       echo "Error: " . $e->getMessage();
    }
  }
  
   public function checkViaje($id, $id_usuario){

	  if (is_null(self::$conexion)) {
      return "No se pudo recuperar los Viajes" . self::$chau_conexion;
	  }

	  try {

		self::$conexion->beginTransaction();

		$sentencia = self::$conexion->prepare("SELECT * FROM user_viaje WHERE idviaje = $id AND iduser = $id_usuario");

    $sentencia->execute();

    $userviaje = $sentencia->fetchAll();

		self::$conexion->commit();

    if(empty($userviaje)){
		return true;
	} else {
		return false;
    }
    } catch (PDOException $e){

        self::$conexion->rollback();

        echo "Error: " . $e->getMessage();

	  }
  }
  
  public function cancelarViaje($id, $id_usuario){

    if (is_null(self::$conexion)) {
      return "No se pudo borrar" . self::$chau_conexion;
    }

    try {

    self::$conexion->beginTransaction();

    $sentencia = self::$conexion->prepare("DELETE FROM user_viaje WHERE iduser = $id_usuario AND idviaje = $id");


        $resultado = $sentencia->execute();

        self::$conexion->commit();

        if ($resultado) {
         echo "Viaje cancelado!";
       }else {
         echo "Error al actualizar los datos !";
       }


   

    } catch (PDOException $e){

        self::$conexion->rollback();

        echo "Error: " . $e->getMessage();

    }
  }

  public function borrarViaje($id){

    if (is_null(self::$conexion)) {
      return "No se pudo borrar" . self::$chau_conexion;
    }

    try {

    self::$conexion->beginTransaction();

    $sentencia = self::$conexion->prepare("DELETE FROM viajes WHERE id = $id");
	$otrasentencia = self::$conexion->prepare("DELETE FROM user_viaje WHERE idviaje = $id");


        $resultado = $sentencia->execute();
		$otroresultado = $otrasentencia->execute();
        self::$conexion->commit();

        if ($resultado && $otroresultado) {
         echo "Viaje borrado!";
       }else {
         echo "Error al actualizar los datos !";
       }


   

    } catch (PDOException $e){

        self::$conexion->rollback();

        echo "Error: " . $e->getMessage();

    }
  }
  
   public function pago($idviaje, $iduser){

	  if (is_null(self::$conexion)) {
      return "No se pudo recuperar los Viajes" . self::$chau_conexion;
	  }

	  try {

		self::$conexion->beginTransaction();

		$sentencia = self::$conexion->prepare("SELECT pago FROM user_viaje WHERE idviaje = $idviaje AND iduser = $iduser");

    $sentencia->execute();

    $userviaje = $sentencia->fetchAll();

		self::$conexion->commit();

    if($userviaje[0][0] == 1){
		return true;
	} elseif ($userviaje[0][0] == 0) {
		return false;
    }
    } catch (PDOException $e){

        self::$conexion->rollback();

        echo "Error: " . $e->getMessage();

	  }
  }
  
  public function cambiarPago($idviaje, $iduser, $flag){
	  if (is_null(self::$conexion)) {
      return "No se pudo recuperar los Viajes" . self::$chau_conexion;
	  }

	  try {

		self::$conexion->beginTransaction();

		$sentencia = self::$conexion->prepare("UPDATE user_viaje SET pago = :pago WHERE iduser = $iduser AND idviaje = $idviaje");
	
	
	if ($flag){
		$sentencia->bindValue(':pago', 0);
    } else {
		$sentencia->bindValue(':pago', 1);
	}
	
	$resultado = $sentencia->execute();

    

	self::$conexion->commit();

     if ($resultado) {
         echo "Pago actualizado!";
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

