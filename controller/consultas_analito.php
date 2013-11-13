<?php
//REALIZA LAS ALTAS Y MODIFICACIONES
require_once '../model/analito_interface.php';

if (isset$_POST['action']){
	$descripcion = POST['descripcion'];
	$id_analito = POST['id_analito'];

	if ($_POST['action'] == 'editar'){
		//HACE EL UPDATE
		$analito = new Analito ();
		
		ORM_analito::actualizar_analito($analito);
	}
	elseif ($_POST['action'] == 'alta'){
		//HACE EL INSERT
		ORM_analito::agregar_analito($id_analito);
	}

	}
?>