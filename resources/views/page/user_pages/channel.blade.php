@extends('layouts.default')

@section('title','Video')

@section('css')
<style type="text/css">
    .no-padding {
        padding: 0 !important;
        margin: 0 !important;
    }
</style>
    <!-- <link rel="stylesheet" type="text/css" href="https://codepen.io/jasondavis/pen/xRerWB.css"> -->
@endsection
@section('header_dashboard')
@section('content')
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
                <div class="row">
                    <div class="col-md-10">
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
                            <a href="#channel" id="channel-tab" role="tab" data-toggle="tab" aria-controls="channel" aria-expanded="true">Channel</a>
                        </li>
                    </ul>
                    </div>
                    <div class="col-md-2">
                        <ul class="nav nav-tabs pull-right" role="tablist">
                            <li role="presentation">
                                <a role="tab" style="color:#000; background:none; border-bottom:#f3f1f1 solid 2px;" aria-controls="home" aria-expanded="true">Saldo Rp {{$income}}</a>
                            </li>
                        </ul>        
                    </div>            
                </div>
                <div id="myTabContent" class="tab-content">
                    <div role="tabpanel" class="tab-pane fade active in" id="home" aria-labelledby="home-tab">
                        @if(@$channels->videos[0]->path)
                        <div class="col-md-6 agile_tv_series_grid_left">
                            <div class="w3ls_market_video_grid1">
                                <div class="video-js-responsive-container vjs-hd">
                                    <video id="myvideo"  class="video-js vjs-big-play-centered" poster="{{ url('images/'.$channels->videos[0]->image)}}" controls preload="none" width="720" height="329" poster="" data-setup='{"fluid": false}'>
                                        <source src="{{url($channels->videos[0]->path)}}" type="video/mp4">
                                        <p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
                                    </video>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 agile_tv_series_grid_right" style="color: #fff;">
                            <h3 class="fexi_header">{{ str_limit(@$channels->videos[0]->title, 45, '...') }}</h4>
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
                                    <i class="fa fa-thumbs-up"></i>&nbsp;{{@$channels->videos[0]->count_love}}&nbsp;<i class="fa fa-eye">&nbsp;{{@$channels->videos[0]->count_love}}</i>
                                    &nbsp;<i class="fa fa-comments">&nbsp;{{@$channels->videos[0]->count_comment}}</i>
                                </p>
                        </div>
                        @endif
                        <div class="row">
                            <div class="col-md-12" style="margin-top: 3%;">
                                <h4 class="latest-text w3_latest_text ml0"> Uploads</h4>
                                <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                                    <div class="w3_agile_featured_movies">
                                        <div class="container">
                                            @foreach($uploads as $data)
                                                <div class="col-md-2 w3l-movie-gride-agile">
                                                    {{--{{$data->image}}--}}
                                                    <a href="{{ url('/video-details/'.$data->id.'/'.str_slug($data->title))}}" class="hvr-shutter-out-horizontal">
                                                        @if(!empty($data->image))
                                                        <img  src="{{ url('uploads/'.$data->image)}}" title="album-name" class="img-responsive img-preview" alt=" " />
                                                        @else
                                                         <img src="{{ url('front/images/no-video.jpg')}}" title="album-name" class="img-responsive img-preview" alt=" " />
                                                        @endif
                                                        <div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
                                                    </a>
                                                    .
                                                    <div class="mid-1 agileits_w3layouts_mid_1_home">
                                                        <div class="w3l-movie-text">
                                                            <h6><a href="{{ url('/video-details/'.$data->id.'/'.str_slug($data->title))}}">{{ $data->title }}</a></h6>
                                                        </div>
                                                        <p><i class="fa fa-eye"></i>&nbsp;{{$data->count_look }}</p>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="clearfix"> </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12" style="margin-top: 3%;">
                                <h4 class="latest-text w3_latest_text ml0">Popular Uploads </h4>
                                <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                                    <div class="w3_agile_featured_movies">
                                        <div class="container">
                                            @foreach($popularUploads as $data)
                                                <div class="col-md-2 w3l-movie-gride-agile">
                                                    {{--{{$data->image}}--}}
                                                    <a href="{{ url('/video-details/'.$data->id.'/'.str_slug($data->title))}}" class="hvr-shutter-out-horizontal">
                                                        @if(!empty($data->image))
                                                        <img  src="{{ url('uploads/'.$data->image)}}" title="album-name" class="img-responsive img-preview" alt=" " />
                                                        @else
                                                        <img src="{{ url('front/images/no-video.jpg')}}" title="album-name" class="img-responsive img-preview" alt=" " />
                                                        @endif
                                                        <div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
                                                    </a>
                                                    .
                                                    <div class="mid-1 agileits_w3layouts_mid_1_home">
                                                        <div class="w3l-movie-text">
                                                            <h6><a href="{{ url('/video-details/'.$data->id.'/'.str_slug($data->title))}}">{{ $data->title }}</a></h6>
                                                        </div>
                                                        <p><i class="fa fa-eye"></i>&nbsp;{{$data->count_looks }}</p>
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
                    <div role="tabpanel" class="tab-pane fade" id="videos" aria-labelledby="videos-tab">
                        <div class="col-md-12">
                            <h4 class="latest-text w3_latest_text ml0">Your All Videos</h4><br>
                            <div class="container">
                            @foreach($videos_channels as $video)
                                <div class=" w3-agileits-news-left">
                                    <div class="col-sm-3 wthree-news-img">
                                        <a href="{{ url('/video-details/'.$data->id.'/'.str_slug($data->title))}}" class="hvr-shutter-out-horizontal">
                                            @if(!empty($video->image))
                                            <img src="{{ url('uploads/'.$video->image)}}" title="album-name" class="img-responsive img-preview"/>
                                            @else
                                            <img src="{{ url('front/images/no-video.jpg')}}" title="album-name" class="img-responsive img-preview" />
                                            @endif
                                            <div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
                                        </a>
                                    </div>
                                    <div class="col-sm-9 wthree-news-info">
                                        <h3><a href="{{ url('/video-details/'.$data->id.'/'.str_slug($data->title))}}">{{ $video->title }}</a></h3>
                                        <ul style="margin-bottom: 2%;">
                                            <li style="list-style: none; display: inline;"><i class="fa fa-clock-o" aria-hidden="true"></i> {{ date_format($video->created_at,"M d,Y") }}</li>
                                            <li style="list-style: none; display: inline;"><i class="fa fa-eye" aria-hidden="true"></i>{{ $video->count_look }}</li>
                                        </ul>
                                        <p>{{ str_limit($video->description, 150, '...') }}</p>
                                    </div>
                                    <div class="clearfix"> </div>
                                    <form method="POST" action="{{ url('user_pages/delete/'.$video->id) }}" accept-charset="UTF-8">
                                        {{ method_field('DELETE')}}
                                        {{ csrf_field() }}
                                        <div class="btn-group">
                                            <a href="{{ url('user_pages/'.$video->id.'/process') }}" class="btn btn-outline btn-circle btn-sm green"><i class="fa fa-edit"></i> Edit </a>
                                            <button type="submit"  class="btn btn-outline btn-circle btn-sm red"><i class="fa fa-trash"></i> Delete</button>
                                        </div>
                                    </form>
                                </div>
                            @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- start playlist tab -->
                    <div role="tabpanel" class="tab-pane fade" id="playlist" aria-labelledby="playlist-tab">
                        <div class="container">
                            <h4 class="latest-text w3_latest_text ml0"> Your All PlayList</h4>
                            @foreach($playlists as $playlist)
                                <div class="w3_agile_banner_bottom_grid" style="width: 97.5%">
                                    <a href="{{url('user_pages/playlist', $playlist->id)}}" class="btn btn-warning" style="margin-left: 1.7%;margin-top: -30px;">{{$playlist->name}} (Klik untuk membuka)</a><br>
                                    <div id="owl-demo" class="owl-carousel owl-theme" style="opacity: 1; display: block;">
                                        <div class="owl-wrapper-outer"><div class="owl-wrapper" style="width: 3996px; left: 0px; display: block; transition: all 800ms ease; transform: translate3d(-222px, 0px, 0px);">
                                                <!-- owl item --></div>
                                            @foreach($playlist->playlist_detail as $detail)
                                                <div class="owl-item" style="width: 222px;"><div class="item">
                                                        <div class="w3l-movie-gride-agile w3l-movie-gride-agile1">
                                                            <a href="#" class="hvr-shutter-out-horizontal">
                                                                @if(!empty($detail->video->image))
                                                                <img src="{{ url('uploads/'.$detail->video->image)}}" title="album-name" class="img-responsive img-preview" alt=" ">
                                                                @else
                                                                <img src="{{ url('front/images/no-video.jpg')}}" title="album-name" class="img-responsive img-preview" alt=" " />
                                                                @endif
                                                                <div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
                                                            </a>
                                                            <div class="mid-1 agileits_w3layouts_mid_1_home">
                                                                <div class="w3l-movie-text">
                                                                    <strong><h6><a href="#">{{$detail->video->title}}</a></h6></strong>
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

                    <div role="tabpanel" class="tab-pane fade" id="channel" aria-labelledby="channel-tab">
                        <div class="col-md-12" style="">
                            <h4 class="latest-text w3_latest_text ml0"> Your All Follow Channel</h4>
                            <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                                <div class="w3_agile_featured_movies">
                                    <div class="container">
                                        @foreach($channels->follow as $data)
                                            <div class="col-md-2 w3l-movie-gride-agile">
                                                {{--{{$data->image}}--}}
                                                <a href="{{ url('/front_channel/'.$data->to->id)}}" class="hvr-shutter-out-horizontal">
                                                    <img  src="{{ url('uploads/'.$data->to->avatar)}}" title="album-name" class="img-responsive" alt=" " />
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
@endsection
@endsection
@section('js')

@endsection

