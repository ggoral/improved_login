<?php
//REALIZA LAS ALTAS Y MODIFICACIONES

require_once '../../model/calibrador_interface.php';

if (isset($_POST['action'])){
	//RECOBRAR LOS DATOS POR EL POST
	$descripcion = $_POST['descripcion'];
	$id_calibrador = $_POST['id_calibrador'];
	$analitos = $_POST['analitos'];	//HACER EXPLODE
	$analitos = explode(",", $analitos);
	
	if ($_POST['action'] == 'editar'){
		//HACE EL UPDATE
		$calibrador = new Calibrador ();
		$calibrador->setId_calibrador($id_calibrador);
		$calibrador->setDescripcion($descripcion);
		ORM_calibrador::actualizar_calibrador($calibrador);		//DEBERIA ACTUALIZAR LAS DEPENDENCIAS VER COMO!!!
		echo "1";
		return;
	}
	elseif ($_POST['action'] == 'alta'){
		//HACE EL INSERT
		$result = ORM_calibrador::agregar_calibrador($descripcion);			//VER LAS DEPENDENCIAS
		if($result == 0){
			echo "0";
			return;
		}
		echo "1";
		return;
	}

}
?>