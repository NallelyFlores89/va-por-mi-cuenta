<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Panel</title>
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
    <script src="<?= base_url()?>media/js/panel.js"></script>
  </head>
  <body>
    <div class="wrapper">
      <?= $header ?>
      <div class="row">
        <div class="col-md-12">
          <h1 class="col-md-12 omnes"><label class="h1azul">Gracias por decir</label><label class="padddingLeft blanco bold">¡Va por mi cuenta!</label></h1>
        </div>

        <div id="cuadros" class="col-md-12">

          <div class="cuadrosChild col-md-4 sinPadding">
            <h1 class="sinPAdding omnes">Padrino</h1>
            <div class="col-md-12 sinPadding cajaInfo">
              <div class=" col-md-12 daP">
                <div class="col-md-3 label_cuadros_info sinPadding">Nombre</div>
                <div class="col-md-9 azul"><?= $padrino['nombre']?></div>
              </div>
              <div class="col-md-12 daP">
                <div class="col-md-3 label_cuadros_info sinPadding">Email</div>
                <div class="col-md-9 azul"><?= $padrino['correo']?></div>
              </div>
              <div class="col-md-12 daP">
                <div class="col-md-3 label_cuadros_info sinPadding">Comidas a apadrinar</div>
                <div class="col-md-9 azul">0</div>
              </div>
              <div class="col-md-12 daP">
                <div class="col-md-3 label_cuadros_info sinPadding">Descuento vía nómina quincenal</div>
                <div class="col-md-9 azul">$0</div>
              </div>
            </div>
          </div><!--ttl-->

          <div class="cuadrosChild col-md-4">
            <h1 class="omnes">Tu niño</h1>
            <div class="col-md-12 sinPadding cajaInfo">
              <div class=" col-md-12 daP">
                <div class="col-md-3 label_cuadros_info sinPadding">Nombre</div>
                <div class="col-md-9"></div>
              </div>
              <div class="col-md-12 daP">
                <div class="col-md-3 label_cuadros_info sinPadding">Género</div>
                <div class="col-md-9"></div>
              </div>
              <div class="col-md-12 daP">
                <div class="col-md-3 label_cuadros_info sinPadding">Fecha de nacimiento</div>
                <div class="col-md-9"></div>
              </div>
              <div class="col-md-12 daP">
                <div class="col-md-3 label_cuadros_info sinPadding">Comedor</div>
                <div class="col-md-9"></div>
              </div>
            </div>
          </div>
          <div class="cuadrosChild col-md-4">
            <input type="button" id="vePagApadrina" value="Apadrina a un niño" class="boton">
          </div>
        </div><!--cuadros-->
      </div> <!-- row-->
    </div> <!--wrapper-->
  </body>
  <?= $footer ?>
</html>