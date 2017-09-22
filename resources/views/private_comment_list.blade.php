@foreach($comments as $comment)
  <?php
    date_default_timezone_set('Asia/Singapore');

    $date = explode(" ", $comment->created_at)[0];
    $seconds = abs(strtotime($comment->created_at) - strtotime(date("Y-m-d H:i:s")));
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
        <span><b>{{ $comment->xusers->name }}</b></span>
        <span class="msg_time pull-right">{{ $date_result }}</span>
      </span>
      <span class="message">
        {{ $comment->msg }}
      </span>
    </a>
  </li>
@endforeach
