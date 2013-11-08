<?php

require_once "conexion.php";
require_once "reactivo.php";

class ORM_reactivo{

public static function buscar_reactivo($id_reactivo)
  {
    $conexion = new Conexion();
    $conexion->crear_conexion();
    $query = $conexion->consulta("SELECT * FROM reactivo WHERE id_reactivo=?",array($id_reactivo));
    $row = $query[0];
    $conexion->cerrar_conexion();

    $reactivo = new reactivo();
    // implementacion del reactivo init
    $reactivo->init($row['id_reactivo'],$row['descripcion']);
    return $reactivo;
  }

public static function obtener_todos_reactivo()
  {
    $conexion = new Conexion();
    $conexion->crear_conexion();
    $query = $conexion->consulta("SELECT * FROM reactivo");
    $conexion->cerrar_conexion();
    return $query;
  }

public static function agregar_reactivo($descripcion)
  {
    $conexion = new Conexion();
    $conexion->crear_conexion();
    $sql_insert = "INSERT INTO reactivo (descripcion) VALUES (?)";
    $campos = array($descripcion);
    $query = $conexion->consulta_fetch($sql_insert,$campos);
    $cantidad = $conexion->cantidad($query);
    $conexion->cerrar_conexion();
    return $cantidad;
  }
/*
public static function eliminar_reactivo($id_reactivo)		

//NOTA: SI SE QUIERE BORRAR UN REACTIVO DEBE BORRARSE TODAS LAS RELACIONES PREVIAS PARA ELIMINARLO
  {
    $conexion = new Conexion();
    $conexion->crear_conexion();
    $sql_delete = "DELETE FROM reactivo WHERE id_reactivo=?";
    $campos = array($id_reactivo);
	echo $sql_delete;
	print_r ($campos);
    $query = $conexion->consulta_row($sql_delete,$campos);
    $conexion->cerrar_conexion();
    return $query;
  }
*/
public static function actualizar_reactivo($reactivo)
  {
    $conexion = new Conexion();
    $conexion->crear_conexion();
    $sql_update = "UPDATE reactivo SET descripcion=? WHERE id_reactivo=?";

    $campos = array($reactivo->getDescripcion(), 
                    $reactivo->getId_reactivo());
    $query = $conexion->consulta_row($sql_update,$campos);
    $conexion->cerrar_conexion();
    return $query;
  }


}
?>
