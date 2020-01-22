<?php
session_start();
	include '../dbconfig.php';
	$sub_id = $_REQUEST['sub_id'];
?>
<div id="dialogbox"  style=" width:700px">
	<div id="dialogtitle">
		Available Subjects
		<span id="close" onclick="toggledialog()"></span>
	</div>
	<div class="padding"  style="margin-bottom:12px;max-height:300px;overflow:scroll;overflow-x:hidden">
		<table class="tablelist" style="margin-top:12px">
			
			<tr id="th">
				<td>No.</td>
				<td>Description</td>
				<td>Section</td>
				<td>Instructor</td>
				<td>Count</td>
			</tr>
			<!-- get subject -->
		 	<?php
		 	$no=1;
		 	$subject = mysql_query("select * from subject, schedule,teacher where teacher.teacher_id=schedule.teacher_id and subject.sub_id=schedule.sub_id and sy='$_SESSION[sy]' and semester='$_SESSION[semester]' and subject.sub_id=$sub_id and course_id='1'") or die(mysql_error());
		 	while ($subrow=mysql_fetch_array($subject)) {
		 		$countsub = mysql_query("select sched_id from subject_enrolled where sched_id='$subrow[sched_id]'") or die(mysql_error());
		 		$count = mysql_num_rows($countsub);
		 		?>
		 		<tr>
					<td><?=$no;$no++;?>.</td>
					<td class="desc" onclick="enrollsubject(<?=$subrow['sched_id'];?>)"><?=$subrow['description'];?></td>
					<td><?=$subrow['section'];?></td>
					<td><?=$subrow['lname'];?>, <?=$subrow['fname'];?></td>
					<td align="center"><?=$count;?></td>
				</tr> 

		 		<?php
		 	}
		 	?>
		 
		</table>

	</div>
</div>

<script>
	$(document).ready(function() {
		var a=$('#dialogbox');
			var width=a.width()
			var height=a.height();
  			 a.css({
			 	'margin-right': -width/2+'px',
			 	'margin-bottom': -height/2+'px'
			 });
	});
  			
 </script>