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
		require '../model/usuario.class.php';
		require '../model/menu.class.php';
		$usuario = new usuario();
		$result = $usuario->buscarUsuario($_POST['user'],$_POST['password']);
		$cant = $usuario->cantFilas($result);

//		die($cant);
		
		if ($cant != 0){
			//entra porque encontro al usuario
			$menu = new menu();
			$rol = $result[0]['id_rol'];
			$perfil = $usuario->getRol(array($rol));
			$atributosM = array($perfil);
			$barnav = $menu->cargarMenu($atributosM);
			
			$_SESSION['usuario'] = $result[0]['username'];
			$_SESSION['rol'] = $rol;
			
			$template = $twig->loadTemplate('templateInicio.html');
			
			$template->display(array(
				'barnav' => $barnav
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