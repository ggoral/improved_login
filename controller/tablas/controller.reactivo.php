<?php
//DRY don't repeat yourself

require_once '../../model/reactivo_interface.php';

$parametro_template = 'abm/reactivo.html';
$parametro_columnas = Array('ID_REACTIVO','DESCRIPCION');
$parametro_datos = ORM_reactivo::obtener_todos_reactivo();

require 'controller.checkerror.php';
require '../controller.generico.php';

?>
