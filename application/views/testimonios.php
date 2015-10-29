<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Testimonios</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
    <link href="<?= base_url()?>media/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url()?>media/css/general.css" rel="stylesheet">
    <link href="<?= base_url()?>media/css/testimonios.css" rel="stylesheet">

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
  </head>
  <body>
    <div class="wrapper">
      <?= $header ?>
      <div class="row">
        <div class="col-md-12">
          <h1 class="omnes h1azul">Testimonios</h1>
          <hr>
        </div>
        <div class="col-md-6">
          <iframe width="100%" height="300" src="//www.youtube-nocookie.com/embed/0PXjl8Jy4b0?rel=0" frameborder="0" allowfullscreen></iframe>
        </div>
        <div class="col-md-6">
          <iframe width="100%" height="300" src="//www.youtube-nocookie.com/embed/-NMEOr4P-N0?rel=0" frameborder="0" allowfullscreen></iframe>
        </div>
        <div class="col-md-12"><hr></div>        
        <div class="col-md-12">
          <div class="col-md-3 text-center">
            <img src="<?= base_url() ?>media/img/bk.jpg">
          </div>
          <div class="col-md-9">
            <p class="nombreT">Hugo Mejía Martínez</p>
            <p class="empresanombre"> Burger King (Mercadotecnia)</p>
            <p class="choroT">"Contribuir a Va por Mi Cuenta me ha hecho tener conciencia de que somos entidades sociales que debemos apoyarnos siempre, acorde a las posibilidades de cada uno."</p>         
          </div>
          <div class="col-md-12"><hr></div>
        </div>
        <div class="col-md-12">
          <div class="col-md-5 text-center">
            <img src="<?= base_url() ?>media/img/dp.jpg">
          </div>
          <div class="col-md-7">         
            <p class="nombreT">Domino’s Pizza Animas</p>
            <p class="choroT">"Como equipo nos sentimos muy orgullosos de participar, ya que sabemos que hacemos la diferencia con nuestras aportaciones."</p>
          </div>
          <div class="col-md-12"><hr></div>
        </div>
        <div class="col-md-12 text-center">
            <iframe width="530" height="300" src="//www.youtube-nocookie.com/embed/hQFdNETV4wo?rel=0" frameborder="0" allowfullscreen></iframe>        
        </div>
        <div class="col-md-12"><hr></div>
        <div class="col-md-12">
          <div class="col-md-5 text-center">
            <img src="<?= base_url() ?>media/img/sbx.jpg">
          </div>      
          <div class="col-md-7">         
            <p class="nombreT">Starbucks Lomas Verdes</p>
            <p class="choroT">"Buscamos dar más y ser el ejemplo a seguir; para nosotros representa nuestro compromiso con la comunidad y llevamos orgullosamente el estandarte de Starbucks y de Alsea. Nos llena de orgullo y alegría saber que podemos contribuir para que el mundo sea un lugar mejor."</p>
          </div>
        </div>

      </div> <!-- row-->

    </div> <!--wrapper-->
  </body>
  <?= $footer ?>
</html>