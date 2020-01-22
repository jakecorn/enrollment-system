<?php
session_start();

if(isset($_SESSION['session_id'])){
	include '../dbconfig.php';
	$sy =$_SESSION['sy'];
	$semester =$_SESSION['semester'];
	$sched_id=$_POST['sched_id'];
	$stud_id=$_POST['stud_id'];

	
		mysql_query("insert into subject_enrolled values ('','$stud_id','$sched_id')");
	

}else{
	header("location:logout.php");
}

?>