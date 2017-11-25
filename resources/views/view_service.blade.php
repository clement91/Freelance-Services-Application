<link href="../gentelella/vendors/dropzone/dist/dropzone.css" rel="stylesheet">
<link href="{{ asset('vendors/bootstrap-select/bootstrap-select-1.12.2.css') }}" rel="stylesheet">
<link href="{{ asset('vendors/selectize.js-master/dist/css/selectize.css') }}" rel="stylesheet">
<link href="{{ asset('vendors/bootstrap-switch-master/dist/css/bootstrap3/bootstrap-switch.css') }}" rel="stylesheet">
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
  .selectize-control .selectize-input.disabled {
      background: #FDFEFE;
      border: none;
      opacity: 1;
      box-shadow: none;
  }
  .selectize-control.multi .selectize-input.disabled > div, .selectize-control.multi .selectize-input.disabled > div.active {
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
  .confirm_cls {
    margin-top: 5px;
    font-size: 16px;
  }
  .well {
    background-color: #FDFEFE !important;
  }
  .stepContainer {
    height: 100% !important;
  }
</style>
<div class="x_panel">
    <div class="x_title">
      &nbsp;<h2>ID: <span id="raw_id" value="{{ $job->id }}">{{ $job->job_id }}</span></h2>
      <div class="clearfix"></div>
    </div>

    <div class="x_content">

    </div>
    <div class="form-horizontal form-label-left">

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="job_title">Job Title <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <input type="text" id="job_title" name="job_title" required="required" value="{{ $job->title }}" class="form-control col-md-7 col-xs-12" disabled>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="job_desc">Job Description <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <!--
          <input type="text" id="job_desc" name="job_desc" required="required" class="form-control col-md-7 col-xs-12">
          -->
          <textarea id="job_desc" name="job_desc" required="required" class="form-control col-md-7 col-xs-12" style="resize: none;">{{ $job->description }}</textarea>
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
              @if($tmp != $jc->parent_category)
                <optgroup label="{{ $jc->parent_category }}">
              @endif

              @if($job->category == $jc->id)
                <option value="{{ $jc->id }}" selected>{{ $jc->child_category }}</option>
              @else
                <option value="{{ $jc->id }}">{{ $jc->child_category }}</option>
              @endif

              <?php $tmp = $jc->parent_category; ?>
            @endforeach
          </select>
        </div>

        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="job_price">Price<span class="required">*</span>
        </label>
        <div class="col-md-2 col-sm-2 col-xs-12">
          <input type="number" id="job_price" name="job_price" required="required" placeholder="MYR" value="{{ $job->price }}" class="form-control col-md-7 col-xs-12">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="job_instruction">Instruction to buyer <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <!--
          <input type="text" id="job_instruction" name="job_instruction" required="required" class="form-control col-md-7 col-xs-12">
          -->
          <textarea id="job_instruction" name="job_instruction" required="required" class="form-control col-md-7 col-xs-12" style="resize: none;">{{ $job->instruction }}</textarea>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="job_tags">Tags <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="xvjob_tags" class="xvjob_tags" value="{{ $job->tags }}"/>
            <input type="hidden" id="vvjob_tags" name="job_tags" required="required" value="{{ $job->tags }}" class="form-control col-md-7 col-xs-12">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="job_location">Location <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <select id="job_location" name="job_location" class="selectpicker">
            @foreach($location as $loc)
              @if($job->location == $loc->id)
                <option value="{{ $loc->id }}" selected>{{ $loc->location }}</option>
              @else
                <option value="{{ $loc->id }}">{{ $loc->location }}</option>
              @endif
            @endforeach
          </select>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="job_days">Estimated Days to Deliver <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <input type="number" id="job_days" name="job_days" required="required" value="{{ $job->days_to_deliver }}" class="form-control col-md-7 col-xs-12">
        </div>
      </div>

      <hr/>
      <!--
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="job_imgs">Images/ Files
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          {!! Form::open(['url' => route('upload-post'), 'class' => 'dropzone', 'files'=>true, 'id'=>'real-dropzone']) !!}

            <div class="dz-message">
              {{ $job->image_path }}
            </div>

            <div class="fallback">
                <input name="file" type="file" class="hide" multiple />
            </div>

            <div class="dropzone-previews" id="dropzonePreview"></div>

            <h4 style="text-align: center;color:#428bca;">Drop images in this area  <span class="glyphicon glyphicon-hand-down"></span></h4>

          {!! Form::close() !!}

           <div id="preview-template" style="display: none;">

               <div class="dz-preview dz-file-preview">
                   <div class="dz-image"><img data-dz-thumbnail=""></div>

                   <div class="dz-details">
                       <div class="dz-size"><span data-dz-size=""></span></div>
                       <div class="dz-filename"><span data-dz-name=""></span></div>
                   </div>
                   <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress=""></span></div>
                   <div class="dz-error-message"><span data-dz-errormessage=""></span></div>

                   <div class="dz-success-mark">
                       <svg width="54px" height="54px" viewBox="0 0 54 54" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
                           <title>Check</title>
                           <desc>Created with Sketch.</desc>
                           <defs></defs>
                           <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
                               <path d="M23.5,31.8431458 L17.5852419,25.9283877 C16.0248253,24.3679711 13.4910294,24.366835 11.9289322,25.9289322 C10.3700136,27.4878508 10.3665912,30.0234455 11.9283877,31.5852419 L20.4147581,40.0716123 C20.5133999,40.1702541 20.6159315,40.2626649 20.7218615,40.3488435 C22.2835669,41.8725651 24.794234,41.8626202 26.3461564,40.3106978 L43.3106978,23.3461564 C44.8771021,21.7797521 44.8758057,19.2483887 43.3137085,17.6862915 C41.7547899,16.1273729 39.2176035,16.1255422 37.6538436,17.6893022 L23.5,31.8431458 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z" id="Oval-2" stroke-opacity="0.198794158" stroke="#747474" fill-opacity="0.816519475" fill="#FFFFFF" sketch:type="MSShapeGroup"></path>
                           </g>
                       </svg>
                   </div>

                   <div class="dz-error-mark">
                       <svg width="54px" height="54px" viewBox="0 0 54 54" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
                           <title>error</title>
                           <desc>Created with Sketch.</desc>
                           <defs></defs>
                           <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
                               <g id="Check-+-Oval-2" sketch:type="MSLayerGroup" stroke="#747474" stroke-opacity="0.198794158" fill="#FFFFFF" fill-opacity="0.816519475">
                                   <path d="M32.6568542,29 L38.3106978,23.3461564 C39.8771021,21.7797521 39.8758057,19.2483887 38.3137085,17.6862915 C36.7547899,16.1273729 34.2176035,16.1255422 32.6538436,17.6893022 L27,23.3431458 L21.3461564,17.6893022 C19.7823965,16.1255422 17.2452101,16.1273729 15.6862915,17.6862915 C14.1241943,19.2483887 14.1228979,21.7797521 15.6893022,23.3461564 L21.3431458,29 L15.6893022,34.6538436 C14.1228979,36.2202479 14.1241943,38.7516113 15.6862915,40.3137085 C17.2452101,41.8726271 19.7823965,41.8744578 21.3461564,40.3106978 L27,34.6568542 L32.6538436,40.3106978 C34.2176035,41.8744578 36.7547899,41.8726271 38.3137085,40.3137085 C39.8758057,38.7516113 39.8771021,36.2202479 38.3106978,34.6538436 L32.6568542,29 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z" id="Oval-2" sketch:type="MSShapeGroup"></path>
                               </g>
                           </g>
                       </svg>
                   </div>

               </div>
           </div>

        </div>
      </div>
    -->
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="job_links">Website/ Social Media Link:</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <input type="text" id="job_links" name="job_links" required="required" placeholder="Facebook, Twitter, Instagram.." value="{{ $job->url_link }}" class="form-control col-md-7 col-xs-12">
        </div>
      </div>

      <hr/>

      <div class="row">
          <div class="form-group">
            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="max_jobs" style="text-align:right">
              Maximum service able to<br/> process at same time
            </label>
            <div class="col-md-3">
              <!-- <input type="number" id="max_jobs" name="max_jobs" required="required" class="form-control col-md-7 col-xs-12"> -->
              <select id="max_jobs" name="max_jobs" class="selectpicker">
                <option value="1">1</option>
                <option value="1 - 5">1 - 5</option>
                <option value="6 - 10">6 - 10</option>
                <option value="10 - 20">10 - 20</option>
                <option value="More than 20 ..">More than 20 ..</option>
              </select>
            </div>
          </div>
      </div>
      <br/>
      <div class="row">
          <div class="form-group">
            <label class="control-label col-md-4 col-sm-4 col-xs-12" style="text-align:right">
              Receive email when get<br/> respond from buyer?</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="checkbox" id="chk-email" value="Y" class="chk-chk" checked>
            </div>
          </div>
      </div>
      <br/>
      <div class="row">
          <div class="form-group">
            <label class="control-label col-md-4 col-sm-4 col-xs-12" style="text-align:right">
              Receive sms when get<br/> respond from buyer?</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="checkbox" id="chk-sms" value="Y" class="chk-chk" checked>
            </div>
          </div>
      </div>

      <div class="form-group">
        <br/>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <input type="button" class="btn btn-danger btn-md pull-right btn-update-cancel"  href="/service" value="Cancel">
          <input type="button" class="btn btn-primary btn-md pull-right btn-update-service" value="Update">
        </div>
        <br/>
      </div>

    </div>
</div>

<script src="{{ asset('vendors/Bootstrap-dialog/bootstrap-dialog.js') }}"></script>
<script src="{{ asset('vendors/bootstrap-select/bootstrap-select-1.12.2.js') }}"></script>
<script src="{{ asset('vendors/selectize.js-master/dist/js/standalone/selectize.js') }}"></script>
<script src="{{ asset('vendors/bootstrap-switch-master/dist/js/bootstrap-switch.js') }}"></script>
<script src="{{ asset('vendors/dropzone/dropzone.js') }}"></script>
<script src="{{ asset('js/view_service.js') }}"></script>
