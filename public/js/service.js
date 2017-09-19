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
    $(".ip-slider").ionRangeSlider({
			  type: "double",
			  min: $(this).val(),
			  max: 100,
			  from: 0,
			  to: $(this).val(),
			  max_interval: 100,
        from_fixed: true,
        step: 5,
        grid: true,

        onSlideEnd: function(position, value) {
          console.log(position + ' - ' + value)
        }

			});

    $(".ip-slider").on('input change',function(e){

    });

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

});
