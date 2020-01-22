<?php
session_start();

if(isset($_SESSION['session_id'])){
	include '../dbconfig.php';
	$sy =$_SESSION['sy'];
	$semester =$_SESSION['semester'];
	$sched_id=$_REQUEST['sched_id'];
	$scheddetail =mysql_query("select * from schedule,course where schedule.course_id=course.course_id and sched_id='$sched_id'");
	$schedrow=mysql_fetch_array($scheddetail);
 ?>
<div id="dialogbox" style="width:150%;top:10px;background:white;height:180% ">
	<div id="dialogtitle">
		Student list
		<span id="close" onclick="toggledialog()"></span>
	</div>
	<div class="padding"  style=" margin-bottom:12px;height:60%;overflow:scroll;overflow-x:hidden;">
		Grade: <?=$schedrow['grade'];?>-<?=$schedrow['description'];?>-<?=$schedrow['section'];?>
		<table class="tablelist" style="margin-top:12px">
		
			<tr id="th">
				<td>No.</td>
				<td>Name</td>
				<td>Course</td>
				<td>Grade</td>
			</tr> 
		 
		<?php
			$getlist=mysql_query("select * from student,subject_enrolled where subject_enrolled.stud_id=student.stud_id and sched_id='$sched_id' order by lname,fname") or die(mysql_error());
			$no=1;

			$checksubmitted=mysql_query("select grade_score from grade where sched_id='$sched_id'");

			while ($listrow=mysql_fetch_array($getlist)) {
				
				?>
				<tr>
					<td style="width:20px"><?=$no;$no++;?>.</td>
					<td><?=$listrow['lname'];?>, <?=$listrow['fname'];?></td>
					<td><?=$schedrow['grade'];?>-<?=$schedrow['description'];?></td>
					<td style="width:50px;padding:0" align="center">
						<?php
						if(mysql_num_rows($checksubmitted)>0){
							$grade=mysql_query("select grade_score from grade where stud_id='$listrow[stud_id]' and sched_id='$sched_id'");
							$grade_score=mysql_fetch_array($grade);
							echo "$grade_score[grade_score]";
						}else{
						?>
						<select class="grade" studid='<?=$listrow['stud_id'];?>' style="padding:2px">
							<?php
 								$grade=100;
								while ($grade>=50) {
									?>
										<option><?=$grade;?></option>

									<?php
									$grade--;
								}
						}
						?>
							
						</select>

					</td>
				</tr>


				<?php
			}	
		?>
		</table>

	</div>
		<center>
			<a target="new<?=$sched_id;?>" title="View student list" href="teacher/viewstudentlist.php?sched_id=<?=$sched_id;?>"><button class="update" style="width:40%">Print List</button></a>
			<?php
			if(mysql_num_rows($checksubmitted)==0){?>
			<button class="green" style="width:40%" onclick="savegrade('<?=$sched_id;?>')" >Save Grade</button>
			<?php } ?>
		</center>
</div>

<script>
  			var a=$('#dialogbox');
			var width=a.width()
			var height=a.height();
 			 a.css({
			 	'margin-right': -width/2+'px',
			 	'margin-bottom': ''
			 });
 </script>
 <?php
}else{
	header("location:logout.php");
}

 ?> 