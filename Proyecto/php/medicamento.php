<?php

  /**
   *
   */
  class Medicamento
  {
    private $id;
    private $nombre;
    private $dosis;
	

    function __construct($nombre = null, $dosis = null)
    {
      $this->nombre = $nombre;
	  $this->dosis = $dosis;
	
    }

    public function setId($id){
      return $this->id = $id;
    }

    public function getId(){
      return $this->id;
    }

    public function getNombre(){
      return $this->nombre;
    }
    public function getDosis(){
      return $this->dosis;
    }
	
	
  }
?>
