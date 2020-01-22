<?php
session_start();
include "../dbconfig.php";
$sy = $_SESSION['sy'];
$semester = $_SESSION['semester'];
$teacher_id=$_REQUEST['teacher_id'];
$getname = mysql_query("select * from teacher where teacher_id='$teacher_id'");
$trow=mysql_fetch_array($getname);
?>
Search subject: <input type="text" onkeyup="searchsubject(this)"  placeholder="Search subject" id="topsearch">
		<div id="searchresult2" class="searchresult" style="display:none;left:122px">
		</div><br><br>
		Instructor's name: <b style="text-transform:capitalize"><?="$trow[fname] $trow[mid_name] $trow[lname]";?></b><br><br>
<table class="tablelist">
	 
	<tr id="th">
		<td>No. </td>
		<td>Subject Description</td>
		<td>Type</td>
		<td>Student</td>
 		<td align="center">Action</td>
	</tr>
	<?php

	$sql=mysql_query("select *,schedule.course_id as course_id from schedule,subject where schedule.sub_id=subject.sub_id and  teacher_id='$teacher_id' and sy='$sy' and semester='$semester'");
	$no=1;
	while ($subrow=mysql_fetch_array($sql)) {
		
		
		?>
		<tr>
			<td><?=$no;?>. </td>
			<td><?=$subrow['description'];?></td>
			<td><?=$subrow['course_id'];?></td>
			<?php
				$getcourse=mysql_query("select  * from course where course_id='$subrow[course_id]'");
				$coursedesc=mysql_fetch_array($getcourse);
				$c = mysql_num_rows($getcourse);
			?>
 			<td><?=$coursedesc['description'];?>-<?=$subrow['grade'];?>-<?=$subrow['section'];?></td>
			<td align="center">
				<button class="butaction delete" onclick="deletesubject(<?=$subrow['sched_id'];?>)" title="Remove this subject">Delete</button>
				<button  title="Add student to this subject" class="butaction update" onclick="showdialogstudent(<?=$subrow['sched_id'];?>)">Student</button>
				<button  title="Add student to this subject" class="butaction update" onclick="dialodviewstudent(<?=$subrow['sched_id'];?>)">View</button>
				<!-- <a target="new<?=$subrow['sched_id'];?>" title="View student list" href="teacher/viewstudentlist.php?sched_id=<?=$subrow['sched_id'];?>&teacher_id=<?=$subrow['teacher_id'];?>"><button  title="Add student to this subject" class="butaction update">View</button> -->
			</td>
		</tr>
		<?php
		$no++;
	}
	?>
	

<table>