/*
	Alpha by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
*/
(function($) {

	skel.breakpoints({
		wide: '(max-width: 1680px)',
		normal: '(max-width: 1280px)',
		narrow: '(max-width: 980px)',
		narrower: '(max-width: 840px)',
		mobile: '(max-width: 736px)',
		mobilep: '(max-width: 480px)'
	});

	$(function () {
	  $('[data-toggle="tooltip"]').tooltip()
	});	

 $('#sends').on('click', function(){
	   var name = $('.modal #name').val(); 
	   var phone = $('.modal #phone').val();
	   var city = $('.modal #city').val();
	   var mess = $(' .err-mess');
	   if(name == '' || phone == ''){
		   mess.text('Заполните все обязательные поля!');
	   }
	   else{
		   $.ajax({
			   method: 'POST',
			   url: 'assets/handlers/sendmess.php',
			   data:{
				   name:name,
				   phone:phone,
				   city:city
			   },
			   success: function(data, xhr, status){
				   mess.text('Ваше сообщение отправлено!');
				   $('.modal #name').val('');
				   $('.modal #phone').val('');
				   $('.modal #city').val('');
				   setTimeout(function(){
					   $('.modal').modal('hide');
				   },3000)
			   },
			   error:function(){
				   mess.text('Произошла ошибка!');
			   }
			   
		   })
	   }
   });


  $('#send').on('click', function(){
	   var name = $('#names').val(); 
	   var phone = $('#phones').val();
	   var city = $('#citys').val();
	   if(name == '' || phone == ''){
		   $('#warningAlert').show();
	   }
	   else{
		   $.ajax({
			   method: 'POST',
			   url: 'assets/handlers/sendmess.php',
			   data:{
				   name:name,
				   phone:phone,
				   city:city
			   },
			   success: function(data, xhr, status){

			   	$('#succesAlert').show();

			   		   name = $('#names').val(''); 
					   phone = $('#phones').val('');
					   city = $('#citys').val('');

			   setTimeout(function(){
					   	$('#succesAlert').hide();
				   },3000);
			   },
			   error:function(){
			   	$('#errorAlert').show();
			   setTimeout(function(){
					   	$('#errorAlert').hide();
				   },3000);
			   }
			   
		   })
	   }
   });
   


	$(function() {

		var	$window = $(window),
			$body = $('body'),
			$header = $('#header'),
			$banner = $('#banner');

		// Fix: Placeholder polyfill.
			$('form').placeholder();

		// Prioritize "important" elements on narrower.
			skel.on('+narrower -narrower', function() {
				$.prioritize(
					'.important\\28 narrower\\29',
					skel.breakpoint('narrower').active
				);
			});

		// Dropdowns.
			$('#nav > ul').dropotron({
				alignment: 'right'
			});

		// Off-Canvas Navigation.

			// Navigation Button.
				$(
					'<div id="navButton">' +
						'<a href="#navPanel" class="toggle"></a>' +
					'</div>'
				)
					.appendTo($body);

			// Navigation Panel.
				$(
					'<div id="navPanel">' +
						'<nav>' +
							$('#nav').navList() +
						'</nav>' +
					'</div>'
				)
					.appendTo($body)
					.panel({
						delay: 500,
						hideOnClick: true,
						hideOnSwipe: true,
						resetScroll: true,
						resetForms: true,
						side: 'left',
						target: $body,
						visibleClass: 'navPanel-visible'
					});

			// Fix: Remove navPanel transitions on WP<10 (poor/buggy performance).
				if (skel.vars.os == 'wp' && skel.vars.osVersion < 10)
					$('#navButton, #navPanel, #page-wrapper')
						.css('transition', 'none');

		// Header.
		// If the header is using "alt" styling and #banner is present, use scrollwatch
		// to revert it back to normal styling once the user scrolls past the banner.
		// Note: This is disabled on mobile devices.
			if (!skel.vars.mobile
			&&	$header.hasClass('alt')
			&&	$banner.length > 0) {

				$window.on('load', function() {

					$banner.scrollwatch({
						delay:		0,
						range:		0.5,
						anchor:		'top',
						on:			function() { $header.addClass('alt reveal'); 
												 $('#logo').hide(); 
												 $('.contacts').css('margin-left','1em');},
						off:		function() { $header.removeClass('alt'); 
												 $('#logo').show(); 
												 $('.contacts').css('margin-left','10em');}
					});

				});

			}

	});

})(jQuery);