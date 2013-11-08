<?php

require_once "conexion.php";
require_once "interpretacion.php";

class ORM_interpretacion{

public static function buscar_interpretacion($id_interpretacion)
  {
    $conexion = new Conexion();
    $conexion->crear_conexion();
    $query = $conexion->consulta("SELECT * FROM interpretacion WHERE id_interpretacion=?",array($id_interpretacion));
    $row = $query[0];
    $conexion->cerrar_conexion();

    $interpretacion = new interpretacion();
    // implementacion del metodo init
    $interpretacion->init($row['id_interpretacion'],$row['descripcion']);
    return $interpretacion;
  }

public static function obtener_todos_interpretacion()
  {
    $conexion = new Conexion();
    $conexion->crear_conexion();
    $query = $conexion->consulta("SELECT * FROM interpretacion");
    $conexion->cerrar_conexion();
    return $query;
  }

public static function agregar_interpretacion($descripcion)
  {
    $conexion = new Conexion();
    $conexion->crear_conexion();
    $sql_insert = "INSERT INTO interpretacion (descripcion) VALUES (?)";
    $campos = array($descripcion);
    $query = $conexion->consulta_fetch($sql_insert,$campos);
    $cantidad = $conexion->cantidad($query);
    $conexion->cerrar_conexion();
    return $cantidad;
  }
/*
public static function eliminar_interpretacion($id_interpretacion)
 //NOTA: SI SE QUIERE BORRAR UNA INTERPRETACION DEBE BORRARSE TODAS LAS RELACIONES PREVIAS PARA ELIMINARLO
  {
    $conexion = new Conexion();
    $conexion->crear_conexion();
    $sql_delete = "DELETE FROM interpretacion WHERE id_interpretacion=?";
    $campos = array($id_interpretacion);
    $query = $conexion->consulta_row($sql_delete,$campos);
    $conexion->cerrar_conexion();
    return $query;
  }
*/
public static function actualizar_interpretacion($interpretacion)
  {
    $conexion = new Conexion();
    $conexion->crear_conexion();
    $sql_update = "UPDATE interpretacion SET descripcion=? WHERE id_interpretacion=?";

    $campos = array($interpretacion->getDescripcion(), 
                    $interpretacion->getId_interpretacion());
    $query = $conexion->consulta_row($sql_update,$campos);
    $conexion->cerrar_conexion();
    return $query;
  }


}
?>
