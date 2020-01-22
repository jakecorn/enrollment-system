<?php
session_start();

if(isset($_SESSION['session_id'])){
	include '../dbconfig.php';
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$mname = $_POST['mname'];
	$gender = $_POST['gender'];
	mysql_query("insert into teacher values ('','$fname','$lname','$mname','$gender')");
}else{
	header("location:logout.php?msg=Your session has expired. Please login again");
}
?>