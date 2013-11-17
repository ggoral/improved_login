<?php
//DRY don't repeat yourself
$tipo_usuario = array('Adm','FBA','Lab');

require_once '../validarSesion.php';
require_once '../../model/resultado_interface.php';
require_once '../../model/laboratorio_interface.php';

$parametro_template = 'abm/resultado.html';
$parametro_columnas = Array('ID_RESULTADO','COMENTARIO','FECHA ANALISIS','LABORATORIO','ANALITO');
$parametro_datos = ORM_resultado::buscar_resultado_Twig_Tabla();

$perfil = $_SESSION['usuarioLogeado']['rol'];
if (($perfil != 'Administrador')and($perfil != 'FBA')){
	$perfil = str_replace('Laboratorio_','',$perfil);
	$laboratorio = ORM_laboratorio:: buscar_laboratorio_Twig($perfil);	//es la busqueda por id de  lab
	$codlab = $laboratorio['cod_lab'];
	$parametro_datos = ORM_resultado::buscar_resultado_Twig_Tabla_para_lab($codlab);	
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
  
  
require '../controller.generico.php';

?>