<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Va por mi cuenta</title>

    <link href="<?= base_url()?>media/bootstrap/css/bootstrap.min.css" rel="stylesheet">
     <link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
    <link href="<?= base_url()?>media/css/general.css" rel="stylesheet">
    <link href="<?= base_url()?>media/css/index.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>    
    <script src="<?= base_url()?>media/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= base_url()?>media/js/inicio.js"></script>
  </head>
  <body>
    <div class="wrapper">
      <?= $header ?>
      <div class="row">
        <div class="col-md-12">

        <div id="myCarousel" class="carousel slide">
          <div class="carousel-inner">

              <div class="active item">
              <div class="image-position-right">
              <a href="<?= base_url()?>index.php/galeria/"><img width="100%" src="<?= base_url()?>media/img/banner2.jpg" alt="First slide"></a>
              </div>
              </div>

              <div class="item">
              <div class="image-position-right">
                    <img width="100%" src="<?= base_url()?>media/img/banner-apa.png" alt="First slide">
              </div>
              </div>

              <div class="item">
              <div class="image-position-right">
              <a href="<?= base_url()?>index.php/login/paso1"><img width="100%" src="<?= base_url()?>media/img/banner-apa2.png" alt="Second slide"></a>
              </div>
              </div>
          </div>

          <a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>
          <a class="right carousel-control" href="#myCarousel" data-slide="next">›</a>
        </div> <!--crarousel-->
        </div>
      </div> <!-- row-->
      <div class="row">
        <div id="videosSecc">
          <div class="videoContendor col-md-6">
            <iframe width="99%" height="315" src="//www.youtube-nocookie.com/v/YsbmiO84FrU?version=3&amp;hl=en_US" frameborder="0" allowfullscreen></iframe>
          </div>
          <div class="videoContendor col-md-6">
            <iframe width="99%" height="315" src="//www.youtube.com/embed/WPe42_KrdRQ" frameborder="0" allowfullscreen></iframe>
          </div>
        </div>
      </div><!-- row-->
      <div class="row">
        <div id="carruselInicio" class="col-md-12">
          <img src="<?= base_url()?>media/img/banner-padrino-final.png">
        </div>
      </div> <!-- row-->
      <div class="col-md-12" id="yaEresPadrino">
        <h2>¿Ya eres Padrino?</h2>
      </div>
    </div>
  </body>
      <?= $footer ?>
</html>