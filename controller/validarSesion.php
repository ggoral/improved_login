<?php
session_start();
//tiene que estar seteada la variable $rol_session
 
if(isset($_SESSION['usuarioLogeado']['rol']))
  {
  $validarRol = substr($_SESSION['usuarioLogeado']['rol'],0,3);
  if (array_key_exists($validarRol,$tipo_usuario)) 
    {
    $idRolSesion= $_SESSION['usuarioLogeado']['rol'];
    $idUsuarioSesion= $_SESSION['usuarioLogeado']['username'];
    }
    else
    {
    header('Location: index.php?error=Permisos insuficientes');
    }
  }	
else
  {
	header('Location: index.php?error=Inicie Session');
  }
?>
