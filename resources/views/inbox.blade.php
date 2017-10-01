@extends('layouts.app')

@section('content')
<!-- page content -->
  <style>
    .inbox_panel {
      height: 780px;
    }
    .mail_list_column, .mail_view {
      height: 720px;
    }
  </style>
    <h3>Inbox</h3>
    <div class="row">
        <div class="col-md-12">
          <div class="x_panel">
            <div class="x_title">
                <small>Mail</small>
                <div class="clearfix"></div>
            </div>

            <div class="x_content inbox_panel">

              <div class="" role="tabpanel" data-example-id="togglable-tabs">
                  <ul id="inboxTab" class="nav nav-tabs bar_tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#tab_content1" id="inbox-tab" role="tab" data-toggle="tab" aria-expanded="true">Inbox</a>
                    </li>
                    <li role="presentation" class=""><a href="#tab_content2" role="tab" id="chat-tab" data-toggle="tab" aria-expanded="false">Chat</a>
                    </li>
                  </ul>
                  <div id="myTabContent" class="tab-content">

                    <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                      <div class="row">
                          <div class="col-sm-3 mail_list_column" style="overflow-y: auto;">
                              @if($unread)
                                @foreach($unread as $mail)
                                  <a href="#">
                                    <div id="{{ $mail->job_id }}" data-tab="1" class="mail_list">
                                      <div class="left">
                                        <i class="fa fa-circle custom-fa-{{ $mail->job_id }}"></i>
                                      </div>
                                      <div class="right">
                                        <?php
                                          date_default_timezone_set('Asia/Singapore');
                                          $date = explode(" ", $mail->created_at)[0];
                                          $time = $mail->created_at->format('h:i A');

                                          $date_result = date("Y-m-d") != $date ? $date : $time;
                                          $mxg = substr($mail->msg, 0, 32);
                                        ?>
                                        <h3>{{ $mail->xusers->name }} <small>{{ $date_result }}</small></h3>
                                        <p class="left-content-{{ $mail->job_id }}">
                                          <span class="custom-title-{{ $mail->job_id }}" style="font-weight:bold;">
                                            Enquiry for Job: {{ $mail->job_id }}<br/>{{ $mail->xjobs->title }}
                                          </span><br/>
                                          {{ $mxg }} ...
                                        </p>
                                      </div>
                                    </div>
                                  </a>
                                @endforeach
                              @endif

                              @if($read)
                                @foreach($read as $mail)
                                <a href="#">
                                  <div id="{{ $mail->job_id }}" data-tab="1" class="mail_list">
                                    <div class="left">
                                      <i class="fa fa-circle-thin custom-fa-{{ $mail->job_id }}"></i>
                                    </div>
                                    <div class="right">
                                      <?php
                                        date_default_timezone_set('Asia/Singapore');
                                        $date = explode(" ", $mail->created_at)[0];
                                        $time = $mail->created_at->format('h:i A');

                                        $date_result = date("Y-m-d") != $date ? $date : $time;
                                        $mxg = substr($mail->msg, 0, 32);
                                      ?>
                                      <h3>{{ $mail->xusers->name }} <small>{{ $date_result }}</small></h3>
                                      <p>
                                        Enquiry for Job: {{ $mail->job_id }}<br/>{{ $mail->xjobs->title }}<br/>
                                        {{ $mxg }} ...
                                      </p>
                                    </div>
                                  </div>
                                </a>
                                @endforeach
                              @endif
                          </div>

                          <div class="col-sm-9 mail_view">
                            <div class="inbox-body">

                            </div>
                          </div>
                      </div>
                    </div>

                    <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                      <div class="row">
                          <div class="col-sm-3 mail_list_column" style="overflow-y: auto;">
                              @if($unreadChat)
                                @foreach($unreadChat as $mail)
                                  <a href="#">
                                    <div id="{{ $mail->job_transaction_id }}" data-tab="2" data-jobid="{{ $mail->job_id }}" class="mail_list">
                                      <div class="left">
                                        <i class="fa fa-circle custom-fa-{{ $mail->job_transaction_id }}"></i>
                                      </div>
                                      <div class="right">
                                        <?php
                                          date_default_timezone_set('Asia/Singapore');
                                          $date = explode(" ", $mail->created_at)[0];
                                          $time = $mail->created_at;

                                          $date_result = date("Y-m-d") != $date ? $date : $time;
                                          $mxg = substr($mail->msg, 0, 32);
                                        ?>
                                        <h3>{{ $mail->name }} <small>{{ $date_result }}</small></h3>
                                        <p class="left-content-{{ $mail->job_transaction_id }}">
                                          <span class="custom-title-{{ $mail->job_transaction_id }}" style="font-weight:bold;">
                                            Enquiry for Job: {{ $mail->job_transaction_id }}<br/>{{ $mail->title }}
                                          </span><br/>
                                          {{ $mxg }} ...
                                        </p>
                                      </div>
                                    </div>
                                  </a>
                                @endforeach
                              @endif

                              @if($readChat)
                                @foreach($readChat as $mail)
                                <a href="#">
                                  <div id="{{ $mail->job_transaction_id }}" data-tab="2" data-jobid="{{ $mail->job_id }}" class="mail_list">
                                    <div class="left">
                                      <i class="fa fa-circle-thin custom-fa-{{ $mail->job_transaction_id }}"></i>
                                    </div>
                                    <div class="right">
                                      <?php
                                        date_default_timezone_set('Asia/Singapore');
                                        $date = explode(" ", $mail->created_at)[0];
                                        $time = $mail->created_at;

                                        $date_result = date("Y-m-d") != $date ? $date : $time;
                                        $mxg = substr($mail->msg, 0, 32);
                                      ?>
                                      <h3>{{ $mail->name }} <small>{{ $date_result }}</small></h3>
                                      <p>
                                        Enquiry for Job: {{ $mail->job_transaction_id }}<br/>{{ $mail->title }}<br/>
                                        {{ $mxg }} ...
                                      </p>
                                    </div>
                                  </div>
                                </a>
                                @endforeach
                              @endif
                          </div>

                          <div class="col-sm-9 mail_view">
                            <div class="inbox-body">

                            </div>
                          </div>
                      </div>
                    </div>

                  </div>
                </div>

            </div>
          </div>
        </div>
    </div>

<!-- /page content -->
@endsection
