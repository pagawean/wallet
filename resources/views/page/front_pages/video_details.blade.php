@extends('layouts.default')
@section('title', 'Video Detail')
@section('meta')


<meta property="og:image" content="{{url('uploads/'.@$detail->image)}}" />

<meta property="og:image:secure_url" content="" />
<meta property="og:image:type" content="image/jpeg" />
<meta property="og:image:width" content="128" />
<meta property="og:image:height" content="128" />

<meta property="og:title" content="{{ @$detail->title}}" />
<meta property="og:type" content="blog" />
<meta property="og:url" content="{{ URL::current() }}" />
<meta property="og:description" content=" {!! @$detail->content !!}"/>
@endsection
@section('css')
<style type="text/css">
   .modal-backdrop {
   background-color: transparent !important;
   }
   .modal{
   /*display: block !important; */
   margin-top: 19%;
   /*min-height: 20%;*/
   }
   /* Important part */
   .modal-dialog{
   overflow-y: initial !important
   }
   .modal-body{
   height: 250px auto;
   overflow-y: auto;
   }
   .fa:hover {
   cursor: pointer;
   }

   .hr-description {
      margin-top: 2%;
   }

   .no-padding-left {
      padding-left: 0 !important;
   }

   .no-padding-right {
      padding-right: 0 !important;
   }

  

   
</style>
@endsection

