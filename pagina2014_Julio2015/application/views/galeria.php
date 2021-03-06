<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Galería</title>
    <link href="<?= base_url()?>media/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url()?>media/css/general.css" rel="stylesheet">
    <link href="<?= base_url()?>media/yoxview/yoxview.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="<?= base_url()?>media/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?=base_url()?>media/yoxview/yoxview-init.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $("#thumbnails").yoxview({

        });        
      })
    </script>
  </head>
  <body>
    <div class="wrapper">
      <?= $header ?> 
      <div class="row">
        <div id="thumbnails" idclass="yoxview">
        <?php 
          if($fotos != NULL){
            foreach ($fotos as $key => $value) { ?>
                <a href="<?= base_url()?>media/img/galeria/<?= $value?>"><img class="col-md-4" src="<?= base_url()?>media/img/galeria/<?= $value ?>" alt="Second" title="Visita de los niños a ALSEA"/></a>
      <?php   }} ?>
                    
        </div>
      </div> <!-- row-->
    </div> <!--wrapper-->
  </body>
  <?= $footer ?>
</html>