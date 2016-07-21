$(document).ready(
	function(){ 

		console.log('document ready!');

	    $("#edit-link").click(function(e){
	    	$("input").prop('disabled', false);
	    	$("input:text:visible:first").focus();
	    	$("#save-cancel").css('display', 'block');
	    	$("#edit-link").css('display', 'none');
	    });
	
		$("#cancel-btn").click(function(e) {
			$("input").prop('disabled', true);
	    	$("#save-cancel").css('display', 'none');
	    	$("#edit-link").css('display', 'block');
		});
		
		$("#datepicker").datepicker({
            dateFormat : 'mm/dd/yy',
            changeMonth : true,
            changeYear : true,
            yearRange: '-100y:c+nn',
            maxDate: '-1d'
        });
		
		/**$(".date-picker").click(function(e) {
			$("#datepicker").datepicker('setDate', '05/01/2015');
		});*/
		
	}

);