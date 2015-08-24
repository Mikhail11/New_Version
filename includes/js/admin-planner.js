


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
  $('#imageData').src = image;

})