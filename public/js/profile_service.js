/**
 * On Document Load - add_new_service.js
 */
$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //post request
    $('#btn-profile-service-request').on('click',function(e){

    });

    //post confirm
    $('#btn-profile-service-confirm').on('click',function(e){

    });

    //revert
    $('#btn-profile-service-back').on('click',function(e){
      $('.post-x-table').removeClass('hide');
      $('.post-xc-table').addClass('hide');

    });
});
