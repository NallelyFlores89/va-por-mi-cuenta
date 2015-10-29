$(document).ready(function(){
	$("#apadrinar").click(function(){
		apadrinarNino()
	})
})

function apadrinarNino(){
	url = base + 'index.php/apadrina/nino/'+$("#idnino").val();
	window.location = url;

}