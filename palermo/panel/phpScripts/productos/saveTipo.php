<?php
require '../connection/connection.php';

$action = $_GET['action'];
$categoriaProducto = $_GET['categoriaProducto'];
$tmpName  = $_FILES['imgTipo']['tmp_name'];
$tipoNombre = strtoupper($_GET['nombreTipo']);
$tipo = $_GET['tipoId'];

if($tmpName){
	$fp = fopen($tmpName, 'r');
	$img = fread($fp, filesize($tmpName));
	$img = addslashes($img);
	fclose($fp);
	
	$queryUpdate = "UPDATE tipo_producto SET tipoNombre='$tipoNombre', imagen='$img' WHERE tipoId='$tipo' ";
}else{
	$queryUpdate = "UPDATE tipo_producto SET tipoNombre='$tipoNombre' WHERE tipoId='$tipo' ";
}


if($action =='save'){
	$query = "INSERT INTO tipo_producto (tipoNombre, imagen, categoriaProducto) VALUES ('$tipoNombre','$img','$categoriaProducto')";
	$results = mysql_query($query)or die(mysql_error());
	$msjSucces = 'El nuevo tipo de producto fue dado de alta con exito';
	$msjError = 'Se produjo un error al dar de alta el tipo de producto, intenta nuevamente';
}elseif ($action == 'edit'){
	$results = mysql_query($queryUpdate);
	$msjSucces = 'El tipo de producto fue editado con exito';
	$msjError = 'Se produjo un error al editar el tipo de producto, intenta nuevamente';
}


if ($results){
	echo  '<div class="alert alert-success"><strong>¡Bien hecho!</strong> '.$msjSucces.'</div>';
}else{
	echo '<div class="alert alert-error"><strong>¡Error!</strong> '.$msjError.'</div>';
}


mysql_close();

?>