<?php
session_start();
if(isset($_SESSION['session_id'])){
	include '../dbconfig.php';
	$sub_id= $_POST['sub_id'];
 
 
	mysql_query("delete from subject where sub_id='$sub_id' ") or die(mysql_error());
}else{
	header("location:logout.php");
}


?> 