<?php

class valor_corte
  {
   private $id_valor;
   private $descripcion;

  public function init($id_valor, $descripcion) 
  {
  $this->id_valor = $id_valor;  
  $this->descripcion = $descripcion;
  }

  public function setId_valor_corte($id_valor)
  {
  $this->id_valor = $id_valor;
  return $this;
  }

  public function getId_valor_corte()
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
