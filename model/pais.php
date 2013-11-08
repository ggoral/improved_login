<?php

class pais
  {
   private $id_pais;
   private $descripcion;

  public function init($id_pais, $descripcion) 
  {
  $this->id_pais = $id_pais;  
  $this->descripcion = $descripcion;
  }

  public function setId_pais($id_pais)
  {
  $this->id_pais = $id_pais;
  return $this;
  }

  public function getId_pais()
  {
    return $this->id_pais;
  }

  public function setDescripcion($descripcion)
  {
  $this->descripcion = $descripcion;
  return $this;
  }

  public function getDescripcion()
  {
    return $this->descripcion;
  }

  }

?>
