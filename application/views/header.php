<div class="cajaHeader">
	<div id="header" class="row">
		<div class="col-md-6 col-lg-6 col-xs-12">
			<a href="<?= base_url()?>index.php"><img src="<?= base_url()?>media/img/logovxmc.png"></a>
		</div>
		<div class="col-md-6 col-xs-12 col-lg-3 col-lg-offset-3 text-center">
			<img src="<?= base_url()?>media/img/logoalsea.png">
		</div>
		<div id="redesSociales" class="col-md-2 col-xs-12 col-md-offset-3">
			<div class="col-md-4 col-xs-4"><a target="_blank" href="mailto:vapormicuenta@alsea.com.mx?Subject=Hola"><img src="<?= base_url()?>media/img/icon-mail.png"></a></div>
			<div class="col-md-4 col-xs-4"><a target="_blank" href="https://twitter.com/VaXMiCuenta"><img src="<?= base_url()?>media/img/icon-tw.png"></a></div>
			<div class="col-md-4 col-xs-4"><a target="_blank" href="https://www.facebook.com/vapormi?fref=ts"><img src="<?= base_url()?>media/img/icon-fb.png"></a></div>
		</div>
	</div>
	<div class="barraNavegacion">
		<nav class="navbar navbar-default" role="navigation">
		  <div class="container-fluid">
		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
			  <a class="navbar-brand bordeD" href="<?= base_url()?>"><img src="<?= base_url()?>media/img/home_icon.png"></a>		
		    </div>

		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      <ul class="nav navbar-nav omnes">
		        <li class="bordeD"><div><a href="<?= base_url()?>index.php/el_movimiento" >El Movimiento</a></div></li>
		        <li class="bordeD"><div><a href="<?= base_url()?>index.php/apadrina" class="">Apadrina <br>a un niño</a></div></li>
		        <li class="bordeD"><div><a href="<?= base_url()?>index.php/testimonios" class="">Testimonios</a></div></li>
		        <li class="bordeD"><div><a href="<?= base_url()?>index.php/carta" class="">Escríbele una <br> carta a tu niño</a></div></li>
		        <li class="bordeD"><div><a href="<?= base_url()?>index.php/yo_apadrino">Yo apadrino a...</a></div></li>
		        <!-- <li class=""><div><a title="cerrar sesión" href="<?= base_url()?>index.php/login/logout"><img src="<?= base_url()?>media/img/login.png"/></a></div></li> -->
		        <?php ?>
		        <li class="">
		        	<div>
		        		<a title="mi cuenta" href="<?= base_url()?>index.php/login/logout">
		        			<span class="glyphicon glyphicon-off" arian-hidden="true"></span>
		        		</a>
		        	</div>
		        </li>
		      </ul>
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>
	</div>
</div>