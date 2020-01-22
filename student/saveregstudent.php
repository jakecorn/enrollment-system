<?php
session_start();

if(isset($_SESSION['session_id'])){
	include '../dbconfig.php';

	$sy=$_SESSION['sy'];
	$semester = $_SESSION['semester'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$mname = $_POST['mname'];
	$address = $_POST['address'];
	$gender = $_POST['gender'];
	$grade = $_POST['grade'];
	$status = $_POST['status'];
	$track = $_POST['track'];
	mysql_query("insert into student values ('','$fname','$lname','$mname','$gender','$address')");
	$sql=mysql_query("select stud_id from student where fname='$fname' and lname='$lname' and mid_name='$mname' and gender='$gender' and address='$address' order by stud_id desc limit 1");
	$studrow=mysql_fetch_array($sql);

	mysql_query("insert into student_status values ('','$studrow[stud_id]','$track','$grade','$sy','$semester','$status')");
}else{
	header("location:logout.php?msg=Your session has expired. Please login again");
}
?>