<?php 
require '../connection/connection.php';
$queryCategoria = mysql_query("SELECT * FROM categoria_producto ORDER BY 'categoriaId'") or die('Error, getCategoriaProducto');

mysql_close();
?>

<div id="alertContainerProducto"></div>
<div class="alert alert-error hide" id="tipoAlertError">
	<b>¡Alerta!</b> ¿Desea borrar el TIPO de producto selecciondo? - <b>Los productos asociados serán eliminados</b>
	<span class="btn btn-small btn-danger" onclick="javascript:$('#tipoAlertError').hide()">Cancelar</span>
	<span class="btn btn-small" id="deleteTipoBtn" onclick="javascript: actionDeleteTipo ($('#selectCategoria').val(),$('#selectTipo').val())"  >Aceptar</span>
</div>			
<form action="phpScripts/productos/saveProducto.php" enctype="multipart/form-data" id="formProducto" class="form-horizontal">
	<div class="control-group">
		<label class="control-label" for="inputEmail">Categoria</label>
		<div class="controls">
			<select id="selectCategoria" name="categoriaProducto" required>
				<option value="">Seleccione una categoria</option>
				<?php 
					while ($rowCategoria = mysql_fetch_array($queryCategoria)) {
						echo '<option value="'.$rowCategoria['categoriaId'].'">'.$rowCategoria['categoriaNombre'].'</option>';
					}
				?>				
			</select>
		</div>
	</div>
	
	<div class="control-group">
		<label class="control-label" for="inputEmail">Tipo</label>
		<div class="controls" id="selectTipoContainer">
			<select id="selectTipo" name="tipoProducto" required>
				<option>Seleccione un tipo</option>
			</select>				
		</div>
	</div>
	
	<div class="control-group">
		<label class="control-label" >Descripción:</label>
		<div class="controls">
			<div class="input-append">
				<input type="text" value="" name="descripcionProducto" id="producto-descripcion" required>		
			</div>	
		</div>
	</div>
	
	<div class="control-group">
		<label class="control-label" >Precio:</label>
		<div class="controls">
			<div class="input-append">
				<input type="text" value='' name="precioProducto" id="producto-precio">		
			</div>	
		</div>
	</div>
	<div class="control-group">
		<div class="controls">
			<button type="submit" class="btn" id="saveProducto" >Guardar</button>&nbsp;&nbsp;<img alt="loader" id="imgLoader" style="display:none" src="images/loaderImg.gif">
		</div>
	</div>
</form>