<?php
session_start();
include '../dbconfig.php'; 
$stud_id=$_REQUEST['stud_id']; 





$grade = mysql_query("select distinct(grade) as grade from schedule,subject_enrolled where schedule.sched_id=subject_enrolled.sched_id and stud_id='$stud_id'") or die(mysql_error());

while ($graderow=mysql_fetch_array($grade)) {
	echo "Grade: $graderow[grade]";
	
	$sy =  mysql_query("select distinct(sy) as sy from schedule,subject_enrolled where schedule.sched_id=subject_enrolled.sched_id and stud_id='$stud_id' and grade='$graderow[grade]'") or die(mysql_error());
	while ($syrow=mysql_fetch_array($sy)) {
		echo "&nbsp;&nbsp;&nbsp;&nbsp;S.Y. $syrow[sy]";
		?>

		<table class="tablelist" style="margin-top:15px">
			<tr id="th">
				<td>No.</td>
				<td>Description</td>
				<td>Grade</td>
				<td>Semester</td>
				<td>Instructor</td>
			</tr>

		<?php
		$no=1;
		$getgrade = mysql_query("select * from subject_enrolled,schedule,teacher,subject where subject_enrolled.sched_id=schedule.sched_id and teacher.teacher_id=schedule.teacher_id and subject.sub_id=schedule.sub_id and sy='$syrow[sy]' and stud_id='$stud_id' and grade='$graderow[grade]' order by semester,description asc")	or die(mysql_error());
		while ($showgrade=mysql_fetch_array($getgrade)) {
			$gscore = mysql_query("select * from grade where sched_id='$showgrade[sched_id]' and stud_id='$stud_id'");
			$grade_score=mysql_fetch_array($gscore);
			?>
			<tr>
				<td><?=$no;$no++;?>.</td>
				<td><?=$showgrade['description'];?></td>
				<td align="center"><?=$grade_score['grade_score'];?></td>
				<td align="center"><?=$showgrade['semester'];?></td>
				<td><?=$showgrade['lname'];?>, <?=$showgrade['fname'];?></td>
 			</tr>

			<?php
 		}
	}
}



?>