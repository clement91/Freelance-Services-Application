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
      .x-table {
        height: 800px;
        width: 90%;
        display: flow-root !important;
        margin: auto;
      }
    </style>
    <h3>Find Service</h3>
    <div class="x_panel find_service_x">
      <div class="x_content">
          <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12">
                  <label>Search:</label>
                  <!--
                  <input type="text" id="search_job" name="search_job" placeholder="Search by Term, Keywords" class="form-control col-md-7 col-xs-12">
                  -->
                  <input class="form-control col-md-7 col-xs-12" id="search_job" name="search_job" placeholder="Search by Term, Keywords" />
            </div>

            <div class="col-md-2 col-sm-2 col-xs-12">
                <label>Categories:</label><br/>
                <select id="search_category" name="search_category" class="selectpicker" data-width="200px" multiple>
                  <?php $tmp = ''; ?>
                  <option value=""></option>
                  @foreach($jobCategory as $jc)
                    @if($tmp != $jc->parent_category)
                      <optgroup label="{{ $jc->parent_category }}">
                    @endif
                    <option value="{{ $jc->id }}">{{ $jc->child_category }}</option>
                    <?php $tmp = $jc->parent_category; ?>
                  @endforeach
                </select>
            </div>

            <div class="col-md-2 col-sm-2 col-xs-12">
                <label>Location:</label><br/>
                <select id="search_location" name="search_location" class="selectpicker" data-width="200px" multiple>
                  @foreach($location as $loc)
                    <option value="{{ $loc->id }}" selected>{{ $loc->location }}</option>
                  @endforeach
                </select>
            </div>

            <div class="col-md-2 col-sm-2 col-xs-12">
                <label>Price:</label><br/>
                <!--
                <input type="text" id="search_price" name="search_price" placeholder="MYR" class="form-control col-md-7 col-xs-12">
              -->
              <select id="search_price" name="search_price" class="selectpicker" data-width="200px">
                <option value=""></option>
                <option value="0-500" data-text="0 - 500">0 - 500</option>
                <option value="500-1000" data-text="500 - 1000">500 - 1000</option>
                <option value="1000-3000" data-text="1000 - 3000">1000 - 3000</option>
                <option value="3000-99999" data-text="3000 & Above">3000 & Above</option>
              </select>
            </div>

              <div class="col-md-2 col-sm-2 col-xs-12">
                  <div class="cls-search">
                    <input type="button" class="btn btn-primary btn-md" id="btn-search-service" value="Search">
                    <input type="button" class="btn btn-warning btn-md" id="btn-search-clear" href="/service" value="Clear">
                  </div>
              </div>
          </div>
      </div>
    </div>

    <div class="x_panel x-table text-center">
        <div class="onload-x-table">
          <br/><br/><br/>
          <h1>Can't find what you're looking for?</h1>
          <h2>Click <b><a href="/post-service">here</a></b> to request for a service that you need.</h2>
        </div>

        <br/>

        <div class="hide post-x-table">

        </div>

        <div class="hide post-xc-table">

        </div>

    </div>
<!-- /page content -->
@endsection
