<?php
$sub_id = $_POST['sub_id'];
$desc = $_POST['description'];
$type = $_POST['type'];

?>
<div id="dialogbox">
	<div id="dialogtitle">
		Update Subject
		<span id="close" onclick="toggledialog()"></span>
	</div>
	<div class="padding">
			<div class="tab" id="tabaddsubject">
				<form id="studentform" onsubmit="return submitupdatesubjectform()">
				<table bordaer class="regtable" class="paddding">
					<tr>
						<td>
							<span class="label">Description:</span>
							<input type="hidden" id="sub_id" required="" value="<?=$sub_id;?>">
							<input type="text" id="subdescription" required="" value="<?=$desc;?>">
						</td>
					</tr>

					 

					<tr>
						<td>
							<span class="label">Type:</span>
							<select id="subtype" onchange="subjecttype(this)">
								<option><?=$type;?></option>
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
							<td><button class="submit green">Update Subject</button></td>
						</tr> 
				</table>
				</form>
			</div>

			<div class="tab" id="tabsubjectlist" style="display:none">t</div>
		</div>
</div>

<script>
  			var a=$('#dialogbox');
			var width=a.width()
			var height=a.height();
 			 a.css({
			 	'margin-right': -width/2+'px',
			 	'margin-bottom': -height/2+'px'
			 });
 </script>