/**
 * On Document Load - add_new_service.js
 */
$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //selectize
    $('#profile_service_tabx_tags').selectize({});
    var v = $('#profile_service_tabv_tags').val().split(',');
    $.each( v, function( i, obj ){
      $("#profile_service_tabx_tags")[0].selectize.addOption({value: obj ,text: obj });
      $("#profile_service_tabx_tags")[0].selectize.addItem(obj);

    });
    $('#profile_service_tabx_tags')[0].selectize.disable();

    //post request
    $('#btn-profile-service-request').on('click',function(e){

    });

    //post confirm
    $('#btn-profile-service-confirm').on('click',function(e){

    });

    //revert
    $('#btn-profile-service-back').on('click',function(e){
      $('.post-x-table').removeClass('hide');
      $('.find_service_x').removeClass('hide');
      $('.post-xc-table').addClass('hide');

    });

    //add comments
    $('#btn-add-comment-ps').on('click',function(e){
      var msg = $('#txt-new-comment-ps').val();
      var job_id = $('#txt-new-comment-ps').attr('data-jobid');
      var user = $('#txt-new-comment-ps').attr('data-user');
      var rate = $('#ps-label-rate').attr('value');

      if(msg != '')
      {
        $.post( "/inbox/add-public-comment", { "job_id": job_id, "msg": msg, "user": user, "rate": rate, }, function(rx) {
          $('.ps-comment-list').prepend(rx);
          $('#txt-new-comment-ps').val('');
        }); // end post
      }

    });


    //star rating - hover
    $('.ps-fa').on('mouseenter ',function(e){
        var value = $(this).attr('data-index');

        $('.ps-fa').each(function( i ) {
          if (i <= value)
          {
            $('#ps-fa-' + i).removeClass('fa-star-o');
            $('#ps-fa-' + i).addClass('fa-star');
          }
        });
    });
    //star rating - remove hover
    $('.ps-fa').on('mouseleave ',function(e){
        var value = $(this).attr('data-index');
        var current_value  = $('#ps-label-rate').attr('value');
        current_value = parseInt(current_value);

        $('.ps-fa').addClass('fa-star-o');
        $('.ps-fa').removeClass('fa-star');

        //add it back
        $('.ps-fa').each(function( i ) {
          if (i < current_value)
          {
            $('#ps-fa-' + i).removeClass('fa-star-o');
            $('#ps-fa-' + i).addClass('fa-star');
          }
        });
    });
    //onclick
    $('.ps-fa').on('click ',function(e){
      var value = $(this).attr('data-index');
      $('#ps-label-rate').attr('value', parseInt(value) + 1);
    });

});
