<?php

require_once "conexion.php";
require_once "resultado.php";

class ORM_resultado{

public static function buscar_resultado($id_resultado)
  {
    $conexion = new Conexion();
    $query = $conexion->consulta("SELECT * FROM resultado WHERE id_resultado=?",array($id_resultado));
    $row = $query[0];

    $resultado = new resultado();
    $resultado->init($row['id_resultado'],
                     $row['comentario'], 
                     $row['fecha_recepcion'], 
                     $row['fecha_analisis'], 
                     $row['fecha_ingreso'], 
                     $row['id_lab'], 
                     $row['id_metodo'], 
                     $row['id_reactivo'], 
                     $row['id_calibrador'], 
                     $row['id_analito'], 
                     $row['id_papel_filtro'], 
                     $row['id_valor']);
    return $resultado;
  }

public static function obtener_todos_resultado()
  {
    $conexion = new Conexion();
    $query = $conexion->consulta("SELECT * FROM resultado");
    return $query;
  }

public static function agregar_resultado($comentario, $fecha_recepcion, $fecha_analisis, $fecha_ingreso, $id_lab, $id_metodo, $id_reactivo, $id_calibrador, $id_analito, $id_papel_filtro, $id_valor)
  {
    $conexion = new Conexion();
    $sql_insert = "INSERT INTO resultado (comentario, fecha_recepcion, fecha_analisis, fecha_ingreso, id_lab, id_metodo, id_reactivo, id_calibrador, id_analito, id_papel_filtro, id_valor) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
    $campos = array($comentario, $fecha_recepcion, $fecha_analisis, $fecha_ingreso, $id_lab, $id_metodo, $id_reactivo, $id_calibrador, $id_analito, $id_papel_filtro, $id_valor);
    $query = $conexion->consulta_row($sql_insert,$campos);
    return $query;
  }

  private function buscar_por_clave($id_resultado)
  {
    $conexion = new Conexion();
    $query = $conexion->consulta_fetch("SELECT id_resultado FROM resultado WHERE id_resultado=?",array($id_resultado));
    $id_resultado = $query['id_resultado'];
    return (int)$id_resultado;
  }

/*
public static function eliminar_resultado($id_resultado)
  {
    $conexion = new Conexion();
    $sql_delete = "delete from resultado where id_resultado=?";
    $campos = array($id_resultado);
    $query = $conexion->consulta_row($sql_delete,$campos);
    return $query;
  }
  */

public static function actualizar_resultado($resultado)
  {
    $conexion = new Conexion();
    $sql_update = "UPDATE resultado SET comentario=?, fecha_recepcion=?, fecha_analisis=?, fecha_ingreso=?, id_lab=?, id_metodo=?, id_reactivo=?, id_calibrador=?, id_analito=?, id_papel_filtro=?, id_valor=? WHERE id_resultado=?";

    $campos = array($resultado->getComentario(), 
                    $resultado->getFecha_recepcion(),
                    $resultado->getFecha_analisis(),
                    $resultado->getFecha_ingreso(),
                    $resultado->getId_lab(),
                    $resultado->getId_metodo(),
                    $resultado->getId_reactivo(),
                    $resultado->getId_calibrador(),
                    $resultado->getId_analito(),
                    $resultado->getId_papel_filtro(),
                    $resultado->getId_valor(),
                    $resultado->getid_resultado());
    $query = $conexion->consulta_row($sql_update,$campos);
    return $query;
  }

}
?>
