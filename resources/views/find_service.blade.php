@extends('layouts.app')

@section('content')
<!-- page content -->
    <style>
      #btn-search-service {
        width: 50% !important;
      }
      .cls-search {
        margin-top: 22px;
        margin-left: 15px;
      }
    </style>
    <h3>Find Service</h3>
    <div class="x_panel">
      <div class="x_content">
          <div class="row">
            <div class="col-md-4">
                  <label>Search:</label>
                  <input type="text" id="search_job" name="search_job" placeholder="Search by Term, Keywords" class="form-control col-md-7 col-xs-12">
            </div>

            <div class="col-md-2">
                <label>Categories:</label>
                <select id="search_category" name="search_category" class="selectpicker">
                  <?php $tmp = ''; ?>
                  @foreach($jobCategory as $jc)
                    @if($tmp != $jc->parent_category)
                      <optgroup label="{{ $jc->parent_category }}">
                    @endif
                    <option value="{{ $jc->id }}">{{ $jc->child_category }}</option>
                    <?php $tmp = $jc->parent_category; ?>
                  @endforeach
                </select>
            </div>

            <div class="col-md-2">
                <label>Location:</label>
                <select id="search_location" name="search_location" class="selectpicker">
                  @foreach($location as $loc)
                    <option value="{{ $loc->id }}">{{ $loc->location }}</option>
                  @endforeach
                </select>
            </div>

            <div class="col-md-2">
                <label>Price:</label>
                <input type="text" id="search_price" name="search_price" placeholder="MYR" class="form-control col-md-7 col-xs-12">
            </div>

              <div class="col-md-2">
                  <div class="cls-search">
                    <input type="button" class="btn btn-primary btn-md" id="btn-search-service" value="Search">
                    <input type="button" class="btn btn-warning btn-md" id="btn-search-clear" href="/service" value="Clear">
                  </div>
              </div>
          </div>
      </div>
    </div>
<!-- /page content -->
@endsection
