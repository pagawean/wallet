@extends('layouts.default')
@section('title','Video')
@section('css')
<link rel="stylesheet" type="text/css" href="{{ url('front/css/list-video.css') }}">
@endsection
@section('header_dashboard')
@section('content')
<div class="faq">

   <div class="container" >
      <div class="w3l-medile-movies-grids" >
         <!-- /movie-browse-agile -->
         <div class="movie-browse-agile">
            <!--/browse-agile-w3ls -->
            <div class="browse-agile-w3ls general-w3ls">
               <div class="tittle-head">
                  <h4 class="latest-text ml0">Playlist</h4>
                  <div class="agileits-single-top">
                     <ol class="breadcrumb">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><a href="{{ url('/') }}">Playlist</a></li>
                        <li class="active">{{$data->name}}</li>
                         <!-- <strong>Display</strong> -->

                          <!-- <div class="btn-group col-md-push-9">
                              <a href="#" id="list" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-th-list">
                              </span>List</a> <a href="#" id="grid" class="btn btn-default btn-sm"><span
                                  class="glyphicon glyphicon-th"></span>Grid</a>
                          </div> -->
                     </ol>

                  </div>
               </div>
            

               <div class="container-fluid">

                  <div class="browse-inner">

                     <div class="wthree-news-top-left">
                        <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                              <ul id="myTab" class="nav nav-tabs" role="tablist">
                                 <li role="presentation" class="active"><a href="#list" id="home1-tab" role="tab" data-toggle="tab" aria-controls="home1" aria-expanded="true"><i class="glyphicon glyphicon-th-list list-padding"></i>List</a></li>
                                 <li role="presentation"><a href="#grid" role="tab" id="w3bsd-tab" data-toggle="tab" aria-controls="w3bsd"><i class="glyphicon glyphicon-th list-padding"></i>Grid</a></li>
                              </ul>
                              <div id="myTabContent" class="tab-content">
                                 <div role="tabpanel" class="tab-pane fade in active" id="list" aria-labelledby="home1-tab">
                                 @foreach($datas as $data)
                                    <div class="col-md-12 w3-agileits-news-left" style="margin-top: 2%;">
                                       <div class="col-sm-3 wthree-news-img">
                                          <a href="{{ url('/video-details/'.@$data->id.'/'.str_slug($data->title)) }}" class="hvr-shutter-out-horizontal">
                                            @if(!empty($data->video->image))
                                            <img src="{{ url('uploads/'.@$data->video->image)}}" title="album-name" class="img-responsive img-trending" alt=" "  />
                                            @else
                                            <img src="{{ url('front/images/no-video.jpg')}}" title="album-name" class="img-responsive img-trending" alt=" " />
                                            @endif
                                                <div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
                                            </a>
                                       </div>
                                       <div class="col-sm-9 wthree-news-info">
                                          <h3><a href="{{ url('/video-details/'.@$data->video->id.'/'.str_slug($data->video->title)) }}">{{ str_limit(@$data->video->title, 25, '...') }}</a></h3>
                                          <ul style="margin-bottom: 2%;">
                                            <li><i class="fa fa-user" aria-hidden="true"></i>
                                               <a href="{{ url('front_channel/'.@$data->channel->id)}}">
                                                  {{ @$data->video->channel->channel }}
                                               </a></li>
                                             <li><i class="fa fa-clock-o" aria-hidden="true"></i>{{ date_format(@$data->video->created_at,"M d,Y") }}</http://localhost/balcony/public/user_pages/playlist/3#gridli>
                                             <li><i class="fa fa-eye" aria-hidden="true"></i> 0</li>
                                          </ul>
                                          <p>{{str_limit(@$data->video->description, 300, ' (.......)')}}</p>
                                       </div>
                                       <div class="clearfix"> </div>
                                    </div>
                              @endforeach
                              </div>
                              <div role="tabpanel" class="tab-pane fade in" id="grid" aria-labelledby="home1-tab">
                                 <div class="wthree-news-top-left">
                                    @foreach($datas as $data)
                                       <div class="col-md-4 w3-agileits-news-left">
                                          <div class="col-sm-12 wthree-news-img">
                                             <a href="{{ url('/video-details/'.@$data->id.'/'.str_slug($data->video->title)) }}">
                                              @if(!empty($data->video->image))
                                              <img src="{{ url('uploads/'.@$data->image)}}" class="img-responsive img-grid" alt="" />
                                              @else
                                              <img src="{{ url('front/images/no-video.jpg')}}" title="album-name" class="img-responsive img-grid" alt=" " />
                                              @endif
                                            </a>
                                          </div>
                                          <div class="col-sm-12 wthree-news-info grid-title">
                                             <h3><a href="{{ url('/video-details/'.@$data->video->id.'/'.str_slug($data->title)) }}"> {{ str_limit(@$data->video->title, 25, '...') }}</a></h3>
                                             <ul class="list-grid">
                                                <li><i class="fa fa-user" aria-hidden="true"></i>
                                               <a href="{{ url('front_channel/'.@$data->channel->id)}}">
                                                  {{ @$data->video->channel->channel }}
                                               </a></li>
                                                <li><i class="fa fa-clock-o" aria-hidden="true"></i> {{ date_format(@$data->video->created_at,"M d,Y") }}</li>
                                                <li><i class="fa fa-eye" aria-hidden="true"></i>  2642</li>
                                             </ul>
                                             
                                          </div>
                                          <div class="clearfix"> </div>
                                       </div>
                                    @endforeach
                                 <div class="clearfix"> </div>
                              </div>
                              </div>
                           </div>
                        </div>
                     <div class="clearfix"> </div>
                  </div>
               </div>
            </div>
         <!--//browse-agile-w3ls -->
         <div class="blog-pagenat-wthree">
            {{ @$datas->links() }}
         </div>
      </div>
      <!-- //movie-browse-agile -->
      <!--body wrapper start-->
   </div>
</div>
</div>
<!-- //w3l-medile-movies-grids -->
</div>

@endsection
@endsection
@section('js')

@endsection