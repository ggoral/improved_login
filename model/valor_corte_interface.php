<?php

require_once "conexion.php";
require_once "valor_corte.php";

class ORM_valor_corte{

public static function buscar_valor_corte($id_valor)
  {
    $conexion = new Conexion();
    $conexion->crear_conexion();
    $query = $conexion->consulta("SELECT * FROM valor_corte WHERE id_valor=?",array($id_valor));
    $row = $query[0];
    $conexion->cerrar_conexion();

    $valor = new valor_corte();
    // implementacion del valor init
    $valor->init($row['id_valor'],$row['descripcion']);
    return $valor;
  }

public static function obtener_todos_valor_corte()
  {
    $conexion = new Conexion();
    $conexion->crear_conexion();
    $query = $conexion->consulta("SELECT * FROM valor_corte");
    $conexion->cerrar_conexion();
    return $query;
  }

public static function agregar_valor_corte($descripcion)
  {
    $conexion = new Conexion();
    $conexion->crear_conexion();
    $sql_insert = "INSERT INTO valor_corte (descripcion) VALUES (?)";
    $campos = array($descripcion);
    $query = $conexion->consulta_fetch($sql_insert,$campos);
    $cantidad = $conexion->cantidad($query);
    $conexion->cerrar_conexion();
    return $cantidad;
  }
/*
public static function eliminar_valor_corte($id_valor)		

//NOTA: SI SE QUIERE BORRAR UN VALOR DE CORTE DEBE BORRARSE TODAS LAS RELACIONES PREVIAS PARA ELIMINARLO
  {
    $conexion = new Conexion();
    $conexion->crear_conexion();
    $sql_delete = "DELETE FROM valor_corte WHERE id_valor=?";
    $campos = array($id_valor);
	echo $sql_delete;
	print_r ($campos);
    $query = $conexion->consulta_row($sql_delete,$campos);
    $conexion->cerrar_conexion();
    return $query;
  }
*/
public static function actualizar_valor_corte($valor)
  {
    $conexion = new Conexion();
    $conexion->crear_conexion();
    $sql_update = "UPDATE valor_corte SET descripcion=? WHERE id_valor=?";

    $campos = array($valor->getDescripcion(), 
                    $valor->getId_valor_corte());
    $query = $conexion->consulta_row($sql_update,$campos);
    $conexion->cerrar_conexion();
    return $query;
  }


}
?>
