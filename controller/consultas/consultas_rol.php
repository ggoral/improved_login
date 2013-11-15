<?php
//REALIZA LAS ALTAS Y MODIFICACIONES

require_once '../../model/rol_interface.php';

if (isset($_POST['action'])){
	//RECOBRAR LOS DATOS POR EL POST
	$descripcion = $_POST['descripcion'];
	$id_rol = $_POST['id_rol'];
	
	if ($_POST['action'] == 'editar'){
		//HACE EL UPDATE
		$rol = new rol ();
		$rol->setId_rol($id_rol);
		$rol->setDescripcion($descripcion);
		ORM_rol::actualizar_rol($rol);
		echo "1";//ROMPE MVC
		return;
	}
	elseif ($_POST['action'] == 'alta'){
		//HACE EL INSERT
		$result = ORM_rol::agregar_rol($descripcion);
		if($result == 0){
			echo "0";//ROMPE MVC
			return;
		}
		echo "1";//ROMPE MVC
		return;
	}

}
?>