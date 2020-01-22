<?php
session_start();

if(isset($_SESSION['session_id'])){
	include '../dbconfig.php';
	$sy =$_SESSION['sy'];
	$semester =$_SESSION['semester'];
	$course_id=$_POST['course_id'];
	$grade=$_POST['grade'];
	$section=$_POST['section'];
	$stud_id=$_POST['stud_id'];

	$getsub=mysql_query("select * from schedule where sy='$sy' and semester='$semester' and course_id='$course_id' and grade='$grade' and  section='$section'");
	
	while ($subrow=mysql_fetch_array($getsub)) {
		mysql_query("insert into subject_enrolled values ('','$stud_id','$subrow[sched_id]')");
	}

}else{
	header("location:logout.php");
}

?>