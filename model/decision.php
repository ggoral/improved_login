<?php

class Decision
  {
   private $id_decision;
   private $descripcion;

  public function init($id_decision, $descripcion) 
  {
  $this->id_decision = $id_decision;  
  $this->descripcion = $descripcion;
  }

  public function setId_decision($id_decision)
  {
  $this->id_decision = $id_decision;
  return $this;
  }

  public function getId_decision()
  {
    return $this->id_decision;
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
