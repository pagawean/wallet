 @extends('layouts.default') 
 @section('title','Balcony')
@section('css')
<style type="text/css">
    .look {
        float: left;
        font-size: 0.8em;
    }

    .most {
        padding-right: 0 !important;
    }

    .no-padding{
        padding: 0 !important;
    }

    .margin-top {
        margin-top: 0.5em;
    }
</style>
@endsection
@section('header_dashboard') @section('content')
<!-- banner -->
<div class="video-wrap">
    <div class="col-md-9 big-video nopadding">
        <video id="video" class="video-js vjs-big-play-centered nopadding" controls preload="none" width="720" height="500" controls>
      </video>
    </div>
    <div class="col-md-3 nopadding">
        <div class="vjs-playlist" id="style-1">

        </div>
    </div>
</div>
<!-- banner-bottom -->
<div class="container">
    
        <div class="banner-bottom">
            <div class="container">
                <div class="owl-carousel">
                    <div class="col-md-12"> 
                    @foreach($banners as $data)
                        <div class="item">
                            @if(!empty($data->image))
                            <img src="{{ url('uploads/'.@$data->image)}}" alt=" "  class="img-responsive banner">
                            @else
                            <img src="{{ url('front/images/no-video.jpg')}}" title="album-name" class="img-responsive" alt=" " />
                            @endif
                        </div>
                    @endforeach
                    </div>
                </div>

            </div>
        </div>
        <!-- //banner-bottom -->
        <div class="general">
            <h4 class="latest-text w3_latest_text pull-left">Trending</h4>
            <a href="{{ url('/trendings') }}" class="btn btn-warning">Lihat Selengkapnya</a>
            <div class="clearfix"></div>
            <div class="container">
                <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                    <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="home" aria-labelledby="home-tab">
                            <div class="w3_agile_featured_movies">
                                <div class="container">
                                    @foreach($trendings as $data)
                                    <div class="col-md-2 w3l-movie-gride-agile">
                                        

                                        <a href="{{ url('/video-details/'.$data->id.'/'.str_slug($data->title))}}" class="hvr-shutter-out-horizontal">
                                        @if(!empty($data->image))
                                        <img  src="{{ url('uploads/'.$data->image)}}" title="album-name" class="img-responsive img-preview" alt=" " />
                                        @else
                                        <img src="{{ url('front/images/no-video.jpg')}}" title="album-name" class="img-responsive img-preview" alt=" " />
                                        @endif
                                        <div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
                                     </a> .
                                         <div class="mid-1 agileits_w3layouts_mid_1_home margin-top">
                                   
                                      
                                     <div class="w3l-movie-text ">
                                                <h6><a href="{{ url('/video-details/'.$data->id.'/'.str_slug($data->title))}}">{{str_limit(@$data->title, 25, '...')}}</a></h6>
                                            </div>
                                         <br/>
                                        <div class="look">
                                                <i class="fa fa-eye"></i>&nbsp;{{@$data->count_look }}
                                                <i class="fa fa-thumbs-up"></i>&nbsp;{{@$data->count_look }}
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
            <!-- //general -->
            <!-- Latest-tv-series -->
            <div class="Latest-tv-series">
                <h4 class="latest-text w3_latest_text w3_home_popular pull-left">Most Popular Videos</h4>
                <a href="{{url('populars')}}" class="btn btn-warning">Lihat Selengkapnya</a>
                <div class="clearfix"></div>
                
                <div class="container-fluid">
                    <div class="col-md-12" style="margin-left: 0.2%; padding-right: 0 !important">
                        @if(!empty($mostPopular))
                        <div class="col-md-6 agile_tv_series_grid_left">
                            <div class="w3ls_market_video_grid1">
                                <div class="video-js-responsive-container vjs-hd">
                                    <video id="myvideo" class="video-js vjs-big-play-centered" controls preload="none" width="720" height="329" 
                                    @if(!empty($mostPopular->image))
                                    poster="{{ url('uploads/'.$mostPopular->image)}}"
                                    @else
                                    poster="{{ url('front/images/no-video.jpg')}}"
                                    @endif

                                     data-setup='{"fluid": false}'>
                                        <source src="{{url($mostPopular->path)}}" type="video/mp4">
                                   
                                        <p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
                                    </video>

                                </div>
                            </div>
                               <div class="clearfix"> </div>
                        </div>
                        
                        <div class="col-md-6 agile_tv_series_grid_right" style="color: #fff;">
                            <h4 class="fexi_header">{{ str_limit(@$mostPopular->title, 25, '...') }}</h4>
                            <p class="fexi_header_para" style="color: #fff;">
                                <span style="color: #fff">Post<label>:</label> </span>
                                <i class="fa fa-clock-o" aria-hidden="true"></i> {{ date_format(@$mostPopular->created_at,"M d, Y") }}
                            </p>
                            <p class="fexi_header_para" style="color: #fff;">
                                <span style="color: #fff">Channel<label>:</label> </span> <a href="{{ url('front_channel/'.@$mostPopular->channel->id)}}">{{ @$mostPopular->channel->channel }}</a>
                            </p>
                            <p class="fexi_header_para" style="color: #fff;">
                                <span style="color: #fff">Description<label>:</label> </span> {{ str_limit(@$mostPopular->description, 150) }}
                            </p>
                            <p class="fexi_header_para" style="color: #fff;">
                                <i class="fa fa-thumbs-up"></i>&nbsp;{{@$mostPopular->count_love}}&nbsp;<i class="fa fa-eye">&nbsp;{{$mostPopular->count_love}}</i> &nbsp;
                                <i class="fa fa-comments">&nbsp;{{@$mostPopular->count_comment}}</i>
                            </p>
                        </div>
                        @endif
                        <div class="clearfix"> </div>
                        <div class="agileinfo_flexislider_grids">
                            @foreach($otherVidios as $otherVidio )
                            <div class="col-md-2 w3l-movie-gride-agile">
                                <a href="{{ url('/video-details/'.$otherVidio->id.'/'.str_slug($otherVidio->title))}}" class="hvr-shutter-out-horizontal">
                                @if(!empty($otherVidio->image))
                                    <img src="{{ url('uploads/'.$otherVidio->image)}}" title="album-name" class="img-responsive img-preview"  alt=" " />
                                @else
                                     <img src="{{ url('front/images/no-video.jpg')}}" title="album-name" class="img-responsive img-preview" alt=" " />
                                @endif
                             <div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
                          </a>
                                 <div class="mid-1 agileits_w3layouts_mid_1_home margin-top">
                                   
                                      
                                     <div class="w3l-movie-text ">
                                                <h6><a href="{{ url('/video-details/'.$data->id.'/'.str_slug($data->title))}}">{{str_limit(@$data->title, 25, '...')}}</a></h6>
                                            </div>
                                         <br/>
                                        <div class="look">
                                                <i class="fa fa-eye"></i>&nbsp;{{@$data->count_look }}
                                                <i class="fa fa-thumbs-up"></i>&nbsp;{{@$data->count_look }}
                                        </div>
                                        
                                </div>
                            </div>
                            @endforeach
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
    </div>
</div>
    <!-- pop-up-box -->
    <script src="{{ url('front')}}/js/jquery.magnific-popup.js" type="text/javascript"></script>
    <!--//pop-up-box -->
    
    <!-- //Latest-tv-series -->
    @endsection @endsection @section('js')
    <script src="{{ url('front') }}/node_modules/video.js/dist/video.js"></script>
    <script src="{{ url('front') }}/node_modules/videojs-playlist/dist/videojs-playlist.js"></script>
    <script src="https://unpkg.com/videojs-playlist-ui@3.0.0/dist/videojs-playlist-ui.js"></script>
    <script>
        var player = videojs('video');
           player.playlist({!! @$json !!});
           
           // Initialize the playlist-ui plugin with no option (i.e. the defaults).
           player.playlistUi();
           var size = Object.keys(player.playlist()).length;
        
            player.playlist.autoadvance(0);
        
            player.on( 'ended', function() {
                if ( size == (player.playlist.currentItem() + 1)){
                    player.playlist.first();
                }
            });
    </script>
    @endsection