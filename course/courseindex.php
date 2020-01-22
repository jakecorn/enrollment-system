<div class="pagecontainer">
	Search: <input type="text" onkeyup="searccsubject()"  placeholder="Search course name" id="topsearch">&nbsp; <button class="green" onclick="searchstudent()">Search</button>
	<div id="searchresult">

	</div>
	
	<div class="pagemaincontent">
		<div class="ptitle padding" style="height:18px;">
			<div id="pagemenu" style="float:left">
				<span id="menutabaddsub" class="selected" onclick="coursetab(this,'addcourse')">ADD COURSE</span>
				<span id="menutabsublist" onclick="coursetab(this,'courselist')">COURSES</span>
				<span id="menutabsublist" onclick="coursetab(this,'prospectus')">Prospectus</span>
 			</div>
		</div>
		<div class="padding">
			<div class="tab" id="tabaddcourse">
				<form id="studentform" onsubmit="return submitcourseform()">
				<table bordaer class="regtable" class="paddding">
					<tr>
						<td>
							<span class="label">Description:</span>
							<input type="text" id="description" required>
						</td>
					</tr>

					<tr id="trackrow">
						<td>
							<span class="label">Track:</span>
							<select id="track">
 								<?php
									include '../dbconfig.php';
									$track = mysql_query("select * from track");
									while ($trackrow=mysql_fetch_array($track)) {
										?>
											<option value="<?=$trackrow['track_id'];?>"><?=$trackrow['description'];?></option>
										<?php
									}

								?>
							</select>
						</td>
					</tr>

						<tr>
							<td><button class="submit green">Save Course</button></td>
						</tr> 
				</table>
				</form>
			</div>

			<div class="tab" id="tabcourselist" style="display:none">t</div>
			<div class="tab" id="tabprocpectus" style="display:none">t</div>
		</div>
	</div>

	
</div>

<script src="course/course.js"></script>