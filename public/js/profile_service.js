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
    $('#btn-profile-service-back-0').on('click',function(e){
      $('.post-x-table').removeClass('hide');
      $('.find_service_x').removeClass('hide');
      $('.post-xc-table').addClass('hide');

    });

    $('#btn-profile-service-back-1').on('click',function(e){
      $('.service-main-view').removeClass('hide');
      $('.service-profile-view').addClass('hide');

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

    //new message 'compose
    $('#editor').wysiwyg();
    //$('#editor').cleanHtml();
    $('.compose-public, .compose-close').on('click ',function(e){
      $('.compose').slideToggle();
    });
    $('#editor').wysiwyg().on('change', function(){
    	//console.log('something has been changed on the editor');
    });

    //message me
    $('#send-ps-msg').on('click ',function(e){
      var job_id = $(this).attr('data-job');
      var user = $(this).attr('data-user');
      var msg = $('#editor').text();

      $.post( "/inbox/send-ps-msg", { "job_id": job_id, "user": user, "msg": msg }, function(rx) {
        $('.compose').slideToggle();

        new PNotify({
            title: 'Success',
            text: 'Voilaa!',
            type: 'success',
            styling: 'bootstrap3'
        });
      }); // end post

    });

    //request service
    $('#btn-profile-service-request').on('click ',function(e){
        var title = $('#ps-job-title').text();
        var desc = $('#ps-job-desc').text();
        var price = $('#ps-job-price').text();
        var cat = $('#ps-job-cat').text();
        var instruction = $('#ps-job-instruction').text();
        var deliver = $('#ps-job-deliver').text();
        var job_id = $('#ps-job-id').text();
        var name = $('#ps-job-name').text();

        var msg = '<p style="font-size:16px">Are you sure you want to request service from <b>' + name + '</b>?\n\n\
                    <b>Title:</b> ' + title + '\n\
                    <b>Description:</b> ' + desc + '\n\
                    <b>Category:</b> ' + cat + '\n\
                    <b>Price:</b> ' + price + '\n\
                    <b>Instruction:</b> ' + instruction + '\n\
                    <b>' + deliver + ' Days Delivery</b></p>';
        BootstrapDialog.show({
            title: 'Confirm Request Service',
            message: msg,
            closable: false,
            buttons: [{
                label: 'Confirm',
                action: function(dialogItself){
                    dialogItself.close();

                    $.post('/service/add-payment', { 'job_id': job_id }, function(rx){
                        $('.x-table').empty();
                        $('.text-center').removeClass('text-center');
                        $('.x-table').html(rx);
                      /*
                      new PNotify({
                          title: 'Success',
                          text: 'Voilaa!',
                          type: 'success',
                          styling: 'bootstrap3'
                      });
                      */
                    });

                }
            },{
                label: 'Cancel',
                action: function(dialogItself){
                    dialogItself.close();
                }
            }]
        }); // end BootstrapDialog.show

    });

});
