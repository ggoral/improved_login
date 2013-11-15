<?php
//DRY don't repeat yourself

require_once '../../model/pais_interface.php';

$parametro_template = 'abm/pais.html';
$parametro_columnas = Array('ID_PAIS','DESCRIPCION');
$parametro_datos = ORM_pais::buscar_pais_Twig();

require 'controller.checkerror.php';
require '../controller.generico.php';

?>