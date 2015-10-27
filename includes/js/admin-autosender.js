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

	var SubmitButtons = $("button[type=\"submit\"]");

	$(SubmitButtons).click(function(e) {

	 	if (smsLoginChecked()) {


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