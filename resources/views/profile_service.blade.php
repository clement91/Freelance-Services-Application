<!-- page content -->
<?php
  $bitpa = $view == 0 ? '' : 'hide';
  $bitpa2 = $view == 0 ? 'hide' : '';
?>
    <style>
      .profile_service-txt-left {
            text-align: left;
            height: 600px;
      }
      .well {
        background-color: #FDFEFE !important;
      }
      .control-label {
        text-align: right;
        font-size: 15px;
      }
      .control-span {
        text-align: left;
        font-size: 15px;
      }
      .row {
        padding-bottom: 10px;
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
      #txt-new-comment-ps {
        resize: none;
        height: 90px;
      }
      .ps-cls-rate {
            padding-top: 5px;
      }
      .compose .compose-body .editor-wrapper {
           min-height: 150px !important;
      }

    </style>
    <div class="mxcg">
        <div class="row rofile-info">
              <div class="col-md-12 col-sm-12 col-xs-12">

                  <div class="x_title">
                    <h2>User Profile<small id="ps-job-id">{{ $job['job_id'] }}</small></h2>
                    <button type="button" class="btn btn-success btn-md pull-right {{ $bitpa }}" id="btn-profile-service-back-0" value="Back">
                      Back
                    </button>
                    <button type="button" class="btn btn-success btn-md pull-right {{ $bitpa2 }}" id="btn-profile-service-back-1" value="Back">
                      Back
                    </button>
                    <button type="button" class="btn btn-primary btn-md pull-right {{ $bitpa }}" id="btn-profile-service-request" value="Request Service">
                      <i class="fa fa-edit m-right-xs"></i> Request Service
                    </button>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-3 col-sm-3 col-xs-12">
                      <div class="profile_img">
                        <div id="crop-avatar">
                          <!-- Current avatar -->
                          <img class="img-responsive avatar-view" src="{{ $job['image_url'] }}" alt="Avatar" title="Profile Picture">
                        </div>
                      </div>
                      <h3 id="ps-job-name">{{ $job['name'] }}</h3>

                      <ul class="list-unstyled user_data">
                        <li><i class="fa fa-map-marker user-profile-icon"></i> {{ $job['location'] }}
                        </li>
                        <!--
                        <li>
                          <i class="fa fa-briefcase user-profile-icon"></i> Software Engineer
                        </li>
                        -->
                        <li class="m-top-xs">
                          <i class="fa fa-external-link user-profile-icon"></i>
                          <a href="{{ $job['hyperlink'] }}" target="_blank">{{ $job['url_link'] }}</a>
                        </li>
                      </ul>

                      <a class="compose-public btn btn-success"><i class="fa fa-envelope m-right-xs"></i> Contact Me</a>
                      <br />
                      {{--
                      <!-- start skills -->
                      <h4>Skills</h4>
                      <ul class="list-unstyled user_data">
                        <li>
                          <p>Web Applications</p>
                          <div class="progress progress_sm">
                            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50"></div>
                          </div>
                        </li>
                        <li>
                          <p>Website Design</p>
                          <div class="progress progress_sm">
                            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="70"></div>
                          </div>
                        </li>
                        <li>
                          <p>Automation & Testing</p>
                          <div class="progress progress_sm">
                            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="30"></div>
                          </div>
                        </li>
                        <li>
                          <p>UI / UX</p>
                          <div class="progress progress_sm">
                            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50"></div>
                          </div>
                        </li>
                      </ul>
                      <!-- end of skills -->
                      --}}
                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">

                      <!--
                      <div class="profile_title">
                        <div class="col-md-6">
                          <h2>User Activity Report</h2>
                        </div>
                        <div class="col-md-6">
                          <div id="reportrange" class="pull-right" style="margin-top: 5px; background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #E6E9ED">
                            <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                            <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                          </div>
                        </div>
                      </div>
                      -->


                      <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                          <li role="presentation" class="active"><a href="#tab_content1" id="profile-service-tab-1" role="tab" data-toggle="tab" aria-expanded="true">Profile Details</a>
                          </li>
                          <li role="presentation" class="{{ $bitpa }}"><a href="#tab_content2" id="profile-service-tab-2" role="tab" data-toggle="tab" aria-expanded="false">Job Details</a>
                          </li>
                          <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-service-tab-3" data-toggle="tab" aria-expanded="false">Comments</a>
                          </li>
                          <li role="presentation" class=""><a href="#tab_content4" role="tab" id="profile-service-tab-4" data-toggle="tab" aria-expanded="false">Services</a>
                          </li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                          <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="profile-tab">
                            <div class="well">
                              <div class="row">
                                <div class="form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Joined In:</label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    <span class="col-md-12 col-xs-12 control-span">{{ $profile['joined_at'] }}</span>
                                  </div>
                                </div>
                              </div>

                                <div class="row">
                                  <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Description:</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                      <span class="col-md-12 col-xs-12 control-span">{{ $profile['desc'] }}</span>
                                    </div>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Contact No:</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                      <span class="col-md-12 col-xs-12 control-span">{{ $profile['contact_no'] }}</span>
                                    </div>
                                    </div>
                                </div>

                            </div>

                          </div>

                          <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="job-tab">
                            <div class="well">
                              <div class="row">
                                <div class="form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Title:</label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    <span id="ps-job-title" class="col-md-12 col-xs-12 control-span">{{ $job['title'] }}</span>
                                  </div>
                                </div>
                              </div>

                                <div class="row">
                                  <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Description:</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                      <span id="ps-job-desc" class="col-md-12 col-xs-12 control-span">{{ $job['desc'] }}</span>
                                    </div>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Price:</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                      <span id="ps-job-price" class="col-md-12 col-xs-12 control-span">{{ $job['price'] }}</span>
                                    </div>
                                    </div>
                                </div>

                                <div class="row">
                                  <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Category:</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                      <span id="ps-job-cat" class="col-md-12 col-xs-12 control-span">{{ $job['parent_category'] }}, {{ $job['child_category'] }}</span>
                                    </div>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Tags:</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                      <span class="col-md-12 col-xs-12 control-span" id="profile_service_tabx_tags">{{ $job['tags'] }}</span>
                                      <input class="hide" id="profile_service_tabv_tags" value="{{ $job['tags'] }}"/>
                                    </div>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Instruction to buyer:</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                      <span id="ps-job-instruction" class="col-md-12 col-xs-12 control-span">{{ $job['instruction'] }}</span>
                                      <span id="ps-job-deliver" class="hide">{{ $job['days_to_deliver'] }}</span>
                                    </div>
                                  </div>
                                </div>

                            </div>

                          </div>
                          <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="comment-tab">
                            <!-- start recent activity -->
                            <ul class="messages profile_service-txt-left">
                              <li>
                                <div class="pull-right">
                                  <a href="#" class="btn btn-sm btn-primary" id="btn-add-comment-ps">Add Comment</a>
                                </div>
                                <textarea data-jobid="{{ $job['job_id'] }}" data-user="{{ $job['user'] }}" id="txt-new-comment-ps"
                                  placeholder="Add your comment here.." class="form-control"></textarea>
                                <div class="ps-cls-rate pull-right">
                                  <p class="ratings">
                                    <i>Give a rating  </i>
                                    <span id="ps-label-rate" value="0"></span>
                                    <a href="#"><span data-index="0" id="ps-fa-0" class="ps-fa fa fa-star-o"></span></a>
                                    <a href="#"><span data-index="1" id="ps-fa-1" class="ps-fa fa fa-star-o"></span></a>
                                    <a href="#"><span data-index="2" id="ps-fa-2" class="ps-fa fa fa-star-o"></span></a>
                                    <a href="#"><span data-index="3" id="ps-fa-3" class="ps-fa fa fa-star-o"></span></a>
                                    <a href="#"><span data-index="4" id="ps-fa-4" class="ps-fa fa fa-star-o"></span></a>
                                  </p>
                                </div>
                                <br/><br/>
                              </li>
                              <div class="ps-comment-list">
                                @foreach($comment_pub as $comment)
                                  <li>
                                    <img src="{{ $comment->xusers->image_url }}" class="avatar" alt="Avatar">
                                    <div class="message_date">
                                      <h3 class="date text-info">24</h3>
                                      <p class="month">May</p>
                                    </div>
                                    <div class="message_wrapper">
                                      <h4 class="heading">{{ $comment->xusers->name }}</h4>
                                      <blockquote class="message">{{ $comment->msg }}</blockquote>
                                      <br />
                                      <p class="ratings">
                                        @if($comment->rating != 0)
                                            <a>{{ $comment->rating }}.0</a>

                                            <?php $rate = $comment->rating; ?>
                                            @for($i = 0; $i < 5; $i++)
                                              @if($i < $rate)
                                                <a href="#"><span class="fa fa-star"></span></a>
                                              @else
                                                <a href="#"><span class="fa fa-star-o"></span></a>
                                              @endif
                                            @endfor
                                        @else
                                          N.A
                                        @endif
                                      </p>
                                    </div>
                                  </li>
                                @endforeach
                              </div>

                            </ul>
                            <!-- end recent activity -->

                          </div>
                          <div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="overall-project-tab">
                            <!-- start user projects -->
                            <table class="data table table-striped no-margin">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Project Name</th>
                                  <th>Client Company</th>
                                  <th class="hidden-phone">Hours Spent</th>
                                  <th>Contribution</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>1</td>
                                  <td>New Company Takeover Review</td>
                                  <td>Deveint Inc</td>
                                  <td class="hidden-phone">18</td>
                                  <td class="vertical-align-mid">
                                    <div class="progress">
                                      <div class="progress-bar progress-bar-success" data-transitiongoal="35"></div>
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td>2</td>
                                  <td>New Partner Contracts Consultanci</td>
                                  <td>Deveint Inc</td>
                                  <td class="hidden-phone">13</td>
                                  <td class="vertical-align-mid">
                                    <div class="progress">
                                      <div class="progress-bar progress-bar-danger" data-transitiongoal="15"></div>
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td>3</td>
                                  <td>Partners and Inverstors report</td>
                                  <td>Deveint Inc</td>
                                  <td class="hidden-phone">30</td>
                                  <td class="vertical-align-mid">
                                    <div class="progress">
                                      <div class="progress-bar progress-bar-success" data-transitiongoal="45"></div>
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td>4</td>
                                  <td>New Company Takeover Review</td>
                                  <td>Deveint Inc</td>
                                  <td class="hidden-phone">28</td>
                                  <td class="vertical-align-mid">
                                    <div class="progress">
                                      <div class="progress-bar progress-bar-success" data-transitiongoal="75"></div>
                                    </div>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                            <!-- end user projects -->
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

              </div>
            </div>
    </div>

    <!-- compose -->
    <div class="compose col-md-6 col-xs-12">
      <div class="compose-header" style="text-align: left;">
        New Message
        <button type="button" class="close compose-close">
          <span>×</span>
        </button>
      </div>

      <div class="compose-body">
        <div id="alerts"></div>

        <div class="btn-toolbar editor" data-role="editor-toolbar" data-target="#editor">
          {{--
          <div class="btn-group">
            <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font"><i class="fa fa-font"></i><b class="caret"></b></a>
            <ul class="dropdown-menu">
            </ul>
          </div>

          <div class="btn-group">
            <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font Size"><i class="fa fa-text-height"></i>&nbsp;<b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li>
                <a data-edit="fontSize 5">
                  <p style="font-size:17px">Huge</p>
                </a>
              </li>
              <li>
                <a data-edit="fontSize 3">
                  <p style="font-size:14px">Normal</p>
                </a>
              </li>
              <li>
                <a data-edit="fontSize 1">
                  <p style="font-size:11px">Small</p>
                </a>
              </li>
            </ul>
          </div>
          --}}
          <div class="btn-group">
            <a class="btn" data-edit="bold" title="Bold (Ctrl/Cmd+B)"><i class="fa fa-bold"></i></a>
            <a class="btn" data-edit="italic" title="Italic (Ctrl/Cmd+I)"><i class="fa fa-italic"></i></a>
            <a class="btn" data-edit="strikethrough" title="Strikethrough"><i class="fa fa-strikethrough"></i></a>
            <a class="btn" data-edit="underline" title="Underline (Ctrl/Cmd+U)"><i class="fa fa-underline"></i></a>
          </div>

          <div class="btn-group">
            <a class="btn" data-edit="insertunorderedlist" title="Bullet list"><i class="fa fa-list-ul"></i></a>
            <a class="btn" data-edit="insertorderedlist" title="Number list"><i class="fa fa-list-ol"></i></a>
            <a class="btn" data-edit="outdent" title="Reduce indent (Shift+Tab)"><i class="fa fa-dedent"></i></a>
            <a class="btn" data-edit="indent" title="Indent (Tab)"><i class="fa fa-indent"></i></a>
          </div>

          <div class="btn-group">
            <a class="btn" data-edit="justifyleft" title="Align Left (Ctrl/Cmd+L)"><i class="fa fa-align-left"></i></a>
            <a class="btn" data-edit="justifycenter" title="Center (Ctrl/Cmd+E)"><i class="fa fa-align-center"></i></a>
            <a class="btn" data-edit="justifyright" title="Align Right (Ctrl/Cmd+R)"><i class="fa fa-align-right"></i></a>
            <a class="btn" data-edit="justifyfull" title="Justify (Ctrl/Cmd+J)"><i class="fa fa-align-justify"></i></a>
          </div>
          {{--
          <div class="btn-group">
            <a class="btn dropdown-toggle" data-toggle="dropdown" title="Hyperlink"><i class="fa fa-link"></i></a>
            <div class="dropdown-menu input-append">
              <input class="span2" placeholder="URL" type="text" data-edit="createLink" />
              <button class="btn" type="button">Add</button>
            </div>
            <a class="btn" data-edit="unlink" title="Remove Hyperlink"><i class="fa fa-cut"></i></a>
          </div>

          <div class="btn-group">
            <a class="btn" title="Insert picture (or just drag & drop)" id="pictureBtn"><i class="fa fa-picture-o"></i></a>
            <input type="file" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage" />
          </div>

          <div class="btn-group">
            <a class="btn" data-edit="undo" title="Undo (Ctrl/Cmd+Z)"><i class="fa fa-undo"></i></a>
            <a class="btn" data-edit="redo" title="Redo (Ctrl/Cmd+Y)"><i class="fa fa-repeat"></i></a>
          </div>
            --}}
        </div>

        <div id="editor" class="editor-wrapper" style="text-align: left;">
        </div>

      </div>

      <div class="compose-footer">
        <button id="send-ps-msg" data-job="{{ $job['job_id'] }}" data-user="{{ $job['user'] }}" class="btn btn-sm btn-success pull-left" type="button">Send</button>
      </div>
    </div>


    <script src="{{ asset('js/profile_service.js') }}"></script>
<!-- /page content -->
