<?php
session_start();

if(isset($_SESSION['session_id'])){
	include '../dbconfig.php';
 	$course_id=$_POST['course_id'];
	$section=$_POST['section'];
	$grade=$_POST['grade'];
	$sched_id=$_POST['sched_id'];

	echo "$course_id $section $grade $sched_id";
	mysql_query("update schedule set course_id='$course_id', section='$section',grade='$grade'  where sched_id='$sched_id'") or die(mysql_error());
}else{

	header("location:logout.php");
}

?>asdf
