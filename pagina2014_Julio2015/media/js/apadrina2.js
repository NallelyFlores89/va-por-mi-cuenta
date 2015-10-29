mesNac = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];

$(document).ready(function(){
	$(".anterior").click(function(){
		ninoAnterior();
	});

	$(".siguiente").click(function(){
		ninoSiguiente();
	});
	$(".dropdownInicio").val(-1).attr("selected",-1);
	$("#dia, #mes, #buscar2").prop('disabled','disabled');
	$("#genero, #edad, #comedor, #buscar").removeAttr('disabled');
	
	$("#rad1").attr('checked', 'checked');
	$("input[type='radio']").click(function(){
	  if ($(this).val() == 'busc1'){
	  	$("#dia, #mes, #buscar2").prop('disabled','disabled');
	  	$("#genero, #edad, #comedor, #buscar").removeAttr('disabled');
	  }else{
	  	$("#genero, #edad, #comedor, #buscar").prop('disabled','disabled');
	  	$("#dia, #mes, #buscar2").removeAttr('disabled');
	  }
	});
})

function consulta1(){
		if($("#genero").val() == -1 && $("#edad").val() == -1 && $("#comedor").val()==-1){
			alert("Consulta no válida");
		}else{
			var genero = $("#genero").val();
			var edad = $("#edad").val();
			var dia = -1;
			var mes = -1;
			var comedor = $("#comedor").val();
			$.ajax({
				url : base + 'index.php/apadrina/consulta/'+genero+'/'+edad+'/'+dia+'/'+mes+'/'+comedor,
				dataType: "json",
				async:false,
				success : function(data){
					if(!data){
						alert("No encontramos resultados, por favor realiza una nueva búsqueda");
					}else{
						$(".ninosSliderWrap").html(data);
					}
				},
			});
		}
}
function consulta2(){
		if($("#dia").val() == -1 && $("#mes").val() == -1){
			alert("Consulta no válida");
		}else{
			var genero = -1;
			var edad = -1;
			var dia = $("#dia").val();
			var mes = $("#mes").val();
			var comedor = -1;
			$.ajax({
				url : base + 'index.php/apadrina/consulta/'+genero+'/'+edad+'/'+dia+'/'+mes+'/'+comedor,
				dataType: "json",
				async:false,
				success : function(data){
					if(!data){
						alert("No encontramos resultados, por favor realiza una nueva búsqueda");
					}else{
						$(".ninosSliderWrap").html(data);
					}
				},
			});
		}
}

function ninoSiguiente(){
	num = parseInt($("#numPaginacion").val())
	if(num < 1000){
		var i = parseInt($("#numPaginacion").val()) + 1;
	}
	var nombre = $("#info-"+i).children(".info-nombre").val();
	var foto = $("#info-"+i).children(".info-foto").val();
	var edad = $("#info-"+i).children(".info-edad").val();
	var comedor = $("#info-"+i).children(".info-comedor").val();
	var genero = $("#info-"+i).children(".info-sexo").val();
	var fnac = $("#info-"+i).children(".info-fechaNac").val();
	var idnino = $("#info-"+i).children(".info-id").val();
	var estado = $("#info-"+i).children(".info-estado").val();
	img = base + "media/img/ninos/" + foto;
	msj = "Me llamo " + nombre + " y asisto al comedor " + comedor;
	if(estado == 1){
		$(".apadrinaNinoBtn").removeClass("boton").addClass("botonYaPadrino").val("Ya tengo padrino").attr("disabled","disabled");
	}else{
		$(".apadrinaNinoBtn").removeClass("botonYaPadrino").addClass("boton").val("Apadrinar").removeAttr("disabled");

	}
	$(".fotoNino").attr("src",img);
	$(".mensajeNinoChild").html('"'+msj+'"');
	$(".bn_nombre").html(nombre);
	$(".bn_genero").html(genero);
	$(".bn_fn").html(fnac);
	$(".bn_edad").html(edad);
	$(".bn_comedor").html(comedor);	
	$(".ninoEspecial").val(idnino);
	$("#numPaginacion").val(i);
}

function ninoAnterior(){
	num = parseInt($("#numPaginacion").val())
	if(num >= 0){
		var i = parseInt($("#numPaginacion").val()) + 1;
	}
	var nombre = $("#info-"+i).children(".info-nombre").val();
	var foto = $("#info-"+i).children(".info-foto").val();
	var edad = $("#info-"+i).children(".info-edad").val();
	var comedor = $("#info-"+i).children(".info-comedor").val();
	var genero = $("#info-"+i).children(".info-sexo").val();
	var fnac = $("#info-"+i).children(".info-fechaNac").val();
	var idnino = $("#info-"+i).children(".info-id").val();

	img = base + "media/img/ninos/" + foto;
	msj = "Me llamo " + nombre + " y asisto al comedor " + comedor;
	$(".fotoNino").attr("src",img);
	$(".mensajeNinoChild").html('"'+msj+'"');
	$(".bn_nombre").html(nombre);
	$(".bn_genero").html(genero);
	$(".bn_fn").html(fnac);
	$(".bn_edad").html(edad);
	$(".bn_comedor").html(comedor);	
	$(".ninoEspecial").val(idnino);	
	$("#numPaginacion").val(i);
}