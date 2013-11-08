<?php

require_once "conexion.php";
require_once "metodo.php";

class ORM_metodo{

public static function buscar_metodo($id_metodo)
  {
    $conexion = new Conexion();
    $conexion->crear_conexion();
    $query = $conexion->consulta("SELECT * FROM metodo WHERE id_metodo=?",array($id_metodo));
    $row = $query[0];
    $conexion->cerrar_conexion();

    $metodo = new metodo();
    // implementacion del metodo init
    $metodo->init($row['id_metodo'],$row['descripcion']);
    return $metodo;
  }

public static function obtener_todos_metodo()
  {
    $conexion = new Conexion();
    $conexion->crear_conexion();
    $query = $conexion->consulta("SELECT * FROM metodo");
    $conexion->cerrar_conexion();
    return $query;
  }

public static function agregar_metodo($descripcion)
  {
    $conexion = new Conexion();
    $conexion->crear_conexion();
    $sql_insert = "INSERT INTO metodo (descripcion) VALUES (?)";
    $campos = array($descripcion);
    $query = $conexion->consulta_fetch($sql_insert,$campos);
    $cantidad = $conexion->cantidad($query);
    $conexion->cerrar_conexion();
    return $cantidad;
  }
/*
public static function eliminar_metodo($id_metodo)		

//NOTA: SI SE QUIERE BORRAR UN METODO DEBE BORRARSE TODAS LAS RELACIONES PREVIAS PARA ELIMINARLO
  {
    $conexion = new Conexion();
    $conexion->crear_conexion();
    $sql_delete = "DELETE FROM metodo WHERE id_metodo=?";
    $campos = array($id_metodo);
	echo $sql_delete;
	print_r ($campos);
    $query = $conexion->consulta_row($sql_delete,$campos);
    $conexion->cerrar_conexion();
    return $query;
  }
*/
public static function actualizar_metodo($metodo)
  {
    $conexion = new Conexion();
    $conexion->crear_conexion();
    $sql_update = "UPDATE metodo SET descripcion=? WHERE id_metodo=?";

    $campos = array($metodo->getDescripcion(), 
                    $metodo->getId_metodo());
    $query = $conexion->consulta_row($sql_update,$campos);
    $conexion->cerrar_conexion();
    return $query;
  }


}
?>
