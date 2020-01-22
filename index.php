<?php
session_start();
$_SESSION['session_id']=123;
$_SESSION['sy']="2016-2017";
$_SESSION['semester']="1st";

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>

	<!-- Bootstrap -->
	    <!-- <link href="assets/vendors/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
	    <!-- Font awesome -->
	    <link href="assets/vendors/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">

	    <!-- Custom styles for this template -->
    	<link href="assets/css/theme.css" rel="stylesheet">
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/myjs.js"></script>
		<link rel="stylesheet" type="text/css" href="mystyle.css">
</head>
<body>
	<div id="mainbody">
		<div id="headernav">
			<div id="leftbg">
				<div id="acctname">Admin: Jake D. Cornelia
					<div class="option">
						<div></div>
						<div></div>
						<div></div>
					</div>	
				</div>
				
			</div>
			<ul>
				<li class="selected">Dashboard</li>
				<!-- <li >Settings</li>
				<li>Acccount</li> -->

			</ul>

 			<div style="margin-top:9px;padding-right:20px;font-size:18px;float:right;color:white">
 				Bawayan National High School Enrollment System
 			</div>
			<div class="clear"></div>
		</div>

 			<div id="leftcol" class="column"> 
				<ul id="sidemenu" style="color:blue">
					<li onclick="sidemenu('student/studentindex')">
 						<i class="fa fa-mortar-board fa-2x"></i>
 						<span>Student</span>
					</li>

					<li onclick="sidemenu('subject/subjectindex')">
						<i class="fa fa-newspaper-o fa-2x"></i>
 						<span>Subject</span>
					</li>

					<li onclick="sidemenu('teacher/teacherindex')">
						<i class="fa fa-male fa-2x"></i>
 						<span>Teacher</span>
					</li>

					<li onclick="sidemenu('course/courseindex')">
						<i class="fa fa-suitcase fa-2x"></i>
 						<span>Course</span>
					</li>

					<li onclick="sidemenu('course/courseindex')">
						<i class="fa fa-map-o fa-2x"></i>
 						<span>Track</span>
					</li>

					<li onclick="sidemenu('course/courseindex')">
						<i class="fa fa-wrench fa-2x"></i>
 						<span>Settings</span>
					</li>
					
				</ul>
			</div>

			<div id="rightcol">
 			</div>

			<div class="clear"></div>
		 
		
	</div>

	<div id="dialogH">
		
	</div>
</body>
</html>

<div id="overlay">
 
</div>