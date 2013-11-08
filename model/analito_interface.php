<?php

require_once "conexion.php";
require_once "analito.php";

class ORM_analito{

public static function buscar_analito($id_analito)
  {
    $conexion = new Conexion();
    $conexion->crear_conexion();
    $query = $conexion->consulta("SELECT * FROM analito WHERE id_analito=?",array($id_analito));
    $row = $query[0];
    $conexion->cerrar_conexion();

    $analito = new analito();
    // implementacion del metodo init
    $analito->init($row['id_analito'],$row['descripcion']);
    return $analito;
  }

public static function obtener_todos_analito()
  {
    $conexion = new Conexion();
    $conexion->crear_conexion();
    $query = $conexion->consulta("SELECT * FROM analito");
    $conexion->cerrar_conexion();
    return $query;
  }

public static function agregar_analito($descripcion)
  {
    $conexion = new Conexion();
    $conexion->crear_conexion();
    $sql_insert = "INSERT INTO analito (descripcion) VALUES (?)";
    $campos = array($descripcion);
    $query = $conexion->consulta_fetch($sql_insert,$campos);
    $cantidad = $conexion->cantidad($query);
    $conexion->cerrar_conexion();
    return $cantidad;
  }

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

public static function actualizar_analito($analito)
  {
    $conexion = new Conexion();
    $conexion->crear_conexion();
    $sql_update = "UPDATE analito SET descripcion=? WHERE id_analito=?";

    $campos = array($analito->getDescripcion(), 
                    $analito->getId_analito());
    $query = $conexion->consulta_row($sql_update,$campos);
    $conexion->cerrar_conexion();
    return $query;
  }


}
?>
