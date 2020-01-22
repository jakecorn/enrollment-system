
<br>
<br> 


Track Description: <b><?=$_REQUEST['course_desc'];?></b><br>
<br>
Search Subject: <input type="text" onkeyup="searchsubject()" id="searchsubject" style="width:50%">
&nbsp;&nbsp;<button class="green">Search</button>
<div id="searchresult" class="searchresult2" style="left:124px;width:49%"></div>
<table class="tablelist" style="margin-top:15px">
	<tr id="th">
		<td>No.</td>
		<td>Subject Description</td>
		<td>Type</td>
		<td align="center">Action</td>
	</tr>
 	<?php
 		include "../dbconfig.php";
 		$course_id=$_REQUEST['course_id'];
 		$action=$_REQUEST['action'];
 		$sub_id=$_REQUEST['sub_id'];
 		$c_id=$_REQUEST['c_id'];


 		if($action=="add"){
  			mysql_query("insert into course_subject values ('','$course_id','$sub_id','')");
 		}

 		if($action=="delete"){
 			mysql_query("delete from course_subject where course_id='$course_id' and c_id='$c_id'");
 		}
 		$subject=mysql_query("select * from course_subject,subject where course_subject.sub_id=subject.sub_id and  course_subject.course_id='$course_id'") or die(mysql_error());
 		$no=1;
 		while ($subrow=mysql_fetch_array($subject)) {
 			?>
 			<tr>
				<td style="width:20px"><?=$no++;?>.</td>
				<td><?=$subrow['description'];?></td>
				<td><?=$subrow['type'];?></td>
				<td align="center" onclick="removesubject(<?=$subrow['c_id'];?>)"><button class="delete" style="padding:5px">Remove</button></td>
			</tr> 
 			<?php
 		}
 
 		
 	?>
	
</table>