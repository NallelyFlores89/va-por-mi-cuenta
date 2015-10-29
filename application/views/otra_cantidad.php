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
    <link href="<?= base_url()?>media/css/otra_cantidad.css" rel="stylesheet">

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
        
        <div id="cajaNinos" class="col-md-12 sinPadding">
          <div class="col-md-12">
            <div id="fondoAzul" class="col-md-12 sinPadding">
              
            </div>
            <div id="ninosF" class="row">
              <div id="ninos" class="col-md-4">
                <img src="<?= base_url()?>media/img/pacoylili.png">
              </div>
              <div id="montoTxt" class="azul col-md-4">
                Coloca el monto que deseas aportar quincenalmente
              </div>
              <div id="formCantidad" class="col-md-4">
                <form method="post" action="<?= base_url()?>index.php/yo_apadrino/apadrinar">
                  <input class="label_cuadros_info bold" id="cantidad" type="text" name="cantidad"/>
                  <input type="hidden" name="idnino" value="<?= $idnino ?>">
                  <input type="hidden" name="idpadrino" value="<?= $idpadrino ?>">
                </form>
              </div>
            </div>  
          </div><!--col-md-12-->

        </div> <!--col md 12 -->
        <div id="terminos" class="col-md-12">
          <div id="termT" class="col-md-8">
            <label class="termL azul col-md-12 text-right" href="">Leer términos y condiciones</label>
            <div class="text-right">
                  <input id="acepto_tc" type="checkbox" value="acepto_tc">
                  <label class="azul termCond">Acepto el descuento vía nómina</label>
            </div>
          </div>
            <div class="col-md-4">
              <input id="apadrinarBtn" type="button" value="Apadrinar" class="boton">
            </div>
        </div> <!--terminos-->
        
        <div class="col-md-12"><hr></div>
      </div> <!-- row-->
            <?= $terminoscondiciones ?>

    </div> <!--wrapper-->
  </body>
      <?= $footer ?>
</html>