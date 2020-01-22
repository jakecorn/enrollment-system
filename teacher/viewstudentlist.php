<?php
session_start();
if(isset($_SESSION['session_id'])){
	include '../dbconfig.php';
	$sched_id=$_REQUEST['sched_id'];
	$teacher_id=$_REQUEST['teacher_id'];

	$getstud=mysql_query("select * from student,subject_enrolled where student.stud_id=subject_enrolled.stud_id and sched_id='$sched_id' order by lname,fname");
	$getsy=mysql_query("select * from schedule where sched_id='$sched_id'");
	$getsyrow=mysql_fetch_array($getsy);
	$sy=$getsyrow['sy'];
	$semester=$getsyrow['semester'];

	$subject=mysql_query("select description from schedule,subject where schedule.sub_id=subject.sub_id and sched_id='$sched_id'");
	$subrow=mysql_fetch_array($subject);

	;

	?>
	<div>

	<?php
		echo "Description: $subrow[description] <br>";
		echo "SY: $sy <br>";
		echo "Semester: $semester<br>";
	?>
	<br>
	<table>
		<tr id="th">
			<th>No.</th>
			<th>Name</th>
			<th>Course</th>
			<th>Grade</th>
		</tr>	
	

	<?php
	$no=1;
	while ($studrow=mysql_fetch_array($getstud)) {
		$grade=mysql_query("select grade_score from grade where stud_id='$studrow[stud_id]' and sched_id='$sched_id'");
		$grade_score=mysql_fetch_array($grade);
		 
		$getcourse=mysql_query("select * from student_status,course where student_status.course_id=course.course_id and  stud_id='$studrow[stud_id]' and sy='$sy' and semester='$semester'");
		$courserow=mysql_fetch_array($getcourse);

		?>
		<tr>
			<td><?=$no;$no++;?>.</td>
			<td><?=$studrow['lname'].", ".$studrow['fname'];?></td>
			<td><?=$courserow['description'];?>-<?=$courserow['grade'];?></td>
			<td align="center"><?=$grade_score['grade_score'];?></td>
		</tr>
		<?php
 	}

}else{

	header("location:logout.php");
}

?>
</table>
</div>
<style>

div {
	width:7in;
	margin:auto;
		font-family: helvetica
 }

 table {
 	width:100%;
  	border-collapse: collapse;
 	
 

 }
 table th {
 	text-align: left
 }
 table td,table th {
 	padding:1px;
 	border:1px solid gray;
 }
</style>

<script>
	window.print();
</script>