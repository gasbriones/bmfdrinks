<?php 
require '../connection/connection.php';
$queryCategoria = mysql_query("SELECT * FROM categoria_producto ORDER BY 'categoriaId'") or die('Error, getCategoriaProducto');

mysql_close();
?>

<div id="alertContainerListProducto"></div>
<form action="phpScripts/productos/saveProducto.php" enctype="multipart/form-data" id="formProducto" class="form-horizontal">
<div class="control-group">
	<label class="control-label" for="inputEmail">Categoria</label>
	<div class="controls">
		<select id="selectCategoriaList" name="categoriaProducto" required>
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
	<div class="controls" id="selectTipoContainerList">
		<select id="selectTipoList" name="tipoProducto" required>
			<option>Seleccione un tipo</option>
		</select>				
	</div>
</div>
<form>	
	