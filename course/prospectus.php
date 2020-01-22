<div>
	<select id="strand" style="width:80%">
		<?php
			include '../dbconfig.php';
			$strand = mysql_query("select * from course");
			while ($strandrow=mysql_fetch_array($strand)) {
				?>
					<option value="<?=$strandrow['course_id'];?>"><?=$strandrow['description'];?></option>
				<?php
			}

		?>
	</select>

	&nbsp;&nbsp;<button id="loadcoursesubject" class="green" onclick="loadcoursesubject()">Load Subjects</button>
	<script>$('#loadcoursesubject').click();</script>
	<div id="subjectlist">
		
	</div>

</div>