@extends('layouts.default')
@section('title','Video')
@section('css')
@endsection
@section('header_dashboard')
@section('content')
<div class="general_social_icons">
   <!-- <nav class="social">
      <ul>
         <li class="w3_twitter"><a href="#">Twitter <i class="fa fa-twitter"></i></a></li>
         <li class="w3_facebook"><a href="#">Facebook <i class="fa fa-facebook"></i></a></li>
         <li class="w3_dribbble"><a href="#">Dribbble <i class="fa fa-dribbble"></i></a></li>
         <li class="w3_g_plus"><a href="#">Google+ <i class="fa fa-google-plus"></i></a></li>
      </ul>
   </nav> -->
<div class="container">
   <div class="general-agileits-w3l" >
      <div class="w3l-medile-movies-grids" >
         <!-- /movie-browse-agile -->
         <div class="movie-browse-agile">
            <!--/browse-agile-w3ls -->
            <div class="browse-agile-w3ls general-w3ls">
               <div class="tittle-head">
                  <h4 class="latest-text ml0">Search</h4>
                  <div class="agileits-single-top">
                     <ol class="breadcrumb">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li class="active">Search</li>
                     </ol>
                  </div>
               </div>

               <div class="browse-inner">
                  <div class="wthree-news-top-left">
                     @foreach($trendings as $trending)
                        <div class="col-md-12 w3-agileits-news-left" style="margin-top: 2%;">
                           <div class="col-sm-3 wthree-news-img">
                              <a href="{{ url('/video-details/'.$trending->id.'/'.str_slug($trending->title)) }}" class="hvr-shutter-out-horizontal">
                                 @if(!empty($trending->image))
                                 <img src="{{ url('uploads/'.$trending->image)}}" title="album-name" class="img-responsive img-trending" alt=" "  />
                                 @else
                                  <img src="{{ url('front/images/no-video.jpg')}}" title="album-name" class="img-responsive img-trending" alt=" " />
                                  @endif
                                    <div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
                                </a>
                           </div>
                           <div class="col-sm-9 wthree-news-info">
                              <h3><a href="{{ url('/video-details/'.$trending->id.'/'.str_slug($trending->title)) }}">{{ str_limit($trending->title,25,'...') }}</a></h3>
                              <ul style="margin-bottom: 2%;">
                                <li style="list-style: none; display: inline;"><i class="fa fa-user" aria-hidden="true"></i>
                                   <a href="{{ url('front_channel/'.$trending->channel->id)}}">
                                      {{ $trending->channel->channel }}
                                   </a></li>
                                 <li style="list-style: none; display: inline;"><i class="fa fa-clock-o" aria-hidden="true"></i>{{ date_format($trending->created_at,"M d,Y") }}</li>
                                 <li style="list-style: none; display: inline;"><i class="fa fa-eye" aria-hidden="true"></i> 0</li>
                              </ul>
                              <p>{{ str_limit($trending->description, 100, '...') }}</p>
                           </div>
                           <div class="clearfix"> </div>
                        </div>
                     @endforeach
                     <div class="clearfix"> </div>
                  </div>
               </div>
         <!--//browse-agile-w3ls -->
         <div class="blog-pagenat-wthree">
            {{ $trendings->links() }}
         </div>
      </div>
      <!-- //movie-browse-agile -->
      <!--body wrapper start-->
   </div>
</div>
</div>
</div>
<!-- //w3l-medile-movies-grids -->
</div>

@endsection
@endsection
@section('js')
@endsection