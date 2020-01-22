
	function searchsubject(se){
 		var c = $(se).val();
		var b = $('#searchresult');
		b.html("Loading...")
		if(c.length!=0){
			$.ajax({
			type: "post",
			url:'subject/searchsubject.php',
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

function updatesubject(id,desc,type){
	$('#overlay,#dialogH').show();
	$.ajax({
		type:"post",
		url:'subject/subjectupdatedialog.php',
		data:{'sub_id':id,'description':desc,'type':type},
		success:function(data){
			$('#dialogH').html(data).show();
		},
		error:function(){

		}

	})

}



function submitsubjectform () {
 	 
	 var description = $('#description').val(); 
	 var type = $("#type").val();
	 
	$.ajax({
	type: "post",
	url:'subject/savesubject.php',
	data: {'description':description,'type':type},
	success: function(data){
		alert("Subject was successfully added.");
		$("input").val("");
		},
	error: function(){
		errorcon();
	}
	});
	 
	return false;
	}


function submitupdatesubjectform () {
 	 
	 var sub_id = $('#sub_id').val(); 
	 var description = $('#subdescription').val(); 
	 var type = $("#subtype").val(); 
	$.ajax({
	type: "post",
	url:'subject/saveupdatesubject.php',
	data: {'description':description,'type':type,'sub_id':sub_id},
	success: function(data){
		subjecttab(0,"subjectlist");
		$('#overlay,#dialogH').hide();
		alert("Subject was successfully updated.");
		},
	error: function(){
		errorcon();
	}
	});
	 
	return false;
	}


	function deletesubject (sub_id) {

		var c = confirm("Are you sure you want to delete this subject?");
		if(c==true){
			$.ajax({
			type: "post",
			url:'subject/deletesubject.php',
			data: {'sub_id':sub_id},
			success: function(data){
				alert("Successfully deleted.")
				subjecttab(0,"subjectlist");
				},
			error: function(){
				errorcon();
			}
			});
		}
		
	  }

function subjecttab(th,tab){
 	$('span[class=selected]').removeClass("selected");
	$(th).addClass("selected");
	$('.tab').hide();
	if(tab=='subjectlist'){	
		$('#tabsubjectlist').load("subject/subjectlist.php").show();
	}else{
 		$('#tabaddsubject').show();
	}
}
