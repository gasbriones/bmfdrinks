<?php
require '../connection/connection.php';
$result = mysql_query("SELECT * FROM promociones ORDER BY 'id'") or die('Error, getPromociones error');

if(mysql_num_rows($result) > 0){
	echo '<ul class="thumbnails">';
	while ($row = mysql_fetch_array($result)) {
		echo '<li class="span3" data-content="Precio: '.$row['precio'].'</br> Descrip: '.$row['descripcion'].'"><a href="#editPromocion" data-toggle="modal"><i class="icon-pencil control-btn-edit" promoId="'.$row['id'].'"></i></a><i class="icon-remove-sign control-btn-delete"></i><span class="thumbnail"><img id="'.$row['id'].'" src="phpScripts/promociones/getImage.php?id='.$row['id'].'" /></span></li>';
	}
	echo '</ul>';
}else{
	echo '<span>No se encontraron promociones</span>';
}

?>