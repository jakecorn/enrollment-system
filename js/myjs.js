var rightcol;
$(document).ready(function() {
	rightcol=$('#rightcol');
	var loc = window.location.toString();
	var url = loc.split("#");
 	if(url.length==1){
		alert("ok")
		window.location.hash="student/studentindex";
		url[1]="#student/studentindex";
	}
   	sidemenu(url[1])
});

function sidemenu(a){

	$.ajax({
		url:a+'.php',
		success:function(data){
			rightcol.html(data);
		},
		error:function() {
			errorconalert();
		}
	});

	window.location.hash=a;
	
}

 function errorcon(){
	return "ERROR: No network connection.";
}

function errorconalert(){
	alert("ERROR: No network connection.");
}

function toggledialog(){
	$('#overlay,#dialogH').toggle();
}

function overlaywidth(){
 
}