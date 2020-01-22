<div class="pagecontainer">
	Search: <input type="text" onkeyup="searchstudent()"  placeholder="Search by Last name/Stud ID" id="topsearch">&nbsp;<button class="green"  onclick="searchstudent()"><i class="fa fa-search"></i> Search</button>
	<div id="searchresult">

	</div>
	
	<div class="pagemaincontent">
		<div class="ptitle padding">STUDENT REGISTRATION
	
		</div>
		<div class="padding">
		<form id="studentform" onsubmit="return submitregstudentform()" enctype="multipart/form-data">
		<table bordaer class="regtable" class="paddding">
			<tr>
				<td>
					<span class="label">First name:</span>
					<input type="text" id="fname" >
				</td>
				</tr>

				<tr>
				<td>
					<span class="label">Last name:</span>
					<input type="text" id="lname" >
				</td>
				</tr>

				<tr>
				<td>
					<span class="label">Middle name:</span>
					<input type="text" id="mname" >
				</td>
				</tr>

				<tr>
				<td>
					<span class="label">Address name:</span>
					<input type="text" id="address" >
				</td>
				</tr>

				<tr>
				<td>
					<span class="label">Gender:</span>
					<select id="gender">
							<option>Female</option>
						<option>Male</option>
						</select>
				</td>
				</tr>

				<tr>
				<td>
					<span class="label">Status:</span>
					<select id="status">
						<option value="ns">New Student</option>
						<option value="tf">Transferee</option>
						<option value="og">On-going</option>
					</select>
				</td>
				</tr>

				<tr>
				<td>
					<span class="label">Track:</span>						
					<select id="track">
						<?php
							include '../dbconfig.php';
							$c=mysql_query("select * from course");
							while ($row=mysql_fetch_array($c)) {
								?>
								<option value="<?=$row['course_id'];?>"><?=$row['description'];?></option>
								<?php
							}
						?>
					</select>
				</td>
				</tr>

				<tr>
				<td>
					<span class="label">Grade:</span><br>
					<input type="radio" name="grade" value="11" id="11" > <label for="11">Grade 11 </label>
					<input type="radio" name="grade" value="12" id="12"> <label for="12">Grade 12 </label>
					
				</td>
				</tr>

				<tr>
					<td><button class="submit green">Save Student</button></td>
				</tr> 
		</table>
		</form>
		</div>
	</div>

	
</div>

<script src="student/student.js"></script>