<?php

class calibrador
  {
   private $id_calibrador;
   private $descripcion;

  public function init($id_calibrador, $descripcion) 
  {
  $this->id_calibrador = $id_calibrador;  
  $this->descripcion = $descripcion;
  }

  public function setId_calibrador($id_calibrador)
  {
  $this->id_calibrador = $id_calibrador;
  return $this;
  }

  public function getId_calibrador()
  {
    return $this->id_calibrador;
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