/**
 * On Document Load - profile.js
 */
$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //uclick on the menu
    $('.dropdown').on('click',function(e){
      $(this).addClass('open');
    });

    //upload img handling - Start
    $('#btn-upload').on('click',function(e){
      $('#btn-upload').attr('data-value', '1');
      $('#img-upload').trigger('click');
    });

    $("#img-upload").off().on('change',prepareUpload);

    function prepareUpload(event){
      files = event.target.files;

      if($("#img-upload").attr('value') != 0){
        if (files[0]!=undefined) {
           uploadFiles(event, files);
        }
      }
    }

    function uploadFiles(event, files){
      event.stopPropagation();
      event.preventDefault();

       var data = new FormData();
       $.each(files, function(key, value){
         data.append(key, value);
       });
       console.log(data)
      $.ajax({
          url: '/profile/validate-img',
          type: 'POST',
          data: data,
          cache: false,
          //dataType: 'json',
          processData: false, // Don't process the files
          contentType: false, // Set content type to false as jQuery will tell the server its a query string request
          success: function(data, textStatus, jqXHR)
          {
            err_list = ["File type not allowed", "File size must be under 2mb", "Duplicated image name, please try again"];
            if($.inArray(data, err_list) == -1){
              $('#img-src').attr('src', data);

              /*
              $.post("/profile/validate-img", { 'id': id, 'data': data } , function (rx) {
                if(rx == 1){
                  BootstrapDialog.show({
                    title: 'Profile',
                    message: 'Profile picture uploaded.'
                  });
                }
              });
              */
            }else{

              BootstrapDialog.show({
                title: 'Object Management',
                message: data
              });
            }

          },
          error: function(jqXHR, textStatus, errorThrown)
          {
              // Handle errors here
              //console.log('ERRORS: ' + textStatus);
              BootstrapDialog.show({
                title: 'Profile',
                message: textStatus
              });
          }
      });
    }
    //upload img handling - End

    //update info
    $('#btn-update').on('click',function(e){
      var id = $("#img-upload").data('user');

      $.post( "/profile/update", {
        "id": id,
        "email": $('#text-email').val(),
        "contact": $('#text-contact').val(),
        "address1": $('#text-address1').val(),
        "address2": $('#text-address2').val(),
        "city": $('#text-city').val(),
        "postal_code": $('#text-postal_code').val(),
        "country": $('#text-country').children().attr('value'),
        "desc": $('#text-desc').val(),
        "img": $('#img-src').attr('src'),
        "upload_value" : $('#btn-upload').attr('data-value')

      }, function(rx) {
        if(rx != 0){
          //update nav image
          $('.nav-img').attr('src', rx);
        }
        $('#btn-upload').attr('data-value' , '0');

        BootstrapDialog.show({
            title: ' Profile',
            message: 'Profile update successful.'
        });

      })
    });

    //update password
    $('#btn-update-pass').on('click',function(e){
      var id = $("#img-upload").data('user');

      $.post( "/profile/update-password", {
        "id": id,
        "password": $('#text-password').val(),
      }, function(rx) {
        if(rx){
          BootstrapDialog.show({
              title: ' Profile',
              message: 'Password update successful.'
          });
        }

      })
    });

});
