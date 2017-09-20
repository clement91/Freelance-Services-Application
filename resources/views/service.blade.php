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
      .x_contentx {
        height: 650px;
        overflow-y: auto;
      }
      .service-progress-toolx {
        margin-top: 5px;
        padding-left: 12px;
        padding-right: 12px;
      }
      .custom-title {
        color: #5A738E !important;
      }
      .compose-header {
        background: #f0ad4e !important;
      }
      .compose .compose-body .editor-wrapper {
           min-height: 150px !important;
      }
    </style>
    <h3>View & Edit Service</h3>

    <div class="row header-row service-profile-view hide"></div>

    <div class="row header-row service-main-view">

      <div id="newBlock" class="col-md-3 col-sm-3 col-xs-12">
        @if($openJobs)
              <div class="x_panel">
                <div class="x_title">
                  <h2>New</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                  </ul>
                  <div class="clearfix"></div>
                </div>

                <div class="x_content x_contentx">
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

          @else
            <!-- Default template -->
            <div class="x_panel">
              <div class="x_title">
                <h2>New</h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                </ul>
                <div class="clearfix"></div>
              </div>

              <div class="x_content x_contentx">
                <h2>No posted jobs/ service found, please add new service <b><a href="/add-new-service">here</a></b> </h2>
              </div>
            </div>
          @endif
        </div>


        <div id="pendingBlock" class="col-md-3 col-sm-3 col-xs-12">
          @if($pendingJobs)
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Pending</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content x_contentx x_contentx_pending">
                      @foreach($pendingJobs as $job)
                        <article data-id="{{ $job['id'] }}" data-raw-id="{{ $job['raw_id'] }}" data-job-id="{{ $job['job_id'] }}" class="media event">
                          <a class="pull-left date">
                            <p class="month">{{ $job['month'] }}</p>
                            <p class="day">{{ $job['date'] }}</p>
                          </a>
                          <div class="media-body">
                            <b class="title custom-title" value="{{ $job['job_id'] }}">{{ $job['job_id'] }} - {{ $job['title'] }}</b>
                              <a href="#" data-customer="{{ $job['customer_name'] }} [ {{ $job['job_id'] }} - {{ $job['title'] }} ]"  
                                class="service-pending-toolx toolx-pending-{{ $job['job_id'] }} btn btn-warning btn-xs service-chat pull-right">
                                <i class="fa fa-user"></i> <i class="fa fa-comments-o"></i>
                              </a>
                              <a href="#" class="btn btn-success btn-xs toolx-progress-{{ $job['job_id'] }} service-refund pull-right hide">
                                <i class="fa fa-minus-circle"></i> Refund </a>
                            <p>Requested by: <b>{{ $job['customer_name'] }}</b></p>
                            <p class="service-pending-toolx toolx-pending-{{ $job['job_id'] }} atoolx-pending-{{ $job['job_id'] }}" style="margin-top: 5px;">
                              <a href="#" class="btn btn-primary btn-xs service-vp"><i class="fa fa-user"></i> View Profile </a>
                              <a href="#" class="btn btn-success btn-xs service-accept"><i class="fa fa-handshake-o"></i> Accept </a>
                              <a href="#" class="btn btn-danger btn-xs service-reject"><i class="fa fa-trash-o"></i> Reject </a>
                            </p>
                            <p class="service-progress-toolx toolx-progress-{{ $job['job_id'] }} hide">
                              <input type="text" class="ip-slider ip-{{ $job['job_id'] }}" data-id="{{ $job['job_id'] }}" value="" name="range" />
                            </p>
                          </div>
                          <hr/>
                        </article>
                      @endforeach
                  </div>
                </div>

            @else
              <!-- Default template -->
              <div class="x_panel">
                <div class="x_title">
                  <h2>Pending</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                  </ul>
                  <div class="clearfix"></div>
                </div>

                <div class="x_content x_contentx x_contentx_pending nj">
                  <h2>No any pending job found</h2>
                </div>
              </div>
            @endif
          </div>

          <div id="progressBlock" class="col-md-3 col-sm-3 col-xs-12">
            @if($inprogressJobs)
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>In Progress</h2>
                      <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                      </ul>
                      <div class="clearfix"></div>
                    </div>

                    <div class="x_content x_contentx x_contentx_progress">
                        @foreach($inprogressJobs as $job)
                          <article data-id="{{ $job['id'] }}" data-job-id="{{ $job['job_id'] }}" class="media event">
                            <a class="pull-left date">
                              <p class="month">{{ $job['month'] }}</p>
                              <p class="day">{{ $job['date'] }}</p>
                            </a>
                            <div class="media-body">
                              <b class="title custom-title" value="{{ $job['job_id'] }}">{{ $job['job_id'] }} - {{ $job['title'] }}</b>
                              <a href="#" data-customer="{{ $job['customer_name'] }} [ {{ $job['job_id'] }} - {{ $job['title'] }} ]"
                                class="xtbit service-pending-toolx toolx-progress-{{ $job['job_id'] }} btn btn-warning btn-xs service-chat pull-right">
                                <i class="fa fa-user"></i> <i class="fa fa-comments-o"></i>
                              </a>
                              <a href="#" class="xtbit btn btn-success btn-xs service-refund pull-right"><i class="fa fa-minus-circle"></i> Refund </a>
                              <p>Requested by: <b>{{ $job['customer_name'] }}</b></p>
                              <p class="xtbit service-progress-toolx spt-{{ $job['job_id'] }}">
                                <input type="text" class="ip-slider ip-{{ $job['job_id'] }}" data-id="{{ $job['job_id'] }}" data-value="{{ $job['progress_status'] }}" value="{{ $job['progress_status'] }}" name="range" />
                              </p>
                            </div>
                            <hr/>
                          </article>
                        @endforeach
                    </div>
                  </div>

              @else
                <!-- Default template -->
                <div class="x_panel">
                  <div class="x_title">
                    <h2>In Progress</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content x_contentx x_contentx_progress nj">
                    <h2>No In Progress Job found </h2>
                  </div>
                </div>
              @endif
            </div>

            <div id="closeBlock" class="col-md-3 col-sm-3 col-xs-12">
              @if($closeJobs)
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>Closed/ History</h2>
                        <ul class="nav navbar-right panel_toolbox">
                          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                      </div>

                      <div class="x_content x_contentx x_contentx_close">
                          <div class="hide">
                              <b>Rejected/ Refunded Service:</b>
                              <hr class="custom-hr"/>
                              <div class="service-tmp-rej-area"></div>
                          </div>
                          <?php $tmp_yr = ''; ?>
                          @foreach($closeJobs as $job)
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
                                <p>Requested by: <b>{{ $job['customer_name'] }}</b></p>
                                <p>Status: <b>{{ $job['status'] }}</b></p>
                              </div>
                            </article>
                            <?php $tmp_yr = $job['year']; ?>
                          @endforeach
                      </div>
                    </div>

                @else
                  <!-- Default template -->
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>Close/ History</h2>
                      <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                      </ul>
                      <div class="clearfix"></div>
                    </div>

                    <div class="x_content x_contentx x_contentx_close nj">
                      <div class="hide">
                          <b>Rejected Service:</b>
                          <hr class="custom-hr"/>
                          <div class="service-tmp-rej-area"></div>
                      </div>
                      <h2>No Closed/ History Job found </h2>
                    </div>
                  </div>
                @endif
              </div>

    </div>

    <!-- compose -->
    <div class="compose col-md-4 col-xs-12">
      <div class="compose-header" style="text-align: left;">
        Message to <span id="service-user-name" style="font-weight:bold;"></span>
        <button type="button" class="close compose-close">
          <span>×</span>
        </button>
      </div>

      <div class="compose-body">
        <div id="alerts"></div>

        <div id="editor" class="editor-wrapper" style="text-align: left;">
        </div>

      </div>

      <div class="compose-footer">
        <button id="send-service-comment" class="btn btn-sm btn-primary pull-left" type="button">Send</button>
      </div>
    </div>


<!-- /page content -->
@endsection
