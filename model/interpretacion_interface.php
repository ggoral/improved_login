<?php

require_once "conexion.php";
require_once "interpretacion.php";

class ORM_interpretacion{

public static function buscar_interpretacion($id_interpretacion)
  {
    $conexion = new Conexion();
    $query = $conexion->consulta("SELECT * FROM interpretacion WHERE id_interpretacion=?",array($id_interpretacion));
    $row = $query[0];

    $interpretacion = new Interpretacion();
    // implementacion del interpretacion init
    $interpretacion->init($row['id_interpretacion'],$row['descripcion']);
    return $interpretacion;
  }

public static function obtener_todos_interpretacion()
  {
    $conexion = new Conexion();
    $query = $conexion->consulta("SELECT * FROM interpretacion");
    return $query;
  }

public static function agregar_interpretacion($descripcion)
  {
    $conexion = new Conexion();
    $existe = ORM_interpretacion::buscar_por_clave($descripcion);
    if (!$existe){
      $sql_insert = "INSERT INTO interpretacion (descripcion) VALUES (?)";
      $query = $conexion->consulta_row($sql_insert, array($descripcion));
      return $query;
      }
    return 0;
  }

public static function buscar_por_clave($descripcion)
  {
    $conexion = new Conexion();
    $query = $conexion->consulta_fetch("SELECT id_interpretacion FROM interpretacion WHERE descripcion=?",array($descripcion));
    $id_descripcion = $query['id_interpretacion'];
    return (int)$id_descripcion;
  }
/*
public static function eliminar_interpretacion($id_interpretacion)
 //NOTA: SI SE QUIERE BORRAR UNA INTERPRETACION DEBE BORRARSE TODAS LAS RELACIONES PREVIAS PARA ELIMINARLO
  {
    $conexion = new Conexion();
    $sql_delete = "DELETE FROM interpretacion WHERE id_interpretacion=?";
    $campos = array($id_interpretacion);
    $query = $conexion->consulta_row($sql_delete,$campos);
    return $query;
  }
*/
public static function actualizar_interpretacion($interpretacion)
  {
    $conexion = new Conexion();
    $sql_update = "UPDATE interpretacion SET descripcion=? WHERE id_interpretacion=?";

    $campos = array($interpretacion->getDescripcion(), 
                    $interpretacion->getId_interpretacion());
    $query = $conexion->consulta_row($sql_update,$campos);
    return $query;
  }

  public static function combinar_interpretacion_analito($descripcion, $id_analito)
  {   //SE LE PASA ESOS PARAMETROS PORQUE AL MOMENTO DEL ALTA SE PUEDE CONOCER EL ID ANALITO PERO NO EL ID DE LA interpretacion YA QUE NO SE SABE SI EXISTIA O NO PREVIAMENTE DESDE EL CONTROLLER
    $conexion = new Conexion();
    $id_interpretacion = ORM_interpretacion::buscar_por_clave($descripcion);  //EN ESTE MOMENTO YA EXISTE SI O SI PORQUE PREVIO SE INSERTO
    $sql_insert = "INSERT INTO analito_interpretacion (id_interpretacion,id_analito) VALUES (?,?)";
    $campos = array($id_interpretacion,$id_analito);
    $query = $conexion->consulta_row($sql_insert,$campos);
    return $query;
  }

   public static function buscar_interpretacion_Twig($id_interpretacion)
  {
    $conexion = new Conexion();
    $interpretacion = $conexion->consulta_fetch("SELECT * FROM interpretacion WHERE id_interpretacion=?",array($id_interpretacion));
    return $interpretacion;
  }

    public static function buscar_analito_interpretacion_Twig($id_interpretacion)
  {
    $conexion = new Conexion();
    $interpretacion = $conexion->consulta("SELECT *, IF(analito.id_analito IN (SELECT id_analito FROM analito_interpretacion WHERE id_interpretacion = ?), 'selected', '') AS activo FROM analito",array($id_interpretacion));
    return $interpretacion;
  }
  
  public static function actualizar_combinaciones_analito ($id_interpretacion, $id_analitos)	//RECIBE UN ARREGLO DE ANALITOS 
  {
	$conexion = new Conexion();
	$sql_delete = "DELETE FROM analito_interpretacion WHERE id_interpretacion = ?";
	$campos = array($id_interpretacion);
	$query = $conexion->consulta_row($sql_delete,$campos);
	if ($query == 0){
		return 0;
	}
	
	else{
		$interpretacion = ORM_interpretacion::buscar_interpretacion($id_interpretacion);
		$descripcion = $interpretacion->getDescripcion();
		foreach ($id_analitos as $id_an){ 
			$result = ORM_interpretacion::combinar_interpretacion_analito($descripcion,$id_an);
			if ($query == 0){
				return 0;
			}
		}
	}
	return 1;
  }

}
?>
