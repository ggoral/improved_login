<?php
session_start();
if((!isset($_SESSION['usuarioLogeado']['username']) or ($_SESSION['usuarioLogeado']['username'] == '')) or
   (!isset($_SESSION['usuarioLogeado']['rol']) or ($_SESSION['usuarioLogeado']['rol'] == '')))
   {
        header('Location: index.php?error=ERROR DE LOGIN O SESION EXPIRADA');
   }	
else{
	if(($_SESSION['usuarioLogeado']['username']!=$idUsuarioSesion)||($_SESSION['usuarioLogeado']['rol']!=$idRolSesion)){
		header('Location: index.php?error=ERROR DE SESION');
	}
}	
$idRolSesion= $_SESSION['usuarioLogeado']['rol'];
$idUsuarioSesion= $_SESSION['usuarioLogeado']['username'];  
?>

