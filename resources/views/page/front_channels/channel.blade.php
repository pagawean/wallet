@extends('layouts.default')
@section('title','Video')
@section('css')
<!-- <link rel="stylesheet" type="text/css" href="https://codepen.io/jasondavis/pen/xRerWB.css"> -->
@endsection @section('header_dashboard') @section('content')

<div class="container mt20">
        <div class="row space-profil">
            <div class="col-md-2 ">
                <div class="row">
                    <div class="col-md-12 no-padding">
                        <div class="userpic-profile no-padding">
                            @if(!empty($channels->avatar))
                                <img src="{{ $channels->avatar }}" alt="" class="img-responsive" />
                            @else
                                <img src="{{url('front/images/default.jpg')}}" alt=" "  class="img-responsive">
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 no-padding">
                        <div class="profile-usertitle">
                            <div class="profile-usertitle-name">
                                {{ $channels->channel }}
                            </div>
                            <div class="profile-usertitle-job">
                                {{ $channels->count_subcribe }} Subcriber
                            </div>
                             <div class="profile-usertitle-job btn-subcribe">
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
            <div class="col-md-10">
                <div class="picture-profile">
                    @if(!empty($channels->image))
                    <img src="{{url('uploads/'.$channels->image)}}" alt=" "  class="img-responsive banner">
                    @else
                    <img src="{{url('front/images/no_image.jpg')}}" alt=" "  class="img-responsive banner">
                    @endif
                </div>
            </div>
             <div class="clearfix"></div>
        </div>

    <div class="row">
        <div class="col-md-12">
            <hr class="hr">
            <ul id="myTab" class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active">
                    <a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Home</a>
                </li>
                <li role="presentation">
                    <a href="#videos" id="videos-tab" role="tab" data-toggle="tab" aria-controls="videos" aria-expanded="true">Videos</a>
                </li>
                <li role="presentation">
                    <a href="#playlist" id="playlist-tab" role="tab" data-toggle="tab" aria-controls="playlist" aria-expanded="true">Playlist</a>
                </li>
                <li role="presentation">
                    <a href="#abouts" id="channel-tab" role="tab" data-toggle="tab" aria-controls="profile" aria-expanded="true">Profile</a>
                </li>
                <li role="presentation">
                    <a href="#channel" id="channel-tab" role="tab" data-toggle="tab" aria-controls="channel" aria-expanded="true">Channel</a>
                </li>
            </ul>
            <div id="myTabContent" class="tab-content">
                <div role="tabpanel" class="tab-pane fade active in" id="home" aria-labelledby="home-tab">
                    @if( !empty($channels->videos))
                    <div>
                          <div class="col-md-6 agile_tv_series_grid_left">
                              <div class="w3ls_market_video_grid1">
                                  <div class="video-js-responsive-container vjs-hd">
                                      <video id="myvideo" class="video-js vjs-big-play-centered" 
                                      @if(!empty($channels->videos[0]->image))
                                      poster="{{ url('uploads/'.@$channels->videos[0]->image)}}"
                                      @else
                                      poster="{{ url('front/images/no-video.jpg')}}"
                                      @endif
                                       controls preload="none" width="720" height="329" poster="" data-setup='{"fluid": false}'>
                                      <source src="{{url(@$channels->videos[0]->path)}}" type="video/mp4">
                                      <p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
                                      </video>
                                  </div>
                              </div>
                          </div>
                          <div class="col-md-6 agile_tv_series_grid_right" style="color: #fff;">
                              <h4 class="fexi_header">{{ @$channels->videos[0]->title }}</h4>
                                  <p class="fexi_header_para" style="color: #fff;">
                                      <span style="color: #fff">Post<label>:</label> </span>
                                      <i class="fa fa-clock-o" aria-hidden="true"></i> {{ date_format(@$channels->videos[0]->created_at,"M d, Y") }}
                                  </p>
                                  <p class="fexi_header_para" style="color: #fff;">
                                      <span style="color: #fff">Channel<label>:</label> </span> {{ @$channels->videos[0]->channel->channel }}
                                  </p>
                                  <p class="fexi_header_para" style="color: #fff;">
                                      <span style="color: #fff">Description<label>:</label> </span> {{ str_limit(@$channels->videos[0]->description, 150) }}
                                  </p>
                                  <p class="fexi_header_para" style="color: #fff;">
                                      <i class="fa fa-thumbs-up"></i>&nbsp;{{@$channels->videos[0]->count_love}}&nbsp;<i class="fa fa-eye">&nbsp;{{$channels->videos[0]->count_love}}</i> &nbsp;
                                      <i class="fa fa-comments">&nbsp;{{@$channels->videos[0]->count_comment}}</i>
                                  </p>
                          </div>
                        <div class="clearfix"></div>
                    </div>
                    @endif
                    <div class="row">
                        <div class="col-md-12" style="margin-top: 3%;">
                            <h4 class="latest-text w3_latest_text ml0"> Uploads</h4>
                            @if(!empty($uploads))
                            <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                                <div class="w3_agile_featured_movies">
                                    <div class="container">
                                        @foreach($uploads as $data)
                                        <div class="col-md-2 w3l-movie-gride-agile">
                                            {{--{{$data->image}}--}}
                                            <a href="{{ url('/video-details/'.@$data->id.'/'.str_slug($data->title))}}" class="hvr-shutter-out-horizontal">
                                              @if(!empty($data->image))
                                             <img  src="{{ url('uploads/'.@$data->image)}}" title="album-name" class="img-responsive img-preview" alt=" " />
                                              @else
                                              <img src="{{ url('front/images/no-video.jpg')}}" title="album-name" class="img-responsive img-preview" alt=" " />
                                              @endif
                                         <div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
                                     </a> .
                                            <div class="mid-1 agileits_w3layouts_mid_1_home">
                                                <div class="w3l-movie-text">
                                                    <h6><a href="{{ url('/video-details/'.@$data->id.'/'.str_slug($data->title))}}">{{ @$data->title }}</a></h6>
                                                </div>
                                                <p><i class="fa fa-eye"></i>&nbsp;{{@$data->count_look }}</p>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="col-md-12" style="margin-top: 3%;">
                            <h4 class="latest-text w3_latest_text ml0">Popular Uploads </h4>
                            @if(!empty($popularUploads))
                            <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                                <div class="w3_agile_featured_movies">
                                    <div class="container">
                                        @foreach($popularUploads as $data)
                                        <div class="col-md-2 w3l-movie-gride-agile">
                                            {{--{{$data->image}}--}}
                                            <a href="{{ url('/video-details/'.@$data->id.'/'.str_slug($data->title))}}" class="hvr-shutter-out-horizontal">
                                              @if(!empty($data->image))
                                             <img  src="{{ url('uploads/'.@$data->image)}}" title="album-name" class="img-responsive img-preview" alt=" " />
                                             @else
                                              <img src="{{ url('front/images/no-video.jpg')}}" title="album-name" class="img-responsive img-preview" alt=" " />
                                              @endif
                                            <div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
                                        </a> .
                                            <div class="mid-1 agileits_w3layouts_mid_1_home">
                                                <div class="w3l-movie-text">
                                                    <h6><a href="{{ url('/video-details/'.@$data->id.'/'.str_slug($data->title))}}">{{ @$data->title }}</a></h6>
                                                </div>
                                                <p><i class="fa fa-eye"></i>&nbsp;{{@$data->count_looks }}</p>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="videos" aria-labelledby="videos-tab">
                    <div class="col-md-12" style="margin-left: -1%;">
                        @foreach($videos_channels as $video)
                        <div class="col-md-2 w3l-movie-gride-agile">
                            <a href="{{ url('/video-details/'.@$video->id.'/'.str_slug(@$video->title))}}" class="hvr-shutter-out-horizontal">
                              @if(!empty($video->image))
                              <img  src="{{ url('uploads/'.@$video->image)}}" title="album-name" class="img-responsive img-preview" alt=" " />
                              @else
                               <img src="{{ url('front/images/no-video.jpg')}}" title="album-name" class="img-responsive img-preview" alt=" " />
                               @endif
                              <div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
                           </a>
                            <div class="mid-1 agileits_w3layouts_mid_1_home">
                                <div class="w3l-movie-text">
                                    <h6><a href="{{ url('/video-details/'.@$video->id.'/'.str_slug(@$video->title))}}">{{ @$video->title }}</a></h6>
                                </div>
                                <p><i class="fa fa-eye"></i>&nbsp;0</p>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
                <!-- start playlist tab -->
                <div role="tabpanel" class="tab-pane fade" id="playlist" aria-labelledby="playlist-tab">
                        <div class="container">
                            <h4 class="latest-text w3_latest_text ml0"> All PlayList</h4>
                            @foreach($playlists as $playlist)
                                <div class="w3_agile_banner_bottom_grid" style="width: 97.5%">
                                    <a href="" style="color: #888;"><h4 style="margin-left: 1.5%">{{$playlist->name}}</h4></a><br>
                                    <div id="owl-demo" class="owl-carousel owl-theme" style="opacity: 1; display: block;">
                                        <div class="owl-wrapper-outer"><div class="owl-wrapper" style="width: 3996px; left: 0px; display: block; transition: all 800ms ease; transform: translate3d(-222px, 0px, 0px);">
                                                <!-- owl item --></div>
                                            @foreach($playlist->playlist_detail as $detail)
                                                <div class="owl-item" style="width: 222px;"><div class="item">
                                                        <div class="w3l-movie-gride-agile w3l-movie-gride-agile1">
                                                            <a href="" class="hvr-shutter-out-horizontal">
                                                              @if(!empty($detail->video->image))
                                                              <img src="{{ url('images/'.$detail->video->image)}}" title="album-name" class="img-responsive img-preview" alt=" ">
                                                              @else
                                                               <img src="{{ url('front/images/no-video.jpg')}}" title="album-name" class="img-responsive img-preview" alt=" " />
                                                               @endif
                                                                <div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
                                                            </a>
                                                            <div class="mid-1 agileits_w3layouts_mid_1_home">
                                                                <div class="w3l-movie-text">
                                                                    <strong><h6><a href="http://localhost/balconi/public/video-details">{{$detail->video->title}}</a></h6></strong>
                                                                </div>
                                                                <div class="mid-2 agile_mid_2_home">
                                                                    <small>{{$detail->video->created_at->diffForHumans()}}</small>
                                                                    <div class="block-stars">
                                                                        <ul class="w3l-ratings">
                                                                            <li><a href="#"><i class="fa fa-thumbs-up" aria-hidden="true">&nbsp;{{$detail->video->count_love}}</i></a></li>&nbsp;
                                                                            <li><a href="#"><i class="fa fa-eye" aria-hidden="true">&nbsp;{{$detail->video->count_look}}</i></a></li>&nbsp;
                                                                            <li><a href="#"><i class="fa fa-comments" aria-hidden="true">&nbsp;{{$detail->video->count_comment}}</i></a></li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="clearfix"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        @endforeach
                                        <!-- end owl item -->
                                        </div>
                                        <div class="owl-controls clickable"><div class="owl-pagination"><div class="owl-page active"><span class=""></span></div><div class="owl-page"><span class=""></span></div></div></div></div>
                                </div>
                                <br>
                            @endforeach
                            {{ $playlists->links() }}
                        </div>
                    </div>

                <div role="tabpanel" class="tab-pane fade" id="abouts" aria-labelledby="channel-tab">
                    <div class="col-md-12" style="margin-left: -1.5%;">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-2">Name</div>
                                    <div class="col-md-10">{{ @$channels->name }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">Channel</div>
                                    <div class="col-md-10">{{ @$channels->channel }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">Email</div>
                                    <div class="col-md-10">{{ @$channels->email }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">Gender</div>
                                    <div class="col-md-10">{{ @$channels->gender }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">Phone</div>
                                    <div class="col-md-10">{{ @$channels->phone_number }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="channel" aria-labelledby="channel-tab">
                    <div class="col-md-12" style="">
                        <h4 class="latest-text w3_latest_text ml0"> All Follow Channel</h4>
                        <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                            <div class="w3_agile_featured_movies">
                                <div class="container">
                                    @foreach($channels->follow as $data)
                                        <div class="col-md-2 w3l-movie-gride-agile">
                                            {{--{{$data->image}}--}}
                                            <a href="{{ url('/front_channel/'.$data->to->id)}}" class="hvr-shutter-out-horizontal">
                                                <img  src="{{ $data->to->avatar }}" title="album-name" class="img-responsive" alt=" " />
                                                <div class="w3l-action-icon"></div>
                                            </a>
                                            <div class="mid-1 agileits_w3layouts_mid_1_home">
                                                <div class="w3l-movie-text">
                                                    <h6><a href="{{ url('/front_channel/'.$data->to->id)}}">{{ $data->to->channel}}</a></h6>
                                                </div>
                                            </div>
                                            <div class="mid-1 agileits_w3layouts_mid_1_home">
                                                <div class="w3l-movie-text">
                                                    <h6>{{ $data->to->count_subcribe}} Subriber</h6>
                                                </div>
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
        </div>
    </div>

</div>

<br> @endsection @endsection 
@section('js')
<script>

$('body').on('click', '#subcribe', function() {
      $.get( "{{ route('features.set_subcribe', ['channel_id' => @$channels->id]) }}", function( data ) {
         $('.btn-subcribe').html('<a class="btn btn-danger" id="disubcribe"><span class="glyphicon glyphicon-remove " style="color: #fff;"></span>DISUBCRIBE</a>');
      });
   });

   $('body').on('click', '#disubcribe', function() {
      $.get( "{{ route('features.set_disubcribe', ['channel_id' => @$channels->id]) }}", function( data ) {
         $('.btn-subcribe').html('<a class="btn btn-warning" id="subcribe"><span class="glyphicon glyphicon-plus " style="color: #fff;"></span> SUBCRIBE</a>');
      });
   });
</script>
@endsection