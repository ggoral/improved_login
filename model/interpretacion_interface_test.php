<?php

require_once "interpretacion_interface.php";

$interpretacion = ORM_interpretacion::buscar_interpretacion(3);

//$affected_row = ORM_interpretacion::agregar_interpretacion("Gonzalo");
//$affected_row = ORM_interpretacion::eliminar_interpretacion(5);
//echo "Cantidad Afectada:",$affected_row,"\n";


$interpretacion->setDescripcion("UN interpretacion MAS 234342345");
$affected_row = ORM_interpretacion::actualizar_interpretacion($interpretacion);
echo "Cantidad Afectada:",$affected_row,"\n";

//imprimir todos los interpretacions
//$interpretacions = ORM_interpretacion::obtener_todos_interpretacion();
//print_r($interpretacions);

?>
