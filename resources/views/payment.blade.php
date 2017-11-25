<!-- page content -->
  <?php
    date_default_timezone_set('Asia/Singapore');
    $date = date("d/m/Y");

    $invoice_ID = rand(1000,10000);
  ?>
    <style>
      input[type=number]::-webkit-inner-spin-button,
      input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
      }
    </style>

          <div class="x_title">
            <h2>Invoice Summary<small>Confirmation</small></h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">

            <section class="content invoice">
              <!-- title row -->
              <div class="row">
                <div class="col-xs-12 invoice-header">
                  <h1>
                                  <i class="fa fa-globe"></i> Invoice
                                  <small class="pull-right">Date: {{ $date }}</small>
                              </h1>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  Buyer:
                  <address>
                                  <strong id="buyerName">{{ $buyer->name }}</strong>
                                  @if($buyer->jobprofile != null)
                                    @if($buyer->jobprofile->address_1 != "")
                                      <br>{{ $buyer->jobprofile->address_1 }}
                                        @if($buyer->jobprofile->address_2 != "")
                                          , {{ $buyer->jobprofile->address_2 }}
                                        @endif
                                    @endif
                                    @if($buyer->jobprofile->country != "")
                                      <br>{{ $buyer->jobprofile->country }}
                                      @if($buyer->jobprofile->postal_code != "")
                                        , {{ $buyer->jobprofile->postal_code }}
                                      @endif
                                    @endif
                                    @if($buyer->jobprofile->contact_no != "")
                                      <br>Phone: {{ $buyer->jobprofile->contact_no }}
                                    @endif
                                  @endif
                                  <br>Email: {{ $buyer->email }}
                              </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  Seller:
                  <address>
                                <strong>{{ $seller->name }}</strong>
                                @if($seller->jobprofile != null)
                                  @if($seller->jobprofile->address_1 != "")
                                    <br>{{ $seller->jobprofile->address_1 }}
                                      @if($seller->jobprofile->address_2 != "")
                                        , {{ $seller->jobprofile->address_2 }}
                                      @endif
                                  @endif
                                  @if($seller->jobprofile->country != "")
                                    <br>{{ $seller->jobprofile->country }}
                                    @if($seller->jobprofile->postal_code != "")
                                      , {{ $seller->jobprofile->postal_code }}
                                    @endif
                                  @endif
                                  @if($seller->jobprofile->contact_no != "")
                                    <br>Phone: {{ $seller->jobprofile->contact_no }}
                                  @endif
                                @endif
                                <br>Email: {{ $seller->email }}
                              </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>Invoice #00{{ $invoice_ID }}</b>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-xs-12 table">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Item</th>
                        <th>Service Title</th>
                        <th>Service Id#</th>
                        <th style="width: 59%">Description</th>
                        <th>Price</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $price = number_format((float)$job->price, 2, '.', '');
                        $total = number_format((float)$job->price + 2, 2, '.', '');
                      ?>
                      <tr>
                        <td>1</td>
                        <td>{{ $job->title }}</td>
                        <td><span id="job_id">{{ $job->job_id }}</span></td>
                        <td>{{ $job->desc }}</td>
                        <td>${{ $price }}</td>
                      </tr>
                      <tr>
                        <td>2</td>
                        <td>Processing Fees</td>
                        <td>0000-0000</td>
                        <td>Admin charges, processig misc fees applied</td>
                        <td>$2.00</td>
                      </tr>
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td style="text-align: right;"><b>Sub Total:</b></td>
                        <td><b>${{ $total }}</b></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-xs-6">
                  <p class="lead">Payment Options:</p>
                  <img src="img/payment/visa.png" alt="Visa">
                  <img src="img/payment/mastercard.png" alt="Mastercard">
                  <img src="img/payment/american-express.png" alt="American Express">
                  <img src="img/payment/paypal.png" alt="Paypal">
                  <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                    Take note: This will be used for internal project (fsa). Therefore, there would no real transaction require.<br/>For
                    credit card simulator purpose, please use Card number: <b>8888-8888-8888-8888</b> Cardholder's name: <b>[Your Account Name]</b> Expiry date: <b>01/2022</b>
                    Security code: <b>888</b>
                  </p>
                </div>
                <!-- /.col -->
                <div class="col-xs-6">
                  <br/><br/>
                  <div class="container-fluid">
                    <div class="row">
                      <div class="col-xs-12">
                        <label>Cardholder's name:</label>
                        <input id="cardName" type="text" class="form-control"/>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-xs-12" style="margin-top: 10px;">
                        <label>Card number:</label>
                        <input id="cardNumber" type="text" class="form-control"/>
                      </div>
                    </div>

                    <div class="row" style="margin-top: 10px;">
                      <div class="col-xs-4">
                        <label>Expiry date:</label><br/>
                        <select id="expiryMonth" class="selectpicker" data-size="5" data-width='80px'>
                            <option value="01" selected>01</option>
                            <option value="02">02</option>
                            <option value="03">03</option>
                            <option value="04">04</option>
                            <option value="05">05</option>
                            <option value="06">06</option>
                            <option value="07">07</option>
                            <option value="08">08</option>
                            <option value="09">09</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select>
                        <select id="expiryYear" class="selectpicker" data-size="5" data-width='80px'>
                            <option value="2017" selected>2017</option>
                            <option value="2018">2018</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>
                        </select>
                      </div>
                      <div class="col-xs-2">
                        <label>Security Code:</label>
                        <input id="securityCode" type="number" class="form-control"/>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <br/>
                <div class="col-xs-12">
                  <button id="btn-payment" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i>
                      <i class="fa fa-spinner fa-spin hide"></i> Submit Payment</button>
                  <button class="btn btn-default pull-right" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
                  <!--
                  <button class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Generate PDF</button>
                  -->
                </div>
              </div>


            </section>
          </div>
          <script src="{{ asset('js/payment.js') }}"></script>
