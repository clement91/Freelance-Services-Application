@extends('layouts.app')

@section('content')
<!-- page content -->
    <h3>Profile</h3>
    <style>
      input[type=number]::-webkit-inner-spin-button,
      input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
      }
      .has-error {
        border-color: #CD5C5C;
      }
    </style>
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-info">
          <div class="panel-heading"><b>Personal Details</b></div>
            <div class="panel-body psb">
                <div class="row">
                  <div class="col-md-3">
                    <div class="panel panel-info">

                      <div class="panel-body">
                        <input type="file" id="img-upload" name="img-upload" class="hide" data-user="{{ $id }}" />

                        <div class="form-group">
                          <img id="img-src" src="{{ Auth::user()->image_url }}" alt="" style="height:210px;width:210px;" class="img-circle img-responsive center-block"/>
                        </div>

                        <hr/>

                        <div class="form-group">
                          <input type="button" class="btn btn-primary btn-md pull-right" id="btn-upload" data-value="0" value="Upload">
                        </div>

                      </div>
                    </div>
                  </div>

                    <div class="col-md-9">

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            Name:
                            <input type="text" class="form-control" id="text-name" value="{{ $name }}" disabled>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                            Email:
                            <input type="text" class="form-control" id="text-email" value="{{ $email }}" required="">
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            Contact Number:
                            <input type="number" class="form-control" id="text-contact" value="{{ $contact_no }}">
                          </div>
                        </div>
                      </div>

                      <hr/>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            Address 1:
                            <input type="text" class="form-control" id="text-address1" value="{{ $address_1 }}">
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                            Address 2:
                            <input type="text" class="form-control" id="text-address2" value="{{ $address_2 }}">
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            City:
                            <input type="text" class="form-control" id="text-city" value="{{ $city }}">
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                            Postal Code:
                            <input type="number" class="form-control" id="text-postal_code" value="{{ $postal_code }}">
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            Country:
                            <!-- <input type="text" class="form-control" id="text-country" value="{{ $country }}"> -->
                            <!--
                            <div class="bfh-selectbox bfh-countries" id="text-country" data-country="{{ $country }}" data-flags="true">
                              <input type="hidden" value="">
                              <a class="bfh-selectbox-toggle" role="button" data-toggle="bfh-selectbox" href="#">
                                <span class="bfh-selectbox-option input-medium" data-option=""></span>
                                <b class="caret"></b>
                              </a>
                              <div class="bfh-selectbox-options">
                                <input type="text" class="bfh-selectbox-filter">
                                <div role="listbox">
                                <ul role="option">
                                </ul>
                                </div>
                              </div>
                            </div>
                            -->
                            <input type="text" id="text-country" class="form-control"/>
                            <input type="hidden" id="country_code" value="{{ $country }}"/>
                          </div>
                        </div>
                      </div>

                      <hr/>

                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            Describe Yourself: <br/>
                            <textarea type="text" id="text-desc"
                              class="form-control borderless-text" style="resize:none;height:180px;">{{ $desc }}</textarea>

                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="form-group">
                          <input type="button" class="btn btn-primary btn-md pull-right" style="position:relative;right:20px;" id="btn-update" value="Update Profile">
                        </div>
                      </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="panel panel-info">
          <div class="panel-heading"><b>Change Password</b></div>
          <div class="panel-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  New Password:
                  <input type="password" class="form-control" id="text-password" value="">
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  Confirm Password:
                  <input type="password" class="form-control" id="text-confirm-password" value="">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="form-group">
                <input type="button" class="btn btn-primary btn-md pull-right" style="position:relative;right:20px;"
                  id="btn-update-pass" value="Update Password">
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>

</div>

<!-- /page content -->
@endsection
