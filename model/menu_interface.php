<?php

require_once "conexion.php";
require_once "menu.php";

class ORM_menu{

public static function buscar_menu($id_menu)
  {
    $conexion = new Conexion();
    $query = $conexion->consulta("SELECT * FROM menu WHERE id_menu=?",array($id_menu));
    $row = $query[0];
    $menu = new Menu();
    // implementacion del metodo init
    $menu->init($row['id_menu'],$row['destino'],$row['perfil']);
    return $menu;
  }

public static function obtener_todos_menu()
  {
    $conexion = new Conexion();
    $query = $conexion->consulta("SELECT * FROM menu");
    return $query;
  }

public static function agregar_menu($destino, $perfil)
  {
    $conexion = new Conexion();
    $existe = ORM_menu::buscar_por_clave($destino);
    if (!$existe){
      $sql_insert = "INSERT INTO menu (destino, perfil) VALUES (?,?)";
      $campos = array($destino, $perfil);
      $query = $conexion->consulta_row($sql_insert,$campos);
      return $query;
      }
    return 0;
  }

public static function buscar_por_clave($destino)
  {
    $conexion = new Conexion();
    $query = $conexion->consulta_fetch("SELECT id_menu FROM menu WHERE destino=?",array($destino));
    $id_menu = $query['id_menu'];
    return (int)$id_menu;
  }

public static function eliminar_menu($id_menu)
  {
    $conexion = new Conexion();
    $sql_delete = "DELETE FROM menu WHERE id_menu=?";
    $query = $conexion->consulta_row($sql_delete,array($id_menu));
    return $query;
  }

public static function actualizar_menu($menu)
  {
    $conexion = new Conexion();
    $sql_update = "UPDATE menu SET destino=?, perfil=? WHERE id_menu=?";

    $campos = array($menu->getDestino(),
				            $menu->getPerfil(),
                    $menu->getId_menu());
    $query = $conexion->consulta_row($sql_update,$campos);
    return $query;
  }

  public static function buscar_menu_perfil($perfil)
  {
    $conexion = new Conexion();
    $query = $conexion->consulta("SELECT destino FROM menu WHERE perfil LIKE ?",array("%$perfil%"));
    return $query;
  }
}
?>
