$(document).ready(function(){
    $("#enviar").click(function() {
        var html = $("iframe").contents().find("body").html();
        $("#html").val(html);
    });
});
function creaPDF(){
   //console.log($("iframe").contents().find("body").html());
   var html = $("iframe").contents().find("body").html();
    //var post = JSON.stringify({html:html});
    $.ajax({
        type: "POST",
        contentType: 'application/json; charset=utf-8',
        url: "carta/creaPDF/",
        data: {html:html, img:img},
        dataType:"jsonp",
        cache:true

    }).done(function(response){
            alert("sucess");
            //console.log(response);

        }).fail(function(response){
            alert( "error");
            console.log(response);
        });

}

function confirmaCarta(){
    $("#text-dialog").show();
    $( "#dialog" ).show();
    $( "#dialog" ).dialog();
        $(function() {
            $("#dialog-confirm").dialog({
                resizable: false,
                height:180,
                modal: true,
                buttons: {
                    "Enviar": function() {
                        var html = $("iframe").contents().find("body").html();
                        var nombreNino = $("#nombreNino").val();
                        var nombrePadrino = $("#nombrePadrino").val()
                        var img = $("input[name='img']:checked").val();
                        $.ajax({
                            type: "POST",
                            url: "carta/creaPDF/",
                            data: {html:html, nombreNino:nombreNino, nombrePadrino:nombrePadrino, img:img}

                        }).done(function(response){
                                window.location = base + "index.php/carta/cartaEnviada";
                                console.log(nombreNino);
                                console.log(nombrePadrino);
                                //console.log(response);

                            }).fail(function(response){
                                alert( "Error al enviar la carta");
                                console.log(response);
                            });

                        $( this ).dialog( "close" );
                    },
                    Cancel: function() {
                        $( this ).dialog( "close" );
                    }
                }
            });

    });
}
