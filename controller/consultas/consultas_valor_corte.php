<?php
//REALIZA LAS ALTAS Y MODIFICACIONES

require_once '../../model/valor_corte_interface.php';
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
		if ((!isset($_POST['id_valor_corte']))or(!test_input($_POST['id_valor_corte']))){
			die ('5');	//DATOS INVALIDOS
		}
		else{
			$id_valor_corte = $_POST['id_valor_corte'];
			//HACE EL UPDATE
			$valor_corte = new Valor_corte ();
			$valor_corte->setId_valor_corte($id_valor_corte);
			$valor_corte->setDescripcion($descripcion);
			ORM_valor_corte::actualizar_valor_corte($valor_corte);	
			$result = ORM_valor_corte::actualizar_combinaciones_analito($id_valor_corte, $analitosArray);
			if($result == 0){
				die ('3');		//ERROR DE UPDATE
			}
			die('1');
		}
	}
	elseif ($_POST['action'] == 'alta'){
		//HACE EL INSERT
		$result = ORM_valor_corte::agregar_valor_corte($descripcion);	
		if ($result == 0)
			die('4');
		foreach ($analitosArray as $id_an) 
			$result = ORM_valor_corte::combinar_valor_corte_analito($descripcion,$id_an);
		if($result == 0){
			die ('2');		//ERROR DE INSERCION DE ANALITOS
		}
		die('1');
	}

}
?>