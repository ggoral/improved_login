Paginador = function(divPaginador, tabla, tamPagina)
{
    this.miDiv = divPaginador; //un DIV donde irán controles de paginación
    this.tabla = tabla;           //la tabla a paginar
    this.tamPagina = tamPagina; //el tamaño de la página (filas por página)
    this.pagActual = 1;         //asumiendo que se parte en página 1
    this.paginas = Math.floor((this.tabla.rows.length - 1) / this.tamPagina); //¿?
 
    this.SetPagina = function(num)
    {
        if (num < 0 || num > this.paginas)
            return;
 
        this.pagActual = num;
        var min = 1 + (this.pagActual - 1) * this.tamPagina;
        var max = min + this.tamPagina - 1;
 
        for(var i = 1; i < this.tabla.rows.length; i++)
        {
            if (i < min || i > max)
                this.tabla.rows[i].style.display = 'none';
            else
                this.tabla.rows[i].style.display = '';
        }
        this.miDiv.firstChild.rows[0].cells[1].innerHTML = this.pagActual;
    }
 
    this.Mostrar = function()
    {
        //Crear la tabla
        var tblPaginador = document.createElement('table');
 
        //Agregar una fila a la tabla
        var fil = tblPaginador.insertRow(tblPaginador.rows.length);
 
        //Ahora, agregar las celdas que serán los controles
        var ant = fil.insertCell(fil.cells.length);
        ant.innerHTML = 'Anterior';
        ant.className = 'pag_btn'; //con eso le asigno un estilo
        var self = this;
        ant.onclick = function()
        {
            if (self.pagActual == 1)
                return;
            self.SetPagina(self.pagActual - 1);
        }
 
        var num = fil.insertCell(fil.cells.length);
        num.innerHTML = ''; //en rigor, aún no se el número de la página
        num.className = 'pag_num';
 
        var sig = fil.insertCell(fil.cells.length);
        sig.innerHTML = 'Siguiente';
        sig.className = 'pag_btn';
        sig.onclick = function()
        {
            if (self.pagActual == self.paginas)
                return;
            self.SetPagina(self.pagActual + 1);
        }
 
        //Como ya tengo mi tabla, puedo agregarla al DIV de los controles
        this.miDiv.appendChild(tblPaginador);
 
        //¿y esto por qué?
        if (this.tabla.rows.length - 1 > this.paginas * this.tamPagina)
            this.paginas = this.paginas + 1;
 
        this.SetPagina(this.pagActual);
    }
}
function mostrarTabla(){
	var p = new Paginador(
		document.getElementById('paginador'),
		document.getElementById('tblDatos'),
		15
	);
	p.Mostrar();
}


function Buscar(strCadena,strIDdeTabla){

	//seleccionamos la tabla en la que vamos a buscar
	var $objTabla=$('#'+strIDdeTabla);
	//eliminamos la fila temporal que contiene una leyenda cuando
	//la busqueda no devuelve resultados
	$objTabla.find('#trFilaConMensaje').remove();
	
	//iteramos en todas las filas del body de la tabla
	$objTabla.find('tbody tr').each(function(iIndiceFila,objFila){
		//obtenemos todas las celdas de la fila
		var $objCeldas=$(objFila).find('td');
		
		//verificamos que la fila tenga celdas
		if($objCeldas.length>0){
			var blnLaCadenaExiste=false;
			//recorremos todas las celdas de la fila actual
			$objCeldas.each(function(iIndiceCelda,objCeldaFila){
				//limpiamos la cadena que el usuario esta buscando (de caracteres que puedan chocar con
				//codigo JavaScript, lo cual genera un error en runtime)
				var objRegEx=new RegExp(RegExp.escape(strCadena),'i');
				//comparamos si la cadena buscada esta en la celda
				if(objRegEx.test($(objCeldaFila).text())){
					//indicamos que hemos encontrado la cadena
					blnLaCadenaExiste=true;
					//salimos del bucle (el de las celdas o columnas)
					return false;
				}
			});
			//si la cadena fue encontrada, entonces mostramos el contenido de la fila,
			//sino, se oculta la fila por completo
			if(blnLaCadenaExiste===true)$(objFila).show();else $(objFila).hide();
		}
	});
	
	//si no hay resultados agregamos una fila temporal para decirle al usuario que
	//no hemos encontrado lo que busca
	if($objTabla.find('tbody tr:visible').length==0){
		//obtenemos la cantidad de columnas para hacer un colspan
		var iColumnas=$objTabla.find('tbody tr:first-child td').length;
		//agregamos al cuerpo de la tabla la fila con el mensaje			
			$('<tr>',{
				id: 'trFilaConMensaje'
			}).append(
				//agregamos a la fila una celda con el mensaje
				$('<td>',{
					colspan: iColumnas,
					align: 'center',
					html: '<em>No hay resultados, intente otra b&uacute;squeda</em>'
				})
			).appendTo($objTabla.find('tbody'));
	}
}
	
//extendemos RegEx y agregamos un metodo que nos permita limpiar los caracteres
//que el usuario busca en la tabla, esto es para evitar errores de sintaxis en
//tiempo de ejecucion
RegExp.escape=function(strCadena){
	var strCaracteresEspeciales=new RegExp("[.*+?|()\\[\\]{}\\\\]", "g");
	//devolvemos la cadena limpia
	return strCadena.replace(strCaracteresEspeciales, "\\$&");
}
