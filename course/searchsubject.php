<?php
session_start();
include '../dbconfig.php';
$search=$_POST['search']; 
?>
<table width="100%">
	<?php

	$query =mysql_query("select * from subject where  description like '$search%'");
	while ($row=mysql_fetch_array($query)) {
		?>

		<tr style="cursor:text">
			<td><?=$row['description'];?></td>
			<td><?=$row['type'];?></td>
			<td align="right"><button  onclick="addsubject(<?=$row['sub_id'];?>)" style="padding:2px 5px 2px 5px;font-size:12px" class="update">Add</button></td>
 		</tr>
		<?php
	}
	if(mysql_num_rows($query)==0){
		echo "No results found.";
	}
	?>
	
</table>