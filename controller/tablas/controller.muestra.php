<?php
//DRY don't repeat yourself
$tipo_usuario = array('FBA','Lab');

require_once '../validarSesion.php';
require_once '../../model/muestra_interface.php';
require_once '../../model/laboratorio_interface.php';

$parametro_template = 'abm/muestra.html';
$parametro_columnas = Array('ID_MUESTRA','RESULTADO CONTROL','INTERPRETACION','DECISION','RESULTADO');
$parametro_datos = ORM_muestra::buscar_muestra_Twig_Tabla();

$perfil = $_SESSION['usuarioLogeado']['rol'];
if ($perfil != 'FBA'){
	$perfil = str_replace('Laboratorio_','',$perfil);
	$parametro_datos = ORM_muestra::buscar_muestra_resultado_laboratorio_Twig($perfil);//todas las muestras que corresponden q corresponden al id_lab
}

if (isset($_POST['error'])){
  $error = $_POST['error'];
  $display = 'block';
  $color = "red";
}
else{
  $error = '';
  $color = "yellow";
  $display = 'none';
}

if($error == "1"){
  $color = "green";
  $error = "Operacion Exitosa!";
}

$parametro_display = array(
    'cabecera' => $parametro_columnas,
    'filas' => $parametro_datos,
	'perfil' => $perfil,
    'error' => $error,
    'displayerror' => $display,
    'messagecolor' => $color
  );
  
require 'controller.checkerror.php';
require '../controller.generico.php';

?>