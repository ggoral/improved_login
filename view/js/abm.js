/*ANALITO*/
function editarAnalito(id){
	parametros = 'id_analito='+id;
	cargarpagina('abm/am_analito.php?action=editar', parametros,'content');	
}

function submitearAnalito(action){
	descripcion = (document.getElementById('descripcion').value);
	id_analito = (document.getElementById('id_analito').value);

	if (descripcion.trim() == ''){
		mensaje='Ingrese Descripcion';
	}
	else{
		parametros = 'action='+action+'&id_analito='+id_analito+'&descripcion='+descripcion;
		var result = cargarpaginasinc('consultas/consultas_analito.php',parametros);
		result = result.charAt(result.length-1);
		
		if (result == 1){
			mensaje='Operacion Exitosa';	
		}
		else{
			mensaje='Operacion Fallida - Error en Base de datos';	
		}
	}
	cargarpagina('tablas/controller.analito.php', 'error='+mensaje,'content','mostrarTabla()');	
}
/*ANALITO*/
/*CALIBRADOR*/
function editarCalibrador(id){
	parametros = 'id_calibrador='+id;
	cargarpagina('abm/am_calibrador.php?action=editar', parametros,'content');	
}

function submitearCalibrador(action){
	descripcion = (document.getElementById('descripcion').value);
	id_calibrador = (document.getElementById('id_calibrador').value);
	id_analitos = ($('#analito').val());	//OBTENGO TODOS LOS ID SEPARADOS POR ","
	if (descripcion.trim() == ''){ 
		mensaje='Ingrese Descripcion';
	}
	else{
		if (id_analitos.trim() == ''){
			mensaje='Seleccione al menos un analito';
		}
		else{
			parametros = 'action='+action+'&id_calibrador='+id_calibrador+'&descripcion='+descripcion+'&analitos='+id_analitos;
			var result = cargarpaginasinc('consultas/consultas_calibrador.php',parametros);
			result = result.charAt(result.length-1);		//TENER EN CUENTA QUE DEVUELVE EL ULTIMO CARACTER O SEA 1 SOLO NUMERO, ASI Q MANEJAR ERRORES CON ESTE CRITERIO DESDE EL SCRIPT DE LAS CONSULTAS	
			
			if (result == 1){							//PLANTEAR COMO UN SWITCH PARA LAS DIFERENTES RPTAS DEL SCRIPT
				mensaje='Operacion Exitosa';	
			}
			else{
				mensaje='Operacion Fallida - Error en Base de datos';	
			}
		}
	}
	cargarpagina('tablas/controller.calibrador.php', 'error='+mensaje,'content','mostrarTabla()');	
}
/*CALIBRADOR*/
/*ROL*/
function editarRol(id){
	parametros = 'id_rol='+id;
	cargarpagina('abm/am_rol.php?action=editar', parametros,'content');	
}

function submitearRol(action){
	descripcion = (document.getElementById('descripcion').value);
	id_rol = (document.getElementById('id_rol').value);

	if (descripcion.trim() == ''){
		mensaje='Ingrese Descripcion';
	}
	else{
		parametros = 'action='+action+'&id_rol='+id_rol+'&descripcion='+descripcion;
		var result = cargarpaginasinc('consultas/consultas_rol.php',parametros);
		result = result.charAt(result.length-1);
		
		if (result == 1){
			mensaje='Operacion Exitosa';	
		}
		else{
			mensaje='Operacion Fallida - Error en Base de datos';	
		}
	}
	cargarpagina('tablas/controller.rol.php', 'error='+mensaje,'content','mostrarTabla()');	
}
/*ROL*/
/*PAIS*/
function editarPais(id){
	parametros = 'id_pais='+id;
	cargarpagina('abm/am_pais.php?action=editar', parametros,'content');	
}

function submitearPais(action){
	descripcion = (document.getElementById('descripcion').value);
	id_pais = (document.getElementById('id_pais').value);

	if (descripcion.trim() == ''){
		mensaje='Ingrese Descripcion';
	}
	else{
		parametros = 'action='+action+'&id_pais='+id_pais+'&descripcion='+descripcion;
		var result = cargarpaginasinc('consultas/consultas_pais.php',parametros);
		result = result.charAt(result.length-1);
		
		if (result == 1){
			mensaje='Operacion Exitosa';	
		}
		else{
			mensaje='Operacion Fallida - Error en Base de datos';	
		}
	}
	cargarpagina('tablas/controller.pais.php', 'error='+mensaje,'content','mostrarTabla()');	
}
/*PAIS*/