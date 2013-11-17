<?php
//REALIZA LAS ALTAS Y MODIFICACIONES

require_once '../../model/laboratorio_interface.php';
require_once '../../model/test_input.php';

if (isset($_POST['action'])){
	//RECOBRAR LOS DATOS POR EL POST
	if ((!isset($_POST['cod_lab']))or(!test_input($_POST['cod_lab']))
		or (!isset($_POST['institucion']))or(!test_input($_POST['institucion']))
		or (!isset($_POST['sector']))or(!test_input($_POST['sector']))
		or (!isset($_POST['responsable']))or(!test_input($_POST['responsable']))
		or (!isset($_POST['domicilio']))or(!test_input($_POST['domicilio']))
		or (!isset($_POST['domicilio_corresp']))or(!test_input($_POST['domicilio_corresp']))
		or (!isset($_POST['tipo_lab']))or(!test_input($_POST['tipo_lab']))
		or (!isset($_POST['ciudad']))or(!test_input($_POST['ciudad']))){
			die ('5'); //NO PASA VALIDACION DEL LADO DEL SERVIDOR DATOS INVALIDOS
	}
	if (isset($_POST['tel']))
		if (!is_numeric($_POST['tel']))
			die('5');
	if ((isset($_POST['coord_x']))and(!test_input($_POST['ciudad'])))
		if (!is_numeric($_POST['coord_x']))
			die('5');	
	if ((isset($_POST['coord_y']))and(!test_input($_POST['ciudad'])))
		if (!is_numeric($_POST['coord_y']))
			die('5');
			
	$cod_lab = $_POST['cod_lab'];
	$institucion = $_POST['institucion'];	
	$sector = $_POST['sector'];	
	$responsable = $_POST['responsable'];	
	$domicilio = $_POST['domicilio'];	
	$domicilio_corresp = $_POST['domicilio_corresp'];	
	$mail = $_POST['email'];		
	$tel = $_POST['tel'];	
	$coord_x = $_POST['coord_x'];	
	$coord_y = $_POST['coord_y'];	
	$tipo_lab = $_POST['tipo_lab'];	
	$id_ciudad = $_POST['ciudad'];	
	if ($_POST['estado'] == 'true'){
		$estado = 1;	
	}
	else{
		$estado = 0;	
	}
	
	if ($_POST['action'] == 'editar'){
		if ((!isset($_POST['id_laboratorio']))or(!test_input($_POST['id_laboratorio']))){
			die ('5');	//DATOS INVALIDOS
		}
		else{		
			$id_lab = $_POST['id_laboratorio'];
			//HACE EL UPDATE
			$laboratorio = new Laboratorio ();
			$laboratorio->setId_lab($id_lab);
			$laboratorio->setCod_lab($cod_lab);
			$laboratorio->setInstitucion($institucion);
			$laboratorio->setSector($sector);
			$laboratorio->setResponsable($responsable);
			$laboratorio->setDomicilio($domicilio);
			$laboratorio->setDomicilio_corresp($domicilio_corresp);
			$laboratorio->setMail($mail);
			$laboratorio->setTel($tel);
			$laboratorio->setcoord_x($coord_x);
			$laboratorio->setcoord_y($coord_y);
			$laboratorio->setEstado($estado);
			$laboratorio->setId_tipo($tipo_lab);
			$laboratorio->setId_ciudad($id_ciudad);
 			$result = ORM_laboratorio::actualizar_laboratorio($laboratorio);
			if($result == 0){
				die ('3');		//ERROR DE UPDATE
			}
			die('1');
		}
	}
	elseif ($_POST['action'] == 'alta'){
		//HACE EL INSERT
		$result = ORM_laboratorio::agregar_laboratorio($cod_lab, $institucion, $sector, $responsable, $domicilio, $domicilio_corresp, $mail, $tel, $coord_x, $coord_y, $estado, $tipo_lab, $id_ciudad);
		if ($result == 0)
			die('4');
		die('1');
	}

}
?>