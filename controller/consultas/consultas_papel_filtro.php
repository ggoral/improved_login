<?php
//REALIZA LAS ALTAS Y MODIFICACIONES

require_once '../../model/papel_filtro_interface.php';
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
		if ((!isset($_POST['id_papel_filtro']))or(!test_input($_POST['id_papel_filtro']))){
			die ('5');	//DATOS INVALIDOS
		}
		else{
			$id_papel_filtro = $_POST['id_papel_filtro'];
			//HACE EL UPDATE
			$papel_filtro = new Papel_filtro ();
			$papel_filtro->setId_papel_filtro($id_papel_filtro);
			$papel_filtro->setDescripcion($descripcion);
			ORM_papel_filtro::actualizar_papel_filtro($papel_filtro);	
			$result = ORM_papel_filtro::actualizar_combinaciones_analito($id_papel_filtro, $analitosArray);
			if($result == 0){
				die ('3');		//ERROR DE UPDATE
			}
			die('1');
		}
	}
	elseif ($_POST['action'] == 'alta'){
		//HACE EL INSERT
		$result = ORM_papel_filtro::agregar_papel_filtro($descripcion);	
		if ($result == 0)
			die('4');
		foreach ($analitosArray as $id_an) 
			$result = ORM_papel_filtro::combinar_papel_filtro_analito($descripcion,$id_an);
		if($result == 0){
			die ('2');		//ERROR DE INSERCION DE ANALITOS
		}
		die('1');
	}

}
?>