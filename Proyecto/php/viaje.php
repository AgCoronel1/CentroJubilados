<?php

  /**
   *
   */
  class Viaje
  {
    private $id;
    private $destino;
    private $salida;
	private $llegada;
	private $precio;
	private $desc;
	private $hotel;
	
	

    function __construct($destino = null, $salida = null, $llegada = null, $precio = null, $desc = null, $hotel = null)
    {
      $this->destino = $destino;
	  $this->salida = $salida;
	  $this->llegada = $llegada;
	  $this->precio = $precio;
	  $this->desc = $desc;
	  $this->Hotel = $hotel;
    
     
    }

    public function setId($id){
      return $this->id = $id;
    }

    public function getId(){
      return $this->id;
    }

    public function getDestino(){
      return $this->destino;
    }
    public function getSalida(){
      return $this->salida;
    }
	
	 public function getLlegada(){
      return $this->llegada;
    }
	
	 public function getPrecio(){
      return $this->precio;
    }
	
	 public function getDesc(){
      return $this->desc;
    }
	
	 public function getHotel(){
      return $this->Hotel;
    }
	
	

  }
?>
