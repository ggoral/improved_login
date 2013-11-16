<?php

require_once "conexion.php";
require_once "decision.php";

class ORM_decision{

public static function buscar_decision($id_decision)
  {
    $conexion = new Conexion();
    $query = $conexion->consulta("SELECT * FROM decision WHERE id_decision=?",array($id_decision));
    $row = $query[0];

    $decision = new Decision();
    // implementacion del decision init
    $decision->init($row['id_decision'],$row['descripcion']);
    return $decision;
  }

public static function obtener_todos_decision()
  {
    $conexion = new Conexion();
    $query = $conexion->consulta("SELECT * FROM decision");
    return $query;
  }

public static function agregar_decision($descripcion)
  {
    $conexion = new Conexion();
  	$existe = ORM_decision::buscar_por_clave($descripcion);
  	if (!$existe){
  		$sql_insert = "INSERT INTO decision (descripcion) VALUES (?)";
  		$campos = array($descripcion);
  		$query = $conexion->consulta_row($sql_insert,$campos);
  		return $query;
  	  }
  	return 0;
  }
  
public static function combinar_decision_analito($descripcion, $id_analito)
  {		//SE LE PASA ESOS PARAMETROS PORQUE AL MOMENTO DEL ALTA SE PUEDE CONOCER EL ID ANALITO PERO NO EL ID DE LA DECISION YA QUE NO SE SABE SI EXISTIA O NO PREVIAMENTE DESDE EL CONTROLLER
	$conexion = new Conexion();
	$id_decision = ORM_decision::buscar_por_clave($descripcion);	//EN ESTE MOMENTO YA EXISTE SI O SI PORQUE PREVIO SE INSERTO
	$sql_insert = "INSERT INTO analito_decision (id_decision,id_analito) VALUES (?,?)";
	$campos = array($id_decision,$id_analito);
	$query = $conexion->consulta_row($sql_insert,$campos);
	return $query;
  }
/*
public static function eliminar_decision($id_decision)
 //NOTA: SI SE QUIERE BORRAR UNA DECISION DEBE BORRARSE TODAS LAS RELACIONES PREVIAS PARA ELIMINARLO
  {
    $conexion = new Conexion();
    $sql_delete = "DELETE FROM decision WHERE id_decision=?";
    $campos = array($id_decision);
    $query = $conexion->consulta_row($sql_delete,$campos);
    return $query;
  }
*/
public static function actualizar_decision($decision)
  {
    $conexion = new Conexion();
    $sql_update = "UPDATE decision SET descripcion=? WHERE id_decision=?";

    $campos = array($decision->getDescripcion(), 
                    $decision->getId_decision());
    $query = $conexion->consulta_row($sql_update,$campos);
    return $query;
  }

public static function buscar_por_clave($descripcion)
  {
    $conexion = new Conexion();
    $query = $conexion->consulta_fetch("SELECT id_decision FROM decision WHERE descripcion=?",array($descripcion));
    $id_descripcion = $query['id_decision'];
    return (int)$id_descripcion;
  }
  
   public static function buscar_decision_Twig($id_decision)
  {
    $conexion = new Conexion();
    $decision = $conexion->consulta_fetch("SELECT * FROM decision WHERE id_decision=?",array($id_decision));
    return $decision;
  }

    public static function buscar_analito_decision_Twig($id_decision)
  {
    $conexion = new Conexion();
    $decision = $conexion->consulta("SELECT *, IF(analito.id_analito IN (SELECT id_analito FROM analito_decision WHERE id_decision = ?), 'selected', '') AS activo FROM analito",array($id_decision));
    return $decision;
  }
  
  public static function actualizar_combinaciones_analito ($id_decision, $id_analitos)	//RECIBE UN ARREGLO DE ANALITOS 
  {
	$conexion = new Conexion();
	$sql_delete = "DELETE FROM analito_decision WHERE id_decision = ?";
	$campos = array($id_decision);
	$query = $conexion->consulta_row($sql_delete,$campos);
	if ($query == 0){
		return 0;
	}
	
	else{
		$decision = ORM_decision::buscar_decision($id_decision);
		$descripcion = $decision->getDescripcion();
		foreach ($id_analitos as $id_an){ 
			$result = ORM_decision::combinar_decision_analito($descripcion,$id_an);
			if ($query == 0){
				return 0;
			}
		}
	}
	return 1;
  }
}
?>
