


$('#modalPostCreate').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var title = button.data('postTitle');
  var content = button.data('postContent');
  var time = button.data('postTime');
  var date = button.data('postDate');
  var image = button.data('postImage');
  var postId = button.data('postId');
  date=date.substr(6,4)+'-'+date.substr(3,2)+'-'+date.substr(0,2); 
  var modal = $(this);
  modal.find('.textarea_title').val(title);
  modal.find('.textarea_content').val(content);
  modal.find('.input_time').val(time);
  modal.find('.input_date').val(date);
  modal.find('.input_hidden').val(postId);
  modal.find('img').attr('src',image);



  	 	if(button.data('info')=='new'){

  	 		  modal.find('.textarea_title').removeAttr('readonly');
			  modal.find('.textarea_content').removeAttr('readonly');
			  modal.find('.input_time').removeAttr('readonly');
			  modal.find('.input_date').removeAttr('readonly');
			  $('#editButton').hide();
			  $('#trashButton').hide();
			  $('#buttonGallery').show();
		 	  $('#buttonUpload').show();

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

  	 	});

$('#editButton').click(function(){

	  $('#textarea_title').removeAttr('readonly');
	  $('#textarea_content').removeAttr('readonly');
	  $('#input_time').removeAttr('readonly');
	  $('#input_date').removeAttr('readonly');
	  $('#editButton').hide();
	  $('#buttonGallery').show();
	  $('#buttonUpload').show();
});

$('#saveButton').click(function(){

  var title = $('#textarea_title').val();
  var content = $('#textarea_content').val();
  var time = $('#input_time').val();
  var date = $('#input_date').val();
  var image = $('#imageData').attr('src');
  var postId = $('#input_hidden').val();
		$.ajax({
				type: "POST",
				url: "admin-query.php",
				data: {
					'form-name': 'postPlannerForm',
					'title': title,
					'content':content,
					'time': time,
					'date':date,
					'post':postId,
					'image':image 
					},
			success: function(msg){
				location.href = 'admin-planner.php';
			},
			error: function (request, status, error) { failNotification(); }
			});
 

});

$('#trashButton').click(function(){

	  var postId = $('#input_hidden').val();
		$.ajax({
				type: "POST",
				url: "admin-query.php",
				data: {
					'form-name': 'postPlannerDelete',
					'postId':postId
					},
			success: function(msg){
					location.href = 'admin-planner.php';

			},
			error: function (request, status, error) { failNotification(); }
			});

});

	$(function(){
		var btnUpload=$('#buttonUpload');
		new AjaxUpload(btnUpload, {
			action: 'upload-file.php',
			name: 'uploadfile',
			onSubmit: function(file, ext){
				 if (! (ext && /^(jpg|png|jpeg|gif)$/.test(ext))){ 
                    // extension is not allowed 
					addNotification('Поддерживаемые форматы JPG, PNG или GIF','info');
					return false;
				}
			},
			onComplete: function(file, response){
				//Add uploaded file to list
				response = $.parseJSON(response);
				if(response.response==="success"){
					$('#imageData').attr('src',response.file);
				} else{
					addNotification('Файл не загружен ' + file,'danger');
				}
			}
		});
		
	});

function update_textarea_word_count(txt, word_count) {
	var maxLen = 140;
	var len = txt.val().length;
	if (len > maxLen) {
		$(word_count).addClass("bg-danger");
		$('#saveButton').attr('disabled', 'disabled');;
	} else {
		$(word_count).removeClass("bg-danger");
		$('#saveButton').removeAttr('disabled');
	}
	$(word_count).html(maxLen - len);
}

function update_title_word_count(txt, word_count) {
	var maxLen = 65;
	var len = txt.val().length;
	if (len > maxLen) {
		$(word_count).addClass("bg-danger");
		$('#saveButton').attr('disabled', 'disabled');
	} else {
		$(word_count).removeClass("bg-danger");
		$('#saveButton').removeAttr('disabled');

	}
	$(word_count).html(maxLen - len);
}