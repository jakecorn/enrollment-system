<?php
session_start();
include '../dbconfig.php';
$search=$_POST['search'];
$sy=$_SESSION['sy'];
$semester=$_SESSION['semester'];
?>
<table width="100%">
	<?php

	$query =mysql_query("select * from student where lname like '$search%'");
	while ($row=mysql_fetch_array($query)) {
		?>

		<tr onclick="selectstudent(<?=$row['stud_id'];?>)">
			<td>123213</td>
			<td><?=$row['fname'];?> <?=$row['mid_name'];?> <?=$row['lname'];?></td>
 		</tr>
		<?php
	}
	if(mysql_num_rows($query)==0){
		echo "No results found.";
	}
	?>
	
</table>