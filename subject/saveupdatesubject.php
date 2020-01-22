<?php
session_start();
if(isset($_SESSION['session_id'])){
	include '../dbconfig.php';
	$description= $_POST['description'];
	$type= $_POST['type'];
	$sub_id= $_POST['sub_id'];
 
 
	mysql_query("update subject set description='$description', type='$type' where sub_id='$sub_id' ") or die(mysql_error());
}else{
	header("location:logout.php");
}


?> 