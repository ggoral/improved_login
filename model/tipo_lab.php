<?php

class Tipo_lab
  {
   private $id_valor;
   private $descripcion;

  public function init($id_valor, $descripcion) 
  {
  $this->id_valor = $id_valor;  
  $this->descripcion = $descripcion;
  }

  public function setId_tipo_lab($id_valor)
  {
  $this->id_valor = $id_valor;
  return $this;
  }

  public function getId_tipo_lab()
  {
    return $this->id_valor;
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
