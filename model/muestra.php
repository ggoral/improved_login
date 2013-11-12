<?php

class Muestra
  {
   private $id_muestra;
   private $resultado_control;
   private $id_interpretacion;
   private $id_decision;
   private $id_resultado;

  public function init($id_muestra, $resultado_control, $id_interpretacion, $id_decision, $id_resultado) 
  {
    $this->id_muestra = $id_muestra;  
    $this->resultado_control = $resultado_control;
    $this->id_interpretacion = $id_interpretacion;
    $this->id_decision = $id_decision;
    $this->id_resultado = $id_resultado;
  }

  public function setId_muestra($id_muestra)
  {
    $this->id_muestra = $id_muestra;
    return $this;
  }

  public function getId_muestra()
  {
    return $this->id_muestra;
  }

  public function setResultado_control($resultado_control)
  {
    $this->resultado_control = $resultado_control;
    return $this;
  }

  public function getResultado_control()
  {
    return $this->resultado_control;
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

  public function setId_decision($id_decision)
  {
    $this->id_decision = $id_decision;
    return $this;
  }

  public function getId_decision()
  {
    return $this->id_decision;
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
