<?php
//DRY don't repeat yourself

require_once '../../model/decision_interface.php';

$parametro_template = 'abm/decision.html';
$parametro_columnas = Array('ID_DECISION','DESCRIPCION');
$parametro_datos = ORM_decision::obtener_todos_decision();

require 'controller.checkerror.php';
require '../controller.generico.php';

?>
