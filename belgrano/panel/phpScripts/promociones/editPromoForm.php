<?php 
require '../connection/connection.php';
$promoId = $_GET['id'];
$result = mysql_query("SELECT * FROM promociones WHERE id='$promoId'") or die('Error, getPromociones error');
$row = mysql_fetch_array($result);

mysql_close();
?>


<div class="alert alert-info">Aquí­ podras editar promociones!!</div>
<div class="well">
	<div id="alertContainerEdit"></div>		
	<form action="phpScripts/promociones/editPromo.php" enctype="multipart/form-data" id="formPromosEdit" class="form-horizontal">
		<input type="hidden"  name="promoId" value="<?php echo $row['id']?>">	
		<div class="control-group">
			<label class="control-label">Imágen</label>
			<div class="controls">
				<div class="input-append">
				   <input id="imagenEdit" type="file" style="display:none"  name="imgEdit">
				   <input id="photoCoverEdit" class="input-large" type="text">
				   <span class="btn" onclick="$('input[id=imagenEdit]').click();">Examinar</span>					   				   
				</div>
				<span class="ayuda">Solo se permiten imágenes tipo JPEG.</span>					
			</div>						 
		</div>
		
		<div class="control-group">
			<label class="control-label" >Descripción:</label>
			<div class="controls">
				<div class="input-append">
					<input type="text" value="<?php echo $row['descripcion'] ?>" name="descripcionEdit" id="promo-descripcion-edit">		
				</div>	
			</div>
		</div>
		
		<div class="control-group">
			<label class="control-label" >Precio:</label>
			<div class="controls">
				<div class="input-append">
					<input type="text" value='<?php echo $row['precio'] ?>' name="precioEdit" id="promo-precio-edit">		
				</div>	
			</div>
		</div>
	</form>
</div>