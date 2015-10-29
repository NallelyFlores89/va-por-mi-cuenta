<?php 
    $meses = array(
      1 => 'Enero',
      2 => 'Febrero',
      3 => 'Marzo',
      4 => 'Abril',
      5 => 'Mayo',
      6 => 'Junio',
      7 => 'Julio',
      8 => 'Agosto',
      9 => 'Septiembre',
      10  => 'Octubre',
      11  => 'Noviembre',
      12  => 'Diciembre',
    );
  foreach ($consulta as $value) { 
    $mensaje = "Me llamo ". $value['nombre']." y asisto al comedor ".$value['nombre_comedor'];
    $fecha = $meses[$value['fNacMes']]." ".$value['fNacDia']." del ".$value['fNacAno'];
    $edad = 2014 - $value['fNacAno']
  ?>
  <div class="ninosSlider" class="col-md-12">
    <div class="col-md-4">
      <div class="foto">
        <img class="fotoNino" src="<?= base_url()?>media/img/ninos/<?= $value['foto']?>"/>
      </div>
    </div>
    <div class="col-md-8">
      <div class="mensajeNino col-md-6">
        <div class="mensajeNinoChild"><?= $mensaje ?></div>
      </div>
      <div class="botonApadrinar col-md-6">
        <form method="post" action="<?= base_url()?>index.php/apadrina/paso3">
          <input name="ninoEspecial" lass="ninoEspecial" type="hidden" value="<?= $value['idninos']?>">
          <?php 
            if($value['apadrinado'] == 0){  ?>
          <input class="apadrinaNinoBtn boton" type="submit" value="Apadrinar">
          <?php } else{ ?>
          <input class="apadrinaNinoBtn botonYaPadrino" type="submit" value="Ya tengo padrino" disabled="disabled">
          <?php }?>
        </form>
      </div>
      <div class="biografia col-md-12">
        <div class="biografiaChild col-md-12">
          <div class="datoNino col-md-12">
            <div class="col-md-2 lNaranja">Nombre:</div>
            <div class="bn_nombre datoNino2 col-md-10"><?= $value['nombre']." ". $value['apat']." ". $value['amat']?></div>
          </div>
          <div class="datoNino col-md-12">
            <div class="col-md-2 lNaranja">Género:</div>
            <div class="bn_genero datoNino2 col-md-10"><?= $value['genero']?></div>
          </div>
          <div class="datoNino col-md-12">
            <div class="col-md-2 lNaranja">Edad:</div>
            <div class="bn_edad datoNino2 col-md-10"><?= $edad ?> </div>
          </div>          
          <div class="datoNino col-md-12">
            <div class="col-md-2 lNaranja">Fecha de nacimiento:</div>
            <div class="bn_fn datoNino2 col-md-10"><?= $fecha ?></div>
          </div>
          <div class="datoNino col-md-12">
            <div class="col-md-2 lNaranja">Comedor:</div>
            <div class="bn_comedor datoNino2 col-md-10"><?= $value['nombre_comedor']?></div>
          </div>                                
        </div><!--biografiaChild-->
      </div><!--biografia-->
    </div><!--col-md-8-->
  </div> <!--ninosSlider-->
  <hr>
<?php  } ?>