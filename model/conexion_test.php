<?php:
require_once "conexion.php";

$conn = new Conexion();

echo "Crear la conexion\n";
$conn->crear_conexion();

echo "Consulta a la Base de Datos\n";
$consulta = "SELECT * FROM usuario WHERE username=?";
$atributos_consulta = array("admin");
echo "PDO_SQL: ",$consulta,"\n PDO_ATTR: ";
print_r($atributos_consulta);

$res = $conn->consulta($consulta,$atributos_consulta);
$cant = $conn->cantidad($res);

echo "Cantidad de filas resultantes:",$cant,"\n";
print_r($res);

$conn->cerrar_conexion();
echo "Conexion a la Base de Datos Cerrada\n";
?>
