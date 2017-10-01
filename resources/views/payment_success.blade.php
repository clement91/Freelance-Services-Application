<!-- page content -->
    <style>
      .well {
          background-color: white !important;
      }
      .tick_img {
            height: 200px;
      }
      .pp {
            font-size: 20px;
      }
    </style>

      <div class="x_title">
        <h2>Message<small>Success</small></h2>
        <div class="clearfix"></div>
      </div>

      <div class="container text-center">
          <div class="row">
            <br/>
              <img class="tick_img" src="img/payment/green_tick.png">
              <br/><br/>
              <h1>Thank you!</h1>
              <br/>
              <p class="pp">Your transaction has been submitted successfully.<br/>
                Please be patient while waiting for the Seller to respond, meanwhile feel free to explore other services!</p>
          </div>
          <br/>
          <div class="row">
              <button id="btn-backToHome" href="/dashboard" class="btn btn-primary"><i class="fa fa-home"></i> Back to Home</button>
          </div>
      </div>

      <script>
        $('#btn-backToHome').on('click', function (e){
          var href = $(this).attr('href');
          location.href = href;
        });
      </script>
