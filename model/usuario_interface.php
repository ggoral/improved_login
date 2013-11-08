<?php

require_once "conexion.php";
require_once "usuario.php";

class ORM_usuario{

public static function buscar_usuario($id_usuario)
  {
    $conexion = new Conexion();
    $conexion->crear_conexion();
    $query = $conexion->consulta("SELECT * FROM usuario WHERE id_usuario=?",array($id_usuario));
    $row = $query[0];
    $conexion->cerrar_conexion();

    $usuario = new Usuario();
    /*
    $usuario->setId_usuario($row['id_usuario']);
    $usuario->setUsername($row['username']);
    $usuario->setPassword($row['password']);
    $usuario->setEmail($row['email']);
    $usuario->setId_rol($row['id_rol']);
    */
    // implementacion del metodo init
    $usuario->init($row['id_usuario'],$row['username'],$row['password'],$row['email'],$row['id_rol']);
    return $usuario;
  }

public static function obtener_todos_usuario()
  {
    $conexion = new Conexion();
    $conexion->crear_conexion();
    $query = $conexion->consulta("SELECT * FROM usuario");
    $conexion->cerrar_conexion();
    return $query;
  }

public static function agregar_usuario($usuario)
  {
    $conexion = new Conexion();
    $sql_insert = "INSERT INTO usuario (username, password, email, id_rol) VALUES (?,?,?,?)";
    $campos = array($usuario->getUsername(), $usuario->getPassword(), $usuario->getEmail(), $usuario->getId_rol());
    $query = $conexion->consulta_row($sql_insert,$campos);
    return $query;
  }

public static function agregar_usuario_campos($username, $password, $email, $id_rol)
  {
    $conexion = new Conexion();
    $sql_insert = "INSERT INTO usuario (username, password, email, id_rol) VALUES (?,?,?,?)";
    $campos = array($username, $password, $email, $id_rol);
    $query = $conexion->consulta_row($sql_insert,$campos);
    return $query;
  }


public static function eliminar_usuario($id_usuario)
  {
    $conexion = new Conexion();
    $sql_delete = "delete from usuario where id_usuario=?";
    $campos = array($id_usuario);
    $query = $conexion->consulta_row($sql_delete,$campos);
    return $query;
  }

public static function actualizar_usuario($usuario)
  {
    $conexion = new Conexion();
    $sql_update = "UPDATE usuario SET username=?,password=?,email=?,id_rol=? WHERE id_usuario=?";
    $campos = array($usuario->getUsername(), $usuario->getPassword(), $usuario->getEmail(), $usuario->getId_rol(), $usuario->getId_usuario());
    $query = $conexion->consulta_row($sql_update,$campos);
    return $query;
  }

}
?>