@section('content')
<!-- single -->
<div class="container">
   <div class="col-md-11 box-margin">
      <div class="single-page-agile-info" >
         <!-- /movie-browse-agile -->
         <div class="show-top-grids-w3lagile">
            <div class="col-sm-8 single-left">
               <div class="song" >
                  <div class="video-grid-single-page-agileits video-top" style="margin-top: 1.6%;">
                     <div class="video-js-responsive-container vjs-hd">
                        <video id="myvideo" class="video-js vjs-big-play-centered" controls preload="none" data-id="{{ @$detail->id }}" width="720" height="360" 
                        @if(!empty($detail->image))
                         poster="{{url('uploads/'.@$detail->image)}}"
                        @else
                         poster="{{ url('front/images/no-video.jpg')}}"
                        @endif

                        data-setup='{"fluid": false}'>
                           <source src="{{url(@$detail->path)}}" type="video/mp4">
                           <p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
                        </video>
                     </div>
                  </div>

               </div>
               <div class="clearfix"> </div>
               <div class="song-grid-right space-title" >
                  <div class="col-sm-12 title">
                     <div class="share ">
                        <h3><b>{{ @$detail->title }}</b></h3>
                     </div>
                  </div>
                  <div class="col-md-3 no-padding-left space-title">
                     <div class="share pull-left no-padding-left">
                        <span> 
                                 <span id="count_look">{{@$detail->count_look}} Views</span>
                        </span>
                     </div>
                  </div>
                  <div class="col-sm-9 no-padding-right">
                     <div class="share pull-right">
                        <div class="single-agile-shar-buttons like">
                           <ul>
                              <li>
                                 <span id="love">
                                 @if(Auth::guard('channel')->check())
                                 <i class="fa fa-thumbs-up fa-2x " aria-hidden="true"></i>&nbsp;
                                 @else
                                 <a href="{{ url('/logins') }}">
                                 <i class="fa fa-thumbs-up fa-2x " aria-hidden="true"></i>&nbsp;
                                 </a>
                                 @endif
                                 <span id="count_love">{{@$detail->count_love}}</span>
                                 </span>
                                 
                                 <span><i class="fa fa-comments fa-2x " aria-hidden="true"></i>&nbsp;{{@$detail->count_comment}}</span>
                                 <span><i class="fa fa-share fa-2x " aria-hidden="true" aria-hidden="true" data-toggle="modal" data-target="#ModalShare"></i>&nbsp;
                                 </span>
                                 <!-- Example split danger button -->
                                 <span style="float: right; margin-right: -7%;">
                                    <i class="fa fa-list fa-2x " aria-hidden="true" data-toggle="modal" data-target="#ModalPlaylist"></i>
                                    <!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add</button> -->
                                    <!-- Modal -->
                                    <div class="modal fade" id="ModalPlaylist" role="dialog">
                                       <div class="modal-dialog modal-sm">
                                          <div class="modal-content">
                                             <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Add to Playlist</h4>
                                             </div>
                                             <div class="modal-body">
                                                <div id="list-playlist">
                                                @if(Auth::guard('channel')->check())
                                                   <table class="table table-condensed">
                                                      @foreach(Auth::guard('channel')->user()->playlist as $playlist)
                                                      <tr>
                                                         <td>
                                                            <a class="playlist" data-playlist-id="{{ @$playlist->id }}" data-video-id="{{ @$detail->id }}">
                                                               {{-- <span class="glyphicon glyphicon-check"></span>
                                                               <span class="glyphicon glyphicon-unchecked"></span> --}}
                                                               {{ @$playlist->name }}
                                                            </a>
                                                         </td>
                                                      </tr>
                                                      @endforeach
                                                   </table>
                                                </div>
                                                <form id="form-playlist">
                                                   <div class="form-group">
                                                      <input type="text" class="form-control" name="name" />
                                                   </div>
                                                   <div class="form-group">
                                                      <input type="submit" class="btn btn-primary" value="SEND">
                                                   </div>
                                                </form>
                                                @else
                                                <a class="btn btn-primary" href="{{ url('/logins') }}">Sign In</a>
                                                @endif
                                             </div>
                                             <!-- <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div> -->
                                          </div>
                                       </div>
                                    </div>
                                 </span>
                              </li>
                           </ul>
                        </div>
                     </div>

                  </div>

                  <div class="col-sm-12 description no-padding-left" >
                     <hr class="hr-description">
                     <div class="wthree-news-left ">
                        <div class="wthree-news-left-img">
                           <div class="media mb20">
                              <div class="media-lef">
                                 <div class="col-sm-2">
                                 <a href="#">
                                 @if(!empty(@$detail->channel->avatar))
                                    <img src="{{url('uploads/avatars/default.jpg')}}"  class="img-responsive" style="width: 70%;" />
                                 @else
                                    <img src="{{url('uploads/avatars/default.jpg')}}"  class="img-responsive" />
                                 @endif
                                 </a>
                                 </div>
                              </div>
                              <div class="media-body">
                                 <div class="col-sm-9">
                                    <h5 class="mb28"><a href="{{ url('front_channel/'.@$detail->channel->id)}}">{{ @$detail->channel->channel }}</a></h5>
                                    <h6 class="publish">Published on {{ date_format(@$detail->created_at,"M d,Y") }}</h6>
                                    <br>
                                    <p>{{ @$detail->description }}</p>
                                 </div>
                                 <div class="col-sm-3 text-right pull-right btn-subcribe">
                                    @if(Auth::guard('channel')->check())
                                       @if(@$subcribe == 1)
                                          <a class="btn btn-danger" id="disubcribe">
                                          <span class="glyphicon glyphicon-remove " style="color: #fff;"></span> DISUBCRIBE
                                          </a>
                                       @else
                                          <a class="btn btn-warning" id="subcribe">
                                          <span class="glyphicon glyphicon-plus " style="color: #fff;"></span> SUBCRIBE
                                          </a>
                                       @endif
                                    @else
                                       <a href="{{ url('/logins') }}" class="btn btn-warning">
                                       <span class="glyphicon glyphicon-plus " style="color: #fff;"></span> Follow
                                       </a>
                                    @endif
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="clearfix"> </div>
               <div class="all-comments">
                  <div class="all-comments-info">
                     <a href="#">Comments</a>
                     <div class="agile-info-wthree-box">
                        @if(Auth::guard('channel')->check())
                        <form id="form-comment" method="post">
                           {{ csrf_field() }}
                           <textarea placeholder="Message" required="required" name="comment" id="text-comment"></textarea>
                           <input type="submit" value="SEND">
                           <div class="clearfix"> </div>
                        </form>
                        @else
                        <a href="{{ url('/logins') }}" class="btn btn-warning">
                        <span class="glyphicon glyphicon-plus " style="color: #fff;"></span> Sign In to Comment
                        </a>
                        @endif
                     </div>
                  </div>
                  <div class="media-grids">
                     @foreach($detail->comments as $comment)
                     <div class="media">
                        <h5>{{ @$comment->channel->name }}</h5>
                        <div class="media-left">
                           <a href="#">
                           <img src="{{ url('uploads/'.$comment->channel->avatar)}}" title="One movies" height="50" width="50" alt=" " />
                           </a>
                        </div>
                        <div class="media-body">
                           <p>{{ @$comment->comment }}</p>
                           <span>View all posts by :<a href="#"> {{ @$comment->channel->username }} </a></span>
                        </div>
                     </div>
                     @endforeach
                  </div>
               </div>
            </div>
            <div class="col-md-4 single-right detail-side" style="margin-top: 1%;">
               <h3>Video Terkait</h3>
               <div class="single-grid-right">
                  @foreach($terkaits as $terkait)
                  <div class="single-right-grids">
                     <div class="col-md-6 single-right-grid-left w3l-movie-gride-agile">
                        <a href="{{ url('/video-details/'.@$terkait->id.'/'.str_slug(@$terkait->title)) }}"> 
                           @if(!empty($terkait->image))
                           <img src="{{ url('uploads/'.@$terkait->image)}}" class="img-responsive img-preview" alt="" />
                           @else
                           <img src="{{ url('front/images/no-video.jpg')}}" title="album-name" class="img-responsive img-preview" alt=" " />
                           @endif
                        </a>
                     </div>
                     <div class="col-md-6 single-right-grid-right">
                        <a href="{{ url('/video-details/'.@$terkait->id.'/'.str_slug(@$terkait->title)) }}" class="title"> {{ str_limit(@$terkait->title, 20, '...') }}</a>
                        <p class="author"><a href="{{ url('front_channel/'.@$terkait->channel->id)}}" class="author">{{ @$terkait->channel->channel }}</a></p>
                        <p class="views"> views</p>
                     </div>
                     <div class="clearfix"> </div>
                  </div>
                  @endforeach
               </div>
            </div>
            <div class="clearfix"> </div>
         </div>
         <!-- //movie-browse-agile -->
      </div>
      <!-- //w3l-latest-movies-grids -->
   </div>
