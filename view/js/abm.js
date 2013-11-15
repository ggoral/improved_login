function editarUsuario(id){
	parametros = 'id_usuario='+id;
	cargarpagina('abm/am_usuario.php?action=editar', parametros,'content');	/*SIMILAR A AJAX DE ABAJO PERO PARA VER SU USO*/
}

function editarAnalito(id){
	parametros = 'id_analito='+id;
	cargarpagina('abm/am_analito.php?action=editar', parametros,'content');	
}

function submitearAnalito(action){
	descripcion = (document.getElementById('descripcion').value);
	id_analito = (document.getElementById('id_analito').value);

	if (descripcion.trim() == ''){ 
		alert((descripcion.trim() == ''));
		mensaje='Ingrese Descripcion';
	}
	else{
		parametros = 'action='+action+'&id_analito='+id_analito+'&descripcion='+descripcion;
		var result = cargarpaginasinc('consultas/consultas_analito.php',parametros);
		result = result.charAt(result.length-1);
		
		if (result == 1){
			mensaje='-ok';	
		}
		else{
			mensaje='-NOT ok';	
		}
	}
	cargarpagina('tablas/controller.analito.php', 'error='+mensaje,'content','mostrarTabla()');	
}