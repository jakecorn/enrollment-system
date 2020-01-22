<?php
session_start();
if(isset($_SESSION['session_id'])){
	include '../dbconfig.php';
	$description= $_POST['description'];
	$type= $_POST['type'];
 
	mysql_query("insert into subject values ('','$description','$type')");
}else{
	header("location:logout.php");
}


?> 