<?php
session_start();
include '../connection/connection.php';
$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";

$result = mysql_query($query);

$row = mysql_fetch_array($result);



if ($row){
	$_SESSION["s_username"] = $row['username'];
	header ("location: ../../index.php");
}else{
	header ("location: ../../index.php");
	$_SESSION["loginError"]  = "Usuario o contraseña incorrecto";

}


?>