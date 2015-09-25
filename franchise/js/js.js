$(document).ready(function(){
	$('#scroll').bind('scroll', function()
                              {
                                if($(this).scrollTop() + $(this).innerHeight()>=$(this)[0].scrollHeight)
                                {
                                  alert('end reached');
                                }
                              })
	
  $(".map, .choose, .profit, .technology, header").css({backgroundSize: "cover"});	

  
  $( "#slider" ).slider({
  value : 12,
  min : 5,
  max : 20,
  step : 1,
  create: function( event, ui ) {
   val = $( "#slider" ).slider("value");
   $( "#contentSlider" ).html( val );
  },
  slide: function( event, ui ) {
   $( "#contentSlider" ).html( ui.value );
     var payment = $('#contentSlider2').text();
	 var routers = ui.value;
	 var expenses = routers * 5800 + ((routers * payment)/10);
	 var s = 0;
	 for(var i=0;i<=12;i++){
		 s  = s + (routers*payment*i-(expenses+routers*1000*(i-1)));
	 }
	 $('#summ').text(s);
 }   
});
		
		$( "#slider2" ).slider({
  value : 2855,
  min : 2000,
  max : 5000,
  step : 1000,
  create: function( event, ui ) {
   val = $( "#slider2" ).slider("value");
  $( "#contentSlider2" ).html( val );
 },
 slide: function( event, ui ) {
  $( "#contentSlider2" ).html( ui.value );
      var payment = ui.value;
	  var routers = $('#contentSlider').text();
	  var expenses = routers * 5800 + routers * payment/10;
	 var s = 0;
	 for(var i=0;i<=12;i++){
		 s  = s + (routers*payment*i-(expenses+routers*1000*(i-1)));
	 }
	 $('#summ').text(s);
  }
});
		
  var $menu = $(".head");

  $(window).scroll(function(){
  if ( $(this).scrollTop() > 35){
       $menu.addClass("menu-fixed");
        } else if($(this).scrollTop() <= 35) {
              $menu.removeClass("menu-fixed")
         }
   });
   function showPop(){
	   var scroll = $(window).scrollTop();
	   scroll = scroll + 330;
	   $('.popup').css('top', scroll+'px');
	   $('.overlay').fadeIn('fast');
	   $('.popup').fadeIn('fast');
	   $('.wrap').addClass('blur');
   }
   function hidePop(){
	   $('.overlay').fadeOut('fast');
	   $('.popup').fadeOut('fast');
	   $('.wrap').removeClass('blur');
   }
   $('.pop-up').on('click', function(){
	   showPop();
   })
   
   $('.overlay, .close').on('click', function(){
	   hidePop();
   })
   
   $('.popup #submit').on('click', function(){
	   var mess = $('.popup .err-mess');
	   var name = $('.popup #name').val(); 
	   var phone = $('.popup #phone').val();
	   var email = $('.popup #email').val();
	   var city = $('.popup #city').val();
	   if(name == '' || phone == '' || email == '' || city == ''){
		   mess.text('Заполните все обязательные поля!');
	   }
	   else{
		   $.ajax({
			   method: 'POST',
			   url: 'handlers/sendmess.php',
			   data:{
				   name:name,
				   phone:phone,
				   email:email,
				   city:city
			   },
			   success: function(data, xhr, status){
				   mess.text('Ваше сообщение отправлено!');
				   setTimeout(function(){
					   hidePop();
				   },3000)
			   },
			   error:function(){
				   mess.text('Произошла ошибка!');
			   }
			   
		   })
	   }
   });
   
 
$(document).on('click', 'a[href^=#]', function () {
        $('html, body').animate({ scrollTop:  $('a[name="'+this.hash.slice(1)+'"]').offset().top }, 1000 ); 
        return false;
    });
   
});