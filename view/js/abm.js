function editarUsuario(id){
	parametros = 'id_usuario='+id;
	cargarpagina('am_usuario.php?action=editar', parametros,'content');	/*SIMILAR A AJAX DE ABAJO PERO PARA VER SU USO*/
}

function editarAnalito(id){
	parametros = 'id_analito='+id;
	cargarpagina('am_analito.php?action=editar', parametros,'content');	
}

function submitearAnalito(action){
	descripcion = document.getElementById('descripcion');
	id_analito = document.getElementById('id_analito');
	parametros = 'action='+action+'&id_analito='+id_analito+'descripcion='+descripcion;
	cargarpaginasinc('consultas_analito',parametros);
	cargarpagina('controller.analito.php', '','content');	
}