<?php
session_start();
include '../dbconfig.php';
$sy = $_SESSION['sy'];
$semester = $_SESSION['semester'];
$stud_id=$_REQUEST['stud_id']; 
$se_id=$_REQUEST['se_id']; 
if($se_id>0){
	mysql_query("delete from subject_enrolled where stud_id='$stud_id' and se_id='$se_id'");
}
$getcourse=  mysql_query("select * from student_status where stud_id='$stud_id' and sy='$sy' and semester='$semester'");
$courserow=mysql_fetch_array($getcourse);
?>

<div>

 <table class="tablelist" style="width:48%;float:left">
	<tr>
		<td colspan="5">Subject Enrolled</td>
	</tr>
	<tr id="th">
		<td>No.</td>
		<td>Description</td>
		<td>Section</td>
		<td align="center">Action</td>
	</tr>
	<?php
	$subject = mysql_query("select * from subject_enrolled,subject,schedule where subject.sub_id=schedule.sub_id and  subject_enrolled.sched_id=schedule.sched_id and stud_id='$stud_id' and sy='$sy' and semester='$semester'") or die(mysql_error());
	$no=1;
	while ($subrow=mysql_fetch_array($subject)) {
	?>
		<tr>
			<td><?=$no;$no++;?>.</td>
			<td><?=$subrow['description'];?></td>
			<td><?=$subrow['section'];?></td>
			<td><button class="delete" onclick="deletesubject(<?=$subrow['se_id'];?>)" style="padding:2px">Delete</button></td>
		</tr>
	<?php 
	}
	?>


</table>

<table class="tablelist" style="width:48%;float:right">
	<tr>
		<td colspan="5">Prospectus</td>
	</tr>
	<tr id="th">
		<td>No.</td>
		<td>Description</td>
		<td>Type</td>
		<td>Grade</td>
	</tr>
	<?php
	$subject = mysql_query("select * from subject,course_subject where course_subject.sub_id=subject.sub_id and course_id='$courserow[course_id]' order by type") or die(mysql_error());
	$no=1;
	while ($subrow=mysql_fetch_array($subject)) {
		$checksub=mysql_query("select stud_id from subject_enrolled,schedule where subject_enrolled.sched_id=schedule.sched_id and  stud_id='$stud_id' and sub_id='$subrow[sub_id]' and sy='$sy' and semester='$semester'") or die(mysql_error());
		$count=mysql_num_rows($checksub);

		$getgrade=mysql_query("select grade_score from grade,schedule where  grade.sched_id=schedule.sched_id and stud_id='$stud_id' and sub_id='$subrow[sub_id]'") or die(mysql_error());
		$grade=mysql_fetch_array($getgrade);
		$cgrade = mysql_num_rows($getgrade);
	?>
		<tr <?php if($count>0) {
				if($cgrade==0){
					echo "class='enrolled_sub'";
				}else{
					echo "class='withgrade'";
				}
				 
			}else{
				if($cgrade==0){
			?>
			 onclick="loadsubject2(<?=$subrow['sub_id'];?>)"<?php 

				}else{
					echo "class='withgrade'";
				} 
			}
			?>>
			<td style="width:40px"><?=$no;$no++;?>.</td>
			<td <?php if($count==0 && $cgrade==0) {echo "class='desc'";}?>><?=$subrow['description'];?></td>
			<td><?=$subrow['type'];?></td>
			<td align="center"><?=$grade['grade_score'];?></td>
		</tr>
	<?php 
	}
	?>


</table>
 <div style="width:48%;margin-top:20px;float:left">
 <?php
	$getsection=mysql_query("select *  from schedule where course_id='$courserow[course_id]' and grade='$courserow[grade]' and sy='$sy' and semester='$semester' group by section");

	while ($secrow=mysql_fetch_array($getsection)) {
		$count=mysql_query("select stud_id from subject_enrolled where sched_id='$secrow[sched_id]'");
		$countrow=mysql_num_rows($count);
		?>
			<button style="margin-bottom:5px;width:100%" class="green" onclick="loadsubject('<?=$courserow['course_id'];?>','<?=$secrow['grade'];?>','<?=$secrow['section'];?>')">Grade <?=$secrow['grade'];?>-<?=$secrow['section'];?><span style="float:right">Students enrolled: <?=$countrow;?></span></button>
		<?php
	}
?>
</div>

<div class="clear"></div>
</div>