</div>

<!-- Modal -->
<div class="modal fade modal-share" id="ModalShare" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
   <div class="modal-dialog modal-sm " role="document">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Share</h4>
         </div>
         <div class="modal-body">
          <div class="align-center">
               <a class="btn btn-xs btn-slide btn-light"  href="https://www.facebook.com/sharer/sharer.php?u={{ Request::url() }}" onclick="window.open(this.href, 'newwindow', 'width=500, height=500'); return false;">
               <i class="fa fa-facebook"></i>
               <span>Facebook</span>
               </a>
               <a class="btn btn-xs btn-slide btn-light" href="https://twitter.com/intent/tweet?text={{ @@$data->title }} by {{ @@$data->company->name }}&url={{ Request::url() }}" onclick="window.open(this.href, 'newwindow', 'width=500, height=500'); return false;">
               <i class="fa fa-twitter"></i>
               <span>Twitter</span>
               </a>
               <a class="btn btn-xs btn-slide btn-light" href="https://plus.google.com/share?url={{ Request::url() }}" onclick="window.open(this.href, 'newwindow', 'width=500, height=500'); return false;">
               <i class="fa fa-envelope"></i>
               <span>Mail</span>
               </a>
               <a class="btn btn-xs btn-slide btn-light" href="http://www.linkedin.com/shareArticle?mini=true&url={{ Request::url() }}&title={{ @@$data->title }} by {{ @@$data->company->name }}" onclick="window.open(this.href, 'newwindow', 'width=500, height=500'); return false;">
               <i class="fa fa-linkedin"></i>
               <span>Linkedin</span>
               </a>
            </div>
         </div>
         <!-- <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
            </div>
            </div> -->
      </div>
   </div>
</div>
@endsection
@section('js')
<script>
   $("#form-comment").submit(function(e) {
       var url = "{{ route('post.comment',['video_id' => @$detail->id]) }}";
       $.ajax({
            type: "POST",
            url: url,
            data: $("#form-comment").serialize(),
            success: function(data)
            {
              $(".media-grids").append(data);
              $("text-comment").val("");
            }
       });
       e.preventDefault();
   });
   $("#form-playlist").submit(function(e) {
       var url = "{{ route('post.add.playlist') }}";
       $.ajax({
            type: "POST",
            url: url,
            data: $("#form-playlist").serialize(),
            success: function(data)
            {
              $("#list-playlist").append(data);
            }
       });
       e.preventDefault();
   });
   $('#love').click(function(){
      $.get( "{{ route('features.set_love', ['video_id' => @$detail->id]) }}", function( data ) {
         $('#count_love').html(data);
      });
   });

   $('body').on('click', '#subcribe', function() {
      $.get( "{{ route('features.set_subcribe', ['channel_id' => @$detail->channel->id]) }}", function( data ) {
         $('.btn-subcribe').html('<a class="btn btn-danger" id="disubcribe"><span class="glyphicon glyphicon-remove " style="color: #fff;"></span>DISUBCRIBE</a>');
      });
   });

   $('body').on('click', '#disubcribe', function() {
      $.get( "{{ route('features.set_disubcribe', ['channel_id' => @$detail->channel->id]) }}", function( data ) {
         $('.btn-subcribe').html('<a class="btn btn-warning" id="subcribe"><span class="glyphicon glyphicon-plus " style="color: #fff;"></span> SUBCRIBE</a>');
      });
   });

   $('body').on('click', '.playlist', function() {
      var url  = "{{ url('/features/add_to_playlist/') }}";
      url      = url + '/' + $(this).attr('data-playlist-id') + '/' + $(this).attr('data-video-id');
      $.get( url, function( data ) {
         alert(data);
      });
   });

   var player = videojs('#myvideo');
   
   player.on('play', function () {
      $.get( "{{ route('api.features.set_look', ['video_id' => @$detail->id]) }}", function( data ) {
        $("#count_look").html(data);
      });
      $.get( "{{ route('features.set_history', ['video_id' => @$detail->id]) }}", function( data ) {
   
      });
   });
   
   var player = videojs('videojs-settings-menu-player', {
      'playbackRates': [0.5, 1, 1.5, 2],
      controlBar: {
        children: {
          'playToggle':{},
          'muteToggle':{},
          'volumeControl':{},
          'currentTimeDisplay':{},
          'timeDivider':{},
          'durationDisplay':{},
          'liveDisplay':{},
          'flexibleWidthSpacer':{},
          'progressControl':{},
   
          'settingsMenuButton': {
            entries : [
              'subtitlesButton',
              'playbackRateMenuButton'
            ]
          },
          'fullscreenToggle':{}
        }
      }
    });
</script>
@endsection