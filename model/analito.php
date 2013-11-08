<?php

class Analito
  {
   private $id_analito;
   private $descripcion;

  public function init($id_analito, $descripcion) 
  {
  $this->id_analito = $id_analito;  
  $this->descripcion = $descripcion;
  }

  public function setId_analito($id_analito)
  {
  $this->id_analito = $id_analito;
  return $this;
  }

  public function getId_analito()
  {
    return $this->id_analito;
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
