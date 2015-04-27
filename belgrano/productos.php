<?php
require 'panel/phpScripts/connection/connection.php';
$categoriaId = $_GET['categoriaId'];

$result = mysql_query("SELECT * FROM tipo_producto WHERE categoriaProducto='$categoriaId' ORDER BY 'tipoId'") or die('Error, getProductos error');
mysql_close();

if(mysql_num_rows($result) > 0){
	echo '<ul>';
	while ($row = mysql_fetch_array($result)) {
		echo '<li opacity: 1;">';
		echo '<div class="img-box-set blo">';
		echo '<dl>';
		echo '<dt><img src="panel/phpScripts/productos/getImageProducto.php?tipoId='.$row['tipoId'].'" /></dt>';
		echo '<dd>';
		echo '<p class="light-gray">'.$row['tipoNombre'].'</p>';
		echo '<a class="more" href="listaDeProductos.php?productoCategoria='.$row['categoriaProducto'].'&productoTipo='.$row['tipoId'].'" style="color: #ffffff; background-color: #21D24A;">Ver lista</a></dd>';
		echo '</dl>';
		echo '</div>';
		echo '</li>';
	}
	echo '</ul>';
}else{
	echo '<div class="errorMsj">No se encontraron productos</div>';
}
?>



