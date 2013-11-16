<?php

require_once "conexion.php";
require_once "rol.php";

class ORM_rol{

public static function buscar_rol($id_rol)
  {
    $conexion = new Conexion();
    $query = $conexion->consulta("SELECT * FROM rol WHERE id_rol=?",array($id_rol));
    $row = $query[0];

    $rol = new Rol();
    // implementacion del metodo init
    $rol->init($row['id_rol'],$row['descripcion']);
    return $rol;
  }

public static function obtener_todos_rol()
  {
    $conexion = new Conexion();
    $query = $conexion->consulta("SELECT * FROM rol");
    return $query;
  }

public static function agregar_rol($descripcion)
  {
    $conexion = new Conexion();
    $existe = ORM_rol::buscar_por_clave($descripcion);
    if (!$existe){
      $sql_insert = "INSERT INTO rol (descripcion) VALUES (?)";
      $query = $conexion->consulta_row($sql_insert,array($descripcion));
      return $query;
      }
    return 0;
  }

public static function buscar_por_clave($descripcion)
  {
    $conexion = new Conexion();
    $query = $conexion->consulta_fetch("SELECT id_rol FROM rol WHERE descripcion=?",array($descripcion));
    $id_descripcion = $query['id_rol'];
    return (int)$id_descripcion;
  }

public static function eliminar_rol($id_rol)
//NOTA: AL BORRAR UN rol SE DEBERAN BORRAR LAS CIUDADES ASOCIADAS
  {
    $conexion = new Conexion();
    $sql_delete = "DELETE FROM rol WHERE id_rol=?";
    $campos = array($id_rol);
    $query = $conexion->consulta_row($sql_delete,$campos);
    return $query;
  }

public static function actualizar_rol($rol)
  {
    $conexion = new Conexion();
    $sql_update = "UPDATE rol SET descripcion=? WHERE id_rol=?";

    $campos = array($rol->getDescripcion(), 
                    $rol->getId_rol());
    $query = $conexion->consulta_row($sql_update,$campos);
    return $query;
  }

public static function buscar_rol_Twig($id_rol)
  {
    $conexion = new Conexion();
    $rol = $conexion->consulta_fetch("SELECT * FROM rol WHERE id_rol=?",array($id_rol));
    return $rol;
  }

}
?>
