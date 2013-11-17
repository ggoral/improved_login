<?php
//DRY don't repeat yourself
$tipo_usuario = array('Adm');

require_once '../validarSesion.php';
require_once '../../model/decision_interface.php';

$parametro_template = 'abm/decision.html';
$parametro_columnas = Array('ID_DECISION','DESCRIPCION');
$parametro_datos = ORM_decision::obtener_todos_decision();

require 'controller.checkerror.php';
require '../controller.generico.php';

?>
