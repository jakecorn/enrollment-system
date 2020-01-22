<?php
session_start();
include '../dbconfig.php';
$search=$_POST['search'];
?>
<table width="100%">
	<?php

	$query =mysql_query("select * from teacher where lname like '$search%'");
	while ($row=mysql_fetch_array($query)) {
		?>

		<tr onclick="selectteacher(<?=$row['teacher_id'];?>)">
 			<td><?=$row['fname'];?> <?=$row['mid_name'];?> <?=$row['lname'];?></td>
 		</tr>
		<?php
	}
	if(mysql_num_rows($query)==0){
		echo "No results found.";
	}
	?>
	
</table>