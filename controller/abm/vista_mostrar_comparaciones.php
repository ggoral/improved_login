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

$dif = array();
if (empty($resultadoLaboratorio))
{
	$mensaje = 'No se registran resultados para esta encuesta';
	$dif[]['porcentual']= 'No puede calcularse el error ya que no se registran resultados.';
}
else{
	$i = 0;	
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
				$dif[$i-1]['cant'] = 1;
				$dif[$i-1]['porcentual']= 'Muestra nro '.$i.' calculada erroneamente, error del 100%';
		}
		else{
			$dif[$i-1]['cant'] = 0;
			$dif[$i-1]['porcentual']= 'Error en muestra nro '.$i.' del'.((-1*(($resLab['resultado_control']*100)/$resultadoEncuesta[0]['resultado_control']))-100).'%'; /*calula porcentaje de error*/
		}
	}
	$muestrasDistintas = 0;
	foreach ($dif as $d)
		$muestrasDistintas += $d['cant'];
	if ($muestrasDistintas > 0)
		$mensaje = 'Se han usado diferentas herramientas para comparar '.$muestrasDistintas.' de '.$i.'  de las muestras';
	else
		$mensaje = 'Se han usado las mismas herramientas para comparar '.$muestrasDistintas.' de '.$i.'  de las muestras';		
}

$parametro_display = array(
	'mensaje' => $mensaje,
    'datos' => $parametro_datos,
	'indice' => count($resultadoEncuesta[0]),
	'porcentual' => $dif
  );

require '../controller.generico.php';

?>