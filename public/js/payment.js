/**
 * On Document Load - add_new_service.js
 */
$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.selectpicker').selectpicker('refresh');

    $('#btn-payment').on('click', function(e){
      var cardNumber = $('#cardNumber').val();
      var cardName = $('#cardName').val();
      var expiryMonth = $('#expiryMonth').val();
      var expiryYear = $('#expiryYear').val();
      var securityCode = $('#securityCode').val();
      var job_id = $('#job_id').text();

      PNotify.removeAll();
      $('.err-text').removeClass('err-text');
      console.log(cardNumber + ' - ' + cardName + ' - ' + expiryMonth + ' - ' + expiryYear + ' - ' + securityCode)
      if (cardNumber != '8888-8888-8888-8888')
          $('#cardNumber').addClass('err-text');

      if (cardName.toUpperCase() != 'ADAM MARK')
          $('#cardName').addClass('err-text');

      if (securityCode != '888')
          $('#securityCode').addClass('err-text');

      if (expiryMonth != '01')
          $('#expiryMonth').addClass('err-text');

      if (expiryYear != '2022')
          $('#expiryYear').addClass('err-text');

      if($('.err-text').length == 0 )
      {
        $.post( "/service/request-job", { "job_id": job_id, }, function(rx) {
          console.log(rx)
          $('.x-table').html(rx);

        }); // end post
      }
      else
      {
        var notice = new PNotify({
            title: 'Uh Oh! Sorry, we unable to process your payment',
            text: 'Please confirm your information or contact your provider to confirm the payment isn\'t being blocked',
            type: 'error',
        });
        notice.get().click(function() {
            notice.remove();
        });

      }
    });

});
