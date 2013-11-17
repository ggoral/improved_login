<?php
//DRY don't repeat yourself
$tipo_usuario = array('Adm','Fba');

require_once '../validarSesion.php';
require_once '../../model/laboratorio_interface.php';

$parametro_template = 'abm/laboratorio.html';
$parametro_columnas = Array('ID_LABORATORIO','CODIGO','CIUDAD','TIPO LABORATORIO');
$parametro_datos = ORM_laboratorio::mostrar_laboratorio();

require 'controller.checkerror.php';
require '../controller.generico.php';

?>