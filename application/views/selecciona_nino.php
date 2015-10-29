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
    <script src="<?= base_url()?>media/js/apadrina.js"></script>
  </head>
  <body>
    <div class="wrapper">
      <?= $header ?>
      <div class="row">
        <div id="mensaje" class="col-md-12">
          <h1 class="omnes"><label class="celeste">Paso 2: </label> Selecciona a tu nino</h1>
          <hr>
        </div>

        <div class="ninosSliderWrap col-md-12" >
          <div class="ninosSlider col-md-12">
            <div class="col-md-4">
              <div class="foto">
                <img class="fotoNino" src="<?= base_url()?>media/img/ninos/<?= $ninoEspecial['foto']?>"/>
                <hr>
                <div class="col-md-12" id="flechas">
                  <div class="fAnt col-md-6">
                    <input class="anterior" type="button" value = "< Anterior">
                  </div>
                  <div class="fSig col-md-6">
                    <input class="siguiente" type="button" value = "Siguiente >">
                    
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="mensajeNino col-md-6">
                <div class="mensajeNinoChild"></div>
              </div>
              <div class="botonApadrinar col-md-6">
                <form action="<?= base_url()?>index.php/apadrina/paso3" method="post">
                  <input class="ninoEspecial" name="ninoEspecial" type="hidden" value="<?= $ninoEspecial['idninos']?>">
                  <input class="apadrinaNinoBtn boton" type="submit" value="Apadrinar">
                </form>
              </div>
              <div class="biografia col-md-12">
                <div class="biografiaChild col-md-12">
                  <div class="datoNino col-md-12">
                    <div class="col-md-2 lNaranja">Nombre:</div>
                    <div class="bn_nombre datoNino2 col-md-10"></div>
                  </div>
                  <div class="datoNino col-md-12">
                    <div class="col-md-2 lNaranja">Género:</div>
                    <div class="bn_genero datoNino2 col-md-10"></div>
                  </div>
                  <div class="datoNino col-md-12">
                    <div class="col-md-2 lNaranja">Edad:</div>
                    <div class="bn_edad datoNino2 col-md-10"></div>
                  </div>
                  <div class="datoNino col-md-12">
                    <div class="col-md-2 lNaranja">Fecha de nacimiento:</div>
                    <div class="bn_fn datoNino2 col-md-10"></div>
                  </div>
                  <div class="datoNino col-md-12">
                    <div class="col-md-2 lNaranja">Comedor:</div>
                    <div class="bn_comedor datoNino2 col-md-10"></div>
                  </div>                                
                </div><!--biografiaChild-->
              </div><!--biografia-->
            </div> <!--col-md-8-->
          </div> <!--ninosSlider-->
        </div><!--ninosSliderWrapp-->

        <div id="buscador1" class="col-md-12 buscador">
          <h2 class="azul col-md-12 omnes">Personaliza tu búsqueda</h2>
          <div class="col-md-12"><hr></div>
          <h2 class="azul col-md-12 omnes"><input id="rad1" class="radiob" type="radio" name="group1" value="busc1">Buscador 1</h2>
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
            <h2 class="azul col-md-12 omnes"><input id="rad2" class="radiob" type="radio" name="group1" value="busc2">Buscador 2</h2>
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