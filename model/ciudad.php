<?php

class ciudad
  {
   private $id_ciudad;
   private $descripcion;
   private $cod_postal;
   private $id_pais;

  public function init($id_ciudad, $descripcion, $cod_postal, $id_pais) 
  {
  $this->id_ciudad = $id_ciudad;  
  $this->descripcion = $descripcion;
  $this->cod_postal = $cod_postal;
  $this->id_pais = $id_pais;
  }

  public function setId_ciudad($id_ciudad)
  {
  $this->id_ciudad = $id_ciudad;
  return $this;
  }

  public function getId_ciudad()
  {
    return $this->id_ciudad;
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

  public function setCod_postal($cod_postal)
  {
  $this->cod_postal = $cod_postal;
  return $this;
  }

  public function getCod_postal()
  {
    return $this->cod_postal;
  }

  public function setId_pais($id_pais)
  {
  $this->id_pais = $id_pais;
  return $this;
  }

  public function getId_pais()
  {
    return $this->id_pais;
  }


  }

?>
