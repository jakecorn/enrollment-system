<?php
include "../dbconfig.php";



?>

<table class="tablelist">
	<tr>
		<td>No. </td>
		<td>Description</td>
		<td>Type</td>
 		<td>Action</td>
	</tr>
	<?php

	$sql=mysql_query("select * from subject order by type,description asc");
	$no=1;
	while ($subrow=mysql_fetch_array($sql)) {
		
		
		?>
		<tr>
			<td><?=$no;?>. </td>
			<td><?=$subrow['description'];?></td>
			<td><?=$subrow['type'];?></td>
 			<td align="center" >
 				<button class="butaction update" onclick="updatesubject('<?=$subrow['sub_id'];?>','<?=$subrow['description'];?>','<?=$subrow['type'];?>')">Update</button>
 				<button  onclick="deletesubject('<?=$subrow['sub_id'];?>')" class="butaction delete">Delete</button>
 			 </td>
		</tr>
		<?php
		$no++;
	}
	?>
	

<table>

<script src="subject/subject.js"></script>