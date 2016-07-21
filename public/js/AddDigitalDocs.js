$(document).ready(
	function(){ 

		console.log('document ready!');

        $("#dependents_dropdown").prop("disabled", true);

        $("#radioBtns input[name='for_dependents']").click(function(){
		    if($('input:radio[name=for_dependents]:checked').val() == "Self"){
		        $("#dependents_dropdown").prop("disabled", true);
		        $("#dependents_dropdown").val("");
		    } else {
		    	$("#dependents_dropdown").prop("disabled", false);
		    }
		});
	}

);