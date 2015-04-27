<?php
require 'panel/phpScripts/connection/connection.php';
$productoCategoria = $_GET['productoCategoria'];
$productoTipo = $_GET['productoTipo'];

$query = "SELECT * FROM lista_producto WHERE productoCategoria='$productoCategoria' AND productoTipo='$productoTipo' ";
$queryTipo = "SELECT tipoNombre FROM tipo_producto WHERE tipoId='$productoTipo'";

$result = mysql_query($query);
$titulo = mysql_query($queryTipo);
$titulo = mysql_fetch_array($titulo);

?>

<div id="readmore">
	<?php
		echo '<h3>'.$titulo['tipoNombre'].'</h3>';
		if(mysql_num_rows($result) > 0){
			echo '<ul>';
			while($row = mysql_fetch_array($result)){
				echo '<li><span class="desc">'.$row['productoDescripcion'].'</span><span class="price"><b>'.$row['productoPrecio'].'</b></span></li>';
			}
			echo '</ul>';
		}else{
			echo '<div class="errorMsj">No se encontraron productos</div>';
		}
	?>
</div>
