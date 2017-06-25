$('.moptions').on('click',function(e){
  $('.moptions-group').addClass('hide');
  $('.loptions-group').removeClass('hide');
});

$('.loptions').on('click',function(e){
  $('.loptions-group').addClass('hide');
  $('.moptions-group').removeClass('hide');
});
