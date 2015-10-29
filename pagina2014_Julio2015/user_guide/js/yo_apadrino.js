$(document).ready(function(){
	  $( "#slider" ).slider({
  		value:1,
  		min: 0,
  		max: 10,
  		step: 1,
      slide: function( event, ui ) {
        costo = parseInt(ui.value) * 35;
        $("#amount").val(costo);
        $("#descuentoVN").html(costo);
        ajustabarra(ui.value);
      } 
    });
    comidas = $("#slider").slider("value");
    costo = parseInt($("#slider").slider("value")) * 35;
    $("#acepto_tc").prop('checked', false);
    $("#descuentoVN").html(costo);
    $("#amount").val(costo);
    $("#cantidad").numeric(",");
    
    $('#apadrinarBtn').click(function() {
        donacion = $("input[name|='cantidad']").val();
        if($("#acepto_tc").is(':checked') && donacion > 0){
          $("form").submit();
        }else{
          if(donacion <= 0){
            alert("no se permite esta cantidad");
            return;
          }
          alert("acepta el descuento vía nómina");
        }
    });

    $("#otraCant").click(function(){
      $("form").attr("action",base+"index.php/yo_apadrino/donar_otra_cantidad");
      $("form").submit();
    })
})

function ajustabarra(i){
  if(i == 0){
    $(".ui-slider-horizontal .ui-slider-handle").css("margin-left", "0px");
  }
  if(i == 3){
    $(".ui-slider-horizontal .ui-slider-handle").css("margin-left", "-18px");
  }
  if(i == 5){
    $(".ui-slider-horizontal .ui-slider-handle").css("margin-left", "-22px");
  }
  if(i == 10){
    $(".ui-slider-horizontal .ui-slider-handle").css("margin-left", "-35px");
  }

}
