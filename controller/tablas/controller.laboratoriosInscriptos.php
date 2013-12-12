<?php
//DRY don't repeat yourself
$tipo_usuario = array('Adm','FBA');

require_once '../validarSesion.php';
require_once '../../model/laboratorio_interface.php';

$parametro_template = 'abm/laboratorio.html';
$parametro_columnas = Array('CODIGO','FECHA INGRESO','FECHA BAJA','ANALITO','ENCUESTA','TIPO',);
$parametro_datos = ORM_laboratorio::mostrar_laboratorios_inscriptos();


$perfil = $_SESSION['usuarioLogeado']['rol'];
//if ($perfil != 'Administrador')
	//$idLab = str_replace('Laboratorio_','',$perfil);

$titulo = "LABORATORIOS INSCRIPTOS";

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
    'titulo' => $titulo,
    'cabecera' => $parametro_columnas,
    'filas' => $parametro_datos,
	'perfil' => $perfil,
    'error' => $error,
    'displayerror' => $display,
    'messagecolor' => $color
  );
  
  
require '../controller.generico.php';

?>