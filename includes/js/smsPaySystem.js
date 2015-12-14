	
$("#smsPay").popover({ 
	html: true, 
	content: 
		$('#smsPayPopover').html() 
});


$(document).on('click','#agree',function(){ 
		$('#payform').submit();
});

$(document).on('click','#disagree',function(){ 
		$("#smsPay").popover('hide');
});

$(document).on('change','#list',function(){

		$('#label').val($(this).val()+'_'+$('#idDbUser').val());
		$('#shorDest').val('Покупка пакета на:'+$(this).val()+' смс');
		$('#sum').val(