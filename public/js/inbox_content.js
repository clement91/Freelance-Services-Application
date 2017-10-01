/**
 * On Document Load - add_new_service.js
 */
$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var tab = $('#send-inbox-content').attr('data-tab');
    $('.editor-wrapper').addClass('hide');
    $('.btn-send1,.btn-send2').addClass('hide');

    if(tab == 1)
    {
      $('div#editor').removeClass('hide');
      $('div#editor').wysiwyg();
      $('.btn-send1').removeClass('hide');

      $('button#send-inbox-content').on('click',function(e){
        var job_id = $(this).attr('data-jobid');
        var msg = $('div#editor').html();
        
        if($.trim(msg) != '')
        {
          $.post( "/inbox/send-mail", { "job_id": job_id, "msg": msg }, function(rx) {
              $('.msg_list').append(rx);
              $('#editor').html('');

          }); // end post
        }
      });

    }
    else
    {
      $('div#editor2').removeClass('hide');
      $('div#editor2').wysiwyg();
      $('.btn-send2').removeClass('hide');

      $('button#send-inbox-content2').on('click',function(e){
        var job_id = $(this).attr('data-jobid');
        var msg = $('#editor2').html();

        if($.trim(msg) != '')
        {
          $.post( "/inbox/send-chat", { "job_trans_id": job_id, "msg": msg }, function(rx) {
              $('.msg_list').append(rx);
              $('div#editor2').html('');

          }); // end post
        }
      });
    }




});
