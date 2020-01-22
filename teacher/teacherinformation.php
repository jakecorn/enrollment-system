<?php
	include '../dbconfig.php';
	$teacher_id=$_REQUEST['teacher_id'];
	$sql=mysql_query("select * from teacher where teacher_id='$teacher_id'");
	$teacherrow=mysql_fetch_array($sql);
 ?>
<div class="pagecontainer">
	Search: <input type="text" onkeyup="searchteacher()"  placeholder="Search by Last name/Stud ID" id="topsearch">&nbsp; <button class="green" onclick="searchstudent()">Search</button>
	<div id="searchresult">

	</div>
	
	<div class="pagemaincontent">
		<div class="ptitle padding" style="height:18px;">
			<div id="pagemenu" style="float:left">
				<span id="menutabpinfo"class="selected" onclick="teachertab(this,'personal','')">Personal Information</span>
				<span id="menutabtload" onclick="teachertab(this,'tload','<?=$teacher_id;?>')">Teaching Load</span>
 			</div>
		</div>
		
		<div class="padding">
			<div class="tab" id="tabtinformation">
			<form id="studentform" onsubmit="return updatesubmitregstudentform()" enctype="multipart/form-data">
			<table bordaer class="regtable" class="paddding">
				<tr>
					<td>
						<span class="label">First name:</span>
						<input type="hidden" id="teacher_id" value="<?=$teacherrow['teacher_id'];?>">
						<input type="text" id="fname" value="<?=$teacherrow['fname'];?>">
					</td>
					</tr>

					<tr>
					<td>
						<span class="label">Last name:</span>
						<input type="text" id="lname"  value="<?=$teacherrow['lname'];?>">
					</td>
					</tr>

					<tr>
					<td>
						<span class="label">Middle name:</span>
						<input type="text" id="mname" value="<?=$teacherrow['mid_name'];?>">
					</td>
					</tr>

					<tr>
					<td>
						<span class="label">Gender:</span>
						<select id="gender">						
							<option>Female</option>
							<option id="jake">Male</option>
						</select>
						<script>
							$("#gender option:contains('<?=$teacherrow['gender'];?>')").attr("selected","true");
						</script>
					</td>
					</tr>

					<tr>
						<td><button class="submit green">Update Record</button></td>
					</tr> 
				</table>
			</form>
			</div>
			<div class="tab" id="tabtload"></div>
 
		
		</div>


	</div>

	
</div>

<script src="student/student.js"></script>