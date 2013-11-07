var tabInicial = 1;
$(document).on("ready", main);

function main(){
	$(".tabContent").hide();
	$("#tabs a").on("click", abrirTab);
	$(".tabContent").eq(tabInicial - 1 ).fadeIn();
	$("#tabs a").eq(tabInicial -1).addClass("tabActual");
}

function abrirTab(){
	$(".tabContent").hide();
	$("#tabs a").removeClass("tabActual");
	$(".tabContent").eq($(this).index()).fadeIn();
	$(this).addClass("tabActual");
	return false;
} 