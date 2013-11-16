<?php
//DRY don't repeat yourself

require_once '../../model/valor_corte_interface.php';

$parametro_template = 'abm/valor_corte.html';
$parametro_columnas = Array('ID_VALOR_CORTE','DESCRIPCION');
$parametro_datos = ORM_valor_corte::obtener_todos_valor_corte();

require 'controller.checkerror.php';
require '../controller.generico.php';

?>
