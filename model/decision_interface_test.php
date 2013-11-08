<?php

require_once "decision_interface.php";

$decision = ORM_decision::buscar_decision(13);

//$affected_row = ORM_decision::agregar_decision("Gonzalo");
//$affected_row = ORM_decision::eliminar_decision(5);
//echo "Cantidad Afectada:",$affected_row,"\n";


$decision->setDescripcion("UN decision MAS 234342345");
$affected_row = ORM_decision::actualizar_decision($decision);
echo "Cantidad Afectada:",$affected_row,"\n";

//imprimir todos los decisions
//$decisions = ORM_decision::obtener_todos_decision();
//print_r($decisions);

?>
