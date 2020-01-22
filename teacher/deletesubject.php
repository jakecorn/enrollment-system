<?php
session_start();
if(isset($_SESSION['session_id'])){
	include '../dbconfig.php';
	$sched_id=$_POST['sched_id'];
	mysql_query("delete from schedule where sched_id='$sched_id'");
}else{

	header("location:logout.php");
}

?>asdf
