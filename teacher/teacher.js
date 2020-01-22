var teacher_id,sub_id,sched_id;
var overlay=$('#overlay');
var dialog=$('#dialogH');

function submitregteacherform () {
	alert()
 	 var fname,lname,mname,gender;
	 fname = $('#fname').val();
	 lname = $('#lname').val();
	 mname = $('#mname').val();
	 gender = $('#gender').val();
	
	 
	$.ajax({
	type: "post",
	url:'teacher/saveregteacher.php',
	data: {"fname":fname,"lname":lname,"mname":mname,"gender":gender},
	success: function(data){
		alert(data)
	},
	error: function(){
		errorcon();
	}
	});
	 
	return false;
	}


	function searchteacher(){
		var c = $('#topsearch').val();
		var b = $('#searchresult');
		b.html("Loading...")
		if(c.length!=0){
			$.ajax({
			type: "post",
			url:'teacher/searchteacher.php',
			data: {"search":c},
			success: function(data){
				b.html(data).slideDown(123);
				},
			error: function(){
				b.html(errorcon()).slideDown(123);;
			}
		});

		}else{
			b.hide();
		}
		



	}

function selectteacher (id) {
	teacher_id=id;
 	$('#rightcol').load('teacher/teacherinformation.php?teacher_id='+id);
		
}

function teachertab(a,b,id){
	$('#pagemenu span').removeClass('selected');
	$(a).addClass('selected');
	$('.tab').hide();
	if(b=="tload"){
 		$('#tabtload').load('teacher/teachingload.php?teacher_id='+id).show();
	}

	if(b=="personal"){
 		$('#tabtinformation').show();
	}

 }

 function saveaddstudent(){
  	var section =$('#section').val();
 	var grade =$("[name='grade']:checked").val();
 	var course_id =$('#course_id').val();
 	$.ajax({
			type: "post",
			url:'teacher/saveaddstudent.php',
			data: {'sched_id':sched_id,'grade':grade,'section':section,'course_id':course_id},
			success: function(data){
				teachertab(0,'tload',teacher_id);
				toggledialog();
				},
			error: function(){
				errorconalert();
			}
		});
 	return false;
 }

 function showdialogstudent (a) {
 	sched_id=a;
 	$('#dialogH').load('teacher/dialogaddstudent.php');
 	toggledialog();

 	
 	
 }

 function deletesubject(a){
 	alert(a)
  	var c = confirm("Are you sure you want to delete this subject?");
 	if(c==true){
  		$.ajax({
			type: "post",
			url:'teacher/deletesubject.php',
			data: {"sched_id":a},
			success: function(data){
					teachertab(0,'tload',teacher_id);
			},
			error: function(){
				errorconalert();
			}
		});

 	}
 }

 function searchsubject(a){
  		var c = $(a).val();
		var b = $('#searchresult2');
		b.html("Loading...").show();
		if(c.length!=0){
			$.ajax({
			type: "post",
			url:'teacher/searchsubject.php',
			data: {"search":c},
			success: function(data){
				b.html(data).slideDown(123);
				},
			error: function(){
				b.html(errorcon()).slideDown(123);;
			}
		});

		}else{
			b.hide();
		} 
}	

function addsubject(a){
 		$.ajax({
			type: "post",
			url:'teacher/addsubject.php',
			data: {"sub_id":a,'teacher_id':teacher_id},
			success: function(data){
				// alert(data)
				teachertab(0,'tload',teacher_id);
			},
			error:function() {
				errorconalert();
			}
		});
			
}


function dialodviewstudent (a) {
	sched_id=a;
 	overlay.show();
	dialog.load('teacher/dialodviewstudent.php?sched_id='+a).show();
 }

 function savegrade(a){
 	var con=confirm("Are you sure to submit the grade?");
 	if(con==true){
 	var len=$('.grade').length;
 	var index=0;
 	var data="";

 	while(index<len){
 		data+=$(".grade:eq("+index+")").val()+"::"+$(".grade:eq("+index+")").attr("studid")+"<-->";
 		index++;
 	}
  	$.ajax({
			type: "post",
			url:'teacher/savegrade.php',
			data: {'grade':data,'sched_id':a},
			success: function(data){
				dialodviewstudent(sched_id);
 			},
			error:function() {
				errorconalert();
			}
		});
 	}
 }

 function enrollsubject(id){
 	alert(id)
 }