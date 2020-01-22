<?php
session_start();

if(isset($_SESSION['session_id'])){
	include '../dbconfig.php';
	$sub_id=$_POST['sub_id'];
	$teacher_id=$_POST['teacher_id'];
	$sy=$_SESSION['sy'];

	$semester = $_SESSION['semester'];
	mysql_query("insert into schedule values('','$sub_id','$teacher_id','','','','$sy','$semester')");
}else{

	header("location:logout.php");
}