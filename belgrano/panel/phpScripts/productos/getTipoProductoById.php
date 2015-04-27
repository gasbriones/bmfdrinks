<?php
require '../connection/connection.php';
$categoriaId = $_GET['categoriaId'];
$action = $_GET['action'];
$result = mysql_query("SELECT * FROM tipo_producto WHERE categoriaProducto='$categoriaId' ORDER BY 'tipoId'") or die('Error, getPromociones error');
mysql_close();


if($action !='loadList'){
	echo '<select id="selectTipo" name="tipoProducto" required>';

	echo '<option value="">Seleccione un tipo</option>';
	while ($row = mysql_fetch_array($result)){
		echo '<option value="'.$row['tipoId'].'">'.$row['tipoNombre'].'</option>';
	}
	echo '</select> ';
	echo '<span><button class="btn btn-mini btn-success" type="button" id="nuevoTipo" data-toggle="modal" href="#nuevoTipoModal" >Nuevo</button></span>';
	echo '<span><button class="btn btn-mini btn-info hide" type="button" id="editTipo" data-toggle="modal" href="#nuevoTipoModal" >Editar</button></span> ';
	echo '<span><button class="btn btn-mini btn-danger hide" type="button" id="borrarTipo" data-toggle="modal" href="#" >Borrar</button></span>';
}else{
	echo '<select id="selectTipoList" name="tipoProducto" required>';

	echo '<option value="">Seleccione un tipo</option>';
	while ($row = mysql_fetch_array($result)){
		echo '<option value="'.$row['tipoId'].'">'.$row['tipoNombre'].'</option>';
	}
	echo '</select> ';
}

?>