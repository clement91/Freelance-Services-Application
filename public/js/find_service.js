/**
 * On Document Load - add_new_service.js
 */
$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //onload service
    $.get( "/service/onload-job", function(rx) {
      $('.post-x-table').html(rx);
    }); // end post

    //search service
    $('#btn-search-service').on('click',function(e){
      var keyword = $('#search_job').val();
      var categories = $('button[data-id=search_category]').attr('title');
      var location = $('button[data-id=search_location]').attr('title');
      var p = $('button[data-id=search_price]').attr('title');

      if(p != "Nothing selected")
      {
        var price = $('#search_price option[data-text="' + $('button[data-id=search_price]').attr('title') + '"]').attr('value');
      }
      else
      {
        var price = "";
      }

      $.post( "/service/find-job", {
        "keyword": keyword,
        "price": price,
        "categories": categories,
        "location": location,
      }, function(rx) {
        //console.log(rx)
        $('.post-x-table').children().remove();
        $('.post-x-table').html(rx);
        $('.onload-x-table').addClass('hide');
        $('.post-x-table').removeClass('hide');

      }); // end post

    });
});
