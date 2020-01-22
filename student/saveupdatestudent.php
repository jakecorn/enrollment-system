<?php
session_start();

if(isset($_SESSION['session_id'])){
	include '../dbconfig.php';
	$sy =$_SESSION['sy'];
	$semester =$_SESSION['semester'];
	$stud_id = $_POST['stud_id'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$mname = $_POST['mname'];
	$address = $_POST['address'];
	$gender = $_POST['gender'];
	$grade = $_POST['grade'];
	$status = $_POST['status'];
	$strand = $_POST['strand'];
	mysql_query("update  student set fname='$fname',lname='$lname',mid_name='$mname',gender='$gender',address='$address' where stud_id='$stud_id'") or die(mysql_error());
	$c=mysql_query("select * from student_status where stud_id='$stud_id' and semester='$semester' and sy='$sy'");
	if(mysql_num_rows($c)>0){
		mysql_query("update student_status set status='$status',grade='$grade', course_id='$strand' where stud_id='$stud_id' and sy='$sy' and semester='$semester'") or die(mysql_error());
	}else{
		mysql_query("insert into student_status values('','$stud_id','$strand','$grade','$sy','$semester','$status')");
	}
}else{
	header("location:logout.php");
}
?> 