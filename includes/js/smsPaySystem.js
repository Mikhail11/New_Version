	
	$("#smsPay").popover({ 
		html: true, 
		content: 
	$('#smsPayPopover').html() 
		});


$(document).ready(function(){ 

 $('#disagree').click(function(){

 	 $('.popover').popover('hide');
 });


});