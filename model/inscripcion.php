<?php

class Inscripcion
  {
   private $id_inscripcion;
   private $fecha_ingreso;
   private $laboratorio_id_lab;
   private $fecha_baja;
   private $id_encuesta;
   private $id_analito;

  public function init($id_inscripcion, $fecha_ingreso, $laboratorio_id_lab, $fecha_baja, $id_encuesta, $id_analito) 
  {
  $this->id_inscripcion = $id_inscripcion;  
  $this->fecha_ingreso = $fecha_ingreso;
  $this->laboratorio_id_lab = $laboratorio_id_lab;
  $this->fecha_baja = $fecha_baja;
  $this->id_encuesta = $id_encuesta;
  $this->id_analito = $id_analito;
  }

  public function setId_inscripcion($id_inscripcion)
  {
  $this->id_inscripcion = $id_inscripcion;
  return $this;
  }

  public function getId_inscripcion()
  {
    return $this->id_inscripcion;
  }

  public function setFecha_ingreso($fecha_ingreso)
  {
  $this->fecha_ingreso = $fecha_ingreso;
  return $this;
  }

  public function getFecha_ingreso()
  {
    return $this->fecha_ingreso;
  }

  public function setLaboratorio_id_lab($laboratorio_id_lab)
  {
  $this->laboratorio_id_lab = $laboratorio_id_lab;
  return $this;
  }

  public function getLaboratorio_id_lab()
  {
    return $this->laboratorio_id_lab;
  }

  public function setFecha_baja($fecha_baja)
  {
  $this->fecha_baja = $fecha_baja;
  return $this;
  }

  public function getFecha_baja()
  {
    return $this->fecha_baja;
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

  public function setId_analito($id_analito)
  {
  $this->id_analito = $id_analito;
  return $this;
  }

  public function getId_analito()
  {
    return $this->id_analito;
  }


  }

?>
