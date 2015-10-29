<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Administración</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
    <link href="<?= base_url()?>media/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url()?>media/css/general.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script <strong></strong>c="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
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
      <a href="<?= base_url()?>index.php/sacar_movimientos/salir">Cerrar sesión</a>
      <div class="row">
        <div class="col-md-8 col-sm-offset-2">
          <fieldset>
            <h1>Generar reporte general</h1>
            <form action="<?= base_url()?>index.php/sacar_movimientos/file_xls" method="post">
              <input type="submit" name="reporte" value="generar reporte">
            </form>
          </fieldset>

          <fieldset>
            <h1>Generar reporte por fecha</h1>
            <form action="<?= base_url()?>index.php/sacar_movimientos/file_xls2" method="post">
              <table>
                <tr>
                  <td>Día</td>
                  <td><?php echo form_dropdown('dia', $dias, '1'); ?></td>
                </tr>
                <tr>
                  <td>Mes</td>
                  <td><?php echo form_dropdown('mes', $meses, '1'); ?></td>
                </tr>
                <tr>
                  <td>Año</td>
                  <td><?php echo form_dropdown('ano', $anos, '1'); ?></td>
                </tr>     
                <tr><td><input type="submit" value="generar reporte"></td></tr>
              </table>
            </form>
          </fieldset>  
          <fieldset>
            <h1>Generar tabla niños-padrinos</h1>
            <form action="<?= base_url()?>index.php/sacar_movimientos/file_xls3" method="post">
                <input type="submit" name="form" value="generar reporte">
            </form>
          </fieldset>                   
        </div>
      </div> <!-- row-->

    </div> <!--wrapper-->
  </body>
  <?= $footer ?>
</html>