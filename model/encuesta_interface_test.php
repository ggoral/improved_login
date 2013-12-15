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
$encuestas_nuevas = array();

$i = 0;
foreach ($encuestas as $enc) {
  $fecha_ingreso = new DateTime($enc['fecha_inicio']);
  $fecha_analisis = new DateTime($enc['fecha_analisis']);
  $fecha_cierre = new DateTime($enc['fecha_cierre']);
  $fecha_recepcion = new DateTime($enc['fecha_recepcion']);
  $fecha_ingreso = new DateTime($enc['fecha_ingreso']);
  
  $encuestas_nuevas[$i]['id_encuesta'] = $enc['id_encuesta']; 
  
  $encuestas_nuevas[$i]['tiempo_envio'] = ($fecha_recepcion->diff($fecha_inicio))['days']; 
  $encuestas_nuevas[$i]['tiempo_analisis'] = $fecha_analisis->diff($fecha_recepcion); 
  $encuestas_nuevas[$i]['tiempo_ingreso'] = $fecha_ingreso->diff($fecha_analisis); 
  
  $i++;
}

print_r($encuestas_nuevas)

?>