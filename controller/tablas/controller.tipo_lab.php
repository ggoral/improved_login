<?php
//DRY don't repeat yourself

require_once '../../model/tipo_lab_interface.php';

$parametro_template = 'abm/tipo_lab.html';
$parametro_columnas = Array('ID_TIPO_LAB','DESCRIPCION');
$parametro_datos = ORM_tipo_lab::obtener_todos_tipo_lab();

require 'controller.checkerror.php';
require '../controller.generico.php';

?>