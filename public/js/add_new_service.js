/**
 * On Document Load - add_new_service.js
 */
$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //for posting pls refer to jquery.smartWizard.js

    //selectize
    $('#job_tags').selectize({
        delimiter: ',',
        persist: false,
        create: function(input) {
            return {
                value: input,
                text: input
            }
        }
    });

    $('input.chk-chk').bootstrapSwitch('state', true, false);
    $('input.chk-chk').on('switchChange.bootstrapSwitch', function(event, state) {
      if (state == true) { $(this).attr('value', 'Y') } else { $(this).attr('value', 'N') };
      //console.log(this); // DOM element
      //console.log(event); // jQuery event
      //console.log(state); // true | false
    });

    //$("#job_imgs").dropzone({ url: "/service/validate-img" });
    //var myDropzone = new Dropzone("#job_imgs", { url: "/service/validate-img" });

});
