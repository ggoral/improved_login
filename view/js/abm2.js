
/*CALIBRADOR*/
function editarCalibrador(id){
	parametros = 'id_calibrador='+id;
	cargarpagina('abm/am_calibrador.php?action=editar', parametros,'content');	
}

function submitearCalibrador(action){
	descripcion = (document.getElementById('descripcion').value);
	id_calibrador = (document.getElementById('id_calibrador').value);
	id_analitos = ($('#analito').val());	//OBTENGO TODOS LOS ID SEPARADOS POR ","
	error=false;
	if (descripcion.trim() == ''){ 
		mensaje='Ingrese Descripcion';
		error=true;
	}
	else{
		if (id_analitos == null){
			mensaje='Seleccione al menos un analito';
			error=true;
		}
		else{
			parametros = 'action='+action+'&id_calibrador='+id_calibrador+'&descripcion='+descripcion+'&analitos='+id_analitos;
			var result = cargarpaginasinc('consultas/consultas_calibrador.php',parametros);
			
			switch(result)
			{
			case '1':
				mensaje='1';
				break;
			case '2':
				error=true;
				mensaje='Operacion Fallida - Error al insertar Analitos';	
				break;
			case '3':
				error=true;
				mensaje='Operacion Fallida - Error de Actualización';	
				break;
			case '4':
				error=true;
				mensaje='Operacion Fallida - Calibrador ya existente';	
				break;
			case '5':
				error=true;
				mensaje='Operacion Fallida - Complete todos los campos';	
				break;
			default:
				error=true;
				mensaje='Operacion Fallida - Error en Base de datos';	
			}	
		}
	}
	if (!error){
		cargarpagina('tablas/controller.calibrador.php', 'error='+mensaje,'content','mostrarTabla();desapar();');	
	}else{
		aparDesapar();
		return false;
	}
}
/*CALIBRADOR*/

/*METODO*/
function editarMetodo(id){
	parametros = 'id_metodo='+id;
	cargarpagina('abm/am_metodo.php?action=editar', parametros,'content');	
}

function submitearMetodo(action){
	descripcion = (document.getElementById('descripcion').value);
	id_metodo = (document.getElementById('id_metodo').value);
	id_analitos = ($('#analito').val());	//OBTENGO TODOS LOS ID SEPARADOS POR ","
	error=false;
	if (descripcion.trim() == ''){ 
		mensaje='Ingrese Descripcion';
		error=true;
	}
	else{
		if (id_analitos == null){
			mensaje='Seleccione al menos un analito';
			error=true;
		}
		else{
			parametros = 'action='+action+'&id_metodo='+id_metodo+'&descripcion='+descripcion+'&analitos='+id_analitos;
			var result = cargarpaginasinc('consultas/consultas_metodo.php',parametros);
			
			switch(result)
			{
			case '1':
				mensaje='1';
				break;
			case '2':
				error=true;
				mensaje='Operacion Fallida - Error al insertar Analitos';	
				break;
			case '3':
				error=true;
				mensaje='Operacion Fallida - Error de Actualización';	
				break;
			case '4':
				error=true;
				mensaje='Operacion Fallida - Método ya existente';	
				break;
			case '5':
				error=true;
				mensaje='Operacion Fallida - Complete todos los campos';	
				break;
			default:
				error=true;
				mensaje='Operacion Fallida - Error en Base de datos';	
			}	
		}
	}
	if (!error){
		cargarpagina('tablas/controller.metodo.php', 'error='+mensaje,'content','mostrarTabla();desapar();');	
	}else{
		aparDesapar();
		return false;
	}
}
/*METODO*/

/*REACTIVO*/
function editarReactivo(id){
	parametros = 'id_reactivo='+id;
	cargarpagina('abm/am_reactivo.php?action=editar', parametros,'content');	
}

