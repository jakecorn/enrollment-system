var stud_id;
function studenttab(a,b){
	$('#pagemenu span').removeClass('selected');
	$(a).addClass('selected');
	$('.tabs').hide();
	if(b=="prospectus"){
   		$('#tabprospectus').load('student/prospectus.php?stud_id='+stud_id+'&se_id=0').show();
	}

	if(b=="personalinfo"){
 		$('#tabpersonalinfo').show();
	}

	if(b=="grades"){
 		$('#tabgrades').load('student/grade.php?stud_id='+stud_id+'&se_id=0').show();
	}

 }
function selectstudent (id) {
	stud_id=id;
	$('#rightcol').load('student/studentinformation.php?stud_id='+id);
		
}

function submitregstudentform () {
 	 var fname,lname,mname,address,gender,status,track,grade;
	 fname = $('#fname').val();
	 lname = $('#lname').val();
	 mname = $('#mname').val();
	 address = $('#address').val();
	 gender = $('#gender').val();
	 status = $('#status').val();
	 track = $('#track').val();
	 grade = $("[name='grade']:checked").val();
	 
	$.ajax({
	type: "post",
	url:'student/saveregstudent.php',
	data: {"fname":fname,"lname":lname,"mname":mname,"address":address,"gender":gender,"status":status,"status":status,"grade":grade,"track":track},
	success: function(data){
		alert(data)
		},
	error: function(){
		errorcon();
	}
	});
	 
	return false;
	}

	function searchstudent(){
		var c = $('#topsearch').val();
		var b = $('#searchresult');
		b.html("Loading...")
		if(c.length!=0){
			$.ajax({
			type: "post",
			url:'student/searchstudent.php',
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

	function updatesubmitregstudentform () {
 	 var fname,lname,mname,address,gender,status,strand,grade;
	 stud_id = $('#stud_id').val();
	 fname = $('#fname').val();
	 lname = $('#lname').val();
	 mname = $('#mname').val();
	 address = $('#address').val();
	 gender = $('#gender').val();
	 status = $('#status').val();
	 strand = $('#strand').val();
	 grade = $("[name='grade']:checked").val();
  	$.ajax({
	type: "post",
	url:'student/saveupdatestudent.php',
	data: {'strand':strand,"stud_id":stud_id,"fname":fname,"lname":lname,"mname":mname,"address":address,"gender":gender,"status":status,"status":status,"grade":grade},
	success: function(data){
		selectstudent(stud_id);
		},
	error: function(){
		errorcon();
	}
	});
	 
	return false;
	}

	function searchstudent(){
		var c = $('#topsearch').val();
		var b = $('#searchresult');
		b.html("Loading...")
		if(c.length!=0){
			$.ajax({
			type: "post",
			url:'student/searchstudent.php',
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

	function editrecord (a) {
		$(a).hide();
		$('#saveupdate,#canceledit').show();
		$('#studentform [disabled=true]').removeAttr('disabled');
		return false;
	}

	function cancelediting() {
		selectstudent(stud_id);
		return false;
		
	}

	function loadsubject (course_id,grade,section) {
		$.ajax({
		type: "post",
		url:'student/loadsubject.php',
		data: {'stud_id':stud_id,'course_id':course_id,'grade':grade,'section':section},
		success: function(data){
			studenttab("","prospectus");
			},
		error: function(){
			errorcon();
		}
		});
		// body...
	}


	function deletesubject (a) {
		var con=confirm("Are you sure you want to delete this subject?");
		if(con==true){
			$('#tabprospectus').load('student/prospectus.php?stud_id='+stud_id+'&se_id='+a).show();
			
		}
	}

	

	function loadsubject2(id){
		$('#overlay,#dialogH').show();
		$('#dialogH').load('student/dialogsubject.php?sub_id='+id);
	}

	function enrollsubject(id){
		$.ajax({
			type:'post',
			data:{'sched_id':id,'stud_id':stud_id},
			url:'student/loadsubject2.php',
			success:function(data){
				studenttab("","prospectus");
				$('#overlay,#dialogH').hide();
			},error:function(){
				errorcon();
			}

		})
	}