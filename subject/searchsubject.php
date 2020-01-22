<?php
session_start();
include '../dbconfig.php';
$search=$_POST['search']; 
?>
<table width="100%">
	<?php

	$query =mysql_query("select * from subject where description like '$search%'");
	while ($row=mysql_fetch_array($query)) {
		?>

		<tr onclick="selectsubject(<?=$row['stud_id'];?>)">
			<td><?=$row['description'];?></td>
			<td><?=$row['type'];?></td>
 		</tr>
		<?php
	}
	if(mysql_num_rows($query)==0){
		echo "No results found.";
	}
	?>
	
</table>