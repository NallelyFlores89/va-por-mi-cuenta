 <h1 class="sinPAdding omnes">Padrino</h1>
    <div class=" col-md-12 daP">
      <div class="col-md-3 naranja sinPadding">nombre</div>
      <div class="col-md-9 azul"><?= $padrino['nombre']?></div>
    </div>
    <div class="col-md-12 daP">
      <div class="col-md-3 naranja sinPadding">email</div>
      <div class="col-md-9 azul"><?= $padrino['correo']?></div>
    </div>
    <div class="col-md-12 daP">
      <div class="col-md-3 naranja sinPadding">comidas a apadrinar</div>
      <div class="col-md-9 azul"><?= $padrino['nino_apadrinado']['num_comidas']?></div>
    </div>
    <div class="col-md-12 daP">
      <div class="col-md-3 naranja sinPadding">descuento vía nómina</div>
      <div class="col-md-9 azul">$ <?= $padrino['nino_apadrinado']['donacion']?></div>
    </div>


<h1 class="omnes">Tu niño</h1>
  <div class=" col-md-12 daP">
    <div class="col-md-3 naranja sinPadding">nombre</div>
    <div class="col-md-9 azul"><?php print_r($padrino['nino_apadrinado']['nombre']); ?></div>
  </div>
  <div class="col-md-12 daP">
    <div class="col-md-3 naranja sinPadding">género</div>
    <div class="col-md-9 azul"><?php print_r($padrino['nino_apadrinado']['genero']); ?></div>
  </div>
  <div class="col-md-12 daP">
    <div class="col-md-3 naranja sinPadding">fecha de nacimiento</div>
    <div class="col-md-9 azul"><?php print_r($padrino['nino_apadrinado']['fNacMes']); ?></div>
  </div>
  <div class="col-md-12 daP">
    <div class="col-md-3 naranja sinPadding">comedor</div>
    <div class="col-md-9 azul"><?php print_r($padrino['nino_apadrinado']['nombre_comedor']); ?></div>
  </div>