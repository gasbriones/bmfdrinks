<?php
require '../connection/connection.php';
$categoria = $_GET['categoria'];
$tipo = $_GET['tipo'];

$queryCategoria = "DELETE FROM tipo_producto WHERE tipoId='$tipo'";
$queryProductos = "DELETE FROM lista_producto WHERE productoCategoria='$categoria' AND productoTipo='$tipo'";
if(mysql_query($queryCategoria)){
	if(mysql_query($queryProductos)){
		echo '<div class="alert alert-success"><strong>¡Bien hecho!</strong> El tipo de producto fue eliminado</div>';
	}else{
		echo '<div class="alert alert-error"><strong>¡Error!</strong> Se produjo un error al eliminar los productos asociados</div>';
	}
}else{
	echo '<div class="alert alert-error"><strong>¡Error!</strong> Se produjo un error al eliminar el TIPO de producto</div>';
}

?>