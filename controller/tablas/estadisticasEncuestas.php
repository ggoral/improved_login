<?php
//DRY don't repeat yourself
$tipo_usuario = array('FBA','Lab');

require_once '../validarSesion.php';
require_once '../../model/encuesta_interface.php';
require_once '../../model/laboratorio_interface.php';

$parametro_template = 'abm/estadisticasEncuestas.html';
$parametro_columnas = Array('ID_ENCUESTA','FECHA INICIO','FECHA CIERRE','PARTICIPANTES','COMPARACIONES');
$parametro_datos = ORM_encuesta::obtener_estadisticas_encuestas();

$perfil = $_SESSION['usuarioLogeado']['rol'];
if (($perfil != 'Administrador')and($perfil != 'FBA')){
	$perfil = str_replace('Laboratorio_','',$perfil);
	$laboratorio = ORM_laboratorio:: buscar_laboratorio_Twig($perfil);	//es la busqueda por id de  lab
	$codlab = $laboratorio['cod_lab'];
	$parametro_datos = ORM_encuesta::buscar_encuesta_Twig_Tabla_para_lab($codlab);	
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