<?php
//REALIZA LAS ALTAS Y MODIFICACIONES

require_once '../../model/metodo_interface.php';
require_once '../../model/test_input.php';

if (isset($_POST['action'])){
	//RECOBRAR LOS DATOS POR EL POST
	if ((!isset($_POST['descripcion']))or(!test_input($_POST['descripcion']))
		or (!isset($_POST['analitos']))or(!test_input($_POST['analitos']))){
			die ('5'); //NO PASA VALIDACION DEL LADO DEL SERVIDOR DATOS INVALIDOS
	}
	
	$descripcion = $_POST['descripcion'];
	
	$analitos = $_POST['analitos'];	//HACER EXPLODE
	$analitosArray = explode(",", $analitos);
	
	if ($_POST['action'] == 'editar'){
		if ((!isset($_POST['id_metodo']))or(!test_input($_POST['id_metodo']))){
			die ('5');	//DATOS INVALIDOS
		}
		else{
			$id_metodo = $_POST['id_metodo'];
			//HACE EL UPDATE
			$metodo = new Metodo ();
			$metodo->setId_metodo($id_metodo);
			$metodo->setDescripcion($descripcion);
			ORM_metodo::actualizar_metodo($metodo);	
			$result = ORM_metodo::actualizar_combinaciones_analito($id_metodo, $analitosArray);
			if($result == 0){
				die ('3');		//ERROR DE UPDATE
			}
			die('1');
		}
	}
	elseif ($_POST['action'] == 'alta'){
		//HACE EL INSERT
		$result = ORM_metodo::agregar_metodo($descripcion);	
		if ($result == 0)
			die('4');
		foreach ($analitosArray as $id_an) 
			$result = ORM_metodo::combinar_metodo_analito($descripcion,$id_an);
		if($result == 0){
			die ('2');		//ERROR DE INSERCION DE ANALITOS
		}
		die('1');
	}

}
?>