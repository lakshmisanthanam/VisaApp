$(document).ready(
	function(){ 

		console.log('document ready!');

	    $( "#visa_issued_datepicker" ).datepicker({
            dateFormat : 'mm/dd/yy',
            changeMonth : true,
            changeYear : true,
            yearRange: '-6y:c+nn',
            maxDate: '-1d'
        });

        $( "#visa_expiry_datepicker" ).datepicker({
            dateFormat : 'mm/dd/yy',
            changeMonth : true,
            changeYear : true,
            yearRange: '-1y:c+10y',
            maxDate: '+10y',
            minDate: '-0d'
        });

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