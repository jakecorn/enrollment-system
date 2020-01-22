<?php
include "../dbconfig.php";



?>

<table class="tablelist">
	<tr>
		<td>No. </td>
		<td>Course Description</td>
 		<td>Track</td>
		<td>Action</td>
	</tr>
	<?php

	$sql=mysql_query("select *,course.description as cd,track.description td from course, track where course.track_id=track.track_id") or die(mysql_error());
	$no=1;
	while ($subrow=mysql_fetch_array($sql)) {
		
		
		?>
		<tr>
			<td><?=$no;?>. </td>
			<td><?=$subrow['cd'];?></td>
			<td><?=$subrow['td'];?></td>
 			<td align="center"><button class="butaction update">Update</button></td>
		</tr>
		<?php
		$no++;
	}
	?>
	

<table>