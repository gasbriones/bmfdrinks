<?php
require '../connection/connection.php';
$productoCategoria = $_GET['categoriaProducto'];
$productoTipo = $_GET['tipoProducto'];
$productoDescripcion = $_GET['descripcionProducto'];
$productoPrecio = $_GET['precioProducto'];

$query = "INSERT INTO lista_producto (productoCategoria,productoTipo,productoDescripcion,productoPrecio) VALUES('$productoCategoria','$productoTipo','$productoDescripcion','$productoPrecio')";

if(mysql_query($query)){
	echo  '<div class="alert alert-success"><strong>¡Bien hecho!</strong> El producto fue dado de alta con exito</div>';
}else{
	echo '<div class="alert alert-error"><strong>¡Error!</strong> Se produjo un error al dar de alta el producto, intenta nuevamente</div>';
}


?>