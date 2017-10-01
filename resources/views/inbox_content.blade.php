<style>
  .mail_view_content {
    height: 500px;
    overflow-y: auto
  }
  .editor-wrapper {
    min-height: 80px;
    overflow: hidden;
  }
  #send-inbox-content {
    margin-top: 10px;
  }
</style>

<div class="mail_heading row">
    <div class="col-md-12">
      <div class="btn-group">
        <button class="btn btn-sm btn-primary" type="button"><i class="fa fa-reply"></i> Reply</button>
        <button class="btn btn-sm btn-default" type="button" data-placement="top" data-toggle="tooltip" data-original-title="Print"><i class="fa fa-print"></i></button>
        <button class="btn btn-sm btn-default" type="button" data-placement="top" data-toggle="tooltip" data-original-title="Trash"><i class="fa fa-trash-o"></i></button>
      </div>
    </div>
    <!--
    <div class="col-md-4 text-right">
      <p class="date"> 8:02 PM 12 FEB 2014</p>
    </div>
    -->
    <div class="col-md-12">
      <h4 class="custom-mail-title">[{{ $job->job_id }}]: {{ $job->title }}</h4>
    </div>
</div>

<div class="view-mail mail_view_content">
  @if($mail)
    <ul class="list-unstyled msg_list" style="width: 80%;">
      @foreach($mail as $m)
      <?php
        date_default_timezone_set('Asia/Singapore');

        $date = explode(" ", $m->created_at)[0];
        $seconds = abs(strtotime($m->created_at) - strtotime(date("Y-m-d H:i:s")));
        $minutes = round(($seconds/ 60), 0);
        $hours = round(($minutes/ 60), 0);

        //$result = $seconds < 60 ? $seconds. ' secs ago' : $minutes < 60 ? $minutes. ' mins ago' : $hours. ' hours ago';
        if($seconds < 60) { $result = $seconds. ' secs ago'; }
        else if($minutes < 60) { $result = $minutes. ' mins ago'; }
        else { $result = $hours. ' hours ago'; }

        $date_result = date("Y-m-d") != $date ? $date : $result;
      ?>

        <li>
          <a style="width: 100%;">
            <span>
              <span><b>{{ $m->xusers->name }}</b></span>
              <span class="msg_time pull-right">{{ $date_result }}</span>
            </span>
            <span class="message">
              {{ $m->msg }}
            </span>
          </a>
        </li>
      @endforeach
    </ul>
  @endif
</div>

<div class="mail_view_footer">
  <div id="editor" class="editor-wrapper" style="text-align: left;">
  </div>
  <div id="editor2" class="editor-wrapper hide" style="text-align: left;">
  </div>
  <button id="send-inbox-content" data-jobid="{{ $id }}" data-tab="{{ $type }}" class="hide btn btn-send1 btn-sm btn-primary pull-left" type="button">Send</button>
  <button id="send-inbox-content2" data-jobid="{{ $id }}" data-tab="{{ $type }}" class="hide btn-send2 btn btn-sm btn-primary pull-left" type="button">Send</button>
</div>
<script src="{{ asset('js/inbox_content.js') }}"></script>
