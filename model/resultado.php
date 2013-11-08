<?php

class Resultado
  {
   private $id_resultado;
   private $comentario;
   private $fecha_recepcion;
   private $fecha_analisis;
   private $fecha_ingreso;
   private $id_lab;
   private $id_metodo;
   private $id_reactivo;
   private $id_calibrador;
   private $id_analito;
   private $id_papel_filtro;
   private $id_valor;

  public function init($id_resultado, 
                       $comentario, 
                       $fecha_recepcion, 
                       $fecha_analisis, 
                       $fecha_ingreso, 
                       $id_lab, 
                       $id_metodo,
                       $id_reactivo,
                       $id_calibrador,
                       $id_analito,
                       $id_papel_filtro,
                       $id_valor)
  {
    $this->id_resultado = $id_resultado;  
    $this->comentario = $comentario;
    $this->fecha_recepcion = $fecha_recepcion;
    $this->fecha_analisis = $fecha_analisis;
    $this->fecha_ingreso = $fecha_ingreso;
    $this->id_lab = $id_lab;
    $this->id_metodo = $id_metodo;
    $this->id_reactivo = $id_reactivo;
    $this->id_calibrador =  $id_calibrador;
    $this->id_analito = $id_analito;
    $this->id_papel_filtro = $id_papel_filtro;
    $this->id_valor = $id_valor;
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

  public function setComentario($comentario)
  {
  $this->comentario = $comentario;
  return $this;
  }

  public function getComentario()
  {
    return $this->comentario;
  }

  public function setFecha_recepcion($fecha_recepcion)
  {
  $this->fecha_recepcion = $fecha_recepcion;
  return $this;
  }

  public function getFecha_recepcion()
  {
    return $this->fecha_recepcion;
  }

  public function setFecha_analisis($fecha_analisis)
  {
  $this->fecha_analisis = $fecha_analisis;
  return $this;
  }

  public function getFecha_analisis()
  {
    return $this->fecha_analisis;
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

  public function setId_lab($id_lab)
  {
  $this->id_lab = $id_lab;
  return $this;
  }

  public function getId_lab()
  {
    return $this->id_lab;
  }

  public function setId_metodo($id_metodo)
  {
  $this->id_metodo = $id_metodo;
  return $this;
  }

  public function getId_metodo()
  {
    return $this->id_metodo;
  }

  public function setId_reactivo($id_reactivo)
  {
  $this->id_reactivo = $id_reactivo;
  return $this;
  }

  public function getId_reactivo()
  {
    return $this->id_reactivo;
  }

  public function setCalibrador($calibrador)
  {
    $this->calibrador = $calibrador;
    return $this;
  }

  public function getCalibrador()
  {
    return $this->calibrador;
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

  public function setId_papel_filtro($id_papel_filtro)
  {
    $this->id_papel_filtro = $id_papel_filtro;
    return $this;
  }

  public function getId_papel_filtro()
  {
    return $this->id_papel_filtro;
  }

  public function setId_valor($id_valor)
  {
    $this->id_valor = $id_valor;
    return $this;
  }

  public function getId_valor()
  {
    return $this->id_valor;
  }

}
?>