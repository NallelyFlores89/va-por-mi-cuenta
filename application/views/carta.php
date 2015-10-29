<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Va por mi cuenta</title>

    <link href="<?= base_url()?>media/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url()?>media/css/general.css" rel="stylesheet">
    <link href="<?= base_url()?>media/css/index.css" rel="stylesheet">
    <link href="<?= base_url()?>media/css/estilos.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>

    <script src="<?= base_url()?>media/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= base_url()?>media/js/inicio.js"></script>

    <link rel="Stylesheet" type="text/css" href="<?= base_url()?>jHtmlArea/style/jHtmlArea.css">
    <script type="text/javascript" src="<?= base_url()?>jHtmlArea/scripts/jHtmlArea-0.8.js"></script>
    <script> base = "<?= base_url() ?>"</script>
    <script type="text/javascript" src="<?= base_url()?>media/js/carta.js"></script>

    <script src="<?= base_url()?>media/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= base_url()?>media/js/inicio.js"></script>
    <script>
        $( document ).ready(function() {
            $("#text-dialog").hide();
            $( "#dialog" ).hide();
        });
        function espere(){
            $( "#dialog" ).show();
            $( "#dialog" ).dialog();
        }
    </script>
</head>
<body>
<!--<div class="wrapper">-->

<?php
include("header.php");
$browser = getenv("HTTP_USER_AGENT");
$explorer = preg_match("/MSIE/i", "$browser");
?>



<div class="container carta">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h2 class="text-center tituloCarta"><span class="textoNaranja negritas">Escribe</span> <span class="textoAzul negritas">una carta a tu niño</span></h2>
            <br>
            <?php
            if ($explorer)
            {
                ?>
                <?php echo form_open('carta/creaPDF/'); ?>
                <?php

            }
            ?>
            <!--
                <br>-->
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 col-md-offset-1 col-lg-offset-1">
                        <p class="pull-right">Mi niño es:</p>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
                        <?php
                        $nombreNino = $nino["nombre"]." ".$nino["apat"]." ".$nino["amat"];
                        ?>
                        <input type="text" id="nombreNino" name="nombreNinoAux" class="textoAzul" value="<?= $nombreNino ?>" size="50" DISABLED>
                                <input type="hidden" name="nombreNino" class="textoAzul" value="<?= $nombreNino ?>" size="50">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 col-md-offset-1 col-lg-offset-1">
                        <p class="pull-right">Carta:</p>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 miCarta">
                        <textarea id="cartaText" name="html" rows="10" cols="110"> </textarea>
                        <script>
                            $('textarea').htmlarea({
                                toolbar: [
                                    "bold", "italic", "underline",
                                    "|",
                                    "justifyleft", "justifycenter", "justifyright"
                                ]
                            });

                        </script>
                    </div>

                    <div class="row">
                        <div class="container">
                            <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 col-md-offset-1 col-lg-offset-1">
                                <p class="pull-right">Atentamente:</p>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
                                <input type="text" id="nombrePadrino" class="textoAzul" name="nombrePadrinoAux" value="<?= $padrino['nombre']; ?>" size="50" DISABLED>
                                          <input type="hidden" class="textoAzul" name="nombrePadrino" value="<?= $padrino['nombre']; ?>" size="50">
                            </div>
                        </div>
                    </div>

                    <br>
                    <div class="row">
                        <div class="container">
                            <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 col-md-offset-3 col-lg-offset-3">
                                <label class="textoAzul">Seleccione un estilo de carta</label>
                                <div class="row">
                                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 text-center">
                                        <img src="<?= base_url('media/img/carta-generica.png')?>">
                                        <br>
                                        <input type="radio" name="img" value="carta-generica-pdf.png"><br>
                                    </div>

                                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 text-center">
                                        <img src="<?= base_url('media/img/carta-nina.png')?>">
                                        <br>
                                        <input type="radio" name="img" value="carta-nina-pdf.png"><br>
                                    </div>

                                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 text-center">
                                        <img src="<?= base_url('media/img/carta-nino.png')?>">
                                        <br>
                                        <input type="radio" name="img" value="carta-nino-pdf.png"><br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                            <input type="hidden" id="idPadrino" name="idPadrino" value="<?= $padrino['num_empleado']?>">
                    <input type="hidden" id="idNino" name="idNino" value="<?= $nino['idninos']?>">
                    <?php
                    if ($explorer)
                    {
                        ?>
                        <textarea id="html" name="html2" rows="10" cols="110" hidden> </textarea>
                        <div class="">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
                                    <input type="submit" value="Enviar" onclick="espere()"  class="btn btn-primary boton login pull-right"/>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    else
                    {
                        ?>
                        <div class="">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 enviaCarta">
                                <input id="enviar" type="submit" value="Enviar" onclick="confirmaCarta()" class="btn btn-primary boton login pull-right"/>
                            </div>
                        </div>

                        <?php
                    }
                    ?>
                </div>
            <div id="dialog-confirm" title="Empty the recycle bin?">
                <p id="text-dialog"><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>¿Esta seguro que desea enviar su carta?</p>
            </div>

            <div id="dialog" title="Basic dialog">
                <p>Tu carta se está enviando, espera un momento por favor.</p>
            </div>
            <?php
            if ($explorer)
            {
                ?>
                </form>
                <?php
            }
            ?>
        </div>
    </div>
</div>


<?php
include("footer.php");
?>
</body>
</html>
