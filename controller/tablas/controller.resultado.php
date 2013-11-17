<?php
//DRY don't repeat yourself

require_once '../../model/resultado_interface.php';

$parametro_template = 'abm/resultado.html';
$parametro_columnas = Array('ID_RESULTADO','COMENTARIO','FECHA ANALISIS','LABORATORIO','ANALITO');
$parametro_datos = ORM_resultado::buscar_resultado_Twig_Tabla();

require 'controller.checkerror.php';
require '../controller.generico.php';

?>