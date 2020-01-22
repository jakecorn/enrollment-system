var course_id,course_desc;
function submitcourseform(){
 	var description = $('#description').val();
 	var track = $('#track').val();
	$.ajax({
		type:'post',
		data:{'description':description,'track':track},
		url:'course/savecourse.php',
		success:function(data){
			alert(data);
			// rightcol.html(data);
		},
		error:function() {
			errorconalert();
		}
	});

	return false;
 
}


function coursetab(a,b){
	$('#pagemenu span').removeClass('selected');
	$(a).addClass('selected');
	$('.tab').hide();
	if(b=="courselist"){
 		$('#tabcourselist').load('course/courselist.php').show();
	}

	if(b=="prospectus"){
 		$('#tabprocpectus').load('course/prospectus.php').show();

	}

	if(b=="addcourse"){
 		$('#tabaddcourse').show();
	}

 }

 function loadcoursesubject(){
 	course_id=$('#strand').val();
 	course_desc=$('#strand option:selected').html();
 	$('#subjectlist').load('course/coursesubject.php?action=false&course_id='+course_id+'&sub_id=0&c_id=0&course_desc='+course_desc).show();

 }

 function searchsubject () {
 	var a = $('#searchsubject').val();
 	var b =$('.searchresult2');
 	if(a.length>0){
 		b.html("Loading...").show();
	 	$.ajax({
			type:'post',
			data:{'search':a},
			url:'course/searchsubject.php',
			success:function(data){
				b.html(data).show();
			},
			error:function() {
				b.html(errorcon());
			}
		});
 	}else{
 		b.hide();
 	}
 	
 }

 function addsubject(a){
 	$('#subjectlist').load('course/coursesubject.php?action=add&course_id='+course_id+'&sub_id='+a+'&c_id=0&course_desc='+course_desc).show();
 	$('.searchresult2').hide();
 }
 

 function removesubject (a) {
 	var con=confirm("Are you sure to remove this subject?");
 	if(con==true){
 		$('#subjectlist').load('course/coursesubject.php?action=delete&course_id='+course_id+'&sub_id=0&c_id='+a+'&course_desc='+course_desc).show();
 	}	

 }