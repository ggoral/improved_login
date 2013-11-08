<?php

require_once "calibrador_interface.php";

$calibrador = ORM_calibrador::buscar_calibrador(5);

//$affected_row = ORM_calibrador::agregar_calibrador("Gonzalo");
//$affected_row = ORM_calibrador::eliminar_calibrador(5);
//echo "Cantidad Afectada:",$affected_row,"\n";


$calibrador->setDescripcion("UN calibrador MAS 234342345");
$affected_row = ORM_calibrador::actualizar_calibrador($calibrador);
echo "Cantidad Afectada:",$affected_row,"\n";

//imprimir todos los calibradors
//$calibradors = ORM_calibrador::obtener_todos_calibrador();
//print_r($calibradors);

?>
