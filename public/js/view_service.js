/**
 * On Document Load - view_service.js
 */
$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.selectpicker').selectpicker('refresh');

    //selectize

    $('.xvjob_tags').selectize({
        plugins: ['remove_button'],
        delimiter: ',',
        persist: false,
        create: function(input) {
            return {
                value: input,
                text: input
            }
        }
    });


    var v = $('#vvjob_tags').val().split(',');
    $.each( v, function( i, obj ){
      if(obj != "")
      {
        $(".xvjob_tags")[0].selectize.addOption({value: obj ,text: obj });
        $(".xvjob_tags")[0].selectize.addItem(obj);
      }
    });

    $('input.chk-chk').bootstrapSwitch('state', true, false);
    $('input.chk-chk').on('switchChange.bootstrapSwitch', function(event, state) {
      if (state == true) { $(this).attr('value', 'Y') } else { $(this).attr('value', 'N') };
      //console.log(this); // DOM element
      //console.log(event); // jQuery event
      //console.log(state); // true | false
    });

    //cancel

    $('.btn-update-cancel').on('click',function(e){
      var href = $(this).attr('href');
      location.href = href;
    });

    //update service
    $('.btn-update-service').on('click',function(e){
      //console.log($('#raw_id').attr('value') + ' - ' + $('#job_desc').val() + ' - ' + $('#job_category').val() + ' - ' + $('#job_price').val() + ' - ' + $('#job_instruction').val()
      //  + ' - ' + $('#vjob_tags').val() + ' - ' + $('#job_location').val() + ' - ' + $('#job_days').val() + ' - ' + $('#job_links').val() + ' - ' + $('#max_jobs').val()
      //  + ' - ' + $('#chk-email').val() + ' - ' + $('#chk-sms').val())
      $.post( "/service/submit-job", {
        "id": $('#raw_id').attr('value'),
        "title": $('#job_title').val(),
        "desc": $('#job_desc').val(),
        "category": $('#job_category').val(),
        "price": $('#job_price').val(),
        "instruction": $('#job_instruction').val(),
        "tags": $('.xvjob_tags').val(),
        "location": $('#job_location').val(),
        "days": $('#job_days').val(),
        //"images": $('#job_imgs').val(),
        "images": 'test',
        "links": $('#job_links').val(),
        "max": $('#max_jobs').val(),
        "email": $('#chk-email').attr('value'),
        "sms": $('#chk-sms').attr('value'),
      }, function(rx) {
        if(rx){
          new PNotify({
              title: 'Success',
              text: 'Service updated successful!\nJOB ID:' + rx,
              type: 'success',
              styling: 'bootstrap3'
          });

          setTimeout(function () {
            window.location.href = "http://fsa.dev/service";
          }, 1500);
        }

      });
    });

});
