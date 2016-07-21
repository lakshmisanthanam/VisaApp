$(document).ready(
	function(){ 

		console.log('document ready!');

	    $("#selectall").change(function(){
	      	$(".dep-checkbox").prop('checked', $(this).prop("checked"));
	    });
	
	}

);