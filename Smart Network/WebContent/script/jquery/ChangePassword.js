$(document).ready(function(){
	$("#submit").hide();
	
    $("#terms").change(function(){
        $("#submit").toggle();
    });
});