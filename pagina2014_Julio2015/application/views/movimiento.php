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
        <div id="infoMovimiento" class="col-md-12">
          <img src="<?= base_url()?>media/img/infografia-movimiento.jpg"/>
        </div> <!--col md 12 -->
      </div> <!-- row-->

    </div> <!--wrapper-->
  </body>
  <?= $footer ?>
</html>