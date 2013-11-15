<?php
//DRY don't repeat yourself

require_once '../../model/rol_interface.php';

$parametro_template = 'abm/rol.html';
$parametro_columnas = Array('ID_ROL','DESCRIPCION');
$parametro_datos = ORM_rol::obtener_todos_rol();


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