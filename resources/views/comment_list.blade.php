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
