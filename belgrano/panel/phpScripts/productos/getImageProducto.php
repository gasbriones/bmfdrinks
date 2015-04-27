<?php
require '../connection/connection.php';
$tipoId = $_GET['tipoId'];
$query = mysql_query("SELECT * FROM tipo_producto WHERE tipoId='$tipoId'");
$row = mysql_fetch_array($query);
$content = $row['imagen'];

header("Content-type: image/jpeg");
echo $content;

?>