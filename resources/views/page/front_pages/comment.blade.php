<div class="media">
  <h5>{{ $comment->channel->name }}</h5>
  <div class="media-left">
     <a href="#">
     <img src="{{ url('uploads/'.$comment->channel->avatar )}}" title="One movies" width="50" height="50" alt=" " />
     </a>
  </div>
  <div class="media-body">
     <p>{{ $comment->comment }}</p>
     <span>View all posts by :<a href="#"> {{ $comment->channel->username }} </a></span>
  </div>
</div>