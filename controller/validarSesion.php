<?php
session_start();
//tiene que estar seteada la variable $rol_session

if(isset($_SESSION['usuarioLogeado']['rol']))
  {
  $validar_rol = substr($_SESSION['usuarioLogeado']['rol'],0,3);
  if ( ! in_array($validar_rol,$tipo_usuario)) 
    {
    die("Permisos Insuficientes");
    }
    else
    {
    $idRolSesion= $_SESSION['usuarioLogeado']['rol'];
    $idUsuarioSesion= $_SESSION['usuarioLogeado']['username'];
    }
  }	
else
  {
	die("Inicie Session");
  }
?>
