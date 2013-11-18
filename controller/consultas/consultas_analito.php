<?php
//REALIZA LAS ALTAS Y MODIFICACIONES
$tipo_usuario = array('Adm','FBA','Lab');

require_once '../validarSesion.php';
require_once '../../model/analito_interface.php';
require_once '../../model/test_input.php';

if (isset($_POST['action'])){
	//RECOBRAR LOS DATOS POR EL POST
	if ((!isset($_POST['descripcion']))or(!test_input($_POST['descripcion']))){
		die('5'); //NO PASA VALIDACION DEL LADO DEL SERVIDOR
	}	

	$descripcion = $_POST['descripcion'];
	
	if ($_POST['action'] == 'editar'){
		if((!isset($_POST['id_analito']))or(!test_input($_POST['id_analito']))){
			die('5'); //NO PASA VALIDACION DEL LADO DEL SERVIDOR
		}else{
			//HACE EL UPDATE
			$id_analito = $_POST['id_analito'];
			$analito = new Analito ();
			$analito->setId_analito($id_analito);
			$analito->setDescripcion($descripcion);
			$result = ORM_analito::actualizar_analito($analito);
			if($result == 0)
			{	
				die('3');
			}
		}
	}
	elseif ($_POST['action'] == 'alta'){
		//HACE EL INSERT
		$result = ORM_analito::agregar_analito($descripcion);
		if($result == 0)
		{
			die('4');
		}
	}
	die('1');
}
?>