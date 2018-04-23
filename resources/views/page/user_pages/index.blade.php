@extends('layouts.default')
@section('title','Balcony')
@section('css')
<link href="{{ url('front') }}/node_modules/video.js/dist/video-js.css" rel="stylesheet">
<link href="{{ url('front/css') }}/videojs-playlist-ui.vertical.css" rel="stylesheet">
<link href="{{ url('front/css') }}/video-playlist.css" rel="stylesheet">
@endsection
@section('header_dashboard')
@section('content')
<!-- banner -->
<div class="container-fluid">
   <div class="col-md-9">
      <video  
         id="video"
         class="video-js vjs-big-play-centered"
         controls preload="none" width="720" height="400" poster="{{url('front')}}/uploads/image.jpg"
         controls>
         <source src="https://vjs.zencdn.net/v/oceans.mp4" type="video/mp4">
         <source src="https://vjs.zencdn.net/v/oceans.webm" type="video/webm">
      </video>
   </div>
   <div class="col-md-3" style="margin-top: 2%;">
      <div class="vjs-playlist" id="style-1">
         <!--
            The contents of this element will be filled based on the
            currently loaded playlist
            -->
      </div>
   </div>
</div>
<div class="general">
   <h4 class="latest-text w3_latest_text">Trending</h4>
   <div class="container">
      <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
         <div id="myTabContent" class="tab-content">
            <div role="tabpanel" class="tab-pane fade active in" id="home" aria-labelledby="home-tab">
               <div class="w3_agile_featured_movies">
                <div class="container">
                  @foreach($trendings as $data)
                  <div class="col-md-2 w3l-movie-gride-agile">
                     {{--{{$data->image}}--}}
                     <a href="{{ url('/video-details')}}" class="hvr-shutter-out-horizontal">
                        @if(!empty($data->image))
                        <img  src="{{ url('uploads/'.$data->image)}}" title="album-name" class="img-responsive" alt=" " />
                        @else
                        <img src="{{ url('front/images/no-video.jpg')}}" title="album-name" class="img-responsive" alt=" " />
                        @endif
                        <div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
                     </a>
                     .
                     <div class="mid-1 agileits_w3layouts_mid_1_home">
                        <div class="w3l-movie-text">
                           <h6><a href="{{ url('/video-details')}}">{{ $data->title }}</a></h6>
                        </div>
                        <p><i class="fa fa-eye"></i>&nbsp;0</p>
                     </div>
                  </div>
                  @endforeach
                </div>
                  <div class="clearfix"> </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- //general -->
   <!-- Latest-tv-series -->
   <div class="Latest-tv-series">
      <h4 class="latest-text w3_latest_text w3_home_popular">Most Popular Videos</h4>
      <div class="container">
         <div class="col-md-12" style="margin-left: 0.5%;">
            <div class="col-md-6 agile_tv_series_grid_left">
               <div class="w3ls_market_video_grid1">
                  <div class="video-js-responsive-container vjs-hd">
                     <video id="myvideo"  class="video-js vjs-big-play-centered" controls preload="none" width="720" height="360" 
                     poster="{{url('front')}}/uploads/image.jpg" data-setup='{"fluid": true}'>
                        <source src="https://vjs.zencdn.net/v/oceans.mp4" type="video/mp4">
                        <source src="https://vjs.zencdn.net/v/oceans.webm" type="video/webm">
                        <source src="https://vjs.zencdn.net/v/oceans.ogv" type="video/ogg">
                        <p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
                     </video>
                  </div>
               </div>
            </div>
            <div class="col-md-6 agile_tv_series_grid_right" style="height: 80%;">
               <p class="fexi_header">the conjuring 2</p>
               <p class="fexi_header_para"><span class="conjuring_w3">Story Line<label>:</label></span> 720p,Bluray HD Free Movie Downloads, Watch Free Movies Online with high speed Free Movie Streaming | MyDownloadTube Lorraine and Ed Warren go to north London to help a single...</p>
               <p class="fexi_header_para"><span>Date of Release<label>:</label></span> Jun 10, 2016 </p>
               <p class="fexi_header_para">
                  <span>Genres<label>:</label> </span>
                  <a href="genres.html">Drama</a> |
                  <a href="genres.html">Adventure</a> |
                  <a href="genres.html">Family</a>
               </p>
               <p class="fexi_header_para fexi_header_para1"><span>Star Rating<label>:</label></span>
                  <a href="#"><i class="fa fa-star" aria-hidden="true"></i></a>
                  <a href="#"><i class="fa fa-star" aria-hidden="true"></i></a>
                  <a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a>
                  <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                  <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
               </p>
            </div>
            <div class="clearfix"> </div>
            <div class="agileinfo_flexislider_grids">
               <div class="col-md-2 w3l-movie-gride-agile">
                  <a href="{{ url('/video-details')}}" class="hvr-shutter-out-horizontal">
                     <img src="{{ url('front')}}/uploads/image.jpg" title="album-name" class="img-responsive" alt=" " />
                     <div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
                  </a>
                  <div class="mid-1 agileits_w3layouts_mid_1_home">
                     <div class="w3l-movie-text">
                        <h6><a href="{{ url('/video-details')}}">Assassin's Creed 3</a></h6>
                     </div>
                     <p><i class="fa fa-eye"></i>&nbsp;207k</p>
                  </div>
               </div>
               <div class="col-md-2 w3l-movie-gride-agile">
                  <a href="{{ url('/video-details')}}" class="hvr-shutter-out-horizontal">
                     <img src="{{ url('front')}}/uploads/image.jpg" title="album-name" class="img-responsive" alt=" " />
                     <div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
                  </a>
                  <div class="mid-1 agileits_w3layouts_mid_1_home">
                     <div class="w3l-movie-text">
                        <h6><a href="{{ url('/video-details')}}">Bad Moms</a></h6>
                     </div>
                     <p><i class="fa fa-eye"></i>&nbsp;207k</p>
                  </div>
               </div>
               <div class="col-md-2 w3l-movie-gride-agile">
                  <a href="{{ url('/video-details')}}" class="hvr-shutter-out-horizontal">
                     <img src="{{ url('front')}}/uploads/image.jpg" title="album-name" class="img-responsive" alt=" " />
                     <div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
                  </a>
                  <div class="mid-1 agileits_w3layouts_mid_1_home">
                     <div class="w3l-movie-text">
                        <h6><a href="{{ url('/video-details')}}">Central Intelligence</a></h6>
                     </div>
                     <p><i class="fa fa-eye"></i>&nbsp;207k</p>
                  </div>
               </div>
               <div class="col-md-2 w3l-movie-gride-agile">
                  <a href="{{ url('/video-details')}}" class="hvr-shutter-out-horizontal">
                     <img src="{{ url('front')}}/uploads/image.jpg" title="album-name" class="img-responsive" alt=" " />
                     <div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
                  </a>
                  <div class="mid-1 agileits_w3layouts_mid_1_home">
                     <div class="w3l-movie-text">
                        <h6><a href="{{ url('/video-details')}}">Light B/t Oceans</a></h6>
                     </div>
                     <p><i class="fa fa-eye"></i>&nbsp;207k</p>
                  </div>
               </div>
               <div class="col-md-2 w3l-movie-gride-agile">
                  <a href="{{ url('/video-details')}}" class="hvr-shutter-out-horizontal">
                     <img src="{{ url('front')}}/uploads/image.jpg" title="album-name" class="img-responsive" alt=" " />
                     <div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
                  </a>
                  <div class="mid-1 agileits_w3layouts_mid_1_home">
                     <div class="w3l-movie-text">
                        <h6><a href="{{ url('/video-details')}}">X-Men</a></h6>
                     </div>
                     <p><i class="fa fa-eye"></i>&nbsp;207k</p>
                  </div>
               </div>
               <div class="col-md-2 w3l-movie-gride-agile">
                  <a href="{{ url('/video-details')}}" class="hvr-shutter-out-horizontal">
                     <img src="{{ url('front')}}/uploads/image.jpg" title="album-name" class="img-responsive" alt=" " />
                     <div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
                  </a>
                  <div class="mid-1 agileits_w3layouts_mid_1_home">
                     <div class="w3l-movie-text">
                        <h6><a href="{{ url('/video-details')}}">Peter</a></h6>
                     </div>
                     <p><i class="fa fa-eye"></i>&nbsp;207k</p>
                  </div>
               </div>
               <div class="clearfix"> </div>
            </div>
         </div>
         <!-- flexSlider -->
         <link rel="stylesheet" href="{{ url('front')}}/css/flexslider.css" type="text/css" media="screen" property="" />
         <script defer src="{{ url('front')}}/js/jquery.flexslider.js"></script>
         <script type="text/javascript">
            $(window).load(function(){
            	$('.flexslider').flexslider({
            		animation: "slide",
            		start: function(slider){
            			$('body').removeClass('loading');
            		}
            	});
            });
         </script>
         <!-- //flexSlider -->
      </div>
   </div>
