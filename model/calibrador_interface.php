<?php

require_once "conexion.php";
require_once "calibrador.php";

class ORM_calibrador{

public static function buscar_calibrador($id_calibrador)
  {
    $conexion = new Conexion();
    $query = $conexion->consulta("SELECT * FROM calibrador WHERE id_calibrador=?",array($id_calibrador));
    $row = $query[0];

    $calibrador = new Calibrador();
    // implementacion del metodo init
    $calibrador->init($row['id_calibrador'],$row['descripcion']);
    return $calibrador;
  }

public static function obtener_todos_calibrador()
  {
    $conexion = new Conexion();
    $query = $conexion->consulta("SELECT * FROM calibrador");
    return $query;
  }

public static function agregar_calibrador($descripcion)
  {
    $conexion = new Conexion();
    $existe = ORM_calibrador::buscar_por_clave($descripcion);
    if (!$existe){
      $sql_insert = "INSERT INTO calibrador (descripcion) VALUES (?)";
      $campos = array($descripcion);
      $query = $conexion->consulta_row($sql_insert,$campos);
      return $query;
    }
    return 0;
  }

  public static function buscar_por_clave($descripcion)
  {
    $conexion = new Conexion();
    $query = $conexion->consulta_fetch("SELECT id_calibrador FROM calibrador WHERE descripcion=?",array($descripcion));
    $id_calibrador = $query['id_calibrador'];
    return (int)$id_calibrador;
  }
/*
public static function eliminar_calibrador($id_calibrador)
 //NOTA: SI SE QUIERE BORRAR UN CALIBRADOR DEBE BORRARSE TODAS LAS RELACIONES PREVIAS PARA ELIMINARLO
 
  {
    $conexion = new Conexion();
    $sql_delete = "DELETE FROM calibrador WHERE id_calibrador=?";
    $campos = array($id_calibrador);
    $query = $conexion->consulta_row($sql_delete,$campos);
    return $query;
  }
*/
public static function actualizar_calibrador($calibrador)
  {
    $conexion = new Conexion();
    $sql_update = "UPDATE calibrador SET descripcion=? WHERE id_calibrador=?";

    $campos = array($calibrador->getDescripcion(), 
                    $calibrador->getId_calibrador());
    $query = $conexion->consulta_row($sql_update,$campos);
    return $query;
  }

  public static function combinar_calibrador_analito($descripcion, $id_analito)
  {   //SE LE PASA ESOS PARAMETROS PORQUE AL MOMENTO DEL ALTA SE PUEDE CONOCER EL ID ANALITO PERO NO EL ID DE LA calibrador YA QUE NO SE SABE SI EXISTIA O NO PREVIAMENTE DESDE EL CONTROLLER
  $conexion = new Conexion();
  $id_calibrador = ORM_calibrador::buscar_por_clave($descripcion);  //EN ESTE MOMENTO YA EXISTE SI O SI PORQUE PREVIO SE INSERTO
  $sql_insert = "INSERT INTO analito_calibrador (id_calibrador,id_analito) VALUES (?,?)";
  $campos = array($id_calibrador,$id_analito);
  $query = $conexion->consulta_row($sql_insert,$campos);
  return $query;
  }

  public static function buscar_calibrador_Twig($id_calibrador)
  {
    $conexion = new Conexion();
    $calibrador = $conexion->consulta_fetch("SELECT * FROM calibrador WHERE id_calibrador=?",array($id_calibrador));
    return $calibrador;
  }

    public static function buscar_analito_calibrador_Twig($id_calibrador)
  {
    $conexion = new Conexion();
    $calibrador = $conexion->consulta("SELECT *, IF(analito.id_analito IN (SELECT id_analito FROM analito_calibrador WHERE id_calibrador = ?), 'selected', '') AS activo FROM analito",array($id_calibrador));
    return $calibrador;
  }
  
  public static function actualizar_combinaciones_analito ($id_calibrador, $id_analitos)	//RECIBE UN ARREGLO DE ANALITOS 
  {
	$conexion = new Conexion();
	$sql_delete = "DELETE FROM analito_calibrador WHERE id_calibrador = ?";
	$campos = array($id_calibrador);
	$query = $conexion->consulta_row($sql_delete,$campos);
	if ($query == 0){
		return 0;
	}
	
	else{
		$calibrador = ORM_calibrador::buscar_calibrador($id_calibrador);
		$descripcion = $calibrador->getDescripcion();
		foreach ($id_analitos as $id_an){ 
			$result = ORM_calibrador::combinar_calibrador_analito($descripcion,$id_an);
			if ($query == 0){
				return 0;
			}
		}
	}
	return 1;
  }
  
  public static function obtener_todos_calibrador_analito($id_analito)
  {
    $conexion = new Conexion();
    $query = $conexion->consulta("SELECT * FROM calibrador INNER JOIN analito_calibrador ON (analito_calibrador.id_calibrador= calibrador.id_calibrador) WHERE id_analito = ?",array($id_analito));
    return $query;
  }

}
?>
