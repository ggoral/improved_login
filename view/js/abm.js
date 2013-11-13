function editarUsuario(id){
	parametros = 'id_usuario='+id;
	cargarpagina('am_usuario.php?action=editar', parametros,'content');	/*SIMILAR A AJAX DE ABAJO PERO PARA VER SU USO*/
}