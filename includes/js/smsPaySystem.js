	
$("#smsPay").popover({ 
	html: true, 
	content: 
		$('#smsPayPopover').html() 
});


$(document).on('click','#agree',function(){ 
		$('#payform').submit();
});

$(document).on('change','#list',function(){
		$('#formcomment').val('Покупка пакета на: '+$(this).val()+' смс');
		$('#shorDest').val('Покупка пакета на:'+$(this).val()+' смс');
		$('#sum').val($(this).val()*1.1);
});
