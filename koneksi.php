<?php
	$host ="localhost";
	$username ="root";
	$password ="";
	$db ="pdam_bandarmasih";

 $koneksi = mysqli_connect($host, $username, $password, $db);
 if(!$koneksi){
 	die("Connection Failed".mysql_connect_error());
 }
 
 ?>
