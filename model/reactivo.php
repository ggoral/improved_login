<?php

class Reactivo
  {
   private $id_reactivo;
   private $descripcion;

  public function init($id_reactivo, $descripcion) 
  {
  $this->id_reactivo = $id_reactivo;  
  $this->descripcion = $descripcion;
  }

  public function setId_reactivo($id_reactivo)
  {
  $this->id_reactivo = $id_reactivo;
  return $this;
  }

  public function getId_reactivo()
  {
    return $this->id_reactivo;
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
