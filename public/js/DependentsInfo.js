$(document).ready(function(){ 
    $("#selectall").change(function(){
      	$(".dep-checkbox").prop('checked', $(this).prop("checked"));
      });
});