<?php

class rol
  {
   private $id_rol;
   private $descripcion;

  public function init($id_rol, $descripcion) 
  {
  $this->id_rol = $id_rol;  
  $this->descripcion = $descripcion;
  }

  public function setId_rol($id_rol)
  {
  $this->id_rol = $id_rol;
  return $this;
  }

  public function getId_rol()
  {
    return $this->id_rol;
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
