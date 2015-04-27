<?php
require 'panel/phpScripts/connection/connection.php';
$result = mysql_query("SELECT * FROM promociones ORDER BY 'id'") or die('Error, getPromociones error');
mysql_close();

if(mysql_num_rows($result) > 0){
	echo '<ul class="imgs-promos">';
	while ($row = mysql_fetch_array($result)) {
		echo '<li>';		
		echo '<img class="promoImg" src="panel/phpScripts/promociones/getImage.php?id='.$row['id'].'" />';
		echo '<div class="promoPrecio"><span>'.$row['precio'].'</span></div>';
		echo '<div class="promoDescripcion"><span>'.$row['descripcion'].'</span></div>';
		echo '</li>';
	}
	echo '</ul>';
}else{
	echo '<span>No se encontraron promociones</span>';
}
?>