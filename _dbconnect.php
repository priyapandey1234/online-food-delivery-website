<?php
$servername = localhost;
$username = root;
$password = "";
$database = user;

$con=mysqli_connect($servername,$username, $password, $database)
if ($con){
	echo "sucess";
}
?>