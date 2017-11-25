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
        $('.service-profile-view').remove();
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

    $(".req-ip-slider").each(function() {
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
          disable: true,
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
      var element = $('.' + id).parents("article");

      BootstrapDialog.show({
          title: 'In Progress Service',
          message: 'Update current progress from <b>' + old_value + '%</b> to <b>'+ value + '%</b>?',
          closable: false,
          buttons: [{
              label: 'Confirm',
              action: function(dialogItself){
                  dialogItself.close();
                  //console.log(job_transaction_id + ' - ' + value)
                  $.post('/service/update-job-progress', { 'id': job_transaction_id, 'value': value }, function(){
                    if(value == 100)
                    {
                      $(element).appendTo('.service-tmp-closed-area');
                      //console.log(element)
                      $(element).find('.event-com').addClass('hide');
                      $('.service-tmp-closed-area').parents('div').removeClass('hide');

                      new PNotify({
                          title: 'Success',
                          text: 'Great! You have completed a service.',
                          type: 'success',
                          styling: 'bootstrap3'
                      });
                    }
                    else
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
      var type = $(this).data('type');
      var raw_id = $(this).parents("article").data('raw-id');
      var element = $(this).parents("article");

      $.post( "/service/view-profile", { "id": raw_id, 'view': type }, function(rx) {
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

    $('.service-rate').on('click',function(e){
      var id = $(this).parents("article").data('id'); //transaction id
      var title = $(this).parents("article").data('title');
      var owner = $(this).parents("article").data('owner');
      var user = $(this).parents("article").data('user');
      var element = $(this);

      BootstrapDialog.show({
          title: '<b>Rate Service - ' + title,
          message: 'How much do you like the service provided by <b>' + owner + '</b>?<br/><b>Give a comment & rate it!!</b>&nbsp; \
          <span class="pull-right"><i style="font-size:12px">Your rating are valuable to us.</i> \
          <span style="font-size:20px"><i class="fa fa-smile-o" aria-hidden="true">&nbsp;</i><i class="fa fa-meh-o" aria-hidden="true"> \
          </i>&nbsp;<i class="fa fa-frown-o" aria-hidden="true"></i></span></span><br/> \
          <textarea class="form-control" placeholder="Leave a comment ..." id="rate-msg" style="resize:none;height:100px;"></textarea><br/> \
          <div class="ratings">\
            <i>Rate:  </i>\
            <span id="ps-label-rate" value="0"></span>\
            <a href="#"><span data-index="0" id="ps-fa-0" class="ps-fa fa fa-star-o"></span></a>\
            <a href="#"><span data-index="1" id="ps-fa-1" class="ps-fa fa fa-star-o"></span></a>\
            <a href="#"><span data-index="2" id="ps-fa-2" class="ps-fa fa fa-star-o"></span></a>\
            <a href="#"><span data-index="3" id="ps-fa-3" class="ps-fa fa fa-star-o"></span></a>\
            <a href="#"><span data-index="4" id="ps-fa-4" class="ps-fa fa fa-star-o"></span></a>\
          </div>\
          <script>\
          $(".ps-fa").on("mouseenter",function(e){\
              var value = $(this).attr("data-index");\
              $(".ps-fa").each(function( i ) {\
                if (i <= value)\
                {\
                  $("#ps-fa-" + i).removeClass("fa-star-o");\
                  $("#ps-fa-" + i).addClass("fa-star");\
                }\
              });\
          });\
          $(".ps-fa").on("mouseleave",function(e){\
              var value = $(this).attr("data-index");\
              var current_value  = $("#ps-label-rate").attr("value");\
              current_value = parseInt(current_value);\
              $(".ps-fa").addClass("fa-star-o");\
              $(".ps-fa").removeClass("fa-star");\
              $(".ps-fa").each(function( i ) {\
                if (i < current_value)\
                {\
                  $("#ps-fa-" + i).removeClass("fa-star-o");\
                  $("#ps-fa-" + i).addClass("fa-star");\
                }\
              });\
          });\
          $(".ps-fa").on("click",function(e){\
            var value = $(this).attr("data-index");\
            $("#ps-label-rate").attr("value", parseInt(value) + 1);\
          });</script>',
          closable: false,
          buttons: [{
              label: 'Confirm',
              action: function(dialogItself){
                if(rate != "0")
                {
                  dialogItself.close();

                  var msg = $('#rate-msg').val();
                  var rate = $('#ps-label-rate').attr('value');

                  $.post('/inbox/add-public-comment', { "job_id": id, "msg": msg, "user": user, "rate": rate, }, function(rx) {
                    new PNotify({
                        title: 'Success',
                        text: 'Thanks for the feedback!',
                        type: 'success',
                        styling: 'bootstrap3'
                    });

                    $(element).addClass('hide');
                  });
                }


              }
          },{
              label: 'Cancel',
              action: function(dialogItself){
                  dialogItself.close();
              }
          }]
      }); // end BootstrapDialog.show

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
      msg = msg == "" ? $('.editor-wrapper').text(): msg;

      $.post( "/inbox/add-private-comment", { "job_id": job_id, "msg": msg }, function(rx) {
        //console.log(rx)
        $('.list-unstyled.msg_list').append(rx);
        $('#editor').text('');
        $('.editor-wrapper').text('');

        //var e = jQuery.Event("keydown");
        //e.which = 34; // # Some key code value
        //$('.list-unstyled.msg_list').trigger(e);

      }); // end post

    });



});