</div>
<!-- pop-up-box -->
<script src="{{ url('front')}}/js/jquery.magnific-popup.js" type="text/javascript"></script>
<!--//pop-up-box -->
<div id="small-dialog" class="mfp-hide">
   <iframe src="https://player.vimeo.com/video/164819130?title=0&byline=0"></iframe>
</div>
<div id="small-dialog1" class="mfp-hide">
   <iframe src="https://player.vimeo.com/video/148284736"></iframe>
</div>
<div id="small-dialog2" class="mfp-hide">
   <iframe src="https://player.vimeo.com/video/165197924?color=ffffff&title=0&byline=0&portrait=0"></iframe>
</div>
<!-- //Latest-tv-series -->
@endsection
@endsection
@section('js')
<script src="{{ url('front') }}/node_modules/video.js/dist/video.js"></script>
<script src="{{ url('front') }}/node_modules/videojs-playlist/dist/videojs-playlist.js"></script>
<script src="https://unpkg.com/videojs-playlist-ui@3.0.0/dist/videojs-playlist-ui.js"></script>
<script>
   var player = videojs('video');
   var url = {!! json_encode(url('/front/test/example/oceans.jpg')) !!}
   console.log(url);
   player.playlist([{
     name: 'Disney\'s Oceans 1',
     description: 'Explore the depths of our planet\'s oceans. ' +
       'Experience the stories that connect their world to ours. ' +
       'Lorem ipsum dolor sit amet, consectetur adipiscing elit, ' +
       'sed do eiusmod tempor incididunt ut labore et dolore magna ' +
       'aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco ' +
       'laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure ' +
       'dolor in reprehenderit in voluptate velit esse cillum dolore eu ' +
       'fugiat nulla pariatur. Excepteur sint occaecat cupidatat non ' +
       'proident, sunt in culpa qui officia deserunt mollit anim id est ' +
       'laborum.',
     duration: 45,
     sources: [
       { src: 'https://vjs.zencdn.net/v/oceans.mp4', type: 'video/mp4' },
       { src: 'https://vjs.zencdn.net/v/oceans.webm', type: 'video/webm' },
     ],
   
     // you can use <picture> syntax to display responsive uploads
     thumbnail: [
       {
         srcset: url,
         type: 'image/jpeg',
         media: '(min-with: 400px;)'
       },
       {
         src: url
       }
     ]
   },
   {
     name: 'Disney\'s Oceans 2',
     description: 'Explore the depths of our planet\'s oceans. ' +
       'Experience the stories that connect their world to ours. ' +
       'Lorem ipsum dolor sit amet, consectetur adipiscing elit, ' +
       'sed do eiusmod tempor incididunt ut labore et dolore magna ' +
       'aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco ' +
       'laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure ' +
       'dolor in reprehenderit in voluptate velit esse cillum dolore eu ' +
       'fugiat nulla pariatur. Excepteur sint occaecat cupidatat non ' +
       'proident, sunt in culpa qui officia deserunt mollit anim id est ' +
       'laborum.',
     duration: 45,
     sources: [
       { src: 'https://vjs.zencdn.net/v/oceans.mp4?2', type: 'video/mp4' },
       { src: 'https://vjs.zencdn.net/v/oceans.webm?2', type: 'video/webm' },
     ],
   
     // you can use <picture> syntax to display responsive uploads
     thumbnail: [
       {
         srcset: url,
         type: 'image/jpeg',
         media: '(min-width: 400px;)'
       },
       {
         src: url
       }
     ]
   },
   {
     name: 'Disney\'s Oceans 3',
     description: 'Explore the depths of our planet\'s oceans. ' +
       'Experience the stories that connect their world to ours. ' +
       'Lorem ipsum dolor sit amet, consectetur adipiscing elit, ' +
       'sed do eiusmod tempor incididunt ut labore et dolore magna ' +
       'aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco ' +
       'laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure ' +
       'dolor in reprehenderit in voluptate velit esse cillum dolore eu ' +
       'fugiat nulla pariatur. Excepteur sint occaecat cupidatat non ' +
       'proident, sunt in culpa qui officia deserunt mollit anim id est ' +
       'laborum.',
     duration: 45,
     sources: [
       { src: 'https://vjs.zencdn.net/v/oceans.mp4?3', type: 'video/mp4' },
       { src: 'https://vjs.zencdn.net/v/oceans.webm?3', type: 'video/webm' },
     ],
   
     // you can use <picture> syntax to display responsive uploads
     thumbnail: [
       {
         srcset: url,
         type: 'image/jpeg',
         media: '(min-width: 400px;)'
       },
       {
         src: url
       }
     ]
   },
   
   {
     name: 'Disney\'s Oceans 3',
     description: 'Explore the depths of our planet\'s oceans. ' +
       'Experience the stories that connect their world to ours. ' +
       'Lorem ipsum dolor sit amet, consectetur adipiscing elit, ' +
       'sed do eiusmod tempor incididunt ut labore et dolore magna ' +
       'aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco ' +
       'laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure ' +
       'dolor in reprehenderit in voluptate velit esse cillum dolore eu ' +
       'fugiat nulla pariatur. Excepteur sint occaecat cupidatat non ' +
       'proident, sunt in culpa qui officia deserunt mollit anim id est ' +
       'laborum.',
     duration: 45,
     sources: [
       { src: 'https://vjs.zencdn.net/v/oceans.mp4?3', type: 'video/mp4' },
       { src: 'https://vjs.zencdn.net/v/oceans.webm?3', type: 'video/webm' },
     ],
   
     // you can use <picture> syntax to display responsive uploads
     thumbnail: [
       {
         srcset: url,
         type: 'image/jpeg',
         media: '(min-width: 400px;)'
       },
       {
         src: url
       }
     ]
   },
   
    ]);
   
   // Initialize the playlist-ui plugin with no option (i.e. the defaults).
   player.playlistUi();
</script>
@endsection