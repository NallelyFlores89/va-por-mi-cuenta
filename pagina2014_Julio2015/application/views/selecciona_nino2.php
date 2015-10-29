<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Va por mi cuenta</title>

    <link href="<?= base_url()?>media/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url()?>media/css/general.css" rel="stylesheet">
    <link href="<?= base_url()?>media/css/apadrina.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="<?= base_url()?>media/bootstrap/js/bootstrap.min.js"></script>
    <script> var base = "<?= base_url() ?>"</script>
    <script src="<?= base_url()?>media/js/apadrina2.js"></script>
  </head>
  <body>
  <div id="Todainformacion" style="display:none">
  <?php 
  // print_r($ninos);
    $mes = array(
    1=> "Enero", 2 => 'Febrero', 3=>'Marzo', 4=>'Abril', 5 => 'Mayo', 6 => 'Junio',
    7=> 'Julio', 8=>'Agosto', 9 => 'Septiembre', 10 => 'Octubre', 11 => 'Noviembre', 12=>'Diciembre'
  );

    foreach ($ninos as $key => $value) { ?>
      <div id="info-<?= $key ?>">
        <input type="hidden" class="info-id" value="<?= $value['idninos']?>">
        <input type="hidden" class="info-nombre" value="<?= $value['nombre'].' '.$value['apat'].' '.$value['amat']?>">
        <input type="hidden" class="info-fechaNac" value="<?= $value['fNacDia'].' - '.$mes[$value['fNacMes']].' - '.$value['fNacAno'] ?>"/>
        <input type="hidden" class="info-sexo" value="<?= $value['genero']?>">
        <input type="hidden" class="info-foto" value="<?= $value['foto']?>">
        <input type="hidden" class="info-comedor" value="<?= $value['nombre_comedor']?>">
        <?php 
          // function age($day, $month, $year){
           $year_diff  = date("Y") - $value['fNacAno'];
           $month_diff = date("m") - $value['fNacMes'];
           $day_diff   = date("d") - $value['fNacDia'];
           if ($day_diff < 0 && $month_diff==0) $year_diff--;
           if ($day_diff < 0 && $month_diff < 0) $year_diff--;
           $edad = $year_diff;
          // }
        ?>
        <input type="hidden" class="info-edad" value="<?= $edad ?> años">
        <input type="hidden" class="info-estado" value="<?= $value['apadrinado']?>">
      </div>
  <?php }  ?>
  <input type="hidden" id="numPaginacion" value="0">
  </div>

    <div class="wrapper">
      <?= $header ?>
      <div class="row">
        <div id="mensaje" class="col-md-12">
          <h1 class="omnes"><label class="celeste">Paso 2: </label> Selecciona a tu niño</h1>
          <hr>
        </div>

        <div class="ninosSliderWrap col-md-12" >
          <div class="ninosSlider col-md-12">
            <div class="col-md-4">
              <div class="foto">
                <img class="fotoNino" src="<?= base_url()?>media/img/ninos/<?= $ninos[0]['foto']?>"/>
                <hr>
                <div class="col-md-12" id="flechas">
                  <div class="fAnt col-md-6">
                    <button class="anterior" type="button">
                      <span class="glyphicon glyphicon-menu-left">Anterior</span>
                    </button>
                  </div>
                  <div class="fSig col-md-6">
                    <button class="siguiente" type="button">
                      <span class="glyphicon glyphicon-menu-right">Siguiente</span>
                    </button>
                    
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="mensajeNino col-md-6">
                <div class="mensajeNinoChild">
                  "Me llamo <?= $ninos[0]['nombre']." ".$ninos[0]['apat']." ".$ninos[0]['amat']?> y asisto al comedor <?= $ninos[0]['nombre_comedor']?>"
                </div>
              </div>
              <div class="botonApadrinar col-md-6">
                <form action="<?= base_url()?>index.php/apadrina/paso3" method="post">
                  <input class="ninoEspecial" name="ninoEspecial" type="hidden" value="<?= $ninos[0]['idninos']?>">
                  <?php if ($ninos[0]['apadrinado'] == 0){ ?>
                    <input class="apadrinaNinoBtn boton" type="submit" value="Apadrinar">
                  <?php } else { ?>
                    <input class="apadrinaNinoBtn botonYaPadrino" type="submit" value="Ya tengo padrino" disabled>
                  <?php } ?>
                </form>
              </div>
              <div class="biografia col-md-12">
                <div class="biografiaChild col-md-12">
                  <div class="datoNino col-md-12">
                    <div class="col-md-2 lNaranja">Nombre:</div>
                    <div class="bn_nombre datoNino2 col-md-10"><?= $ninos[0]['nombre']." ".$ninos[0]['apat']." ".$ninos[0]['amat']?></div>
                  </div>
                  <div class="datoNino col-md-12">
                    <div class="col-md-2 lNaranja">Género:</div>
                    <div class="bn_genero datoNino2 col-md-10"><?= $ninos[0]['genero']?></div>
                  </div>
                  <div class="datoNino col-md-12">
                    <div class="col-md-2 lNaranja">Edad:</div>
                    <div class="bn_edad datoNino2 col-md-10"><?= 2014-$ninos[0]['fNacAno'] ?></div>
                  </div>
                  <div class="datoNino col-md-12">
                    <div class="col-md-2 lNaranja">Fecha de nacimiento:</div>
                    <div class="bn_fn datoNino2 col-md-10"><?= $ninos[0]['fNacDia']." - ".$mes[$ninos[0]['fNacMes']]." - ".$ninos[0]['fNacAno'] ?></div>
                  </div>
                  <div class="datoNino col-md-12">
                    <div class="col-md-2 lNaranja">Comedor:</div>
                    <div class="bn_comedor datoNino2 col-md-10"><?= $ninos[0]['nombre_comedor']?></div>
                  </div>                                
                </div><!--biografiaChild-->
              </div><!--biografia-->
            </div> <!--col-md-8-->
          </div> <!--ninosSlider-->
        </div><!--ninosSliderWrapp-->

        <div id="buscador1" class="col-md-12 buscador"><br><br>
          <h1 class="azul col-md-12 omnes text-center">Personaliza tu búsqueda</h1>
          <h3 class="celeste col-md-12 omnes text-center">selecciona alguna de estas opciones</h3>
          <div class="col-md-12"><hr></div>
          <h2 class="azul col-md-12 omnes"><input id="rad1" class="radiob" type="radio" name="group1" value="busc1">Opción A</h2>
          <div id="" class="buscadorChild col-md-12">
            <div class="col-md-12">
              <form id="formConsulta">
                <div class="col-md-2 col-md-offset-2">
                  <?php echo form_dropdown('genero', $generos, -1, "class='dropdownInicio'  id='genero'")?>
                </div>
                <div class="col-md-2">
                  <?php echo form_dropdown('edad', $edades, -1, "class='dropdownInicio' id='edad'")?>
                </div>
                <!-- <div class="col-md-2">
                  <?php echo form_dropdown('dia', $dias, -1, "class='dropdownInicio' id='dia'")?>
                </div>
                <div class="col-md-2">
                  <?php echo form_dropdown('mes', $meses, -1, "class='dropdownInicio' id='mes'")?>
                </div> -->
                <div class="col-md-2">
                  <?php echo form_dropdown('comedor',$comedores, -1, "class='dropdownInicio' id='comedor'")?>
                </div>
                <div class="col-md-2">
                  <input id="buscar" class="boton" type="button" value="Buscar" onclick="consulta1()">
                </div>
              </form>
            </div>
          </div> <!--buscador child -->
        </div> <!-- buscador -->
          <div id="buscador2" class="buscador col-md-12">
            <!-- <hr> -->
            <h2 class="azul col-md-12 omnes"><input id="rad2" class="radiob" type="radio" name="group1" value="busc2">Opción B</h2>
            <div id="" class="buscadorChild col-md-12">
              <div class="col-md-12">
                <form id="formConsulta">
                 <!--  <div class="col-md-2">
                    <?php echo form_dropdown('genero', $generos, -1, "class='dropdownInicio'  id='genero'")?>
                  </div>
                  <div class="col-md-2">
                    <?php echo form_dropdown('edad', $edades, -1, "class='dropdownInicio' id='edad'")?>
                  </div> -->
                  <div class="col-md-offset-4 col-md-2">
                    <?php echo form_dropdown('dia', $dias, -1, "class='dropdownInicio' id='dia'")?>
                  </div>
                  <div class="col-md-2">
                    <?php echo form_dropdown('mes', $meses, -1, "class='dropdownInicio' id='mes'")?>
                  </div>
                  <!-- <div class="col-md-2">
                    <?php echo form_dropdown('comedor',$comedores, -1, "class='dropdownInicio' id='comedor'")?>
                  </div> -->
                  <div class="col-md-2">
                    <input id="buscar2" class="boton" type="button" value="Buscar" onclick="consulta2()">
                  </div>
                </form>
            </div>
          </div> <!--buscador child -->
        </div> <!-- buscador -->        
        <div class="col-md-12">
          <hr>
        </div>

      </div> <!-- row-->

    </div> <!--wrapper-->
  </body>
      <?= $footer ?>
</html>