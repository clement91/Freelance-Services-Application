/**
 * On Document Load - add_new_service.js
 */
$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //for posting pls refer to jquery.smartWizard.js, line 93

    //selectize
    $('#job_tags').selectize({
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

    $('input.chk-chk').bootstrapSwitch('state', true, false);
    $('input.chk-chk').on('switchChange.bootstrapSwitch', function(event, state) {
      if (state == true) { $(this).attr('value', 'Y') } else { $(this).attr('value', 'N') };
      //console.log(this); // DOM element
      //console.log(event); // jQuery event
      //console.log(state); // true | false
    });

    //$("#job_imgs").dropzone({ url: "/service/validate-img" });
    //var myDropzone = new Dropzone("#job_imgs", { url: "/service/validate-img" });
    var photo_counter = 0;
    Dropzone.options.realDropzone = {

        uploadMultiple: false,
        parallelUploads: 100,
        maxFilesize: 8,
        previewsContainer: '#dropzonePreview',
        //previewTemplate: document.querySelector('#preview-template').innerHTML,
        addRemoveLinks: true,
        dictRemoveFile: 'Remove',
        dictFileTooBig: 'Image is bigger than 8MB',

        // The setting up of the dropzone
        init:function() {

            this.on("removedfile", function(file) {
                console.log(file.name + ' - ' + $('#csrf-token').val())
                /*
                $.ajax({
                    type: 'POST',
                    url: 'upload/delete',
                    data: {id: file.name, _token: $('#csrf-token').val()},
                    dataType: 'html',
                    success: function(data){
                        var rep = JSON.parse(data);
                        if(rep.code == 200)
                        {
                            photo_counter--;
                            $("#photoCounter").text( "(" + photo_counter + ")");
                        }

                    }
                });
                */
            } );
        },
        error: function(file, response) {
            if($.type(response) === "string")
                var message = response; //dropzone sends it's own error messages in string
            else
                var message = response.message;
            file.previewElement.classList.add("dz-error");
            _ref = file.previewElement.querySelectorAll("[data-dz-errormessage]");
            _results = [];
            for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                node = _ref[_i];
                _results.push(node.textContent = message);
            }
            return _results;
        },
        success: function(file,done) {
            photo_counter++;
            $("#photoCounter").text( "(" + photo_counter + ")");
        }
    }

});
