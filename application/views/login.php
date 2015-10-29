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

        <div class="container">
            <div class="row cuerpoLogin">
                <?php echo form_open('login/loginNormal'); ?>
                    <div class="contenido">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 backColorLogin">
                            <div class="contenido">
                                <?php if(isset($mensajeError)){?>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="col-xs-12 alert alert-danger aviso" role="alert"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"><?= $mensajeError ?> o <a href="<?= base_url()?>index.php/login/registrar/">Regístrate</a></span></div>
                                </div>
                                <?php } ?> 
                                <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                            <label>E-mail corporativo</label>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                            <input class="form-control" type="email" name="email">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                            <label>No. de empledo</label>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                            <input class="form-control" type="password" name="password">
                                        </div>
                                        <div class="col-xs-12 alert alert-warning aviso" role="alert"><span class="glyphicon glyphicon-eye-open" aria-hidden="true">  Si eres colaborador de Vips o El Portón tu contraseña es tu nuevo número de empleado.</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="row">

                                <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
                                    <input type="hidden" value="<?= (isset($pag_antes))?$pag_antes:''?>" name="pag_anterior"/>
                                    <input type="submit" value="Entrar" class="btn btn-primary boton login pull-right"/>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 divNinos">
                                    <img src="<?= base_url('media/img/ninos-login.png')?>" class="ninosLogin">
                                </div>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="row banners">
            <div class="container">
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 text-center ">
                    <a href="<?= base_url()?>index.php/el_movimiento"><img src="<?= base_url()?>media/img/banner.png"></a>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 text-center ">
                    <a href="<?= base_url()?>index.php/testimonios"><img src="<?= base_url()?>media/img/banner-2.png"></a>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 text-center ">
                    <img src="<?= base_url()?>media/img/qr.png">
                </div>
            </div>
        </div>

            <!--<div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                        <h3>Bienvenido</h3>

                        <?php echo form_open('login/loginNormal'); ?>
                            <div>
                                <label class="labelInfo">Correo: </label>
                                <input type="email" name="email">
                            </div>
                            <div>
                                <input type="hidden" value="<?= $pag_antes?>" name="pag_anterior"/>
                                <label class="labelInfo">Contraseña: </label>
                                <input type="password" name="password">
                                <div>
                                    <input type="submit" value="Login" class="btn btn-primary boton login"/>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>-->


        <?php
        include("footer.php");
        ?>
    </body>
</html>
