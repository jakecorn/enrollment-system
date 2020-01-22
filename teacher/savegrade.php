<?php
session_start();

if(isset($_SESSION['session_id'])){
	include '../dbconfig.php';

	$sched_id=$_POST['sched_id'];
	$grade=$_POST['grade'];
	$data=split("<-->", $grade);
	$len=count($data)-1;
	$index=0;

	while ($index<$len) {
		$data2 = split("::", $data[$index]);
		echo "$data2[0]----$data2[1] <br>";
		mysql_query("insert into grade values('','$data2[1]','$sched_id','$data2[0]','')");
		$index++;
	}

}else{
	header("location:logout.php");
}