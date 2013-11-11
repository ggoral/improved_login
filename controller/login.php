<?php	

session_start();
// include and register Twig auto-loader
require_once '../view/lib/Twig/Autoloader.php'; 
	
Twig_Autoloader::register();

try {

	// define template directory location
	$loader = new Twig_Loader_Filesystem('../view/templates');

	// initialize Twig environment
	$twig = new Twig_Environment($loader,array(
			//'debug'=> TRUE,
			//'cache' => 'compilation_cache',
			'auto_reload' => TRUE
		));

	if (((isset($_POST['user']))and($_POST['user']!=''))and((isset($_POST['password']))and($_POST['password']!=''))){
		require '../model/usuario_interface.php';
		require '../model/menu_interface.php';
		require '../model/rol_interface.php';

		$usuario = new ORM_usuario();
		$result = $usuario->buscar_usuario_login($_POST['user'],$_POST['password']);


//		die($result);

		if ($result != 0){
			//entra porque encontro al usuario
			$usuarioLogeado = $usuario->buscar_usuario($result);

			//chequea que este activo
			if (!($usuarioLogeado->getActivo())) {
				//esta inactivo
				header("Location: index.php?error=USUARIO INACTIVO");
			}
		
			//esta activo
			$menu = new ORM_menu();
			$rol = new ORM_rol();

			$idRolUsuario = $usuarioLogeado->getId_rol();
			$filaRol = $rol->buscar_rol($idRolUsuario);
			$descripcionRol = $filaRol->getDescripcion();

			$menuPerfil = $menu->buscar_menu_perfil($descripcionRol);
			$destino = $menuPerfil[0]['destino'];//segun su perfil/rol le setea el destino de la vista

			/*
			//$perfil = $usuario->getRol(array($rol));

			//$atributosM = array($perfil);

			$barnav = $menu->cargarMenu($destino);
			
			$_SESSION['usuario'] = $result[0]['username'];
			$_SESSION['rol'] = $rol;
			*/

			$template = $twig->loadTemplate('templateInicio.html');
			$template->display(array(
				'barnav' => $destino
				));
		}
		else{	/*USUARIO INEXISTENTE CON ESE NOMBRE Y PASS*/
			header("Location: index.php?error=ERROR AL INICIAR SESION");
		}				
	}
	else{
		header("Location: index.php?error=NO HAY DATOS INGRESADOS");
			
	} 
} catch (Exception $e) {
  die ('ERROR: ' . $e->getMessage());
}
?>