var divClonado= new Array();

function creaAjax(){
  var objetoAjax=false;
  try {
   /*Para navegadores distintos a internet explorer*/
   objetoAjax = new ActiveXObject("Msxml2.XMLHTTP");
  } catch (e) {
   try {
     /*Para explorer*/
     objetoAjax = new ActiveXObject("Microsoft.XMLHTTP");
     } 
     catch (E) {
     objetoAjax = false;
   }
  }

  if (!objetoAjax && typeof XMLHttpRequest!='undefined') {
   objetoAjax = new XMLHttpRequest();
  }
  return objetoAjax;
}

function cargarpagina(pagina, parametros, div, funcion) {
	var ajax = creaAjax();

	ajax.open ('POST', pagina, true);
	cargando = document.getElementById('cargando');
	if(cargando!=null)
	      cargando.style.display='block';

	ajax.onreadystatechange = function() {

		if ((ajax.readyState == 4) && (ajax.status == 200)) 
			 {
				 /*if(ajax.responseText=='__SESSION__EXPIRED__')
					{
						document.getElementById('sessionExpired').value='si';
						document.getElementById('frmSalir').submit();
					}	
			
				 else
					 {*/
						 if(cargando!=null)
							  cargando.style.display='none';
						 
						 document.getElementById(div).innerHTML = ajax.responseText;
						
						 if(funcion!=null)
							   eval(funcion);
				   
					 /*}*/
	   
					}
			  }

	ajax.setRequestHeader('Content-Type','application/x-www-form-urlencoded');

	ajax.send(parametros);

	return;
}

function cargarpaginasinc(pagina, parametros)
{		
	  cargando = document.getElementById('cargando');
	  if(cargando!=null)
		   cargando.style.display='block';
	  
	  var ajax=creaAjax();
	  ajax.open ('POST', pagina, false);
	  ajax.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
	  ajax.send(parametros);

	 /* if(ajax.responseText=='__SESSION__EXPIRED__')
		 {
			document.getElementById('sessionExpired').value='si';
			document.getElementById('frmSalir').submit(); 
		 }	*/
	  
	  if(cargando!=null)
			 cargando.style.display='none';
	  
	  return ajax.responseText;
}

function reset()
    {
       divClonado= new Array();

    }	
	
function clonarDiv(div)
{
    if(divClonado.length>5)
	    divClonado.splice(0, divClonado.length);
	//DECLARO VARIABLES
	var divOriginal = null;
	var varDiv = null;
	var combo = null;
	var comboCopia = null;
	var i;

	//RECUPERO VALORES DEL DIV
	divOriginal = document.getElementById(div);
	//CLONO EL DIV
	varDiv = divOriginal.cloneNode(true);


	var largo= divClonado.length;
	divClonado[largo]= varDiv;	   
}

function rearmarDiv(div)
{
	//DECLARO Y RECUPERO EL NODO PADRE DEL DIV
	var nodoPadre = document.getElementById(div).parentNode;
	var largo= divClonado.length;
	nodoPadre.replaceChild(divClonado[(largo-1)], document.getElementById(div));	//VER ACA PARA Q VUELVA AL ANTERIOR SIN HACER 2 CLICKS -->LARGO-2
	divClonado.splice((largo-1),1);
}
