<?php
//DRY don't repeat yourself
$tipo_usuario = array('Fba','Lab');

require_once '../validarSesion.php';
require_once '../../model/calibrador_interface.php';

$parametro_template = 'abm/calibrador.html';
$parametro_columnas = Array('ID_CALIBRADOR','DESCRIPCION');
$parametro_datos = ORM_calibrador::obtener_todos_calibrador();

require 'controller.checkerror.php';
require '../controller.generico.php';

?>
