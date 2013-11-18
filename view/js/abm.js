function editarForm(id, tabla){
	parametros = 'id_'+tabla+'='+id;
	cargarpagina('abm/am_'+tabla+'.php?action=editar', parametros,'content');	
}

function submitearFormSimple(action, tabla){
	descripcion = (document.getElementById('descripcion').value);
	id_elemento = (document.getElementById('id_'+tabla).value);
	error=false;
	if (descripcion.trim() == ''){ 
		mensaje='Ingrese Descripcion';
		error=true;
	}
	else{

		parametros = 'action='+action+'&id_'+tabla+'='+id_elemento+'&descripcion='+descripcion;
		var result = cargarpaginasinc('consultas/consultas_'+tabla+'.php',parametros);
		
		switch(result)
		{
		case '1':
			mensaje='1';
			break;
		case '2':
			error=true;
			mensaje='Operacion Fallida - Error al insertar elemento';	
			break;
		case '3':
			error=true;
			mensaje='Operacion Fallida - Error de Actualización';	
			break;
		case '4':
			error=true;
			mensaje='Operacion Fallida - Elemento ya existente';	
			break;
		case '5':
			error=true;
			mensaje='Operacion Fallida - Faltan Datos';	
			break;
		default:
			error=true;
			mensaje='Operacion Fallida - Error en Base de datos';	
		}	
		
	}
	if (!error){
		cargarpagina('tablas/controller.'+tabla+'.php', 'error='+mensaje,'content','mostrarTabla();desapar();');	
	}else{
		aparDesapar();
		return false;
	}
}

function submitearForm(action, tabla){
	descripcion = (document.getElementById('descripcion').value);
	id_elemento = (document.getElementById('id_'+tabla).value);
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
			parametros = 'action='+action+'&id_'+tabla+'='+id_elemento+'&descripcion='+descripcion+'&analitos='+id_analitos;
			var result = cargarpaginasinc('consultas/consultas_'+tabla+'.php',parametros);
			
			switch(result)
			{
			case '1':
				mensaje='1';
				break;
			case '2':
				error=true;
				mensaje='Operacion Fallida - Error al insertar elemento';	
				break;
			case '3':
				error=true;
				mensaje='Operacion Fallida - Error de Actualización';	
				break;
			case '4':
				error=true;
				mensaje='Operacion Fallida - Elemento ya existente';	
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
		cargarpagina('tablas/controller.'+tabla+'.php', 'error='+mensaje,'content','mostrarTabla();desapar();');	
	}else{
		aparDesapar();
		return false;
	}
}

/*ENCUESTA*/
function submitearFormEncuesta(action, tabla){
	fecha_inicio = (document.getElementById('fecha_inicio').value);
	fecha_cierre = (document.getElementById('fecha_cierre').value);
	id_resultado = ($('#resultado').val());
	id_elemento = (document.getElementById('id_'+tabla).value);
	
	error=false;

	if (fecha_inicio == null){ 
		mensaje='Seleccione Fecha De Inicio';
		error=true;
	}
	else{
		if (fecha_cierre == null){ 
			mensaje='Seleccione Fecha de Cierre';
			error=true;
		}
		else{
			if (id_resultado== null){ 
				mensaje='Seleccione Resultado';
				error=true;
			}
			else{
					parametros = 'action='+action+'&id_'+tabla+'='+id_elemento+'&fecha_inicio='+fecha_inicio+'&fecha_cierre='+fecha_cierre+'&id_resultado='+id_resultado;
					
					var result = cargarpaginasinc('consultas/consultas_'+tabla+'.php',parametros);

					switch(result)
					{
					case '1':
						mensaje='1';
						break;
					case '2':
						error=true;
						mensaje='Operacion Fallida - Error de creacion';	
						break;	
					case '3':
						error=true;
						mensaje='Operacion Fallida - Error de Actualización';	
						break;
					case '4':
						error=true;
						mensaje='Operacion Fallida - Encuesta ya existente';	
						break;
					case '5':
						error=true;
						mensaje='Operacion Fallida - Complete todos los campos correctamente';	
						break;
					default:
						error=true;
						mensaje='Operacion Fallida - Error en Base de datos';	
	
					}
				}
			}
		}	

	if (!error){
		cargarpagina('tablas/controller.'+tabla+'.php', 'error='+mensaje,'content','mostrarTabla();desapar();');	
	}else{
		aparDesapar();
		return false;
	}
}
/*ENCUESTA*/
/*Muestra*/
function submitearFormMuestra(action, tabla){
	resultado_control = (document.getElementById('resultado_control').value);
	interpretacion = (document.getElementById('interpretacion').value);
	decision = (document.getElementById('decision').value);
	id_resultado = ($('#resultado').val());
	id_elemento = (document.getElementById('id_'+tabla).value);

	error=false;

	if (interpretacion == null){ 
		mensaje='Seleccione Interpretacion';
		error=true;
	}
	else{
		if (decision == null){ 
			mensaje='Seleccione Decision';
			error=true;
		}
		else{
			if (id_resultado== null){ 
				mensaje='Seleccione Resultado';
				error=true;
			}
			else{
					parametros = 'action='+action+'&id_'+tabla+'='+id_elemento+'&resultado_control='+resultado_control+'&interpretacion='+interpretacion+'&decision='+decision+'&id_resultado='+id_resultado;
					
					var result = cargarpaginasinc('consultas/consultas_'+tabla+'.php',parametros);

					switch(result)
					{
					case '1':
						mensaje='1';
						break;
					case '2':
						error=true;
						mensaje='Operacion Fallida - Error de creacion';	
						break;	
					case '3':
						error=true;
						mensaje='Operacion Fallida - Error de Actualización';	
						break;
					case '4':
						error=true;
						mensaje='Operacion Fallida - Muestra ya existente';	
						break;
					case '5':
						error=true;
						mensaje='Operacion Fallida - Complete todos los campos correctamente';	
						break;
					default:
						alert(result);
						error=true;
						mensaje='Operacion Fallida - Error en Base de datos';	
	
					}
				}
			}
		}	

	if (!error){
		cargarpagina('tablas/controller.'+tabla+'.php', 'error='+mensaje,'content','mostrarTabla();desapar();');	
	}else{
		aparDesapar();
		return false;
	}
}
/*Muestra*/



