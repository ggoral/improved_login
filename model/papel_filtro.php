<?php

class Papel_filtro
  {
   private $id_valor;
   private $descripcion;

  public function init($id_valor, $descripcion) 
  {
  $this->id_valor = $id_valor;  
  $this->descripcion = $descripcion;
  }

  public function setId_papel_filtro($id_valor)
  {
  $this->id_valor = $id_valor;
  return $this;
  }

  public function getId_papel_filtro()
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
