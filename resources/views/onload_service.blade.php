<!-- page content -->
    <?php
        if(!isset($xpubComments)) { $xpubComments = null; }
        if(!isset($users)) { $users = null; }
     ?>
    <style>
      .mxg {
        text-align: left;
        overflow: auto;
        height: 730px;
      }
      .profile_view {
        width: 100%;
      }
      .emphasis-right {
        text-align: right;
      }
      .heading {
        font-style: italic;
        font-weight: bold;
      }
      .messages {
        overflow: auto;
        height: 250px;
      }
      .message_date {
        padding-right: 10px;
      }
      .message {
          font-size: 14px;
      }
      .name {
        font-weight: bold;
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
    </style>
    <div class="mxg">
        @foreach($jobs as $job)
        <div class="col-md-6 col-sm-6 col-xs-12 profile_details">
            <div class="well profile_view">
              <div class="col-sm-12">
                <h4 class="heading">{{ $job->title }}</h4>
                <div class="left col-xs-1">
                  <img src="{{ $job->xusers->image_url }}" class="avatar" alt="Avatar">
                </div>
                <div class="left col-xs-11">
                  <h4>{{ $job->xusers->name }}</h4>
                  <p><strong>Description: </strong> {{ $job->description }} </p>
                  <p><strong>Location: </strong> {{ $job->xlocation->location }} </p>
                  <p><strong>Category: </strong> {{ $job->xcategory->parent_category }}, {{ $job->xcategory->child_category }} </p>
                  <p><strong>Keywords: </strong><span id="onload_service_tagx">{{ $job->tags }}</span> </p>
                  <input class="hide" id="onload_service_tagv" value="{{ $job->tags }}"/>
                </div>

                <div class="left col-xs-12">
                  Comments:
                  <ul class="messages">
                    <li></li>

                    @if($job->xpubComments->count() != 0)
                      @foreach($job->xpubComments as $comment)
                        <li>
                            <div class="message_date">
                              <h3 class="date text-info">17</h3>
                              <p class="month">June</p>
                            </div>
                            <div class="message_wrapper">
                              <blockquote class="message">{{ $comment->msg }}</blockquote>
                              <br />
                              <p class="name">
                                @if($users != null)
                                  @foreach($users as $user)
                                    @if($user->id == $comment->users)
                                      {{ $user->name }}
                                    @endif
                                  @endforeach
                                 @endif
                              </p>
                            </div>
                        </li>
                      @endforeach
                    @else
                      <li style="font-style:italic">&nbsp;No Comment add this moment</li>
                    @endif

                  </ul>
                </div>
              </div>

              <div class="col-xs-12 bottom">
                <div class="col-xs-12 col-sm-6 emphasis">
                  <p class="ratings">
                    <a>4.0</a>
                    <a href="#"><span class="fa fa-star"></span></a>
                    <a href="#"><span class="fa fa-star"></span></a>
                    <a href="#"><span class="fa fa-star"></span></a>
                    <a href="#"><span class="fa fa-star"></span></a>
                    <a href="#"><span class="fa fa-star-o"></span></a>
                  </p>
                </div>
                <div class="col-xs-12 col-sm-6 emphasis emphasis-right">
                  <button type="button" class="btn btn-success btn-xs"> <i class="fa fa-user">
                    </i> <i class="fa fa-comments-o"></i> </button>
                  <button type="button" data-id="{{ $job->id }}" class="btn-view-profile btn btn-primary btn-xs">
                    <i class="fa fa-user"> </i> View Profile
                  </button>
                </div>
              </div>
            </div>
        </div>
        @endforeach
    </div>
    <script src="{{ asset('js/onload_service.js') }}"></script>
<!-- /page content -->
