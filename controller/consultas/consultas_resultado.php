<?php
//REALIZA LAS ALTAS Y MODIFICACIONES
$tipo_usuario = array('Adm','FBA','Lab');

require_once '../validarSesion.php';
require_once '../../model/resultado_interface.php';
require_once '../../model/test_input.php';

if (isset($_POST['action'])){
	//RECOBRAR LOS DATOS POR EL POST
	if ((!isset($_POST['id_metodo']))or(!test_input($_POST['id_metodo']))
		or (!isset($_POST['id_reactivo']))or(!test_input($_POST['id_reactivo']))
		or (!isset($_POST['id_analito']))or(!test_input($_POST['id_analito']))
		or (!isset($_POST['id_calibrador']))or(!test_input($_POST['id_calibrador']))
		or (!isset($_POST['id_papel_filtro']))or(!test_input($_POST['id_papel_filtro']))	
		or (!isset($_POST['id_valor_corte']))or(!test_input($_POST['id_valor_corte']))){
			die ('5'); //NO PASA VALIDACION DEL LADO DEL SERVIDOR DATOS INVALIDOS
	}
	
	if ((isset($_POST['fecha_recepcion']))and(test_input($_POST['fecha_recepcion'])))
		if (preg_match('/^\d{4}\/\d{1,2}\/\d{1,2}$/', $_POST['fecha_recepcion']))
			die('6');
	if ((isset($_POST['fecha_analisis']))and(test_input($_POST['fecha_analisis'])))
		if (preg_match('/^\d{4}\/\d{1,2}\/\d{1,2}$/', $_POST['fecha_analisis']))
			die('6');	
	if ((isset($_POST['fecha_ingreso']))and(test_input($_POST['fecha_ingreso'])))
		if (preg_match('/^\d{4}\/\d{1,2}\/\d{1,2}$/', $_POST['fecha_ingreso']))
			die('6');
	

	$comentario = $_POST['comentario'];
	$fecha_recepcion = $_POST['fecha_recepcion'];	
	$fecha_analisis = $_POST['fecha_analisis'];	
	$fecha_ingreso = $_POST['fecha_ingreso'];	
	$id_lab = $_POST['id_lab'];	
	$id_metodo = $_POST['id_metodo'];	
	$id_reactivo = $_POST['id_reactivo'];		
	$id_calibrador = $_POST['id_calibrador'];	
	$id_analito = $_POST['id_analito'];	
	$id_papel_filtro = $_POST['id_papel_filtro'];	
	$id_valor = $_POST['id_valor_corte'];	
	
	if ($_POST['action'] == 'editar'){
		if ((!isset($_POST['id_resultado']))or(!test_input($_POST['id_resultado']))){
			die ('5');	//DATOS INVALIDOS
		}
		else{		
			$id_resultado = $_POST['id_resultado'];
			//HACE EL UPDATE
			$resultado = new resultado ();
			$resultado->setId_resultado($id_resultado);
			$resultado->setComentario($comentario);
			$resultado->setFecha_recepcion($fecha_recepcion);
			$resultado->setFecha_analisis($fecha_analisis);
			$resultado->setFecha_ingreso($fecha_ingreso);
			$resultado->setId_lab($id_lab);
			$resultado->setId_metodo($id_metodo);
			$resultado->setId_reactivo($id_reactivo);
			$resultado->setId_calibrador($id_calibrador);
			$resultado->setId_analito($id_analito);
			$resultado->setId_papel_filtro($id_papel_filtro);
			$resultado->setId_valor($id_valor);
 
 			$result = ORM_resultado::actualizar_resultado($resultado);
			
			if($result == 0)
				die ('3');		//ERROR DE UPDATE
		}
	}
	elseif ($_POST['action'] == 'alta'){
		//HACE EL INSERT
		$result = ORM_resultado::agregar_resultado($comentario, $fecha_recepcion, $fecha_analisis, $fecha_ingreso, $id_lab, $id_metodo, $id_reactivo, $id_calibrador, $id_analito, $id_papel_filtro, $id_valor);
		if ($result == 0)
			die('4');
		
	}
	die('1');
}
?>