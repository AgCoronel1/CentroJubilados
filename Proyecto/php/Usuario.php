<?php

  /**
   *
   */
  class Usuario
  {
    private $id;
    private $nombre;
    private $password;
	private $apellido;
	private $dni;
	private $telefono;
	private $nacimiento;
	private $es_admin;
	

    function __construct($nombre = null, $apellido = null, $dni = null, $telefono = null, $nacimiento = null, $pass = null)
    {
      $this->nombre = $nombre;
	  $this->apellido = $apellido;
	  $this->dni = $dni;
	  $this->telefono = $telefono;
	  $this->nacimiento = $nacimiento;
	  
      $this->password = password_hash($pass, PASSWORD_DEFAULT);;
	  
     
    }

    public function setId($id){
      return $this->id = $id;
    }

    public function getId(){
      return $this->id;
    }
	
	 public function setAdmin($es_admin){
      return $this->es_admin = $es_admin;
    }

    public function getAdmin(){
      return $this->es_admin;
    }

    public function getNombre(){
      return $this->nombre;
    }
    public function getApellido(){
      return $this->apellido;
    }
	
	 public function getDNI(){
      return $this->dni;
    }
	
	 public function getTel(){
      return $this->telefono;
    }
	
	 public function getNacimiento(){
      return $this->nacimiento;
    }
	public function setPassword($claveSinHash) {
		$claveHasheada = password_hash($claveSinHash, PASSWORD_DEFAULT);
		$this->password = $claveHasheada;
	}
	
    public function getPassword(){
      return $this->password;
    }
	
	

  }
?>
