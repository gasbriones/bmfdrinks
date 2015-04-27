<?php
require '../connection/connection.php';
$productoId = $_GET['productoId'];
$productoDescripcion = $_GET['productoDescripcion'];
$productoPrecio = $_GET['productoPrecio'];
$action = $_GET['action'];


if($action =='deleteItem'){
	$query = "DELETE FROM lista_producto WHERE productoId='$productoId'";
	$result = mysql_query($query);
}else{
	$query = "UPDATE lista_producto SET productoDescripcion='$productoDescripcion', productoPrecio='$productoPrecio' WHERE productoId='$productoId'";
	$result = mysql_query($query);
}


?>