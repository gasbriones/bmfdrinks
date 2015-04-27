<?php
require '../connection/connection.php';
$categoria = $_GET['categoriaId'];
$tipo = $_GET['tipoId'];

$query = "SELECT * FROM lista_producto WHERE productoCategoria='$categoria' AND productoTipo ='$tipo' ORDER BY productoId";
$result = mysql_query($query);
?>

<table class="table table-hover" id="tableProductos">
	<thead>
		<tr>
			<th>ID</th>
			<th>Descripcion</th>
			<th>Precio</th>
			<th>Acciones</th>
		</tr>
	</thead>
	<tbody>
		<?php
		if(mysql_num_rows($result) > 0){
			while ($row = mysql_fetch_array($result)){
				echo '<tr>';
				echo '<td>'.$row['productoId'].'</td>';
				echo '<td><input type="text" class="productoDescripcion"  style="display:none" value="'.$row['productoDescripcion'].'" /><span>'.$row['productoDescripcion'].'</span></td>';
				echo '<td><input type="text" class="productoPrecio" style="display:none" value="'.$row['productoPrecio'].'" /><span>'.$row['productoPrecio'].'</span></td>';
				echo '<td><i class="icon-pencil"></i>&nbsp;<i class="icon-ok-sign hide" productoId="'.$row['productoId'].'"></i> &nbsp;<i class="icon-remove-sign" prodId="'.$row['productoId'].'"></i></td>';
				echo '</tr>';
			}
		}else{
			echo '<tr><td colspan="4">No se encontraron productos</td><tr>';
		}	
		?>
	</tbody>
</table>
