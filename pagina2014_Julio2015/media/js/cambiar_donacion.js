$(document).ready(function(){
    num_comidas =  parseInt($("#num_comidas").val());
    $( "#slider" ).slider({
      value: num_comidas,
      min: 0,
      max: 10,
      step: 1,
      slide: function( event, ui ) {
        costo = parseInt(ui.value) * 35;
        $("#amount").val(costo);
        $("#num_comidas").val(ui.value);
        $("#donacion").val(costo);
        ajustabarra(ui.value);        
      } 
    });
    ajustabarra(num_comidas);
    comidas = $("#slider").slider("value");
    costo = parseInt($("#slider").slider("value")) * 35;

    $("#acepto_tc").prop('checked', false);
    $("#amount").val(costo);
    $("#num_comidas").val(comidas);
    
    $('#guardaCambiosBtn').click(function() {
        donacion = $("input[name|='cantidad']").val();
        if(donacion <= 0){
          alert("Cantidad no válida");
          return;
        }else{
          $("form").submit();
        }
    });

    $("#otraCant").click(function(){
      $("form").attr("action",base+"index.php/yo_apadrino/cambiar_cantidad");
      $("form").submit();
    })

    $("#baja").click(function(){
      $("form").attr("action",base+"index.php/yo_apadrino/baja");
      $("form").submit();
    })

    $('#apadrinarBtn').click(function() {
        donacion = $("input[name|='cantidad']").val();
        if($("#acepto_tc").is(':checked')){
          $("form").submit();
        }else{
          alert("acepta el descuento vía nómina");
        }
    });    
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