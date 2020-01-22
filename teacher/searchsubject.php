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

		<tr onclick="addsubject(<?=$row['sub_id'];?>)">
			<td>123213</td>
			<td><?=$row['description'];?>&nbsp;<?=$row['type'];?></td>
 		</tr>
		<?php
	}
	if(mysql_num_rows($query)==0){
		echo "No results found.";
	}
	?>
	
</table>