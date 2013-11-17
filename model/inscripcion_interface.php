<?php

require_once "conexion.php";
require_once "inscripcion.php";

class ORM_inscripcion{

public static function buscar_inscripcion($id_inscripcion)
  {
    $conexion = new Conexion();
    $query = $conexion->consulta("SELECT * FROM inscripcion WHERE id_inscripcion=?",array($id_inscripcion));
    $row = $query[0];

    $inscripcion = new Inscripcion();
    /*
    $inscripcion->setId_inscripcion($row['id_inscripcion']);
    $inscripcion->setfecha_ingreso($row['fecha_ingreso']);
    $inscripcion->setlaboratorio_id_lab($row['laboratorio_id_lab']);
    $inscripcion->setfecha_baja($row['fecha_baja']);
    $inscripcion->setid_encuesta($row['id_encuesta']);
    $inscripcion->setid_encuesta($row['id_analito']);
    */
    // implementacion del metodo init
    $inscripcion->init($row['id_inscripcion'],$row['fecha_ingreso'],$row['laboratorio_id_lab'],$row['fecha_baja'],$row['id_encuesta'],$row['id_analito']);
    return $inscripcion;
  }

public static function buscar_inscripcion_ingresoLab($fecha_ingreso, $laboratorio_id_lab)
  {
    $conexion = new Conexion();
    $query = $conexion->consulta_fetch("SELECT id_inscripcion FROM inscripcion WHERE fecha_ingreso=? and laboratorio_id_lab=?",array($fecha_ingreso,$laboratorio_id_lab));
    $id_inscripcion = $query['id_inscripcion'];
    return (int)$id_inscripcion;
  }

public static function obtener_todos_inscripcion()
  {
    $conexion = new Conexion();
    $query = $conexion->consulta("SELECT * FROM inscripcion");
    return $query;
  }
/*
public static function agregar_inscripcion($inscripcion)
  {
    $conexion = new Conexion();
    $sql_insert = "INSERT INTO inscripcion (fecha_ingreso, laboratorio_id_lab, fecha_baja, id_encuesta, activo) VALUES (?,?,?,?)";
    $campos = array($inscripcion->getfecha_ingreso(), $inscripcion->getlaboratorio_id_lab(), $inscripcion->getfecha_baja(), $inscripcion->getid_encuesta(), $inscripcion->getActivo());
    $query = $conexion->consulta_row($sql_insert,$campos);
    return $query;
  }
*/
public static function agregar_inscripcion_campos($fecha_ingreso, $laboratorio_id_lab, $fecha_baja, $id_encuesta, $id_analito)
  {
    $conexion = new Conexion();
    $sql_insert = "INSERT INTO inscripcion (fecha_ingreso, laboratorio_id_lab, fecha_baja, id_encuesta, id_analito) VALUES (?,?,?,?,?)";
    $campos = array($fecha_ingreso, $laboratorio_id_lab, $fecha_baja, $id_encuesta, $id_analito);
    $query = $conexion->consulta_row($sql_insert,$campos);
    return $query;
  }
/*
public static function eliminar_inscripcion($id_inscripcion)
  {
    $conexion = new Conexion();
    $sql_delete = "delete from inscripcion where id_inscripcion=?";
    $campos = array($id_inscripcion);
    $query = $conexion->consulta_row($sql_delete,$campos);
    return $query;
  }

*/
public static function actualizar_inscripcion($inscripcion)
  {
    $conexion = new Conexion();
    $sql_update = "UPDATE inscripcion SET fecha_ingreso=?,laboratorio_id_lab=?,fecha_baja=?,id_encuesta=?,id_analito=? WHERE id_inscripcion=?";
    $campos = array($inscripcion->getFecha_ingreso(), $inscripcion->getLaboratorio_id_lab(), $inscripcion->getFecha_baja(), $inscripcion->getId_encuesta(), $inscripcion->getId_analito(), $inscripcion->getId_inscripcion());
    $query = $conexion->consulta_row($sql_update,$campos);
    return $query;
  }
  
public static function buscar_por_fechaIngreso($fecha_ingreso)
  {
    $conexion = new Conexion();
    $query = $conexion->consulta_fetch("SELECT id_inscripcion FROM inscripcion WHERE fecha_ingreso=?",array($fecha_ingreso));
    $id_inscripcion = $query['id_inscripcion'];
    return (int)$id_inscripcion;
  }

public static function buscar_por_fechaBaja($fecha_baja)
  {
    $conexion = new Conexion();
    $query = $conexion->consulta_fetch("SELECT id_inscripcion FROM inscripcion WHERE fecha_baja=?",array($fecha_baja));
    $id_inscripcion = $query['id_inscripcion'];
    return (int)$id_inscripcion;
  }
	
public static function agregar_inscripcion($fecha_ingreso, $laboratorio_id_lab, $fecha_baja, $id_encuesta, $id_analito)
  {
	$existe = ORM_inscripcion::buscar_inscripcion_fechas($fecha_ingreso, $laboratorio_id_lab, $id_encuesta);  
	if (!$existe){
      $row_affected = ORM_inscripcion::agregar_inscripcion_campos($fecha_ingreso, $laboratorio_id_lab, $fecha_baja, $id_encuesta, $id_analito);
  	  return $row_affected;
	}
	return 0;
  }
  
public static function buscar_inscripcion_fechas($fecha_ingreso, $laboratorio_id_lab, $id_encuesta)
  {
    $conexion = new Conexion();
    $query = $conexion->consulta_fetch("SELECT id_inscripcion FROM inscripcion WHERE fecha_ingreso = ? AND laboratorio_id_lab = ? AND id_encuesta = ?",array($fecha_ingreso,$laboratorio_id_lab, $id_encuesta));
    $id_inscripcion = $query['id_inscripcion'];
    return (int)$id_inscripcion;
  }
  
  public static function obtener_todos_inscripcion_lab($idlab)
  {
    $conexion = new Conexion();
    $query = $conexion->consulta("SELECT id_inscripcion, fecha_ingreso, fecha_baja, id_encuesta FROM inscripcion WHERE laboratorio_id_lab = ? AND (fecha_baja != '0000-00-00 00:00:00') ",array($idlab));
    return $query;
  }
  
     public static function buscar_inscripcion_Twig($id_inscripcion)
  {
    $conexion = new Conexion();
    $inscripcion = $conexion->consulta_fetch("SELECT * FROM inscripcion WHERE id_inscripcion=?",array($id_inscripcion));
    return $inscripcion;
  }
  
    public static function buscar_encuesta_inscripcion_Twig($id_inscripcion)
  {
    $conexion = new Conexion();
    $inscripcion = $conexion->consulta("SELECT *, IF(encuesta.id_encuesta IN (SELECT inscripcion.id_encuesta FROM inscripcion WHERE id_inscripcion = ?), 'selected', '') AS activo FROM encuesta",array($id_inscripcion));
    return $inscripcion;
  }
    
}
?>
