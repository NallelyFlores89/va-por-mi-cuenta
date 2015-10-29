<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Apadrinar</title>
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
    <script src="<?= base_url()?>media/js/yo_apadrino.js"></script>
    <script src="<?= base_url()?>media/js/jquery.numeric.js"></script>
  </head>
  <body>
    <div class="wrapper">
      <?= $header ?>
      <div class="row">
        <div class="col-md-12">
          <h1 class="azul omnes"><label class="celeste omnes">Paso 3:</label> <label>Realiza el apadrinamiento</label></h1>
          <hr>
        </div>
        <div class="col-md-12">
          <h1 class="col-md-12 azul omnes">Hoy tomaste una decisión muy importante</h1>
          <h2 class="col-md-8 col-sm-offset-2 bold naranja omnes">¡darle una sonrisa a tu niño y transformar su vida!</h2>
        </div>

        <div class="col-md-12">
        <form method="post" action="<?= base_url()?>index.php/yo_apadrino/apadrinar">
          <p class="azul">Selecciona el número de comidas a la quincena que le darás a tu niño:</p>
          <p class="celeste"> *Nuestro Comedor opera de lunes a viernes y otorga una comida diaria a cada niño (5 comidas a la semana)</p>
          <div class="col-md-12" id="comidas_slider">
            <div id="slider"></div>
            <div id="descripcion" class="col-md-12">
              <div class="col-md-12 sinPadding">
                <div class="col-md-10 sinPadding outsideBottom alineaDerecha">
                  <label id="lamout" for="amount" class="azul alineaBottom">Quincenalmente, vía nómina se te descontará:</label>
                </div>
                <div class="col-md-2">
                  <div class="col-md-5"><label class="sPeso naranja bold">$</label></div>
                  <div class="col-md-7 sinPadding"><input type="text" class="bold sPeso" name="cantidad" id="amount" readonly/></div>
                </div>
              </div>
              <div class="col-md-12 sinPadding">
                <div class="col-md-12 sinPadding outsideBottom">
                  <label class="azul alineaDerecha">Si deseas aportar una cantidad distinta, <label id="otraCant">da clic aquí</label></label>
                </div>
              </div>
					<div class="col-md-12 sinPadding">
                    <div class="col-md-12 sinPadding outsideBottom comentarioFin">
                        <label class="azul comentarioFin">*El monto adicional al equivalente de 10 comidas será destinado a un nuevo niño.</label>
                    </div>
                </div>
            </div>
          </div> <!--comidas slider -->

          <div class="col-md-12" id="terminos">
              <div class="col-md-7">
                <label class="termL azul col-md-12 text-right" href="">Leer términos y condiciones</label>
                <div class="text-right" align="right">
                  <input id="acepto_tc" type="checkbox" value="acepto_tc">
                  <label class="azul termCond">Acepto el descuento vía nómina</label>
                </div>
              </div>
              <div class="col-md-5">
                <input id="idnino" type="hidden" value="<?= $nino['idninos']?>" name="idnino">
                <div class="">
                  <input id="apadrinarBtn" type="button" value="Apadrinar" class="boton">
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
