<?php

class Metodo
  {
   private $id_metodo;
   private $descripcion;

  public function init($id_metodo, $descripcion) 
  {
  $this->id_metodo = $id_metodo;  
  $this->descripcion = $descripcion;
  }

  public function setId_metodo($id_metodo)
  {
  $this->id_metodo = $id_metodo;
  return $this;
  }

  public function getId_metodo()
  {
    return $this->id_metodo;
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
