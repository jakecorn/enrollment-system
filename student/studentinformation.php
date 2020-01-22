<?php
session_start();
	include '../dbconfig.php';
	$stud_id=$_REQUEST['stud_id'];
	$sy=$_SESSION['sy'];
	$semester=$_SESSION['semester'];
	$sql=mysql_query("select * from student,student_status where student.stud_id=student_status.stud_id and    sy='$sy' and semester='$semester' and student.stud_id='$stud_id'") or die(mysql_error());
	$studrow=mysql_fetch_array($sql);
 ?>
<div class="pagecontainer">
	Search: <input type="text" onkeyup="searchstudent()"  placeholder="Search by Last name/Stud ID" id="topsearch">&nbsp; <button class="green" onclick="searchstudent()">Search</button>
	<div id="searchresult">

	</div>
	
	<div class="pagemaincontent">
		<div class="ptitle padding" style="height:18px;">
			<div id="pagemenu" style="float:left">
				<span class="selected" onclick="studenttab(this,'personalinfo')">Personal Information</span>
				<span onclick="studenttab(this,'grades')">Grades</span>
				<span onclick="studenttab(this,'prospectus')">Subject</span>
			</div>
		</div>
		
		<div class="padding">
			<div id="tabpersonalinfo" class="tabs">
				<form id="studentform" onsubmit="return updatesubmitregstudentform()" enctype="multipart/form-data">
					<table bordaer class="regtable" class="paddding">
						<tr>
						<td>
							<span class="label">First name:</span>
							<input type="hidden" id="stud_id"  value="<?=$studrow['stud_id'];?>">
							<input type="text" id="fname" disabled="true" value="<?=$studrow['fname'];?>">
						</td>
						</tr>

						<tr>
						<td>
							<span class="label">Last name:</span>
							<input type="text" id="lname" disabled="true"  value="<?=$studrow['lname'];?>">
						</td>
						</tr>

						<tr>
						<td>
							<span class="label">Middle name:</span>
							<input type="text" id="mname" disabled="true" value="<?=$studrow['mid_name'];?>">
						</td>
						</tr>

						<tr>
						<td>
							<span class="label">Address name:</span>
							<input type="text" id="address" disabled="true" value="<?=$studrow['address'];?>">
						</td>
						</tr>

						<tr>
						<td>
							<span class="label">Gender:</span>
							<select disabled="true" id="gender">						
								<option>Female</option>
								<option id="jake">Male</option>
							</select>
							<script>
								$("#gender option:contains('<?=$studrow['gender'];?>')").attr("selected","true");
							</script>
						</td>
						</tr>

						<tr>
						<td>
							<span class="label">Status:</span>
							<select disabled="true" id="status" required>
								<option value="og">On-going</option>
								<option value="ns">New Student</option>
								<option value="tf">Transferee</option>
							</select>
							<script>
								$("#status option:[value='<?=$studrow['status'];?>']").attr("selected","selected");
							</script>
						</td>
						</tr>

						<tr>
						<td>
							<span class="label">Strand:</span>
							<select id="strand" disabled="true">
								<?php
									include '../dbconfig.php';
									$c=mysql_query("select * from course");
									while ($row=mysql_fetch_array($c)) {
										?>
										<option <?php if($studrow['course_id']==$row['course_id']){ echo "selected='selected'";}?> value="<?=$row['course_id'];?>"><?=$row['description'];?></option>
										<?php
									}
								?>
							</select>
						</td>
						</tr>

						<tr>
						<td>
							<span class="label">Grade:</span><br>
							<input type="radio" name="grade" disabled="true" value="11" id="11" > <label for="11">Grade 11 </label>
							<input type="radio" name="grade"  disabled="true"value="12" id="12" > <label for="12">Grade 12 </label>
						</td>
						</tr>

						<tr>
							<td><button id="saveupdate" class="submit green" style="display:none">Save Record</button>
							<button class="submit update" onclick="return editrecord(this)">Edit Record </button>
							<button id="canceledit" class="submit delete" style="display:none;margin-top:10px" onclick="return cancelediting()">Cancel Edit </button>
							<script>
								$("input[name='grade'][value='<?=$studrow['grade'];?>']").attr("checked","checked");
							</script>
						</td>
						</tr> 
					</table>
				</form>
			</div>
			<div id="tabgrades" class="tabs" style="display:none">
				grades	
			</div>

			<div class="tabs" id="tabprospectus" style="display:none" >
				 
			</div>

		</div>
	</div>

	
</div>

<script src="student/student.js"></script>