/**
 * On Document Load - add_new_service.js
 */
$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.tgtg').each(function(index) {
      var id = $(this).attr('id');

      $('#' + id).selectize({});
      var v = $('#onload_service_tagv-' + index).val().split(',');
      $.each( v, function( i, obj ){
        $("#" + id)[0].selectize.addOption({value: obj ,text: obj });
        $("#" + id)[0].selectize.addItem(obj);

      });
      $('#' + id)[0].selectize.disable();

    });
    //selectize

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
