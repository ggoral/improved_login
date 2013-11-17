<?php

class Encuesta
  {
   private $id_encuesta;
   private $fecha_inicio;
   private $fecha_cierre;
   private $id_resultado;

  public function init($id_encuesta, $fecha_inicio, $fecha_cierre, $id_resultado) 
  {
  $this->id_encuesta = $id_encuesta;  
  $this->fecha_inicio = $fecha_inicio;
  $this->fecha_cierre = $fecha_cierre;
  $this->id_resultado = $id_resultado;
  }

  public function setId_encuesta($id_encuesta)
  {
  $this->id_encuesta = $id_encuesta;
  return $this;
  }

  public function getId_encuesta()
  {
    return $this->id_encuesta;
  }

  public function setFecha_inicio($fecha_inicio)
  {
  $this->fecha_inicio = $fecha_inicio;
  return $this;
  }

  public function getFecha_inicio()
  {
    return $this->fecha_inicio;
  }

  public function setFecha_cierre($fecha_cierre)
  {
  $this->fecha_cierre = $fecha_cierre;
  return $this;
  }

  public function getFecha_cierre()
  {
    return $this->fecha_cierre;
  }

  public function setId_resultado($id_resultado)
  {
  $this->id_resultado = $id_resultado;
  return $this;
  }

  public function getId_resultado()
  {
    return $this->id_resultado;
  }


  }

?>
