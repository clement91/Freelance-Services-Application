@extends('layouts.app')

@section('content')
<!-- page content -->
    <style>
      .centered {
        margin: auto;
        width: 60% !important;
        padding: 10px !important;
        display: flow-root !important;
      }
    </style>
    <h3>Post a Service</h3>
    <div class="x_panel centered">
      <div class="x_content x_content_ps_1">
          <br/>
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <label>Raise a service that you need. There are bunch of awesome folks out there will reach you!</label>
                <textarea id="txt-post_service" name="txt-post_service" required="required" class="form-control col-md-7 col-xs-12"
                  style="resize: none;height: 300px;"></textarea>
            </div>
          </div>
          <br/>
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <input type="button" class="btn btn-primary btn-md pull-right" id="btn-suggest-service" value="Suggest">
            </div>
          </div>
          <br/>
      </div>

      <div class="x_content x_content_ps_2 hide">
          <div class="row">
            <br/>
            <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                <h1>Thanks for your suggestion <span class="glyphicon glyphicon-thumbs-up"></span></h1>
                <br/>
                <h2 style="line-height: 1.5;">
                  Your service has been received, we will keep in touch with you near soon!
                  <br/>
                  At the meantime, click <b><a href="/find-service">here</a></b> to look for other services.
                </h2>
            </div>
          </div>
          <br/>
      </div>

    </div>

<!-- /page content -->
@endsection
