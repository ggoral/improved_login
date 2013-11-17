<?php
//DRY don't repeat yourself

require_once '../../model/resultado_interface.php';

$parametro_template = 'abm/vista_resultado.html';
$parametro_datos = ORM_resultado::buscar_resultado_Twig2($_POST['id_resultado']);

$parametro_display = array(
    'resultado' => $parametro_datos
  );

require '../controller.generico.php';

?>