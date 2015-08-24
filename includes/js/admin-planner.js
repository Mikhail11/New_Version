


$('#modalPostCreate').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var title = button.data('postTitle');
  var content = button.data('postContent');
  var time = button.data('postTime');
  var date = button.data('postDate');
  var image = button.data('postImage');
  date=date.substr(6,4)+'-'+date.substr(3,2)+'-'+date.substr(0,2); 
  var modal = $(this);
  modal.find('.textarea_title').val(title);
  modal.find('.textarea_content').val(content);
  modal.find('.input_time').val(time);
  modal.find('.input_date').val(date);
  modal.find('img').attr( 'src', image )


  	 	if(button.data('info')=='new'){

  	 		  modal.find('.textarea_title').removeAttr('readonly');
			  modal.find('.textarea_content').removeAttr('readonly');
			  modal.find('.input_time').removeAttr('readonly');
			  modal.find('.input_date').removeAttr('readonly');
			  $('#editButton').hide();
			  $('#trashButton').hide();

  	 	} else if(button.data('info')=='edit') {

  	 		modal.find('.textarea_title').attr('readonly','readonly');
		    modal.find('.textarea_content').attr('readonly','readonly');
		    modal.find('.input_time').attr('readonly','readonly');
		 	modal.find('.input_date').attr('readonly','readonly');
		 	$('#editButton').show();
		 	$('#trashButton').show();
		 	$('#buttonGallery').hide();
		 	$('#buttonUpload').hide();
  	 	}

  	 	})

$('#editButton').click(function(){

	  $('#textarea_title').removeAttr('readonly');
	  $('#textarea_content').removeAttr('readonly');
	  $('#input_time').removeAttr('readonly');
	  $('#input_date').removeAttr('readonly');
	  $('#editButton').hide();
	  $('#buttonGallery').show();
	  $('#buttonUpload').show();
})