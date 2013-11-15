<?php
//DRY don't repeat yourself

require_once '../../model/tipo_lab_interface.php';

$parametro_template = 'abm/tipo_lab.html';
$parametro_columnas = Array('ID_TIPO_LAB','DESCRIPCION');
$parametro_datos = ORM_tipo_lab::obtener_todos_tipo_lab();


if (isset($_POST['error'])){
  $error = $_POST['error'];
  $display = 'block';
  $color = "red";
}
else{
  $error = '';
  $display = 'none';
}

if($error = "OK!"){
	var_dump($error);
  $color = "green";
}

$parametro_display = array(
    'cabecera' => $parametro_columnas,
    'filas' => $parametro_datos,
    'error' => $error,
    'displayerror' => $display,
    'messagecolor' => $color
  );


require '../controller.generico.php';

?>