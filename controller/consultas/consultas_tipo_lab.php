<?php
//REALIZA LAS ALTAS Y MODIFICACIONES

require_once '../../model/tipo_lab_interface.php';

if (isset($_POST['action'])){
	//RECOBRAR LOS DATOS POR EL POST
	$descripcion = $_POST['descripcion'];
	$id_tipo_lab = $_POST['id_tipo_lab'];
	
	if ($_POST['action'] == 'editar'){
		//HACE EL UPDATE
		$tipo_lab = new tipo_lab ();
		$tipo_lab->setId_tipo_lab($id_tipo_lab);
		$tipo_lab->setDescripcion($descripcion);
		ORM_tipo_lab::actualizar_tipo_lab($tipo_lab);
		echo "1";//ROMPE MVC
		return;
	}
	elseif ($_POST['action'] == 'alta'){
		//HACE EL INSERT
		$result = ORM_tipo_lab::agregar_tipo_lab($descripcion);
		if($result == 0){
			echo "0";//ROMPE MVC
			return;
		}
		echo "1";//ROMPE MVC
		return;
	}

}
?>