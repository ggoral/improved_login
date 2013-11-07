<?php

class Usuario
  {
   private $id_usuario;
   private $username;
   private $password;
   private $email;
   private $id_rol;

  public function init($id_usuario, $username, $password, $email, $id_rol) 
  {
  $this->id_usuario = $id_usuario;  
  $this->username = $username;
  $this->password = $password;
  $this->email = $email;
  $this->id_rol = $id_rol;
  }

  public function setId_usuario($id_usuario)
  {
  $this->id_usuario = $id_usuario;
  return $this;
  }

  public function getId_usuario()
  {
    return $this->id_usuario;
  }

  public function setUsername($username)
  {
  $this->username = $username;
  return $this;
  }

  public function getUsername()
  {
    return $this->username;
  }

  public function setPassword($password)
  {
  $this->password = $password;
  return $this;
  }

  public function getPassword()
  {
    return $this->password;
  }

  public function setEmail($email)
  {
  $this->email = $email;
  return $this;
  }

  public function getEmail()
  {
    return $this->email;
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

  }

?>
