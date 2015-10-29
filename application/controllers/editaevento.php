<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Editar evento</title>
		 <meta name="viewport" content="initial-scale=1, width=device-width, maximum-scale=1, minimum-scale=1, user-scalable=no">

		<script type="text/javascript" src="<?=base_url();?>media/scripts/jquery-1.11.0.min.js"></script>
		<script type="text/javascript" src="<?=base_url();?>media/scripts/admin-menu.js"></script>
				<script type="text/javascript" src="<?=base_url();?>media/scripts/tinymce/tinymce.min.js"></script>

		<script> base = "<?= base_url(); ?>"</script>
		<script src="<?= base_url() ?>media/scripts/formeventos.js"></script>

		<link rel="stylesheet" href="<?=base_url()?>media/css/admin/formeventos.css" type="text/css" />
		<link rel="stylesheet" type="text/css" href="<?=base_url();?>media/css/reset.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="<?=base_url();?>media/css/admin/admin.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="<?=base_url();?>media/css/admin/menu.css" media="screen" />
		<script>
		
	
		$(document).ready(function(){
	 
 
	$("#labelseleccionar1").on("click", function(){
	 $("#seleccionar1").click();
	 });
	 $("#labelseleccionar2").on("click", function(){
	  $("#seleccionar2").click();
	 });	
	 
 
 
 });
 
 
 		
tinymce.init({
    selector: "textarea",
    theme: "modern",
    width: 680,
    height: 450,
    plugins: [
         "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
         "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
         "save table contextmenu directionality emoticons template paste textcolor"
   ],
   content_css: "css/content.css",
   toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons", 
   style_formats: [
        {title: 'Bold text', inline: 'b'},
        {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
        {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
        {title: 'Example 1', inline: 'span', classes: 'example1'},
        {title: 'Example 2', inline: 'span', classes: 'example2'},
        {title: 'Table styles'},
        {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
    ]
 }); 
 
 
 
</script>	
	
	
	</head>
	<body>
		<?=$menu;?>
		<div class="contenido">        
			<h1>Editar evento </h1>
			<div id="Form" >
				<form action="<?= base_url();?>index.php/admin/adminmostrarevento/actualizarevento" name="formEventos" id="formEventos" method="post"  enctype="multipart/form-data">
					<table id="form" >
				
				<tr style="border-color: #ffffff; border-style: solid; border-width: 2px;">
				<td style="width: 30%">
					<label >Nombre del evento</label>
				</td>
				<td style="width: 70%">
					<input  name="titulo" required type="text" value="<?=$traeregEvento[0]['nombre']?>">    
				</td></tr>
				<tr style="border-color: #ffffff; border-style: solid; border-width: 2px;">
				<td style="width: 30%">
					<label>Lugar del evento</label>
				</td>
				<td style="width: 70%">
					<input type="text" required name="lugar" value="<?=$traeregEvento[0]['lugar']?>">
				</td></tr>
				<tr style="border-color: #ffffff; border-style: solid; border-width: 2px;">
				<td style="width: 30%">
							
					<label >Descripci&oacute;n del evento</label>
				</td>
				<td style="width: 70%">
					<textarea name="contenido" rows="4" cols="50" required><?= $traeregEvento[0]['descripcion']?></textarea>		
					<input type="hidden" value="<?= $traeregEvento[0]['idEventos']?>" name="id" />
				</td>
				</tr>
				</table>
									
				<!--	<div class="cajaDos">
						<div class="cajaDosChild">
							<label>Elige una foto para la portada del evento:</label>
							<input class="upload-file" required type="file" data-max-size="3145728" name="files[]" required accept='jpeg,image/gif,image/png,application'>
						</div>  
					</div>-->
					
					
					
					<table id="carga" >
					
					<tr>
				<td style="width: 50%">
							<label>Cambiar foto para la portada del evento:</label>
				</td><td>
						<input style="display:inline" id="seleccionar1"  class="upload-file" type="file" data-max-size="3145728" name="files[]"  accept='jpeg,image/gif,image/png,application'>
						
				
				
				</td>
				</tr>
					
					
						<tr>
						<td style="width: 50%">
							<label>Fecha</label>
							</td><td><label>De: </label><input type="date" required name="fecha" value="<?=$traeregEvento[0]['fecha']?>"><label> a </label><input type="date" required name="fecha_final" value="<?=$traeregEvento[0]['fecha_final']?>">
							</td></tr><td><label>Hora</label>
							</td><td><label>De: </label><input id="hora" type="time" required name="hora" value="<?=$traeregEvento[0]['horario']?>"><label> a </label><input id="hora" type="time" required name="hora_final" value="<?=$traeregEvento[0]['horario_final']?>">
							</td></tr>
							
							<tr>
							<td>			
							<label>Visibilidad</label>
							</td><td>			
							<select name="visibilidad">
							<option <?php if($traeregEvento[0]['Visibilidad']==0){  ?>  selected  <?php } ?> value=0>Público</option>
							<option <?php if($traeregEvento[0]['Visibilidad']==1){  ?>  selected  <?php } ?> value=1>Solo miembros</option>
							
							
							</select>
							</td>
							</tr>
							
							
							</table>
							
							
							<input class="botonR" type="image" src="<?=base_url()?>/media/images/admin/botones/actualizar.png"  width="80px" height="30px" value="Subir" onclick="return confirmar('¿Está seguro de que desea modificar la informacion de este registro?')" >
				

				
				</form>
			</div>       
		</div>
	</body>
</html>