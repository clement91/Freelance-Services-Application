@extends('layouts.app')

@section('content')
    <!-- page content -->
    <style>
      input[type=number]::-webkit-inner-spin-button,
      input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
      }

      .selectize-control.multi .selectize-input > div {
            background: #1b9dec;
            border-radius: 3px;
            text-shadow: 0 1px 0 rgba(0, 51, 83, 0.3);
            box-shadow: 0 1px 0 rgba(0, 0, 0, 0.2), inset 0 1px rgba(255, 255, 255, 0.03);
            color: #fff;
      }
      .dropzone {
        min-height: 250px;
        border: 1px solid #e5e5e5;
      }
    </style>

    <h3>Add New Service</h3>

    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Create Your Freelance Service & Business<small> </small></h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">


          <!-- Smart Wizard -->
          <p>Just 3 simple <b>steps</b> to start your own freelance service!</p>
          <div id="wizard" class="form_wizard wizard_horizontal">
            <ul class="wizard_steps">
              <li>
                <a href="#step-1">
                  <span class="step_no">1</span>
                  <span class="step_descr">
                                    Step 1<br />
                                    <small>Setup your service</small>
                                </span>
                </a>
              </li>
              <li>
                <a href="#step-2">
                  <span class="step_no">2</span>
                  <span class="step_descr">
                                    Step 2<br />
                                    <small>Configure your service</small>
                                </span>
                </a>
              </li>
              <li>
                <a href="#step-3">
                  <span class="step_no">3</span>
                  <span class="step_descr">
                                    Step 3<br />
                                    <small>Confirm your service</small>
                                </span>
                </a>
              </li>
            </ul>
            <div id="step-1" class="thrsteps nohide">
              <div class="form-horizontal form-label-left">

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="job_title">Job Title <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="job_title" name="job_title" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="job_desc">Job Description <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <!--
                    <input type="text" id="job_desc" name="job_desc" required="required" class="form-control col-md-7 col-xs-12">
                    -->
                    <textarea id="job_desc" name="job_desc" required="required" class="form-control col-md-7 col-xs-12" style="resize: none;"></textarea>
                  </div>
                </div>

                <hr/>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="job_category">Category<span class="required">*</span>
                  </label>
                  <div class="col-md-2 col-sm-2 col-xs-12">
                    <select id="job_category" name="job_category" class="selectpicker">
                      <?php $tmp = ''; ?>
                      @foreach($jobCategory as $jc)
                        @if($tmp !=  $jc['parent'])
                          <optgroup label="{{ $jc['parent'] }}">
                        @endif
                        <option value="{{ $jc['id'] }}">{{ $jc['child'] }}</option>
                        <?php $tmp = $jc['parent']; ?>
                      @endforeach
                    </select>
                  </div>

                  <label class="control-label col-md-2 col-sm-2 col-xs-12" for="job_price">Price<span class="required">*</span>
                  </label>
                  <div class="col-md-2 col-sm-2 col-xs-12">
                    <input type="number" id="job_price" name="job_price" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="job_instruction">Instruction to buyer <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <!--
                    <input type="text" id="job_instruction" name="job_instruction" required="required" class="form-control col-md-7 col-xs-12">
                    -->
                    <textarea id="job_instruction" name="job_instruction" required="required" class="form-control col-md-7 col-xs-12" style="resize: none;"></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="job_tags">Tags <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <span id="job_tags"></span>
                    <!--
                      <input type="text" id="" name="job_tags" required="required" class="form-control col-md-7 col-xs-12">
                    -->
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="job_location">Location <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <select id="job_location" name="job_location" class="selectpicker">
                      @foreach($location as $loc)
                        <option value="{{ $loc['id'] }}">{{ $loc['location'] }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="job_days">Estimated Days to Deliver <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="number" id="job_days" name="job_days" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>

                <hr/>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="job_imgs">Images/ Files
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <!--
                      <input type="text" id="job_imgs" name="job_imgs" required="required" class="form-control col-md-7 col-xs-12">
                      <form action="/service/validate-img" id="job_imgs" value="" class="dropzone"></form>
                    -->
                    <form action="/service/validate-img" id="job_imgs" value="" class="dropzone"></form>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="job_links">Website/ Social Media Link:</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="job_links" name="job_links" required="required" placeholder="Facebook, Twitter, Instagram.." class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                
              </div>

            </div>

            <div id="step-2" class="thrsteps hide">
              <br/>
              <div class="container">
                <div class="row">
                    <div class="form-group">
                      <label class="control-label col-md-4 col-sm-4 col-xs-12" for="max_jobs" style="text-align:right">
                        Maximum service able to<br/> process at same time
                      </label>
                      <div class="col-md-3">
                        <input type="number" id="max_jobs" name="max_jobs" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                </div>
                <br/>
                <div class="row">
                    <div class="form-group">
                      <label class="control-label col-md-4 col-sm-4 col-xs-12" style="text-align:right">
                        Received email when get<br/> respond from buyer?</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="checkbox" id="chk-email" value="Y" class="chk-chk" checked>
                      </div>
                    </div>
                </div>
                <br/>
                <div class="row">
                    <div class="form-group">
                      <label class="control-label col-md-4 col-sm-4 col-xs-12" style="text-align:right">
                        Received sms when get<br/> respond from buyer?</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="checkbox" id="chk-sms" value="Y" class="chk-chk" checked>
                      </div>
                    </div>
                </div>

              </div>

            </div>

            <div id="step-3" class="thrsteps hide">
              <h2 class="StepTitle">Please confirm your service details</h2>
                  <div class="form-horizontal form-label-left">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="job_title">Job Title</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <span id="job_title" class="col-md-7 col-xs-12"></span>
                        </div>
                      </div>
                  </div>
            </div>

          </div>
          <!-- End SmartWizard Content -->

        </div>
      </div>
    </div>


<!-- /page content -->
@endsection