function submitearReactivo(action){
	descripcion = (document.getElementById('descripcion').value);
	id_reactivo = (document.getElementById('id_reactivo').value);
	id_analitos = ($('#analito').val());	//OBTENGO TODOS LOS ID SEPARADOS POR ","
	error=false;
	if (descripcion.trim() == ''){ 
		mensaje='Ingrese Descripcion';
		error=true;
	}
	else{
		if (id_analitos == null){
			mensaje='Seleccione al menos un analito';
			error=true;
		}
		else{
			parametros = 'action='+action+'&id_reactivo='+id_reactivo+'&descripcion='+descripcion+'&analitos='+id_analitos;
			var result = cargarpaginasinc('consultas/consultas_reactivo.php',parametros);
			
			switch(result)
			{
			case '1':
				mensaje='1';
				break;
			case '2':
				error=true;
				mensaje='Operacion Fallida - Error al insertar Analitos';	
				break;
			case '3':
				error=true;
				mensaje='Operacion Fallida - Error de Actualización';	
				break;
			case '4':
				error=true;
				mensaje='Operacion Fallida - Reactivo ya existente';	
				break;
			case '5':
				error=true;
				mensaje='Operacion Fallida - Complete todos los campos';	
				break;
			default:
				error=true;
				mensaje='Operacion Fallida - Error en Base de datos';	
			}	
		}
	}
	if (!error){
		cargarpagina('tablas/controller.reactivo.php', 'error='+mensaje,'content','mostrarTabla();desapar();');	
	}else{
		aparDesapar();
		return false;
	}
}
/*REACTIVO*/

/*DECISION*/
function editarDecision(id){
	parametros = 'id_decision='+id;
	cargarpagina('abm/am_decision.php?action=editar', parametros,'content');	
}

function submitearDecision(action){
	descripcion = (document.getElementById('descripcion').value);
	id_decision = (document.getElementById('id_decision').value);
	id_analitos = ($('#analito').val());	//OBTENGO TODOS LOS ID SEPARADOS POR ","
	error=false;
	if (descripcion.trim() == ''){ 
		mensaje='Ingrese Descripcion';
		error=true;
	}
	else{
		if (id_analitos == null){
			mensaje='Seleccione al menos un analito';
			error=true;
		}
		else{
			parametros = 'action='+action+'&id_decision='+id_decision+'&descripcion='+descripcion+'&analitos='+id_analitos;
			var result = cargarpaginasinc('consultas/consultas_decision.php',parametros);
			
			switch(result)
			{
			case '1':
				mensaje='1';
				break;
			case '2':
				error=true;
				mensaje='Operacion Fallida - Error al insertar Analitos';	
				break;
			case '3':
				error=true;
				mensaje='Operacion Fallida - Error de Actualización';	
				break;
			case '4':
				error=true;
				mensaje='Operacion Fallida - Decisión ya existente';	
				break;
			case '5':
				error=true;
				mensaje='Operacion Fallida - Complete todos los campos';	
				break;
			default:
				error=true;
				mensaje='Operacion Fallida - Error en Base de datos';	
			}	
		}
	}
	if (!error){
		cargarpagina('tablas/controller.decision.php', 'error='+mensaje,'content','mostrarTabla();desapar();');	
	}else{
		aparDesapar();
		return false;
	}
}
/*DECISION*/

/*INTERPRETACION*/
function editarInterpretacion(id){
	parametros = 'id_interpretacion='+id;
	cargarpagina('abm/am_interpretacion.php?action=editar', parametros,'content');	
}

function submitearInterpretacion(action){
	descripcion = (document.getElementById('descripcion').value);
	id_interpretacion = (document.getElementById('id_interpretacion').value);
	id_analitos = ($('#analito').val());	//OBTENGO TODOS LOS ID SEPARADOS POR ","
	error=false;
	if (descripcion.trim() == ''){ 
		mensaje='Ingrese Descripcion';
		error=true;
	}
	else{
		if (id_analitos == null){
			mensaje='Seleccione al menos un analito';
			error=true;
		}
		else{
			parametros = 'action='+action+'&id_interpretacion='+id_interpretacion+'&descripcion='+descripcion+'&analitos='+id_analitos;
			var result = cargarpaginasinc('consultas/consultas_interpretacion.php',parametros);
			
			switch(result)
			{
			case '1':
				mensaje='1';
				break;
			case '2':
				error=true;
				mensaje='Operacion Fallida - Error al insertar Analitos';	
				break;
			case '3':
				error=true;
				mensaje='Operacion Fallida - Error de Actualización';	
				break;
			case '4':
				error=true;
				mensaje='Operacion Fallida - Interpretación ya existente';	
				break;
			case '5':
				error=true;
				mensaje='Operacion Fallida - Complete todos los campos';	
				break;
			default:
				error=true;
				mensaje='Operacion Fallida - Error en Base de datos';	
			}	
		}
	}
	if (!error){
		cargarpagina('tablas/controller.interpretacion.php', 'error='+mensaje,'content','mostrarTabla();desapar();');	
	}else{
		aparDesapar();
		return false;
	}
}
/*INTERPRETACION*/

