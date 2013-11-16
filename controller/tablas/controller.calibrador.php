<?php
//DRY don't repeat yourself

require_once '../../model/calibrador_interface.php';

$parametro_template = 'abm/calibrador.html';
$parametro_columnas = Array('ID_CALIBRADOR','DESCRIPCION');
$parametro_datos = ORM_calibrador::obtener_todos_calibrador();

if (isset($_POST['error'])){
  $error = $_POST['error'];
  $display = 'block';
  $color = "red";
}
else{
  $error = '';
  $display = 'none';
  $color = '';
}

if($error == "1"){
  $color = "green";
  $error = "Operacion Exitosa!";
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
