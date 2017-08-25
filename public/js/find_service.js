/**
 * On Document Load - add_new_service.js
 */
$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //search service
    $('#btn-search-service').on('click',function(e){
      var keyword = $('#search_job').val();
      var price = $('#search_job').val();
      var categories = $('button[data-id=search_category]').attr('title');
      var location = $('button[data-id=search_location]').attr('title');

      $.post( "/service/find-job", {
        "keyword": keyword,
        "price": price,
        "categories": categories,
        "location": location,
      }, function(rx) {
        console.log(rx)
        if(rx != 0)
        {
          //$('.onload-x-table').addClass('hide')
          //$('.post-x-table').html(rx);
          //$('.post-x-table').removeClass('hide')
        }
        else
        {
          //$('.onload-x-table').removeClass('hide')
          //$('.post-x-table').addClass('hide')
        }

      }); // end post
    });
});
