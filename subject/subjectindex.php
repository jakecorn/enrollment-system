<div class="pagecontainer">
	Search: <input type="text" onkeyup="searchsubject(this)"  placeholder="Search by subject description" id="topsearch">&nbsp; <button class="green" onclick="searchstudent()">Search</button>
	<div id="searchresult">

	</div>
	
	<div class="pagemaincontent">
		<div class="ptitle padding" style="height:18px;">
			<div id="pagemenu" style="float:left">
				<span id="menutabaddsub" class="selected" onclick="subjecttab(this,'addsubject')">ADD SUBJECT</span>
				<span id="menutabsublist" onclick="subjecttab(this,'subjectlist')">SUBJECT LIST</span>
 			</div>
		</div>
		<div class="padding">
			<div class="tab" id="tabaddsubject">
				<form id="studentform" onsubmit="return submitsubjectform()">
				<table bordaer class="regtable" class="paddding">
					<tr>
						<td>
							<span class="label">Description:</span>
							<input type="text" id="description" required>
						</td>
					</tr>

					 

					<tr>
						<td>
							<span class="label">Type:</span>
							<select id="type" onchange="subjecttype(this)">
								<option>Core Curriculum</option>
								<option>Applied Track</option>
								<option>Specialized</option>
		 					</select>
						</td>

						<script>
						function subjecttype(a){
							if($(a).val()=="Specialized"){
								$('#trackrow').show();
							}else{
								$('#trackrow').hide();
								$('#trackrow option[id=notmajor]').attr("selected","true");
								

							};
						}
						</script>
					</tr> 

						<tr>
							<td><button class="submit green">Save Subject</button></td>
						</tr> 
				</table>
				</form>
			</div>

			<div class="tab" id="tabsubjectlist" style="display:none">t</div>
		</div>
	</div>

	
</div>

<script src="subject/subject.js"></script>