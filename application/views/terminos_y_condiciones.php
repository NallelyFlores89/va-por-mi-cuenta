<script>
	$(document).ready(function(){
		$("#terminos_texto").hide();
		$("#cerrar").click(function(){
			$("#terminos_texto").hide();
		})
		$(".termL").click(function(){
			$("#terminos_texto").show();
		})
	})
</script>
<style>
	#terminos_texto{
		color: #000;
		background-color: #FFF; 
		border: 4px solid #eb8523;
		padding: 40px;
		margin: 0 auto;
		top: 40px;
		position: fixed;
		z-index: 1000;
	}
	p{
		text-indent: 20px;
		font-size: 20px;
		margin-bottom: 30px;
	}
	#cerrar{
		float: right;
		color: #FFF;
		font-size: 20px;
		border: 2px solid #00567C;
		padding: 10px 30px;
		width: 100px;
		background-color: #00567C;

	}
</style>
<div class="col-md-8 col-sm-offset-2 bordeRadius" id="terminos_texto">
<p>Por este conducto manifiesto que conozco los fines sin lucro de Fundación Alsea, A.C. y de manera voluntaria autorizo al área de nóminas de la Empresa a la cual yo presto mis servicios, a que me descuente quincenalmente la cantidad descrita en la pantalla anterior.</p>
 
<p>La aportación a la que me comprometo es voluntaria y podrá ser cancelada en el momento que se indique por escrito a Recursos Humanos, cancelándose la quincena posterior a la notificación.
Los recibos se emitirán anualmente, entregándose el mes de febrero del año siguiente.</p>
 
<p>En caso de salir de la empresa se cancelará automáticamente el cargo hecho vía nómina y no se podrá rembolsar las aportaciones ya hechas a Fundación Alsea, A.C.</p>
<input id="cerrar" type="button" value="cerrar">
</div>
