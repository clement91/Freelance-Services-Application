/**
 * On Document Load - add_new_service.js
 */
$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#chat-tab').on('click',function(e){
      $('.inbox-body').html('');
    });

    $('.mail_list').on('click',function(e){
      var id = $(this).attr('id');
      var tab = $(this).attr('data-tab');

      if(tab == 1)
      {
        $.post( "/inbox/read-mail", { "job_id": id, }, function(rx) {
          //update left panel
          $('.custom-fa-' + job_id).removeClass('fa-circle');
          $('.custom-fa-' + job_id).addClass('fa-circle-thin');
          $('.custom-title-' + job_id).css('font-weight', 'normal');

          $('.inbox-body').html(rx);

        }); // end post
      }
      else
      {
        var job_id = $(this).attr('data-jobid');

        $.post( "/inbox/read-chat", { "job_transaction_id": id, "job_id": job_id }, function(rx) {
          //update left panel
          $('.custom-fa-' + job_id).removeClass('fa-circle');
          $('.custom-fa-' + job_id).addClass('fa-circle-thin');
          $('.custom-title-' + job_id).css('font-weight', 'normal');

          $('.inbox-body').html(rx);
        }); // end post
      }


    });

});
