<?php

require_once "conexion.php";
require_once "analito.php";

class ORM_analito{

public static function buscar_analito($id_analito)
  {
    $conexion = new Conexion();
    $query = $conexion->consulta("SELECT * FROM analito WHERE id_analito=?",array($id_analito));
    $row = $query[0];

    $analito = new Analito();
    // implementacion del metodo init
    $analito->init($row['id_analito'],$row['descripcion']);
    return $analito;
  }

public static function obtener_todos_analito()
  {
    $conexion = new Conexion();
    $query = $conexion->consulta("SELECT * FROM analito");
    return $query;
  }

public static function agregar_analito($descripcion)
  {
    $conexion = new Conexion();
    $existe = ORM_analito::buscar_por_clave($descripcion);
    if (!$existe){
      $sql_insert = "INSERT INTO analito (descripcion) VALUES (?)";
      $campos = array($descripcion);
      $query = $conexion->consulta_row($sql_insert,$campos);
      return $query;
      }
    return 0;
  }

  public static function buscar_por_clave($descripcion)
  {
    $conexion = new Conexion();
    $query = $conexion->consulta_fetch("SELECT id_analito FROM analito WHERE descripcion=?",array($descripcion));
    $id_descripcion = $query['id_analito'];
    return (int)$id_descripcion;
  }
  
/*
public static function eliminar_analito($id_analito)
  {
    $conexion = new Conexion();
    $conexion->crear_conexion();
    $sql_delete = "DELETE FROM analito WHERE id_analito=?";
    $campos = array($id_analito);
    $query = $conexion->consulta_row($sql_delete,$campos);
    $conexion->cerrar_conexion();
    return $query;
  }
*/
public static function actualizar_analito($analito)
  {
    $conexion = new Conexion();
    $sql_update = "UPDATE analito SET descripcion=? WHERE id_analito=?";

    $campos = array($analito->getDescripcion(), 
                    $analito->getId_analito());
    $query = $conexion->consulta_row($sql_update,$campos);
    return $query;
  }

  public static function buscar_analito_Twig($id_analito)
  {
    $conexion = new Conexion();
    $analito = $conexion->consulta_fetch("SELECT * FROM analito WHERE id_analito=?",array($id_analito));
    return $analito;
  }

  public static function obtener_analito_laboratorio()
  {
    $conexion = new Conexion();
    $analito = $conexion->consulta_fetch("SELECT DISTINCT analito.`descripcion` , laboratorio.cod_lab FROM laboratorio INNER JOIN inscripcion ON (laboratorio.id_lab=inscripcion.laboratorio_id_lab) 
     INNER JOIN analito ON analito.`id_analito` = inscripcion.`id_analito`
            WHERE laboratorio.id_lab IN 
            (SELECT aux.laboratorio_id_lab FROM (SELECT inscripcion.laboratorio_id_lab, COUNT(inscripcion.id_analito) AS cantidad FROM inscripcion 
            GROUP BY inscripcion.laboratorio_id_lab,id_analito HAVING cantidad>1) AS aux)");
    return $analito;
  }

}
?>
