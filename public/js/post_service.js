/**
 * On Document Load - add_new_service.js
 */
$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#btn-suggest-service').on('click',function(e){
      var txt = $("#txt-post_service").val();

      if(txt != '')
      {
        $.post( "/post-service/suggest-job", { "msg": txt }, function(rx) {
          $('.x_content_ps_1').addClass('hide');
          $('.x_content_ps_2').removeClass('hide');

        }); // end post
      }

    });

});
