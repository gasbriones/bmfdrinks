<?php 
require '../connection/connection.php';

$action = $_GET['action'];
$categoria = $_GET['categoria'];
$required = 'required';
$tipo = $_GET['tipo'];

if($action == 'edit'){
	$required = '';	
	$query = "SELECT * FROM tipo_producto WHERE tipoId='$tipo' ";
	$result = mysql_query($query);
	$row = mysql_fetch_array($result);
}

mysql_close();
?>

<div class="alert alert-info">Aquí­ podras agregar nuevos tipos de productos!!</div>
<div class="well">
	<div id="alertContainerTipo"></div>		
	<form action="phpScripts/productos/saveTipo.php?action=<?php echo $action;?>" enctype="multipart/form-data" id="formNewTipo" class="form-horizontal">
		<input type="hidden" value="<?php echo $categoria; ?>" name="categoriaProducto" />
		<input type="hidden" value="<?php echo $tipo; ?>" name="tipoId" />		
		<div class="control-group">
			<label class="control-label">Imágen</label>
			<div class="controls">
				<div class="input-append">
				   <input id="imagenTipo" type="file" style="display:none"  name="imgTipo">
				   <input id="photoCoverTipo" class="input-large" type="text" <?php echo $required;?> />
				   <span class="btn" onclick="$('input[id=imagenTipo]').click();">Examinar</span>					   				   
				</div>
				<span class="ayuda">Solo se permiten imágenes tipo JPEG.</span>					
			</div>						 
		</div>
		
		<div class="control-group">
			<label class="control-label" >Descripción:</label>
			<div class="controls">
				<div class="input-append">
					<input type="text" value="<?php echo $row['tipoNombre'];?>" name="nombreTipo" id="tipo-descripcion" <?php echo $required;?> />		
				</div>	
			</div>
		</div>
	</form>
</div>