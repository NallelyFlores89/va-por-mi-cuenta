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
    <script src="<?= base_url()?>media/bootstrap/js/bootstrap.min.js"></script>
    <script> base = "<?= base_url() ?>"</script>
    <script src="<?= base_url()?>media/js/inicio.js"></script>
</head>
<body>
<!--<div class="wrapper">-->

<?php
include("header.php");
?>

<div class="container haz">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center tituloCarta">
            <h1 class="omnes h1azul">"Haz de esta causa tu causa"</h1>
            <h2 class="naranja omnes">Elige a un niño y transforma su vida</h2>
            <hr>
        </div>
    </div>
</div>


<div class="row">
    <div class="container">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
            <img class="img-responsive" src="<?= base_url()?>media/img/comoApadrinar.png">
        </div>
    </div>
</div>

<div class="row paso">
    <div class="container">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
            <hr>
            <h2 class="textAzulCielo omnes enLinea">Paso 1: </h2><h2 class="textoAzul omnes enLinea">Regístrate</h2>
            <h2 class="textAzulCielo omnes enLinea">o</h2>
            <h2 class="textoAzul omnes enLinea"><a href="<?= base_url()?>index.php/login">Inicia sesión</a></h2>
            <hr>
        </div>
        <?php if(isset($mensajeError)){?>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center tituloCarta">
            <div class="alert alert-warning" role="alert">
            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true">  <?= $mensajeError?></span>
        </h3>
        </div>
        <?php }?>

    </div>
</div>

<div class="row paso">
    <div class="container">
        <?php echo form_open('login/registrar'); ?>
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-md-offset-2 col-md-lg-offset-2 backColorLogin" style="padding:30px">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                        <label class="">Email corporativo: </label>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                        <input class="form-control info" name="email" type="email" >
                        <label class="col-sm-12"><?php echo form_error('email'); ?></label>
                    </div> 
                    <br><br><br>                    
                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                        <label class="">No. de empleado: </label>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                        <input class="form-control info" name="password"  type="text" placeholder="6 dígitos incluyendo ceros">
                        <label class="col-sm-12"><?php echo form_error('email'); ?></label>                      
                        <div class="alert alert-warning aviso" role="alert"><span class="glyphicon glyphicon-eye-open" aria-hidden="true">    Si eres colaborador de Vips o El Portón tu contraseña es tu nuevo número de empleado.</span></div>
                    </div>
                    <br><br><br><br><br><br>
                    <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
                        <input type="submit" value="Registrar" class="btn btn-primary boton login pull-right"/>
                    </div>                    
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <!-- <img class="img-responsive pull-right" src="<?= base_url()?>media/img/ninosComiendo.png"> -->
            </div>
        </form>
    </div>
</div>

<div class="row">
    <div class="container">
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 text-center ">
            <img class="img-responsive" src="<?= base_url()?>media/img/banner.png">
        </div>

<!--         <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 text-center ">
            <img src="<?= base_url()?>media/img/banner-2.png">
        </div> -->
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 text-center ">
            <img class="img-responsive" src="<?= base_url()?>media/img/qr.png">
        </div>
    </div>
</div>

<?php
include("footer.php");
?>
</body>
</html>