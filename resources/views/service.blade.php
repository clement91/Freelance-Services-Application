@extends('layouts.app')

@section('content')
<!-- page content -->

    <h3>View & Edit Service</h3>

    <div id="newBlock" class="col-md-4 col-sm-4 col-xs-12" >
            <div class="x_panel">
                <div class="x_title">
                    <h2>New</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  @foreach($openJobs as $job)
                    <div>$job->job_id</div>
                  @endforeach
                </div>
            </div>
        </div>

        <div id="progessBlock" class="col-md-4 col-sm-4 col-xs-12" >
            <div class="x_panel">
                <div class="x_title">
                    <h2>In Progress</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                </div>
            </div>
        </div>

        <div id="closeBlock" class="col-md-4 col-sm-4 col-xs-12" >
            <div class="x_panel">
                <div class="x_title">
                    <h2>Closed/ History</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                </div>
            </div>
        </div>

<!-- /page content -->
@endsection
