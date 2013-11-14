<?php 
	require_once '../model/analito_interface.php';

	if(isset($_POST['descripcion'])){
		if ($_POST['descripcion'] != ""){
			$username = $_POST['descripcion'];

			ORM_usuario::agregar_usuario($_POST['username'],$_POST['password'],$_POST['descripcion'],1,1);
		}
	}

 ?>