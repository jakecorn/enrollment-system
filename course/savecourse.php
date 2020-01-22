<?php
session_start();
if(isset($_SESSION['session_id'])){
	include '../dbconfig.php';
	$description= $_POST['description'];
 	$track= $_POST['track'];

	mysql_query("insert into course values ('','$description','$track')");
}else{
	header("location:logout.php");
}


?>aaaaaaa