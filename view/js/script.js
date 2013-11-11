$(document).on("ready", main);

function main(){
	$("#menu a").on("click", irA);
	$(window).scroll(scrollMenu);
	$("#loginError").mouseover($("#loginError").delay(1000).fadeOut(1000));
}

function moveAnimate(){
    $(this).animate({bot:'250px'},{right:'250px'});
}

function irA(){
	var seccion = $(this).attr("href");
	$("body, html").animate({
		scrollTop: $(seccion).offset().top -140
	}, 800);

	return false;
}



function scrollMenu(){
	var secciones = [$("#inicio").offset().top,$("#servicios").offset().top,$("#trabajo").offset().top,$("body").height()];
	//alert(secciones[]);

	if($(this).scrollTop() > secciones[0]-180 && $(this).scrollTop() < secciones[1]-180){
		$("#menu a").eq(2).removeClass("logo2");
	}else{
		$("#menu a").eq(2).addClass("logo2");
	};

	if($(this).scrollTop() > secciones[1]-180 && $(this).scrollTop() < secciones[2]-180){
		$("#menu a").eq(1).addClass("seleccionado2");
		$("h2").eq(0).addClass("header2");
	}else{
		$("#menu a").eq(1).removeClass("seleccionado2");
		$("h2").eq(0).removeClass("header2");
	};

	if($(this).scrollTop() > secciones[2]-180 && $(this).scrollTop() < secciones[3]-180){
		$("#menu a").eq(3).addClass("seleccionado4");
		$("h2").eq(1).addClass("header3");
	}else{
		$("#menu a").eq(3).removeClass("seleccionado4");
		$("h2").eq(1).removeClass("header3");

	};

	return false;
}