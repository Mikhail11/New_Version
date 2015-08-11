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

$(document).ready(function() {

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