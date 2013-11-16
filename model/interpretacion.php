<?php

class Interpretacion
  {
   private $id_interpretacion;
   private $descripcion;

  public function init($id_interpretacion, $descripcion) 
  {
  $this->id_interpretacion = $id_interpretacion;  
  $this->descripcion = $descripcion;
  }

  public function setId_interpretacion($id_interpretacion)
  {
  $this->id_interpretacion = $id_interpretacion;
  return $this;
  }

  public function getId_interpretacion()
  {
    return $this->id_interpretacion;
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
