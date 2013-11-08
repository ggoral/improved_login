<?php

require_once "reactivo_interface.php";

$reactivo = ORM_reactivo::buscar_reactivo(26);

//$affected_row = ORM_reactivo::agregar_reactivo("Gonzalo");
/*$affected_row = ORM_reactivo::eliminar_reactivo(6);
echo "Cantidad Afectada:",$affected_row,"\n";*/


$reactivo->setDescripcion("UN reactivo MAS 234342345");
$affected_row = ORM_reactivo::actualizar_reactivo($reactivo);
echo "Cantidad Afectada:",$affected_row,"\n";

//imprimir todos los reactivos
//$reactivos = ORM_reactivo::obtener_todos_reactivo();
//print_r($reactivos);

?>