/*VALOR DE CORTE*/
function editarValor_corte(id){
	parametros = 'id_valor_corte='+id;
	cargarpagina('abm/am_valor_corte.php?action=editar', parametros,'content');	
}

function submitearValor_corte(action){
	descripcion = (document.getElementById('descripcion').value);
	id_valor_corte = (document.getElementById('id_valor_corte').value);
	id_analitos = ($('#analito').val());	//OBTENGO TODOS LOS ID SEPARADOS POR ","
	error=false;
	if (descripcion.trim() == ''){ 
		mensaje='Ingrese Descripcion';
		error=true;
	}
	else{
		if (id_analitos == null){
			mensaje='Seleccione al menos un analito';
			error=true;
		}
		else{
			parametros = 'action='+action+'&id_valor_corte='+id_valor_corte+'&descripcion='+descripcion+'&analitos='+id_analitos;
			var result = cargarpaginasinc('consultas/consultas_valor_corte.php',parametros);
			
			switch(result)
			{
			case '1':
				mensaje='1';
				break;
			case '2':
				error=true;
				mensaje='Operacion Fallida - Error al insertar Analitos';	
				break;
			case '3':
				error=true;
				mensaje='Operacion Fallida - Error de Actualización';	
				break;
			case '4':
				error=true;
				mensaje='Operacion Fallida - Valor de Corte ya existente';	
				break;
			case '5':
				error=true;
				mensaje='Operacion Fallida - Complete todos los campos';	
				break;
			default:
				error=true;
				mensaje='Operacion Fallida - Error en Base de datos';	
			}	
		}
	}
	if (!error){
		cargarpagina('tablas/controller.valor_corte.php', 'error='+mensaje,'content','mostrarTabla();desapar();');	
	}else{
		aparDesapar();
		return false;
	}
}
/*VALOR DE CORTE*/

/*PAPEL DE FILTRO*/
function editarPapel_filtro(id){
	parametros = 'id_papel_filtro='+id;
	cargarpagina('abm/am_papel_filtro.php?action=editar', parametros,'content');	
}

function submitearPapel_filtro(action){
	descripcion = (document.getElementById('descripcion').value);
	id_papel_filtro = (document.getElementById('id_papel_filtro').value);
	id_analitos = ($('#analito').val());	//OBTENGO TODOS LOS ID SEPARADOS POR ","
	error=false;
	if (descripcion.trim() == ''){ 
		mensaje='Ingrese Descripcion';
		error=true;
	}
	else{
		if (id_analitos == null){
			mensaje='Seleccione al menos un analito';
			error=true;
		}
		else{
			parametros = 'action='+action+'&id_papel_filtro='+id_papel_filtro+'&descripcion='+descripcion+'&analitos='+id_analitos;
			var result = cargarpaginasinc('consultas/consultas_papel_filtro.php',parametros);
			
			switch(result)
			{
			case '1':
				mensaje='1';
				break;
			case '2':
				error=true;
				mensaje='Operacion Fallida - Error al insertar Analitos';	
				break;
			case '3':
				error=true;
				mensaje='Operacion Fallida - Error de Actualización';	
				break;
			case '4':
				error=true;
				mensaje='Operacion Fallida - Papel de Filtro ya existente';	
				break;
			case '5':
				error=true;
				mensaje='Operacion Fallida - Complete todos los campos';	
				break;
			default:
				error=true;
				mensaje='Operacion Fallida - Error en Base de datos';	
			}	
		}
	}
	if (!error){
		cargarpagina('tablas/controller.papel_filtro.php', 'error='+mensaje,'content','mostrarTabla();desapar();');	
	}else{
		aparDesapar();
		return false;
	}
}
/*PAPEL DE FILTRO*/