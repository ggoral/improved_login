<?php

require_once "conexion.php";
require_once "papel_filtro.php";

class ORM_papel_filtro{

public static function buscar_papel_filtro($id_papel_filtro)
  {
    $conexion = new Conexion();
    $conexion->crear_conexion();
    $query = $conexion->consulta("SELECT * FROM papel_filtro WHERE id_papel_filtro=?",array($id_papel_filtro));
    $row = $query[0];
    $conexion->cerrar_conexion();

    $valor = new papel_filtro();
    // implementacion del valor init
    $valor->init($row['id_papel_filtro'],$row['descripcion']);
    return $valor;
  }

public static function obtener_todos_papel_filtro()
  {
    $conexion = new Conexion();
    $conexion->crear_conexion();
    $query = $conexion->consulta("SELECT * FROM papel_filtro");
    $conexion->cerrar_conexion();
    return $query;
  }

public static function agregar_papel_filtro($descripcion)
  {
    $conexion = new Conexion();
    $conexion->crear_conexion();
    $sql_insert = "INSERT INTO papel_filtro (descripcion) VALUES (?)";
    $campos = array($descripcion);
    $query = $conexion->consulta_fetch($sql_insert,$campos);
    $cantidad = $conexion->cantidad($query);
    $conexion->cerrar_conexion();
    return $cantidad;
  }
/*
public static function eliminar_papel_filtro($id_papel_filtro)		

//NOTA: SI SE QUIERE BORRAR UN PAPEL DE FILTRO DEBE BORRARSE TODAS LAS RELACIONES PREVIAS PARA ELIMINARLO
  {
    $conexion = new Conexion();
    $conexion->crear_conexion();
    $sql_delete = "DELETE FROM papel_filtro WHERE id_papel_filtro=?";
    $campos = array($id_papel_filtro);
	echo $sql_delete;
	print_r ($campos);
    $query = $conexion->consulta_row($sql_delete,$campos);
    $conexion->cerrar_conexion();
    return $query;
  }
*/
public static function actualizar_papel_filtro($valor)
  {
    $conexion = new Conexion();
    $conexion->crear_conexion();
    $sql_update = "UPDATE papel_filtro SET descripcion=? WHERE id_papel_filtro=?";

    $campos = array($valor->getDescripcion(), 
                    $valor->getId_papel_filtro());
    $query = $conexion->consulta_row($sql_update,$campos);
    $conexion->cerrar_conexion();
    return $query;
  }


}
?>
