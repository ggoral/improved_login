<?php
//DRY don't repeat yourself

require_once '../model/calibrador_interface.php';

$parametro_template = 'abm/calibrador.html';
$parametro_columnas = Array('ID_CALIBRADOR','DESCRIPCION');
$parametro_datos = ORM_calibrador::obtener_todos_calibrador();

require 'controller.generico.php';

?>
