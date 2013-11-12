<?php
require_once '../model/usuario_interface.php';


//PROTOCOL of usuario_interface
//public static function actualizar_usuario($usuario)
//public static function agregar_usuario($username, $password, $email, $id_rol, $activo)
//public static function agregar_usuario_campos($username, $password, $email, $id_rol, $activo)
//public static function agregar_usuario($usuario)
//public static function buscar_usuario($id_usuario)
//public static function buscar_usuario_login($username, $password)
//public static function obtener_todos_usuario()
//public static function eliminar_usuario($id_usuario)

class UsuarioTest extends PHPUnit_Framework_TestCase
{
 
  // Test elements on databases greater than or equal 1
  public function testCountElements()
  {
    $count = 0;
    $user_array = ORM_usuario::obtener_todos_usuario();
    if (isset($user_array)) {
      $count = sizeof($user_array);
    }
    $this->assertGreaterThanOrEqual(1, $count);
  }

// Test instanceOf element on query
  public function testInstanceof()
  {
     $user = ORM_usuario::buscar_usuario(1);
     $this->assertInstanceOf('Usuario', $user);
  }

}
?>

