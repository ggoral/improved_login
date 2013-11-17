<?php
//DRY don't repeat yourself

require_once '../../model/laboratorio_interface.php';

$parametro_template = 'abm/laboratorio.html';
$parametro_columnas = Array('ID_LABORATORIO','CODIGO','CIUDAD','TIPO LABORATORIO');
$parametro_datos = ORM_laboratorio::mostrar_laboratorio();

require 'controller.checkerror.php';
require '../controller.generico.php';

?>