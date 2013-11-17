<?php

require_once "conexion.php";
require_once "metodo.php";

class ORM_metodo{

public static function buscar_metodo($id_metodo)
  {
    $conexion = new Conexion();
    $query = $conexion->consulta("SELECT * FROM metodo WHERE id_metodo=?",array($id_metodo));
    $row = $query[0];

    $metodo = new Metodo();
    // implementacion del metodo init
    $metodo->init($row['id_metodo'],$row['descripcion']);
    return $metodo;
  }

public static function obtener_todos_metodo()
  {
    $conexion = new Conexion();
    $query = $conexion->consulta("SELECT * FROM metodo");
    return $query;
  }

public static function agregar_metodo($descripcion)
  {
    $conexion = new Conexion();
    $existe = ORM_metodo::buscar_por_clave($descripcion);
    if (!$existe){
      $sql_insert = "INSERT INTO metodo (descripcion) VALUES (?)";
      $campos = array($descripcion);
      $query = $conexion->consulta_row($sql_insert,$campos);
      return $query;
    }
    return 0;
  }

public static function buscar_por_clave($descripcion)
  {
    $conexion = new Conexion();
    $query = $conexion->consulta_fetch("SELECT id_metodo FROM metodo WHERE descripcion=?",array($descripcion));
    $id_descripcion = $query['id_metodo'];
    return (int)$id_descripcion;
  }
/*
public static function eliminar_metodo($id_metodo)		

//NOTA: SI SE QUIERE BORRAR UN METODO DEBE BORRARSE TODAS LAS RELACIONES PREVIAS PARA ELIMINARLO
  {
    $conexion = new Conexion();
    $sql_delete = "DELETE FROM metodo WHERE id_metodo=?";
    $campos = array($id_metodo);
    $query = $conexion->consulta_row($sql_delete,$campos);
    return $query;
  }
*/
public static function actualizar_metodo($metodo)
  {
    $conexion = new Conexion();
    $sql_update = "UPDATE metodo SET descripcion=? WHERE id_metodo=?";

    $campos = array($metodo->getDescripcion(), 
                    $metodo->getId_metodo());
    $query = $conexion->consulta_row($sql_update,$campos);
    return $query;
  }

public static function combinar_metodo_analito($descripcion, $id_analito)
  {   //SE LE PASA ESOS PARAMETROS PORQUE AL MOMENTO DEL ALTA SE PUEDE CONOCER EL ID ANALITO PERO NO EL ID DE LA metodo YA QUE NO SE SABE SI EXISTIA O NO PREVIAMENTE DESDE EL CONTROLLER
    $conexion = new Conexion();
    $id_metodo = ORM_metodo::buscar_por_clave($descripcion);  //EN ESTE MOMENTO YA EXISTE SI O SI PORQUE PREVIO SE INSERTO
    $sql_insert = "INSERT INTO analito_metodo (id_analito,id_metodo) VALUES (?,?)";
    $campos = array($id_analito,$id_metodo);
    $query = $conexion->consulta_row($sql_insert,$campos);
    return $query;
  }
  
   public static function buscar_metodo_Twig($id_metodo)
  {
    $conexion = new Conexion();
    $metodo = $conexion->consulta_fetch("SELECT * FROM metodo WHERE id_metodo=?",array($id_metodo));
    return $metodo;
  }

    public static function buscar_analito_metodo_Twig($id_metodo)
  {
    $conexion = new Conexion();
    $metodo = $conexion->consulta("SELECT *, IF(analito.id_analito IN (SELECT id_analito FROM analito_metodo WHERE id_metodo = ?), 'selected', '') AS activo FROM analito",array($id_metodo));
    return $metodo;
  }
  
  public static function actualizar_combinaciones_analito ($id_metodo, $id_analitos)	//RECIBE UN ARREGLO DE ANALITOS 
  {
	$conexion = new Conexion();
	$sql_delete = "DELETE FROM analito_metodo WHERE id_metodo = ?";
	$campos = array($id_metodo);
	$query = $conexion->consulta_row($sql_delete,$campos);
	if ($query == 0){
		return 0;
	}
	
	else{
		$metodo = ORM_metodo::buscar_metodo($id_metodo);
		$descripcion = $metodo->getDescripcion();
		foreach ($id_analitos as $id_an){ 
			$result = ORM_metodo::combinar_metodo_analito($descripcion,$id_an);
			if ($query == 0){
				return 0;
			}
		}
	}
	return 1;
  }
  
    public static function obtener_todos_metodo_analito($id_analito)
  {
    $conexion = new Conexion();
    $query = $conexion->consulta("SELECT * FROM metodo INNER JOIN analito_metodo ON (analito_metodo.id_metodo= metodo.id_metodo) WHERE id_analito = ?",array($id_analito));
    return $query;
  }
}
?>
