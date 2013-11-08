<?php

require_once "conexion.php";
require_once "menu.php";

class ORM_menu{

public static function buscar_menu($id_menu)
  {
    $conexion = new Conexion();
    $conexion->crear_conexion();
    $query = $conexion->consulta("SELECT * FROM menu WHERE id_menu=?",array($id_menu));
    $row = $query[0];
    $conexion->cerrar_conexion();

    $menu = new Menu();
    // implementacion del metodo init
    $menu->init($row['id_menu'],$row['destino'],$row['perfil']);
    return $menu;
  }

public static function obtener_todos_menu()
  {
    $conexion = new Conexion();
    $conexion->crear_conexion();
    $query = $conexion->consulta("SELECT * FROM menu");
    $conexion->cerrar_conexion();
    return $query;
  }

public static function agregar_menu($destino, $perfil)
  {
    $conexion = new Conexion();
    $conexion->crear_conexion();
    $sql_insert = "INSERT INTO menu (destino, perfil) VALUES (?,?)";
    $campos = array($destino,$perfil);
    $query = $conexion->consulta_fetch($sql_insert,$campos);
    $cantidad = $conexion->cantidad($query);
    $conexion->cerrar_conexion();
    return $cantidad;
  }

public static function eliminar_menu($id_menu)
  {
    $conexion = new Conexion();
    $conexion->crear_conexion();
    $sql_delete = "DELETE FROM menu WHERE id_menu=?";
    $campos = array($id_menu);
    $query = $conexion->consulta_row($sql_delete,$campos);
    $conexion->cerrar_conexion();
    return $query;
  }

public static function actualizar_menu($menu)
  {
    $conexion = new Conexion();
    $conexion->crear_conexion();
    $sql_update = "UPDATE menu SET destino=?, perfil=? WHERE id_menu=?";

    $campos = array($menu->getDestino(),
					$menu->getPerfil(),
                    $menu->getId_menu());
    $query = $conexion->consulta_row($sql_update,$campos);
    $conexion->cerrar_conexion();
    return $query;
  }

  public static function buscar_menu_perfil($perfil)
  {
    $conexion = new Conexion();
    $conexion->crear_conexion();
    $query = $conexion->consulta("SELECT destino FROM menu WHERE perfil LIKE ?",array("%$perfil%"));
    $conexion->cerrar_conexion();
    return $query;
  }

}
?>
