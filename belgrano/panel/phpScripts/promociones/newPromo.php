<?php
require '../connection/connection.php';

$tmpName  = $_FILES['img']['tmp_name'];
$descripcion = strtoupper($_GET['descripcion']);
$precio = $_GET['precio'];

$fp = fopen($tmpName, 'r');
$img = fread($fp, filesize($tmpName));
$img = addslashes($img);
fclose($fp);


$query = "INSERT INTO promociones (img, precio,descripcion) VALUES ('$img','$precio','$descripcion')";
$results = mysql_query($query)or die(mysql_error());

if ($results){
	echo  '<div class="alert alert-success"><strong>¡Bien hecho!</strong> La promocion fue dada de alta con exito</div>';
}else{
	echo '<div class="alert alert-error"><strong>¡Error!</strong> Se produjo un error al dar de alta la promo, intenta nuevamente</div>';
}


mysql_close();

?>