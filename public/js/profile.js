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

    $("#text-country").countrySelect();
    if($("#country_code").attr('value') != "")
      $("#text-country").countrySelect("setCountry", $("#country_code").attr('value'));

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
      $('.has-error').removeClass('has-error');

      var id = $("#img-upload").data('user');
      var result = 0;

      $('.psb').find('.form-control').each(function(index) {
        if(index < ($('.psb').find('.form-control').length-1))
          if($(this).val() == '')
          {
            $(this).addClass('has-error');
            new PNotify({
                title: 'Error',
                text: 'Password make sure all fields are filled up\nwith valid information.',
                type: 'error',
                styling: 'bootstrap3'
            });

            result = 1;
          }
      });

      if(result == 0)
      {
        $.post( "/profile/update", {
          "id": id,
          "email": $('#text-email').val(),
          "contact": $('#text-contact').val(),
          "address1": $('#text-address1').val(),
          "address2": $('#text-address2').val(),
          "city": $('#text-city').val(),
          "postal_code": $('#text-postal_code').val(),
          "country": $('#text-country').val(),
          "desc": $('#text-desc').val(),
          "img": $('#img-src').attr('src'),
          "upload_value" : $('#btn-upload').attr('data-value')

        }, function(rx) {
          if(rx != 0){
            //update nav image
            $('.nav-img').attr('src', rx);
          }
          $('#btn-upload').attr('data-value' , '0');
          new PNotify({
              title: 'Success',
              text: 'Profile update successful!',
              type: 'success',
              styling: 'bootstrap3'
          });

        })
      }


    });

    //update password
    $('#btn-update-pass').on('click',function(e){
      $('.has-error').removeClass('has-error');

      var id = $("#img-upload").data('user');

      if($('#text-password').val() != '')
      {
        if($('#text-password').val() == $('#text-confirm-password').val())
        {
          $.post( "/profile/update-password", {
            "id": id,
            "password": $('#text-password').val(),
          }, function(rx) {
            if(rx){
              new PNotify({
                  title: 'Success',
                  text: 'Password update successful!',
                  type: 'success',
                  styling: 'bootstrap3'
              });
            }
          })
        }
        else
        {
          $('#text-password').addClass('has-error');
          $('#text-confirm-password').addClass('has-error');

          new PNotify({
              title: 'Error',
              text: 'Both passwords are different.\nPlease re-enter your confirmation password',
              type: 'error',
              styling: 'bootstrap3'
          });
        }
      }
      else
      {
        $('#text-password').addClass('has-error');
        new PNotify({
            title: 'Error',
            text: 'Password is empty.\nPlease enter your new password',
            type: 'error',
            styling: 'bootstrap3'
        });
      }

    });

});
