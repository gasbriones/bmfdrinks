<?php
require '../connection/connection.php';
$imageId = $_GET['id'];
$query = mysql_query("SELECT * FROM promociones WHERE id='$imageId'");
$row = mysql_fetch_array($query);
$content = $row['img'];

header("Content-type: image/jpeg");
echo $content;

?>