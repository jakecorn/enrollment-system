<div class="pagecontainer">
	Search: <input type="text" onkeyup="searchteacher()"  placeholder="Search by Last name" id="topsearch">&nbsp; <button class="green" onclick="searchstudent()">Search</button>
	<div id="searchresult">

	</div>
	
	<div class="pagemaincontent">
		<div class="ptitle padding">TEACHER REGISTRATION
	
		</div>
		<div class="padding">
		<form id="studentform" onsubmit="return submitregteacherform()" enctype="multipart/form-data">
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
					<td><button class="submit green">Save Record</button></td>
				</tr> 
		</table>
		</form>
		</div>
	</div>

	
</div>

<script src="teacher/teacher.js"></script>