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

    //slider
    $(".ip-slider").each(function() {
      $(this).ionRangeSlider({
          type: "double",
          min: 0,
          max: 100,
          from: 0,
          to: $(this).val(),
          max_interval: 100,
          from_fixed: true,
          step: 5,
          grid: true,
          postfix: "%",
          onStart: function (data) {

          },
          onChange: function (data) {

          },
          onFinish: function (data) {
            var id = data.input.context.classList[1];
            sliderFin(id);
          },
          onUpdate: function (data) {

          }
        });
    });

    function sliderFin(id)
    {
      var old_value = $('.' + id).attr('data-value');
      var value = $('.' + id).val().split(";")[1];
      var job_transaction_id = $('.' + id).parents("article").attr("data-id");

      BootstrapDialog.show({
          title: 'In Progress Service',
          message: 'Update current progress from <b>' + old_value + '%</b> to <b>'+ value + '%</b>?',
          closable: false,
          buttons: [{
              label: 'Confirm',
              action: function(dialogItself){
                  dialogItself.close();
                  console.log(job_transaction_id + ' - ' + value)
                  $.post('/service/update-job-progress', { 'id': job_transaction_id, 'value': value }, function(){
                    new PNotify({
                        title: 'Success',
                        text: 'Voilaa!',
                        type: 'success',
                        styling: 'bootstrap3'
                    });

                  });

              }
          },{
              label: 'Cancel',
              action: function(dialogItself){
                  dialogItself.close();

                  var slider = $('.' + id).data("ionRangeSlider");
                  slider.update({
                      //from: 0,
                      to: old_value,
                      // etc.
                  });
              }
          }]
      }); // end BootstrapDialog.show
    }

    /*
    //asynchronous method
    var globalTimeout = null;
    $(".ip-slider").on('input change',function(e){
      var id = $(this).attr('data-id');
      var old_value = $(this).attr('data-value');
      var value = $(this).val().split(";")[1];

      if (globalTimeout != null) {
        clearTimeout(globalTimeout);
      }
      globalTimeout = setTimeout(function() {
        globalTimeout = null;

        if($('.bootstrap-dialog').length == 0)
        {
          BootstrapDialog.show({
              title: 'In Progress Service',
              message: 'Update current progress from <b>' + old_value + '%</b> to <b>'+ value + '%</b>?',
              closable: false,
              buttons: [{
                  label: 'Confirm',
                  action: function(dialogItself){
                      dialogItself.close();

                      $.post('/service/update-progress', { 'job_id': id }, function(){
                        new PNotify({
                            title: 'Success',
                            text: 'Voilaa!',
                            type: 'success',
                            styling: 'bootstrap3'
                        });

                      });

                  }
              },{
                  label: 'Cancel',
                  action: function(dialogItself){
                      dialogItself.close();

                      var slider = $(".ip-" + id).data("ionRangeSlider");
                      slider.update({
                          //from: 0,
                          to: old_value,
                          // etc.
                      });
                  }
              }]
          }); // end BootstrapDialog.show
        }
      }, 500);
    });
    */

    $('.service-vp').on('click',function(e){
      var id = $(this).parents("article").data('id'); //transaction id
      var raw_id = $(this).parents("article").data('raw-id');
      var element = $(this).parents("article");

      $.post( "/service/view-profile", { "id": raw_id, 'view': 1 }, function(rx) {
        $('.service-profile-view').html(rx);
        $('.service-main-view').addClass('hide');
        $('.service-profile-view').removeClass('hide');
      }); // end post

    });

    $('.service-accept').on('click',function(e){
      var id = $(this).parents("article").data('id'); //transaction id
      var job_id = $(this).parents("article").data('job-id');
      var element = $(this).parents("article");

      $.post( "/service/accept-job", { "id": id, }, function(rx) {
        if($('.x_contentx_progress').hasClass('nj') == true)
            $('.x_contentx_progress').children().remove();

        //move
        $(element).appendTo('.x_contentx_progress');
        $('.x_contentx_progress').removeClass('nj');

        $('.toolx-progress-' + job_id).removeClass('hide');
        $('.atoolx-pending-' + job_id).remove();
      }); // end post
    });

    $('.service-reject').on('click',function(e){
      var id = $(this).parents("article").data('id'); //transaction id
      var job_id = $(this).parents("article").data('job-id');
      var element = $(this).parents("article");

      $.post( "/service/reject-job", { "id": id, }, function(rx) {
        if($('.x_contentx_close').hasClass('nj') == true)
        {
          $('.x_contentx_close').children('h2').remove();
          $(element).css('padding-top', '10px');
        }
        //move
        $(element).appendTo('.service-tmp-rej-area');
        $('.service-tmp-rej-area').parents('div').removeClass('hide');
        $('.x_contentx_close').removeClass('nj');

        $('.toolx-progress-' + job_id).remove();
        $('.toolx-pending-' + job_id).remove();
      }); // end post
    });

    $('.service-refund').on('click',function(e){
      var id = $(this).parents("article").data('id'); //transaction id
      var job_id = $(this).parents("article").data('job-id');
      var element = $(this).parents("article");

      $.post( "/service/refund-job", { "id": id, }, function(rx) {
        if($('.x_contentx_close').hasClass('nj') == true)
        {
          $('.x_contentx_close').children('h2').remove();
          $(element).css('padding-top', '10px');
        }
        //move
        $(element).appendTo('.service-tmp-rej-area');
        $('.service-tmp-rej-area').parents('div').removeClass('hide');
        $('.x_contentx_close').removeClass('nj');

        $('.toolx-progress-' + job_id).parents('article').find('.xtbit').remove();

      }); // end post
    });

    //message
    $('.service-chat').on('click ',function(e){
      var user = $(this).attr('data-customer');

      $('#editor').text('');
      $('#service-user-name').text(' ' + user);
      $('#send-private-service-comment').data('job_id', $(this).attr('data-value'));
      $('.list-unstyled.msg_list').children().remove();

      $.post( "/inbox/get-private-comments", { "job_id": $(this).attr('data-value') }, function(rx) {
        //console.log(rx)
        $('.list-unstyled.msg_list').prepend(rx);
        $('.compose').slideToggle();

      }); // end post

    });

    $('#send-private-service-comment').on('click ',function(e){
      var job_id = $(this).data('job_id');
      var msg = $('#editor').text();

      $.post( "/inbox/add-private-comment", { "job_id": job_id, "msg": msg }, function(rx) {
        //console.log(rx)
        $('.list-unstyled.msg_list').append(rx);
        $('#editor').text('');

        //var e = jQuery.Event("keydown");
        //e.which = 34; // # Some key code value
        //$('.list-unstyled.msg_list').trigger(e);

      }); // end post

    });



});
