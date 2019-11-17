<?php

  require_once "Repositorio.php";
  require_once "Usuario.php";

  /**
   *
   */
  class ConsultaUsuarioRegistrado extends Repositorio
  {

    public function seleccionUsuario($dni, $password){

      if (is_null(self::$conexion)) {
        return "No se pudo agregar al usuario" . self::$chau_conexion;
      }

      try {

        $sentencia = self::$conexion->prepare("SELECT id, nombre, apellido, dni, es_admin, nacimiento, telefono, pass FROM usuarios WHERE dni = :dni");

        $sentencia->bindParam(':dni', $dni);

        $sentencia->execute();

        $resultado = $sentencia->fetch(PDO::FETCH_ASSOC);

        $bandera = password_verify($password, $resultado['pass']);


		 if ($resultado['dni'] == $dni && $bandera == true) {

			session_start();

			$u = new Usuario($resultado['nombre'], $resultado['apellido'], $resultado['dni'], $resultado['telefono'], $resultado['nacimiento']);

			$u->setId($resultado['id']);
			$u->setAdmin($resultado['es_admin']);
	  
	

			$_SESSION['usuario'] = serialize($u);

			//$_SESSION['usuario'] = $_POST['correo'];

			//$_SESSION['id'] = $resultado['id'];

			echo "true";

		} else {
			echo "Error en las credenciales";
		}
			

      } catch (PDOException $e) {

        echo "Error: " . $e->getMessage();

      }// fin catch

    }//fin function

  }// fin class
?>
