<?php
require_once "usuario.class.php";

$usuario = new Usuario();

$usuario->setId_usuario(1);
echo "id_usuario:",$usuario->getId_usuario(),"\n";

$usuario->setUsername("Gonzalo");
echo "username:",$usuario->getUsername(),"\n";

$usuario->setPassword("Gonzalo_PASS");
echo "password:",$usuario->getPassword(),"\n";

$usuario->setEmail("goral.gonzalo@gmail.com");
echo "email:",$usuario->getEmail(),"\n";

$usuario->setId_rol(0);
echo "id_rol:",$usuario->getId_rol(),"\n";

?>