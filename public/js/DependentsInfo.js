$(document).ready(
	function(){ 

		console.log('document ready!');

	    $("#selectall").change(function(){
	      	$(".dep-checkbox").prop('checked', $(this).prop("checked"));
	    });
	
		$( "#datepicker" ).datepicker({
            dateFormat : 'mm/dd/yy',
            changeMonth : true,
            changeYear : true,
            yearRange: '-100y:c+nn',
            maxDate: '-1d'
        });
	}

);