<?php
//DRY don't repeat yourself

require_once '../../model/papel_filtro_interface.php';

$parametro_template = 'abm/papel_filtro.html';
$parametro_columnas = Array('ID_PAPEL_FILTRO','DESCRIPCION');
$parametro_datos = ORM_papel_filtro::obtener_todos_papel_filtro();

require 'controller.checkerror.php';
require '../controller.generico.php';

?>
