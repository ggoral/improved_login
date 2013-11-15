<?php
//REALIZA LAS ALTAS Y MODIFICACIONES

require_once '../../model/tipo_lab_interface.php';
require_once '../../model/test_input.php';

if (isset($_POST['action'])){
	//RECOBRAR LOS DATOS POR EL POST
	if ((!isset($_POST['descripcion']))or(!test_input($_POST['descripcion']))){
		die ('5'); //NO PASA VALIDACION DEL LADO DEL SERVIDOR
	}	

	$descripcion = $_POST['descripcion'];
	
	if ($_POST['action'] == 'editar'){
		$id_tipo_lab = $_POST['id_tipo_lab'];
		if((!isset($_POST['id_tipo_lab']))or(!test_input($_POST['id_tipo_lab']))){
			die ('5'); //NO PASA VALIDACION DEL LADO DEL SERVIDOR
		}else{
			//HACE EL UPDATE
			$tipo_lab = new tipo_lab ();
			$tipo_lab->setId_tipo_lab($id_tipo_lab);
			$tipo_lab->setDescripcion($descripcion);
			ORM_tipo_lab::actualizar_tipo_lab($tipo_lab);
			echo "1";
			return;
		}
	}
	elseif ($_POST['action'] == 'alta'){
		//HACE EL INSERT
		$result = ORM_tipo_lab::agregar_tipo_lab($descripcion);
		if($result == 0){
			echo "0";
			return;
		}
		echo "1";
		return;
	}

}
?>