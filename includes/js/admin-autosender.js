/* *
   * Textarea restrictions
 */
 
function update_textarea_word_count(txt, word_count) {

	var maxLen = 140;


	
	var len = txt.val().length;
	if (len > maxLen) {
		$(word_count).addClass("bg-danger");
		$(submitButtons).attr('disabled', 'disabled');
	} else {
		$(word_count).removeClass("bg-danger");
		$("#admin-settings-form button[type=\"submit\"]").removeAttr('disabled');
	}
	$(word_count).html(maxLen - len);
}

function update_text_word_count(txt, word_count) {

	var maxLen = 70;

	
	
	var len = txt.val().length;
	if (len > maxLen) {
		$(word_count).addClass("bg-danger");
		$(submitButtons).attr('disabled', 'disabled');
	} else {
		$(word_count).removeClass("bg-danger");
		$("#admin-settings-form button[type=\"submit\"]").removeAttr('disabled');
	}
	$(word_count).html(maxLen - len);
}

$(document).ready(function() {

 	function smsLoginChecked(){

	 	var dateSMS = $('#AUTO_MESSAGE_SMS_DATE').val();
	 	var smsCount = $('#smsCount').val();

	 	if (dateSMS != ''  && smsCount == 0) {

	 		addNotification('Пополните баланс для включения СМС рассылки!', 'danger');
	 		$('#AUTO_MESSAGE_SMS_DATE').val('');
	 		return false;

	 	} else {

	 		return true;
	 	}



	}

 	function VKSendsChecked(){

	 	var dateVK = $('#AUTO_POST_VK_DATE').val();
	 	var VKToken = $('#AUTO_MESSAGE_VK_TOKEN').val();
	 	var VKText = $('#AUTO_POST_VK_MESSAGE').val(); 
	 	var f1 = true;
	 	var f2 = true;
	 	var f3 = true;
	 	var check;

	 	if( dateVK == '' ) {

	 		f1 = false;
	 	}

	 	if( VKToken == '' ) {

	 		f2 = false;
	 	}

	 	if( VKText == '' ) {

	 		f3 = false;
	 	}


	 	if(!f1 || (f1&&f2&&f3)){

	 		check = 'T';

	 	} else {

	 		check = 'F';
	 	}

	 	if ( check == 'T') {

	 		return true;

	 	} else {

	 		addNotification('Заполните все необходимые поля для включения рассылки!', 'danger');
	 		$('#AUTO_POST_VK_DATE').val('');
	 		if(VKToken == ''){
	 		$('#AUTO_MESSAGE_VK_TOKEN').attr('style', 'border-color:red;');}
	 		if(VKText == ''){
	 		$('#AUTO_POST_VK_MESSAGE').attr('style', 'border-color:red;');}

	 		return false;
	 	}



	}


 $('#AUTO_MESSAGE_VK_TOKEN').focus(function(){

 	$('#AUTO_MESSAGE_VK_TOKEN').removeAttr('style');
 });

 $('#AUTO_POST_VK_MESSAGE').focus(function(){

 	$('#AUTO_POST_VK_MESSAGE').removeAttr('style');
 });

	var SubmitButtons = $("button[type=\"submit\"]");

	$(SubmitButtons).click(function(e) {

	 	if (smsLoginChecked() && VKSendsChecked()) {


				$(this).html("Сохраняется... <i class=\"fa fa-spinner fa-pulse\"></i>");
				var a = $(this);
				setTimeout(function() {
					$(a).attr('disabled', 'disabled');
				}, 100);


		 	} else {

		 		return false;
			}
	});


/* *
   * Numeric
 */
	
	$("input[type=\"number\"]").numeric({ decimal: false, negative: false }, function() {this.value = "1"; this.focus(); });

/* *
   * Remove Success or Failure icons
 */
	
	setTimeout(function(){
		$("i.fa[class^=\"text\"]").remove();
	}, 8000);

/* *
   * Safari bootstrap column reordering & affix bug
 */
	
	/* Check if we are in safari */
	if (navigator.userAgent.indexOf('Safari') != -1 && navigator.userAgent.indexOf('Chrome') == -1) {
	    var stickywidget = $('#affix-menu');
	    var explicitlySetAffixPosition = function() {
	        stickywidget.css('left',stickywidget.offset().left+'px');
	    };
	    /* Before the element becomes affixed, add left CSS that is equal to the distance of the element from the left of the screen */
	    stickywidget.on('affix.bs.affix',function(){
	        explicitlySetAffixPosition();
	    });
	
	    /* On resize of window, un-affix affixed widget to measure where it should be located, set the left CSS accordingly, re-affix it */
	    $(window).resize(function(){
	        if(stickywidget.hasClass('affix')) {
	            stickywidget.removeClass('affix');
	            explicitlySetAffixPosition();
	            stickywidget.addClass('affix');
	        }
	    });
	}
$('#AUTO_MESSAGE_SMS_DATE').pickadate();
$('#AUTO_POST_VK_DATE').pickadate();
/* *
   * Ограничение вводимых данных
 */

 	$("input[type='email']").alphanum({
	 	allow: '-_@.',
	    allowSpace: false,
	    allowNumeric: true,
	    allowOtherCharSets: false
	});

});