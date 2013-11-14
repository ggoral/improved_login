function editarUsuario(id){
	parametros = 'id_usuario='+id;
	cargarpagina('am_usuario.php?action=editar', parametros,'content');	/*SIMILAR A AJAX DE ABAJO PERO PARA VER SU USO*/
}

function editarAnalito(id){
	parametros = 'id_analito='+id;
	cargarpagina('am_analito.php?action=editar', parametros,'content');	
}

function submitearAnalito(action){
	descripcion = (document.getElementById('descripcion').value);
	id_analito = (document.getElementById('id_analito').value);
	if (descripcion.length == 0){
		alert('Ingrese descripcion');
		return false;
	}
	parametros = 'action='+action+'&id_analito='+id_analito+'&descripcion='+descripcion;
	var result = cargarpaginasinc('consultas_analito.php',parametros);
	result = result.charAt(result.length-1);
	cargarpagina('controller.analito.php', '','content');	
	if (result == 1){
		alert(action+' Analito Satisfactorio');		//CAMBIAR PARA MOSTRAR MENSAJE Q CORRESPONDA
	}
	else{
		alert(action+' Analito Erroneo');			//CAMBIAR PARA MOSTRAR MENSAJE Q CORRESPONDA
	}
}