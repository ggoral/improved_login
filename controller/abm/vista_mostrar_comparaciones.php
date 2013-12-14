<?php
//DRY don't repeat yourself
$tipo_usuario = array('FBA','Lab');

require_once '../validarSesion.php';
require_once '../../model/encuesta_interface.php';

$parametro_template = 'abm/vista_mostrar_comparaciones.html';
$resultadoLaboratorio = ORM_encuesta::obtener_resultados_muestra($_POST['id_encuesta'], $_POST['id_lab']);
$resultadoEncuesta = ORM_encuesta::obtener_resultados_muestra($_POST['id_encuesta']);


$resultadoLaboratorioDesc = ORM_encuesta::obtener_resultados_muestra_desc($_POST['id_encuesta'], $_POST['id_lab']);
$resultadoEncuestaDesc = ORM_encuesta::obtener_resultados_muestra_desc($_POST['id_encuesta']);
$resultadoEncuestaDesc[0]['laboratorio'] = 'Muestra FBA';

$parametro_datos = array();
$parametro_datos[] = $resultadoEncuestaDesc[0];

if (empty($resultadoLaboratorio))
{
	$mensaje = 'No se registran resultados para esta encuesta';
}
else{
	$i = 0;
	$dif = array();
	foreach ($resultadoLaboratorio as $resLab){
		$i++;
		$resultadoLaboratorioDesc[$i-1]['laboratorio'] = 'Muestra '.$i;
		$parametro_datos[] = $resultadoLaboratorioDesc[$i-1];
		if( ($resLab['id_metodo'] != $resultadoEncuesta[0]['id_metodo']) OR 
			($resLab['id_reactivo'] != $resultadoEncuesta[0]['id_reactivo']) OR 
			($resLab['id_calibrador'] != $resultadoEncuesta[0]['id_calibrador']) OR 
			($resLab['id_analito'] != $resultadoEncuesta[0]['id_analito']) OR 
			($resLab['id_papel_filtro'] != $resultadoEncuesta[0]['id_papel_filtro']) OR 
			($resLab['id_valor'] != ($resultadoEncuesta[0]['id_valor'])) OR 
			($resLab['id_interpretacion'] != $resultadoEncuesta[0]['id_interpretacion']) OR 
			($resLab['id_decision'] != $resultadoEncuesta[0]['id_decision'])) {
				$dif[] = 1;
		}
		else{
			$dif[] = 0;
		}
	}
	$muestrasDistintas = 0;
	foreach ($dif as $d)
		$muestrasDistintas += $d;
	if ($muestrasDistintas > 0)
		$mensaje = 'Se han usado diferentas herramientas para comparar '.$muestrasDistintas.' de '.$i.'  de las muestras';
	else
		$mensaje = 'Se han usado las mismas herramientas para comparar '.$muestrasDistintas.' de '.$i.'  de las muestras';		
}

$parametro_display = array(
	'mensaje' => $mensaje,
    'datos' => $parametro_datos,
	'indice' => count($resultadoEncuesta[0])
  );

require '../controller.generico.php';

?>