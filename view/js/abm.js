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
			alert(result);
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


