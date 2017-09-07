<!-- page content -->
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
    </style>
    <div class="mxg">
        @foreach($jobs as $job)
        <div class="col-md-6 col-sm-6 col-xs-12 profile_details">
            <div class="well profile_view">
              <div class="col-sm-12">
                <h4 class="heading">{{ $job->title }}</h4>
                <div class="left col-xs-1">
                  <img src="img/profile/1-044043.jpg" class="avatar" alt="Avatar">
                </div>
                <div class="left col-xs-11">
                  <h4>Nicole Pearson</h4>
                  <p><strong>Description: </strong> Web Designer / UX / Graphic Artist / Coffee Lover </p>
                  <ul class="list-unstyled">
                    <li><i class="fa fa-building"></i> Location: </li>
                    <li><i class="fa fa-tag"></i> Keywords: </li>
                    <li><a href="#"><i class="fa fa-paperclip"></i> User Acceptance Test.doc </a> </li>
                  </ul>
                </div>

                <div class="left col-xs-12">
                  Testimonal:
                  <ul class="messages">
                    <li></li>

                    <li>
                        <div class="message_date">
                          <h3 class="date text-info">17</h3>
                          <p class="month">June</p>
                        </div>
                        <div class="message_wrapper">
                          <blockquote class="message">Great art work!</blockquote>
                          <br />
                          <p class="name">
                            Josh Mark
                          </p>
                        </div>
                    </li>
                    <li>
                        <div class="message_date">
                          <h3 class="date text-info">24</h3>
                          <p class="month">May</p>
                        </div>
                        <div class="message_wrapper">
                          <blockquote class="message">Good service</blockquote>
                          <br />
                          <p class="name">
                            Dave Tan
                          </p>
                        </div>
                    </li>

                    <li>
                        <div class="message_date">
                          <h3 class="date text-info">24</h3>
                          <p class="month">May</p>
                        </div>
                        <div class="message_wrapper">
                          <blockquote class="message">Good Job!! Hope to work with you again<br/>Tqvm</blockquote>
                          <br />
                          <p class="name">
                            Dave Tan
                          </p>
                        </div>
                    </li>

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
