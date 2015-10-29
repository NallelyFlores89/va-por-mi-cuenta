mesNac = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];

$(document).ready(function(){
	infoNinoEspecial();
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
			alert("consulta no válida");
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
						alert("no hay datos");
					}else{
						$(".ninosSliderWrap").html(data);
					}
				},
			});
		}
}
function consulta2(){
		if($("#dia").val() == -1 && $("#mes").val() == -1){
			alert("consulta no válida");
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
						alert("no hay datos");
					}else{
						$(".ninosSliderWrap").html(data);
					}
				},
			});
		}
}

function infoNinoEspecial(){
	$.ajax({
		url : base + 'index.php/apadrina/ninoEspecial_ajax/'+$(".ninoEspecial").val(),
		dataType: "json",
		async:false,
		success : function(data){
			if(data == -1){
			}else{
				idnino = data.idninos;
				img = base + "media/img/ninos/" + data.foto;
				msj = "Me llamo " + data.nombre + " y asisto al comedor " + data.nombre_comedor;
				$(".fotoNino").attr("src",img);
				$(".mensajeNinoChild").html('"'+msj+'"');
				$(".bn_nombre").html(data.nombre + " " + data.apat + " " + data.amat);
				$(".bn_genero").html(data.genero);
				$(".bn_fn").html(data.fNacDia + " - " + mesNac[data.fNacMes-1]  + " - " + data.fNacAno);
				$(".bn_edad").html(2014-data.fNacAno);
				$(".bn_edad").html(2014-data.fNacAno);
				$(".bn_comedor").html(data.nombre_comedor);
				$(".ninoEspecial").val(data.idninos);
				if(data.apadrinado == "1"){
					$(".apadrinaNinoBtn").val("Ya tengo padrino").attr("disabled","disabled").addClass("botonYaPadrino").removeClass("boton");
				}else{
					$(".apadrinaNinoBtn").val("Apadrinar").removeAttr("disabled").addClass("boton").removeClass("botonYaPadrino");
				}

			}
		}
	});
}

function ninoSiguiente(){
		$.ajax({
		// url : base + 'index.php/apadrina/siguiente_nino_ajax/'+$(".ninoEspecial").val(),
		url : base + 'index.php/apadrina/siguiente_nino_ajax',
		dataType: "json",
		async:false,
		success : function(data){
			if(data == false){
			}else{
				idnino = data.idninos;
				img = base + "media/img/ninos/" + data.foto;
				msj = "Me llamo " + data.nombre + " y asisto al comedor " + data.nombre_comedor;
				$(".fotoNino").attr("src",img);
				$(".mensajeNinoChild").html('"'+msj+'"');
				$(".bn_nombre").html(data.nombre + " " + data.apat + " " + data.amat);
				$(".bn_genero").html(data.genero);
				$(".bn_fn").html(data.fNacDia + " - " + mesNac[data.fNacMes-1]  + " - " + data.fNacAno);
				$(".bn_edad").html(2014-data.fNacAno);
				$(".bn_comedor").html(data.nombre_comedor);				
				$(".ninoEspecial").val(idnino);
				if(data.apadrinado == "1"){
					$(".apadrinaNinoBtn").val("Ya tengo padrino").attr("disabled","disabled").addClass("botonYaPadrino").removeClass("boton");
				}else{
					$(".apadrinaNinoBtn").val("Apadrinar").removeAttr("disabled").addClass("boton").removeClass("botonYaPadrino");
				}				
			}
		}
	});
}

function ninoAnterior(){
		$.ajax({
		url : base + 'index.php/apadrina/anterior_nino_ajax',
		// url : base + 'index.php/apadrina/anterior_nino_ajax/'+$(".ninoEspecial").val(),
		dataType: "json",
		async:false,
		success : function(data){
			if(data == false){
			}else{
				idnino = data.idninos;
				img = base + "media/img/ninos/" + data.foto;
				msj = "Me llamo " + data.nombre + " y asisto al comedor " + data.nombre_comedor;
				$(".fotoNino").attr("src",img);
				$(".mensajeNinoChild").html('"'+msj+'"');
				$(".bn_nombre").html(data.nombre + " " + data.apat + " " + data.amat);
				$(".bn_genero").html(data.genero);
				$(".bn_fn").html(data.fNacDia + " - " + mesNac[data.fNacMes-1] + " - " + data.fNacAno);
				$(".bn_edad").html(2014-data.fNacAno);
				$(".bn_comedor").html(data.nombre_comedor);				
				$(".ninoEspecial").val(idnino);
				if(data.apadrinado == "1"){
					$(".apadrinaNinoBtn").val("Ya tengo padrino").attr("disabled","disabled").addClass("botonYaPadrino").removeClass("boton");
				}else{
					$(".apadrinaNinoBtn").val("Apadrinar").removeAttr("disabled").addClass("boton").removeClass("botonYaPadrino");
				}				
			}
		}
	});
}