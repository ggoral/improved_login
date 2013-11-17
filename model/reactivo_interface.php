<?php

require_once "conexion.php";
require_once "reactivo.php";

class ORM_reactivo{

public static function buscar_reactivo($id_reactivo)
  {
    $conexion = new Conexion();
    $query = $conexion->consulta("SELECT * FROM reactivo WHERE id_reactivo=?",array($id_reactivo));
    $row = $query[0];

    $reactivo = new Reactivo();
    // implementacion del reactivo init
    $reactivo->init($row['id_reactivo'],$row['descripcion']);
    return $reactivo;
  }

public static function obtener_todos_reactivo()
  {
    $conexion = new Conexion();
    $query = $conexion->consulta("SELECT * FROM reactivo");
    return $query;
  }

public static function agregar_reactivo($descripcion)
  {
    $conexion = new Conexion();
    $existe = ORM_reactivo::buscar_por_clave($descripcion);
    if (!$existe){
      $sql_insert = "INSERT INTO reactivo (descripcion) VALUES (?)";
      $query = $conexion->consulta_row($sql_insert,array($descripcion));
      return $query;
      }
    return 0;
  }

public static function buscar_por_clave($descripcion)
  {
    $conexion = new Conexion();
    $query = $conexion->consulta_fetch("SELECT id_reactivo FROM reactivo WHERE descripcion=?",array($descripcion));
    $id_descripcion = $query['id_reactivo'];
    return (int)$id_descripcion;
  }
/*
public static function eliminar_reactivo($id_reactivo)		

//NOTA: SI SE QUIERE BORRAR UN REACTIVO DEBE BORRARSE TODAS LAS RELACIONES PREVIAS PARA ELIMINARLO
  {
    $conexion = new Conexion();
    $sql_delete = "DELETE FROM reactivo WHERE id_reactivo=?";
    $campos = array($id_reactivo);
    $query = $conexion->consulta_row($sql_delete,$campos);
    return $query;
  }
*/
public static function actualizar_reactivo($reactivo)
  {
    $conexion = new Conexion();
    $sql_update = "UPDATE reactivo SET descripcion=? WHERE id_reactivo=?";

    $campos = array($reactivo->getDescripcion(), 
                    $reactivo->getId_reactivo());
    $query = $conexion->consulta_row($sql_update,$campos);
    return $query;
  }

  public static function combinar_reactivo_analito($descripcion, $id_analito)
  {   //SE LE PASA ESOS PARAMETROS PORQUE AL MOMENTO DEL ALTA SE PUEDE CONOCER EL ID ANALITO PERO NO EL ID DE LA reactivo YA QUE NO SE SABE SI EXISTIA O NO PREVIAMENTE DESDE EL CONTROLLER
    $conexion = new Conexion();
    $id_reactivo = ORM_reactivo::buscar_por_clave($descripcion);  //EN ESTE MOMENTO YA EXISTE SI O SI PORQUE PREVIO SE INSERTO
    $sql_insert = "INSERT INTO analito_reactivo (id_reactivo,id_analito) VALUES (?,?)";
    $campos = array($id_reactivo,$id_analito);
    $query = $conexion->consulta_row($sql_insert,$campos);
    return $query;
  }
	
 public static function buscar_reactivo_Twig($id_reactivo)
  {
    $conexion = new Conexion();
    $reactivo = $conexion->consulta_fetch("SELECT * FROM reactivo WHERE id_reactivo=?",array($id_reactivo));
    return $reactivo;
  }

    public static function buscar_analito_reactivo_Twig($id_reactivo)
  {
    $conexion = new Conexion();
    $reactivo = $conexion->consulta("SELECT *, IF(analito.id_analito IN (SELECT id_analito FROM analito_reactivo WHERE id_reactivo = ?), 'selected', '') AS activo FROM analito",array($id_reactivo));
    return $reactivo;
  }
  
  public static function actualizar_combinaciones_analito ($id_reactivo, $id_analitos)	//RECIBE UN ARREGLO DE ANALITOS 
  {
	$conexion = new Conexion();
	$sql_delete = "DELETE FROM analito_reactivo WHERE id_reactivo = ?";
	$campos = array($id_reactivo);
	$query = $conexion->consulta_row($sql_delete,$campos);
	if ($query == 0){
		return 0;
	}
	
	else{
		$reactivo = ORM_reactivo::buscar_reactivo($id_reactivo);
		$descripcion = $reactivo->getDescripcion();
		foreach ($id_analitos as $id_an){ 
			$result = ORM_reactivo::combinar_reactivo_analito($descripcion,$id_an);
			if ($query == 0){
				return 0;
			}
		}
	}
	return 1;
  }	
  
    public static function obtener_todos_reactivo_analito($id_analito)
  {
    $conexion = new Conexion();
    $query = $conexion->consulta("SELECT * FROM reactivo INNER JOIN analito_reactivo ON (analito_reactivo.id_reactivo= reactivo.id_reactivo) WHERE id_analito = ?",array($id_analito));
    return $query;
  }

  
}
?>
