<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modifica donación</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
    <link href="<?= base_url()?>media/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url()?>media/css/general.css" rel="stylesheet">
    <link href="<?= base_url()?>media/css/yo_apadrino.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
     <script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
    <script src="<?= base_url()?>media/bootstrap/js/bootstrap.min.js"></script>
    <script> base = "<?= base_url() ?>"</script>
    <script src="<?= base_url()?>media/js/cambiar_donacion.js"></script>
    <script src="<?= base_url()?>media/js/jquery.numeric.js"></script>
  </head>
  <body>
    <div class="wrapper">
      <?= $header ?>
      <div class="row">
        <div class="col-md-10 col-sm-offset-1">
          <h1 class="omnes"><label class="naranja bold">Modifica tu aportación</label><label class="h1azul padddingLeft">o da de baja tu apadrinamiento</label></h1>
        </div>
        <div class="col-md-12"><hr></div>
        <div class="col-md-12 text-center">
          <?php
            if($donacion == -1){
              $donacion = "Desconocido";
            }
          ?>
          <h2 class="naranja bold omnes">Hoy, tu aportación quincenal es de $ <?= $donacion ?></h2>
          <p class="azul">Para cambiar o  dar de baja tu aportación, desliza la barra</p> 
        </div>
        <div class="col-md-12">
        <form method="post" action="<?= base_url()?>index.php/yo_apadrino/cambio">
          <div class="col-md-12" id="comidas_slider">
            <div id="slider"></div>
            <div id="descripcion" class="col-md-12">
              <div class="col-md-12 sinPadding">
                <div class="col-md-10 sinPadding outsideBottom alineaDerecha">
                  <label id="lamout" for="amount" class="azul alineaBottom">Quincenalmente, vía nómina se te descontará:</label>
                </div>
                <div class="col-md-2">
                  <div class="col-md-5"><label class="sPeso bold">$</label></div>
                  <div class="col-md-7 sinPadding"><input type="text" class="bold sPeso" name="cantidad" id="amount" readonly/></div>
                  <input type="hidden" name="num_comidas" id="num_comidas" value="<?= $comidas ?>"/>
                  <input type="hidden" name="donacion" id="donacion" value="<?= $donacion ?>" />
                </div>
              </div>
              <div class="col-md-12 sinPadding">
                <div class="col-md-12 sinPadding outsideBottom">
                  <label class="azul alineaDerecha">Si deseas aportar una cantidad distinta, <label id="otraCant">da clic aquí</label></label>
                </div>
              </div>
            </div>
          </div> <!--comidas slider -->
          <div class="col-md-12" id="terminos">
              <div class="col-md-7">
                <label class="termL azul col-md-12 text-right" href="">Leer términos y condiciones</label>
                <div class="text-right" align="right">
                  <input id="acepto_tc" type="checkbox" value="acepto_tc">
                  <label class="azul termCond">Acepto el descuento vía nómina quincenal</label>
                </div>
              </div>
              <div class="col-md-5">
                <div class="">
                  <input id="apadrinarBtn" type="button" value="Guardar cambios" class="boton">
                </div>
              </div>
          </div>

        </form>
        </div> <!--col md 12 -->
      </div> <!-- row-->
      <?= $terminoscondiciones ?>

    </div> <!--wrapper-->
  </body>
  <?= $footer ?>
</html>