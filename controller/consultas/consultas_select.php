<?php


require_once '../../model/metodo_interface.php';
require_once '../../model/reactivo_interface.php';
require_once '../../model/calibrador_interface.php';
require_once '../../model/papel_filtro_interface.php';
require_once '../../model/valor_corte_interface.php';



$metodo = ORM_metodo::obtener_todos_metodo_analito($_POST['analito']);
$reactivo = ORM_reactivo::obtener_todos_reactivo_analito($_POST['analito']);
$calibrador = ORM_calibrador::obtener_todos_calibrador_analito($_POST['analito']);
$papel_filtro = ORM_papel_filtro::obtener_todos_papel_filtro_analito($_POST['analito']);
$valor_corte = ORM_valor_corte::obtener_todos_valor_corte_analito($_POST['analito']);


$html ='
		<span>
		<label> Método:</label>
		<select name="metodo" id="metodo" size="1" required>';
			foreach ($metodo as $data)	
				$html.= '<option value="'.$data['id_metodo'].'" > '.$data['descripcion'].' </option>';
		$html.= '</select>
		</span><br>
		<span>
		<label> Reactivo:</label>
		<select name="reactivo" id="reactivo" size="1" required>';
			foreach ($reactivo as $data)	
				$html.= '<option value="'.$data['id_reactivo'].'" > '.$data['descripcion'].' </option>';
		$html.= '</select>
		</span><br>
		<span>
		<label> Calibrador:</label>
		<select name="calibrador" id="calibrador" size="1" required>';
			foreach ($calibrador as $data)	
				$html.= '<option value="'.$data['id_calibrador'].'" > '.$data['descripcion'].' </option>';
		$html.= '</select>
		</span><br>
		<label> Papel de Filtro:</label>
		<span>
		<select name="papel_filtro" id="papel_filtro" size="1" required>';
			foreach ($papel_filtro as $data)	
				$html.= '<option value="'.$data['id_papel_filtro'].'" > '.$data['descripcion'].' </option>';
		$html.= '</select>
		</span><br>
		<span>
		<label> Valor de Corte:</label>
		<select name="valor_corte" id="valor_corte" size="1" required>';
			foreach ($valor_corte as $data)	
				$html.= '<option value="'.$data['id_valor'].'" > '.$data['descripcion'].' </option>';
		$html.= '</select>
		</span><br>';
		
		die ($html);
?>