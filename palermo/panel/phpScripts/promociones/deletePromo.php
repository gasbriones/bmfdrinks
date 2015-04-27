<?php
require "../connection/connection.php";
$promoId = $_GET['id'];

$query = "DELETE FROM promociones WHERE id='$promoId'";

if(mysql_query($query)){
	echo '<div class="alert alert-success"><strong>¡Bien hecho!</strong> La promoción se borró satisfactoriamente</div>';
}else{
	echo '<div class="alert alert-error"><strong>¡Error!</strong> La promoción no se pudo borrar, intenta nuevamente</div>';
}

?>