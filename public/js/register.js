$(document).ready(
	function(){ 

		console.log('document ready!');

	    $( "#date_of_birth_picker" ).datepicker({
            dateFormat : 'mm/dd/yy',
            changeMonth : true,
            changeYear : true,
            yearRange: '-6y:c+nn',
            maxDate: '-1d'
        });
	}

);