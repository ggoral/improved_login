<?php

require_once "conexion.php";
require_once "encuesta.php";

class ORM_encuesta{

public static function buscar_encuesta($id_encuesta)
  {
    $conexion = new Conexion();
    $query = $conexion->consulta("SELECT * FROM encuesta WHERE id_encuesta=?",array($id_encuesta));
    $row = $query[0];

    $encuesta = new encuesta();
    /*
    $encuesta->setId_encuesta($row['id_encuesta']);
    $encuesta->setfecha_inicio($row['fecha_inicio']);
    $encuesta->setfecha_cierre($row['fecha_cierre']);
    $encuesta->setid_resultado($row['id_resultado']);
    $encuesta->setId_rol($row['id_rol']);
    */
    // implementacion del metodo init
    $encuesta->init($row['id_encuesta'],$row['fecha_inicio'],$row['fecha_cierre'],$row['id_resultado']);
    return $encuesta;
  }

public static function buscar_encuesta_fechas($fecha_inicio, $fecha_cierre)
  {
    $conexion = new Conexion();
    $query = $conexion->consulta_fetch("SELECT id_encuesta FROM encuesta WHERE fecha_inicio=? and fecha_cierre=?",array($fecha_inicio,$fecha_cierre));
    $id_encuesta = $query['id_encuesta'];
    return (int)$id_encuesta;
  }

public static function obtener_todos_encuesta()
  {
    $conexion = new Conexion();
    $query = $conexion->consulta("SELECT * FROM encuesta");
    return $query;
  }
/*
public static function agregar_encuesta($encuesta)
  {
    $conexion = new Conexion();
    $sql_insert = "INSERT INTO encuesta (fecha_inicio, fecha_cierre, id_resultado, id_rol, activo) VALUES (?,?,?,?)";
    $campos = array($encuesta->getfecha_inicio(), $encuesta->getfecha_cierre(), $encuesta->getid_resultado(), $encuesta->getId_rol(), $encuesta->getActivo());
    $query = $conexion->consulta_row($sql_insert,$campos);
    return $query;
  }
*/
public static function agregar_encuesta_campos($fecha_inicio, $fecha_cierre, $id_resultado)
  {
    $conexion = new Conexion();
    $sql_insert = "INSERT INTO encuesta (fecha_inicio, fecha_cierre, id_resultado) VALUES (?,?,?)";
    $campos = array($fecha_inicio, $fecha_cierre, $id_resultado);
    $query = $conexion->consulta_row($sql_insert,$campos);
    return $query;
  }

public static function eliminar_encuesta($id_encuesta)
  {
    $conexion = new Conexion();
    $sql_delete = "delete from encuesta where id_encuesta=?";
    $campos = array($id_encuesta);
    $query = $conexion->consulta_row($sql_delete,$campos);
    return $query;
  }


public static function actualizar_encuesta($encuesta)
  {
    $conexion = new Conexion();
    $sql_update = "UPDATE encuesta SET fecha_inicio=?,fecha_cierre=?,id_resultado=? WHERE id_encuesta=?";
    $campos = array($encuesta->getfecha_inicio(), $encuesta->getfecha_cierre(), $encuesta->getId_resultado(), $encuesta->getId_encuesta());
    $query = $conexion->consulta_row($sql_update,$campos);
    return $query;
  }
  
private static function buscar_por_fechaInicio($fecha_inicio)
  {
    $conexion = new Conexion();
    $query = $conexion->consulta_fetch("SELECT id_encuesta FROM encuesta WHERE fecha_inicio=?",array($fecha_inicio));
    $id_encuesta = $query['id_encuesta'];
    return (int)$id_encuesta;
  }

  private static function buscar_por_resultado($id_resultado)
  {
    $conexion = new Conexion();
    $query = $conexion->consulta_fetch("SELECT id_encuesta FROM encuesta WHERE id_resultado=?",array($id_resultado));
    $id_encuesta = $query['id_encuesta'];
    return (int)$id_encuesta;
  }
	
public static function agregar_encuesta($fecha_inicio, $fecha_cierre, $id_resultado)
  {
		$existe = ORM_encuesta::buscar_encuesta_fechas($fecha_inicio, $fecha_cierre);
    if (!$existe){
      $row_affected = ORM_encuesta::agregar_encuesta_campos($fecha_inicio, $fecha_cierre, $id_resultado);
  	  return $row_affected;
	  }
		return 0;
  }

  


}
?>
