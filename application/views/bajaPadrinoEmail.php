  <?php 
    $mes = array(
      1=> "Enero", 2 => 'Febrero', 3=>'Marzo', 4=>'Abril', 5 => 'Mayo', 6 => 'Junio',
      7=> 'Julio', 8=>'Agosto', 9 => 'Septiembre', 10 => 'Octubre', 11 => 'Noviembre', 12=>'Diciembre'
    );
  ?>
  <p>Uno de nuestros padrinos ha decidido ya no continuar con la donación</p>
  <h1>Padrino</h1>
  <div><b>nombre : </b><?= $padrino['nombre']; ?></div>
  <div><b>correo : </b><?= $padrino['correo']; ?></div>
  <div><b>número de empleado : </b><?= $padrino['num_empleado']; ?></div>
  <div><b>comidas que apadrinaba: </b><?= $padrino['nino_apadrinado']['num_comidas'];?></div>
  <div><b>descuento vía nómina quincenal:</b> $ <?= $padrino['nino_apadrinado']['donacion'];?></div>

  <h1>Niño</h1>
  <div><b>nombre: </b><?= $padrino['nino_apadrinado']['nombre']." ".$padrino['nino_apadrinado']['apat']." ".$padrino['nino_apadrinado']['amat']; ?></div>
  <div><b>género: </b><?= $padrino['nino_apadrinado']['genero']; ?></div>
  <div><b>fecha de nacimiento: </b> <?= $mes[$padrino['nino_apadrinado']['fNacMes']]." ".$padrino['nino_apadrinado']['fNacDia']." del ".$padrino['nino_apadrinado']['fNacAno']; ?></div>
  <div><b>comedor: </b><?= $padrino['nino_apadrinado']['nombre_comedor']; ?></div>