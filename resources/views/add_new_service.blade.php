@extends('layouts.app')

@section('content')
    <!-- page content -->

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
              <form class="form-horizontal form-label-left">

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
                    <input type="text" id="job_desc" name="job_desc" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>

                <hr/>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="job_category">Category<span class="required">*</span>
                  </label>
                  <div class="col-md-2 col-sm-2 col-xs-12">
                    <input type="text" id="job_category" name="job_category" required="required" class="form-control col-md-7 col-xs-12">
                  </div>

                  <label class="control-label col-md-2 col-sm-2 col-xs-12" for="job_price">Price<span class="required">*</span>
                  </label>
                  <div class="col-md-2 col-sm-2 col-xs-12">
                    <input type="text" id="job_price" name="job_price" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="job_instruction">Instruction to buyer <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="job_instruction" name="job_instruction" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="job_tags">Tags <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="job_tags" name="job_tags" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="job_location">Location <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="job_location" name="job_location" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="job_days">Estimated Days to Deliver <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="job_days" name="job_days" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>

                <hr/>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="job_imgs">Images
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="job_imgs" name="job_imgs" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="job_links">URL Link</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="job_links" name="job_links" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>

                <!--
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Gender</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <div id="gender" class="btn-group" data-toggle="buttons">
                      <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                        <input type="radio" name="gender" value="male"> &nbsp; Male &nbsp;
                      </label>
                      <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                        <input type="radio" name="gender" value="female"> Female
                      </label>
                    </div>
                  </div>
                </div>
                -->

              </form>

            </div>

            <div id="step-2" class="thrsteps hide">
              <br/>
              <div class="container">
                <div class="row">
                    <div class="form-group">
                      <label class="control-label col-md-4 col-sm-4 col-xs-12" for="job_imgs" style="text-align:right">
                        Maximum service able to<br/> work at same time
                      </label>
                      <div class="col-md-3">
                        <input type="text" id="job_imgs" name="job_imgs" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                </div>
                <br/>
                <div class="row">
                    <div class="form-group">
                      <label class="control-label col-md-4 col-sm-4 col-xs-12" style="text-align:right">
                        Received email when get<br/> respond from buyer?</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <div id="gender" class="btn-group" data-toggle="buttons">
                          <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                            <input type="radio" name="gender" value="yes"> &nbsp; Yes &nbsp;
                          </label>
                          <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                            <input type="radio" name="gender" value="no"> No
                          </label>
                        </div>
                      </div>
                    </div>
                </div>
                <br/>
                <div class="row">
                    <div class="form-group">
                      <label class="control-label col-md-4 col-sm-4 col-xs-12" style="text-align:right">
                        Received sms when get<br/> respond from buyer?</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <div id="gender" class="btn-group" data-toggle="buttons">
                          <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                            <input type="radio" name="gender" value="yes"> &nbsp; Yes &nbsp;
                          </label>
                          <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                            <input type="radio" name="gender" value="no"> No
                          </label>
                        </div>
                      </div>
                    </div>
                </div>

              </div>

            </div>

            <div id="step-3" class="thrsteps hide">
              <h2 class="StepTitle">Please confirm your service details</h2>
              <p>
              </p>
            </div>

          </div>
          <!-- End SmartWizard Content -->

        </div>
      </div>
    </div>

<!-- /page content -->
@endsection
