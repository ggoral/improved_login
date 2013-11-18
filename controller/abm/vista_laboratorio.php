<?php
//DRY don't repeat yourself
$tipo_usuario = array('Adm','FBA','Lab');

require_once '../validarSesion.php';
require_once '../../model/laboratorio_interface.php';

$parametro_template = 'abm/vista_laboratorio.html';
$parametro_datos = ORM_laboratorio::buscar_laboratorio_Twig2($_POST['id_laboratorio']);


$parametro_display = array(
    'laboratorio' => $parametro_datos
  );

require '../controller.generico.php';

?>