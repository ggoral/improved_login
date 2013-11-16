<?php
//DRY don't repeat yourself

require_once '../../model/interpretacion_interface.php';

$parametro_template = 'abm/interpretacion.html';
$parametro_columnas = Array('ID_INTERPRETACION','DESCRIPCION');
$parametro_datos = ORM_interpretacion::obtener_todos_interpretacion();

require 'controller.checkerror.php';
require '../controller.generico.php';

?>
