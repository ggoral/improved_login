<?php

require_once "encuesta_interface.php";

//$encuesta = ORM_encuesta::buscar_encuesta(5);

//$affected_row = ORM_encuesta::agregar_encuesta(12/12/12, 12/12/12, 1);
//$affected_row = ORM_encuesta::eliminar_encuesta(4);
//printf($encuesta->getFecha_inicio());
//echo "Cantidad Afectada:",$affected_row,"\n";


//$encuesta->setFecha_inicio(1234/12/12);//NO SE COMO TESTEAR ESTO
//$affected_row = ORM_encuesta::actualizar_encuesta($encuesta);
//echo "Cantidad Afectadaa:",$affected_row,"\n";

//imprimir todos los encuestas
//$encuestaes = ORM_encuesta::obtener_todos_encuesta();
//print_r($encuestaes);


//imprimir todas las encuestas de un laboratorio para los graficos.
$encuestas = ORM_encuesta::mostrar_encuestas_laboratorio(3);
print_r($encuestas);
$encuetas_nuevas = array();
foreach ($encuestas as $key => $value) {
  print_r($key);
}

?>