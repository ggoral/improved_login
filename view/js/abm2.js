function showInfo(id, tabla){
	parametros = 'id_'+tabla+'='+id;
	cargarpagina('abm/vista_'+tabla+'.php?action=vista', parametros,'content');	
}

function editarForm(id, tabla){
	parametros = 'id_'+tabla+'='+id;
	cargarpagina('abm/am_'+tabla+'.php?action=editar', parametros,'content');	
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
				mensaje='Operacion Fallida - Error al insertar Analito/s';	
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
				mensaje='Operacion Fallida - Complete todos los campos correctamente';	
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

/*CIUDAD*/
function submitearFormCiudad(action, tabla){
	descripcion = (document.getElementById('descripcion').value);
	id_elemento = (document.getElementById('id_'+tabla).value);
	codpostal = (document.getElementById('codpostal').value);
	id_pais = ($('#pais').val());	//OBTENGO TODOS LOS ID SEPARADOS POR "," AUNQ ES SOLO 1
	error=false;
	if (descripcion.trim() == ''){ 
		mensaje='Ingrese Descripcion';
		error=true;
	}
	else{
		if (codpostal.trim() == ''){ 
			mensaje='Ingrese Código Postal';
			error=true;
		}
		else{
			if (id_pais == null){
				mensaje='Seleccione un País';
				error=true;
			}
			else{
				parametros = 'action='+action+'&id_'+tabla+'='+id_elemento+'&descripcion='+descripcion+'&pais='+id_pais+'&codpostal='+codpostal;
				var result = cargarpaginasinc('consultas/consultas_'+tabla+'.php',parametros);
				
				switch(result)
				{
				case '1':
					mensaje='1';
					break;
				case '3':
					error=true;
					mensaje='Operacion Fallida - Error de Actualización';	
					break;
				case '4':
					error=true;
					mensaje='Operacion Fallida - Ciudad ya existente';	
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

/*CIUDAD*/

/*USUARIO*/
function submitearFormUsuario(action, tabla){
	username = (document.getElementById('username').value);
	password = (document.getElementById('password').value);
	email = (document.getElementById('email').value);
	rol = ($('#rol').val())
	activo = (document.getElementById('activo').checked);
	id_elemento = (document.getElementById('id_'+tabla).value);
	
	error=false;
	
	if (username.trim() == ''){ 
		mensaje='Ingrese Nombre de Usuario';
		error=true;
	}
	else{
		if (password.trim() == ''){ 
			mensaje='Ingrese Contraseña';
			error=true;
		}
		else{
			if (rol == null){ 
				mensaje='Seleccione Rol de Usuario';
				error=true;
			}
			else
			{
				if(!validarEmail(email)){
					mensaje='Ingrese un mail válido';
					error=true;
				}
				else{
					parametros = 'action='+action+'&id_'+tabla+'='+id_elemento+'&username='+username+'&password='+password+'&rol='+rol+'&activo='+activo+'&email='+email;
					var result = cargarpaginasinc('consultas/consultas_'+tabla+'.php',parametros);
					
					switch(result)
					{
					case '1':
						mensaje='1';
						break;
					case '3':
						error=true;
						mensaje='Operacion Fallida - Error de Actualización';	
						break;
					case '4':
						error=true;
						mensaje='Operacion Fallida - Usuario ya existente';	
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
	}
	if (!error){
		cargarpagina('tablas/controller.'+tabla+'.php', 'error='+mensaje,'content','mostrarTabla();desapar();');	
	}else{
		aparDesapar();
		return false;
	}
}

function validarEmail( email ) {
     if (email.trim() == '')
		return true;
	var atpos=email.indexOf("@");
	var dotpos=email.lastIndexOf(".");
	if (atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length)
	{
		return false;
	}
	return true;
   
}

/*USUARIO*/

/*LABORATORIO*/
function submitearFormLaboratorio(action, tabla){
	codlab = (document.getElementById('cod_lab').value);
	institucion = (document.getElementById('institucion').value);
	sector = (document.getElementById('sector').value);
	responsable = (document.getElementById('responsable').value);
	domicilio = (document.getElementById('domicilio').value);
	domicilio_corresp = (document.getElementById('domicilio_corresp').value);
	email = (document.getElementById('mail').value);
	tel = (document.getElementById('tel').value);
	coordx = (document.getElementById('coord_x').value);
	coordy = (document.getElementById('coord_y').value);
	estado = (document.getElementById('estado').checked);
	tipolab = ($('#tipo_lab').val());
	ciudad = ($('#ciudad').val());
	id_elemento = (document.getElementById('id_'+tabla).value);
	
	error=false;
	
	if (codlab.trim() == ''){ 
		mensaje='Ingrese Código de Laboratorio';
		error=true;
	}
	else{
		if (institucion.trim() == ''){ 
			mensaje='Ingrese Institución';
			error=true;
		}
		else{
			if (sector.trim() == ''){ 
				mensaje='Ingrese Sector';
				error=true;
			}
			else{
				if (responsable.trim() == ''){ 
					mensaje='Ingrese Responsable';
					error=true;
				}
				else{
					if (domicilio.trim() == ''){ 
						mensaje='Ingrese Domicilio';
						error=true;
					}
					else{
						if (domicilio_corresp.trim() == ''){ 
							mensaje='Ingrese Domicilio de Correspondencia';
							error=true;
						}
						else{
							if(!validarEmail(email)){
								mensaje='Ingrese un mail válido';
								error=true;
							}
							else{
								if(isNaN(tel)){
									mensaje='Ingrese un telefono válido';
									error=true;
								}
								else{
									if(isNaN(coordx)){
										mensaje='Ingrese coordenada x válida';
										error=true;
									}
									else{
										if(isNaN(coordy)){
											mensaje='Ingrese coordenada y válida';
											error=true;
										}
										else{
											if (tipolab == null){ 
												mensaje='Seleccione Tipo de Laboratorio';
												error=true;
											}
											else{
												if (ciudad == null){ 
													mensaje='Seleccione Ciudad';
													error=true;
												}
												else{
													parametros = 'action='+action+'&id_'+tabla+'='+id_elemento+'&cod_lab='+codlab+'&institucion='+institucion+'&sector='+sector+'&responsable='+responsable+'&domicilio='+domicilio+'&domicilio_corresp='+domicilio_corresp+'&email='+email+'&tel='+tel+'&coord_x='+coordx+'&coord_y='+coordy+'&estado='+estado+'&tipo_lab='+tipolab+'&ciudad='+ciudad;
													var result = cargarpaginasinc('consultas/consultas_'+tabla+'.php',parametros);
													
													switch(result)
													{
													case '1':
														mensaje='1';
														break;
													case '2':
														error=true;
														mensaje='Operacion Fallida - Error de creacion de Rol';	
														break;	
													case '3':
														error=true;
														mensaje='Operacion Fallida - Error de Actualización';	
														break;
													case '4':
														error=true;
														mensaje='Operacion Fallida - Laboratorio ya existente';	
														break;
													case '5':
														error=true;
														mensaje='Operacion Fallida - Complete todos los campos correctamente';	
														break;
													case '6':
														error=true;
														mensaje='Operacion Fallida - Fechas Incorrectas';	
														break;
													default:
														error=true;
														alert(result);
														mensaje='Operacion Fallida - Error en Base de datos';	
													}
												}
											}
										}
									}
								}
							}
						}
					}	
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

/*LABORATORIO*/

/*SELECT*/
function changeSelectAnalito(){
	idanalito = ($('#analito').val());
	parametros = 'analito='+idanalito;
	var result = cargarpaginasinc('consultas/consultas_select.php',parametros);
	document.getElementById('selects').innerHTML = result;
													
}
/*SELECT*/
/*RESULTADOS*/
function submitearFormResultado(action, tabla){
	comentario = (document.getElementById('comentario').value);
	fecha_recepcion = (document.getElementById('fecha_recepcion').value);
	fecha_analisis = (document.getElementById('fecha_analisis').value);
	fecha_ingreso = (document.getElementById('fecha_ingreso').value);
	id_lab = ($('#laboratorio').val());
	id_metodo = ($('#metodo').val());
	id_reactivo = ($('#reactivo').val());
	id_calibrador = ($('#calibrador').val());
	id_analito = ($('#analito').val());
	id_papel_filtro = ($('#papel_filtro').val());
	id_valor_corte = ($('#valor_corte').val());
	id_elemento = (document.getElementById('id_'+tabla).value);

	error=false;

	if (id_lab == null){ 
		mensaje='Seleccione Tipo de Laboratorio';
		error=true;
	}
	else{
		if ((id_analito == null)||(id_analito.trim() == '')){ 
			mensaje='Seleccione Analito';
			error=true;
		}
		else{
			if (id_metodo == null){ 
				mensaje='Seleccione Método';
				error=true;
			}
			else{
				if (id_reactivo == null){ 
					mensaje='Seleccione Reactivo';
					error=true;
				}
				else{
					if (id_calibrador == null){ 
						mensaje='Seleccione Calibrador';
						error=true;
					}
					else{
						if (id_papel_filtro == null){ 
							mensaje='Seleccione Papel de Filtro';
							error=true;
						}
						else{
							if (id_valor_corte == null){ 
								mensaje='Seleccione Valor de Corte';
								error=true;
							}
							else{
								parametros = 'action='+action+'&id_'+tabla+'='+id_elemento+'&comentario='+comentario+'&fecha_recepcion='+fecha_recepcion+'&fecha_ingreso='+fecha_ingreso+'&fecha_analisis='+fecha_analisis+'&id_lab='+id_lab+'&id_analito='+id_analito+'&id_metodo='+id_metodo+'&id_reactivo='+id_reactivo+'&id_calibrador='+id_calibrador+'&id_papel_filtro='+id_papel_filtro+'&id_valor_corte='+id_valor_corte;
								
								var result = cargarpaginasinc('consultas/consultas_'+tabla+'.php',parametros);

								switch(result)
								{
								case '1':
									mensaje='1';
									break;
								case '3':
									error=true;
									mensaje='Operacion Fallida - Error de Actualización';	
									break;
								case '4':
									error=true;
									mensaje='Operacion Fallida - Resultado ya existente';	
									break;
								case '5':
									error=true;
									mensaje='Operacion Fallida - Complete todos los campos correctamente';	
									break;
								default:
									error=true;
									alert(result);
									mensaje='Operacion Fallida - Error en Base de datos';	
								}
							}							
						}
					}
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
/*RESULTADOS*/