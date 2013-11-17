<?php
//DRY don't repeat yourself

require_once '../../model/encuesta_interface.php';

$parametro_template = 'abm/encuesta.html';
$parametro_columnas = Array('ID_ENCUESTA','FECHA INICIO','FECHA CIERRE','ID_RESULTADO');
$parametro_datos = ORM_encuesta::obtener_todos_encuesta();

require 'controller.checkerror.php';
require '../controller.generico.php';

?>