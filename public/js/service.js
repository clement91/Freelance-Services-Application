/**
 * On Document Load - add_new_service.js
 */
$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.custom-title').on('click',function(e){
      var id = $(this).attr('value');
      $.post( "/service/view-job", { "id": id, }, function(rx) {
        $('.header-row').html(rx);
      }); // end post

    });

});
