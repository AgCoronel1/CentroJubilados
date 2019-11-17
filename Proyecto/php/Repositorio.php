<?php
abstract class Repositorio{
  const SERVIDOR = 'localhost';
  const NOMBREBD = 'proyecto';
  const USUARIO = 'root';
  const CLAVE = '';

  //atributo solo de la clase
  protected static $conexion = null;
  protected static $chau_conexion = "Conexion exitosa";

  public function __construct(){

    if (self::$conexion === null) {
        self::conectar();
    }
  }

  protected static function conectar(){

    try {
      self::$conexion = new PDO("mysql:host=".self::SERVIDOR.";dbname=".self::NOMBREBD.";charset=utf8", self::USUARIO, self::CLAVE);
      self::$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        self::$chau_conexion = "Error en la conexion" . $e->getMessage();
    }
  }
}
?>
