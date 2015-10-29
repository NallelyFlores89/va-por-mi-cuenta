<?php 
  $mes = array(
    1=> "Enero", 2 => 'Febrero', 3=>'Marzo', 4=>'Abril', 5 => 'Mayo', 6 => 'Junio',
    7=> 'Julio', 8=>'Agosto', 9 => 'Septiembre', 10 => 'Octubre', 11 => 'Noviembre', 12=>'Diciembre'
  );

  if($padrino['nino_apadrinado']['num_comidas'] == -1){
    $comidas = "Información confidencial";
  }else{
    $comidas = $padrino['nino_apadrinado']['num_comidas'];
  }
  if($padrino['nino_apadrinado']['donacion'] == -1){
    $descuento = "Información confidencial";
  }else{
    $descuento = $padrino['nino_apadrinado']['donacion'];
  }  
?>    
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
      <div class="col-md-9 azul"><?= $comidas ?></div>
    </div>
    <div class="col-md-12 daP">
      <div class="col-md-3 label_cuadros_info sinPadding">Descuento vía nómina quincenal</div>
      <div class="col-md-9 azul">$ <?= $descuento?></div>
    </div>
  </div>
</div><!--ttl-->

<div class="cuadrosChild col-md-4">
  <h1 class="omnes">Tu niño</h1>
  <div class="col-md-12 sinPadding cajaInfo">
    <div class=" col-md-12 daP">
      <div class="col-md-3 label_cuadros_info sinPadding">Nombre</div>
      <div class="col-md-9 azul"><?= $padrino['nino_apadrinado']['nombre']." ".$padrino['nino_apadrinado']['apat']." ".$padrino['nino_apadrinado']['amat']; ?></div>
    </div>
    <div class="col-md-12 daP">
      <div class="col-md-3 label_cuadros_info sinPadding">Género</div>
      <div class="col-md-9 azul"><?php print_r($padrino['nino_apadrinado']['genero']); ?></div>
    </div>
    <div class="col-md-12 daP">
      <div class="col-md-3 label_cuadros_info sinPadding">Edad</div>
      <?php if(isset($mes[$padrino['nino_apadrinado']['fNacMes']])){?>      
      <div class="col-md-9 azul"><?php print_r(2014 - $padrino['nino_apadrinado']['fNacAno']); ?> años</div>
      <?php }else{?>
      <div class="col-md-9 azul">Sin registro.</div>
      <?php } ?>
    </div>    
    <div class="col-md-12 daP">
      <div class="col-md-3 label_cuadros_info sinPadding">Fecha de nacimiento</div>
      <?php if(isset($mes[$padrino['nino_apadrinado']['fNacMes']])){?>
      <div class="col-md-9 azul"><?= $mes[$padrino['nino_apadrinado']['fNacMes']]." ".$padrino['nino_apadrinado']['fNacDia']." del ".$padrino['nino_apadrinado']['fNacAno']; ?></div>
      <?php }else{?>
      <div class="col-md-9 azul">Sin registro.</div>
      <?php } ?>
    </div>
    <div class="col-md-12 daP">
      <div class="col-md-3 label_cuadros_info sinPadding">Comedor</div>
      <div class="col-md-9 azul"><?php print_r($padrino['nino_apadrinado']['nombre_comedor']); ?></div>
    </div>
  </div>
</div>