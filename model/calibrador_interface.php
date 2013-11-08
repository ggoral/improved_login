<?php

require_once "conexion.php";
require_once "calibrador.php";

class ORM_calibrador{

public static function buscar_calibrador($id_calibrador)
  {
    $conexion = new Conexion();
    $conexion->crear_conexion();
    $query = $conexion->consulta("SELECT * FROM calibrador WHERE id_calibrador=?",array($id_calibrador));
    $row = $query[0];
    $conexion->cerrar_conexion();

    $calibrador = new calibrador();
    // implementacion del metodo init
    $calibrador->init($row['id_calibrador'],$row['descripcion']);
    return $calibrador;
  }

public static function obtener_todos_calibrador()
  {
    $conexion = new Conexion();
    $conexion->crear_conexion();
    $query = $conexion->consulta("SELECT * FROM calibrador");
    $conexion->cerrar_conexion();
    return $query;
  }

public static function agregar_calibrador($descripcion)
  {
    $conexion = new Conexion();
    $conexion->crear_conexion();
    $sql_insert = "INSERT INTO calibrador (descripcion) VALUES (?)";
    $campos = array($descripcion);
    $query = $conexion->consulta_fetch($sql_insert,$campos);
    $cantidad = $conexion->cantidad($query);
    $conexion->cerrar_conexion();
    return $cantidad;
  }
/*
public static function eliminar_calibrador($id_calibrador)
 //NOTA: SI SE QUIERE BORRAR UN CALIBRADOR DEBE BORRARSE TODAS LAS RELACIONES PREVIAS PARA ELIMINARLO
 
  {
    $conexion = new Conexion();
    $conexion->crear_conexion();
    $sql_delete = "DELETE FROM calibrador WHERE id_calibrador=?";
    $campos = array($id_calibrador);
    $query = $conexion->consulta_row($sql_delete,$campos);
    $conexion->cerrar_conexion();
    return $query;
  }
*/
public static function actualizar_calibrador($calibrador)
  {
    $conexion = new Conexion();
    $conexion->crear_conexion();
    $sql_update = "UPDATE calibrador SET descripcion=? WHERE id_calibrador=?";

    $campos = array($calibrador->getDescripcion(), 
                    $calibrador->getId_calibrador());
    $query = $conexion->consulta_row($sql_update,$campos);
    $conexion->cerrar_conexion();
    return $query;
  }


}
?>
