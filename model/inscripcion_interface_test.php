<?php

require_once "inscripcion_interface.php";

$inscripcion = ORM_inscripcion::buscar_inscripcion(1);

//$affected_row = ORM_inscripcion::agregar_inscripcion(12/12/12, 12/12/12, 1);
//$affected_row = ORM_inscripcion::eliminar_inscripcion(4);
//printf($inscripcion->getFecha_inicio());
//echo "Cantidad Afectada:",$affected_row,"\n";


$inscripcion->setFecha_ingreso(1234/12/12);//NO SE COMO TESTEAR ESTO
$affected_row = ORM_inscripcion::actualizar_inscripcion($inscripcion);
echo "Cantidad Afectadaa:",$affected_row,"\n";

//imprimir todos los inscripcions
$inscripciones = ORM_inscripcion::obtener_todos_inscripcion();
print_r($inscripciones);

?>