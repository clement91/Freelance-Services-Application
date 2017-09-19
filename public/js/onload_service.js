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
    $('#onload_service_tagx').selectize({});
    var v = $('#onload_service_tagv').val().split(',');
    $.each( v, function( i, obj ){
      $("#onload_service_tagx")[0].selectize.addOption({value: obj ,text: obj });
      $("#onload_service_tagx")[0].selectize.addItem(obj);

    });
    $('#onload_service_tagx')[0].selectize.disable();

    $('.btn-view-profile').on('click',function(e){
      var id = $(this).attr('data-id');
      $.post( "/service/view-profile", { "id": id, 'view': 0 }, function(rx) {
        $('.post-xc-table').html(rx);
        $('.post-x-table').addClass('hide');
        $('.find_service_x').addClass('hide');
        $('.post-xc-table').removeClass('hide');
      }); // end post

    });
});
