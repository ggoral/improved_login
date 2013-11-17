<?php
//DRY don't repeat yourself
$tipo_usuario = array('Lab');

require_once '../validarSesion.php';
require_once '../../model/inscripcion_interface.php';


$parametro_template = 'abm/inscripcion.html';
$parametro_columnas = Array('ID_INSCRIPCION','FECHA INGRESO','FECHA BAJA','ID_ENCUESTA');

$perfil = $_SESSION['usuarioLogeado']['rol'];
$perfil = str_replace('Laboratorio_','',$perfil);
$parametro_datos = ORM_inscripcion::obtener_todos_inscripcion_lab($perfil);

require 'controller.checkerror.php';
require '../controller.generico.php';

?>