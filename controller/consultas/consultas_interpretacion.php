<?php
//REALIZA LAS ALTAS Y MODIFICACIONES
$tipo_usuario = array('Adm','FBA','Lab');

require_once '../validarSesion.php';
require_once '../../model/interpretacion_interface.php';
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
		if ((!isset($_POST['id_interpretacion']))or(!test_input($_POST['id_interpretacion']))){
			die ('5');	//DATOS INVALIDOS
		}
		else{
			$id_interpretacion = $_POST['id_interpretacion'];
			//HACE EL UPDATE
			$interpretacion = new Interpretacion ();
			$interpretacion->setId_interpretacion($id_interpretacion);
			$interpretacion->setDescripcion($descripcion);
			ORM_interpretacion::actualizar_interpretacion($interpretacion);	
			$result = ORM_interpretacion::actualizar_combinaciones_analito($id_interpretacion, $analitosArray);
			if($result == 0){
				die ('3');		//ERROR DE UPDATE
			}
			die('1');
		}
	}
	elseif ($_POST['action'] == 'alta'){
		//HACE EL INSERT
		$result = ORM_interpretacion::agregar_interpretacion($descripcion);	
		if ($result == 0)
			die('4');
		foreach ($analitosArray as $id_an) 
			$result = ORM_interpretacion::combinar_interpretacion_analito($descripcion,$id_an);
		if($result == 0){
			die ('2');		//ERROR DE INSERCION DE ANALITOS
		}
		die('1');
	}

}
?>