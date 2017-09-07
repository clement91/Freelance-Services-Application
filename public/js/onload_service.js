/**
 * On Document Load - add_new_service.js
 */
$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.btn-view-profile').on('click',function(e){
      var id = $(this).attr('data-id');
      $.post( "/service/view-profile", { "id": id, }, function(rx) {
        $('.post-xc-table').html(rx);
        $('.post-x-table').addClass('hide');
        $('.post-xc-table').removeClass('hide');
      }); // end post

    });
});
