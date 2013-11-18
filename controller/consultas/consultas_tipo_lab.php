<?php
//REALIZA LAS ALTAS Y MODIFICACIONES
$tipo_usuario = array('Adm','FBA','Lab');

require_once '../validarSesion.php';
require_once '../../model/tipo_lab_interface.php';
require_once '../../model/test_input.php';

if (isset($_POST['action'])){
	//RECOBRAR LOS DATOS POR EL POST
	if ((!isset($_POST['descripcion']))or(!test_input($_POST['descripcion']))){
		die('5'); //NO PASA VALIDACION DEL LADO DEL SERVIDOR
	}	

	$descripcion = $_POST['descripcion'];
	if ($_POST['action'] == 'editar'){
		if((!isset($_POST['id_tipo_lab']))or(!test_input($_POST['id_tipo_lab']))){
			die('5'); //NO PASA VALIDACION DEL LADO DEL SERVIDOR
		}else{
			//HACE EL UPDATE
			$id_tipo_lab = $_POST['id_tipo_lab'];
			$tipo_lab = new Tipo_lab ();
			$tipo_lab->setId_tipo_lab($id_tipo_lab);
			$tipo_lab->setDescripcion($descripcion);
			$result = ORM_tipo_lab::actualizar_tipo_lab($tipo_lab);
			if($result == 0)
			{	
				die('3');
			}
		}
	}
	elseif ($_POST['action'] == 'alta'){
		//HACE EL INSERT
		$result = ORM_tipo_lab::agregar_tipo_lab($descripcion);
		if($result == 0)
		{
			die('4');
		}
	}
	die('1');
}
?>