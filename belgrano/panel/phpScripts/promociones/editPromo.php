<?php
require '../connection/connection.php';

$tmpName  = $_FILES['imgEdit']['tmp_name'];
$descripcion = strtoupper($_GET['descripcionEdit']);
$precio = $_GET['precioEdit'];
$promoId = $_GET['promoId'];

if($tmpName){
	$fp = fopen($tmpName, 'r');
	$img = fread($fp, filesize($tmpName));
	$img = addslashes($img);
	fclose($fp);
	
	$query = "UPDATE promociones SET img= '$img', precio= '$precio', descripcion= '$descripcion' WHERE id='$promoId'";
	$results = mysql_query($query)or die(mysql_error());
}else{
	$query = "UPDATE promociones SET precio= '$precio', descripcion= '$descripcion' WHERE id='$promoId'";
	$results = mysql_query($query)or die(mysql_error());
}


if ($results){
	echo  '<div class="alert alert-success"><strong>¡Bien hecho!</strong> La promocion fue editada con exito</div>';
}else{
	echo '<div class="alert alert-error"><strong>¡Error!</strong> Se produjo un error al editar la promo, intenta nuevamente</div>';
}


mysql_close();

?>