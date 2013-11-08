<?php

class Menu
  {
   private $id_menu;
   private $destino;
   private $perfil;

  public function init($id_menu, $destino, $perfil) 
  {
  $this->id_menu = $id_menu;  
  $this->destino = $destino;
  $this->perfil = $perfil;
  }

  public function setId_menu($id_menu)
  {
  $this->id_menu = $id_menu;
  return $this;
  }

  public function getId_menu()
  {
    return $this->id_menu;
  }

  public function setDestino($destino)
  {
  $this->destino = $destino;
  return $this;
  }

  public function getDestino()
  {
    return $this->destino;
  }

    public function setPerfil($perfil)
  {
  $this->perfil = $perfil;
  return $this;
  }

  public function getPerfil()
  {
    return $this->perfil;
  }
  
  }

?>
