<div id="dialogbox">
	<div id="dialogtitle">
		Add Student
		<span id="close" onclick="toggledialog()"></span>
	</div>
	<div class="padding">
		<form onsubmit="return saveaddstudent()">
		<span class="label">Course: </span>
		
		<select id="course_id">
			<?php
				include '../dbconfig.php';
				$c=mysql_query("select * from course");
				while ($row=mysql_fetch_array($c)) {
					?>
					<option value="<?=$row['course_id'];?>"><?=$row['description'];?></option>
					<?php
				}
			?>
		</select>

		<span class="label">Section: </span>
		<select id="section" style="margin-bottom:15px">
			<option>A</option>
			<option>B</option>
			<option>C</option>
			<option>D</option>
			<option>E</option>
			<option>F</option>
			<option>G</option>
			<option>H</option>
			<option>I</option>
			<option>J</option>
			<option>K</option>
			<option>L</option>
			<option>J</option>
		</select>
		<span class="label">Grade: </span>				
		<input type="radio" required="" name="grade" value="11" id="grade11"> <label for="grade11">Grade 11</label>&nbsp;
		<input type="radio" required="" name="grade" value="12" id="grade12"> <label for="grade12">Grade 12</label><br>
		
		<button class="green">Save</button>
		</form>
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