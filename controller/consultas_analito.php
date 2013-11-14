<?php
//REALIZA LAS ALTAS Y MODIFICACIONES

require_once '../model/analito_interface.php';

if (isset($_POST['action'])){
	//RECOBRAR LOS DATOS POR EL POST
	$descripcion = $_POST['descripcion'];
	$id_analito = $_POST['id_analito'];
	
	if ($_POST['action'] == 'editar'){
		//HACE EL UPDATE
		$analito = new Analito ();
		$analito->setId_analito($id_analito);
		$analito->setDescripcion($descripcion);
		ORM_analito::actualizar_analito($analito);
		echo "1";
		return;
	}
	elseif ($_POST['action'] == 'alta'){
		//HACE EL INSERT
		$result = ORM_analito::agregar_analito($descripcion);
		if($result == 0){
			echo "0";
			return;
		}
		echo "1";
		return;
	}

}
?>