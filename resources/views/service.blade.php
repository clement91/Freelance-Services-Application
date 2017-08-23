@extends('layouts.app')

@section('content')
<!-- page content -->
    <style>
      .panel_toolbox {
        min-width: 0px;
      }
      .custom-hr {
        margin-top: 0px;
        margin-bottom: 0px;
      }
    </style>
    <h3>View & Edit Service</h3>

    <div class="row header-row">
      @if($openJobs)
        <div id="newBlock" class="col-md-4 col-sm-4 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>New</h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                </ul>
                <div class="clearfix"></div>
              </div>

              <div class="x_content">
                  <?php $tmp_yr = ''; ?>
                  @foreach($openJobs as $job)
                    @if( $job['year'] != $tmp_yr )
                      @if($tmp_yr != '')
                        <br/>
                      @endif
                      <label>{{ $job['year'] }}</label>
                      <hr class="custom-hr"/>
                    @endif
                    <article class="media event">
                      <a class="pull-left date">
                        <p class="month">{{ $job['month'] }}</p>
                        <p class="day">{{ $job['date'] }}</p>
                      </a>
                      <div class="media-body">
                        <a class="title custom-title" value="{{ $job['job_id'] }}" href="#">{{ $job['job_id'] }} - {{ $job['title'] }}</a>
                        <p>{{ $job['desc'] }}</p>
                      </div>
                    </article>
                    <?php $tmp_yr = $job['year']; ?>
                  @endforeach
              </div>

            </div>
          </div>

          <div id="progessBlock" class="col-md-4 col-sm-4 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>In Progress</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                  </ul>
                  <div class="clearfix"></div>
                </div>

                <div class="x_content">
                    <?php $tmp_yr = ''; ?>
                    @foreach($openJobs as $job)
                      @if( $job['year'] != $tmp_yr )
                        @if($tmp_yr != '')
                          <br/>
                        @endif
                        <label>{{ $job['year'] }}</label>
                        <hr class="custom-hr"/>
                      @endif
                      <article class="media event">
                        <a class="pull-left date">
                          <p class="month">{{ $job['month'] }}</p>
                          <p class="day">{{ $job['date'] }}</p>
                        </a>
                        <div class="media-body">
                          <a class="title" href="#">{{ $job['job_id'] }} - {{ $job['title'] }}</a>
                          <p>{{ $job['desc'] }}</p>
                        </div>
                      </article>
                      <?php $tmp_yr = $job['year']; ?>
                    @endforeach
                </div>

              </div>
            </div>

            <div id="closeBlock" class="col-md-4 col-sm-4 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Closed/ History</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                      <?php $tmp_yr = ''; ?>
                      @foreach($openJobs as $job)
                        @if( $job['year'] != $tmp_yr )
                          @if($tmp_yr != '')
                            <br/>
                          @endif
                          <label>{{ $job['year'] }}</label>
                          <hr class="custom-hr"/>
                        @endif
                        <article class="media event">
                          <a class="pull-left date">
                            <p class="month">{{ $job['month'] }}</p>
                            <p class="day">{{ $job['date'] }}</p>
                          </a>
                          <div class="media-body">
                            <a class="title" href="#">{{ $job['job_id'] }} - {{ $job['title'] }}</a>
                            <p>{{ $job['desc'] }}</p>
                          </div>
                        </article>
                        <?php $tmp_yr = $job['year']; ?>
                      @endforeach
                  </div>

                </div>
              </div>
        @else
          <!-- Default template -->
          <div id="newBlock" class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_content">
                  <h2>No posted jobs/ service found, please add new service <b><a href="/add-new-service">here</a></b> </h2>
                </div>
              </div>
          </div>

        @endif
    </div>


<!-- /page content -->
@endsection
