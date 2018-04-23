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
                  <h4 class="latest-text ml0">History</h4>
                  <div class="agileits-single-top">
                     <ol class="breadcrumb">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li class="active">History</li>
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
                                 <li role="presentation" class=" active"><a href="#list" id="home1-tab" role="tab" data-toggle="tab" aria-controls="home1" aria-expanded="true"><i class="glyphicon glyphicon-th-list list-padding"></i>List</a></li>
                                 <li role="presentation"><a href="#grid" role="tab" id="w3bsd-tab" data-toggle="tab" aria-controls="w3bsd"><i class="glyphicon glyphicon-th list-padding"></i>Grid</a></li>
                              </ul>
                              <div id="myTabContent" class="tab-content">
                                 <div role="tabpanel" class="tab-pane fade in active" id="list" aria-labelledby="home1-tab">
                                 @foreach($histories as $history)
                                    <div class="w3-agileits-news-left">
                                       <div class="col-sm-3 wthree-news-img">
                                          <a href="{{ url('/video-details/'.@$history->video->id.'/'.str_slug(@$history->video->title)) }}" class="hvr-shutter-out-horizontal">
                                              @if(!empty($history->video->image))
                                            <img src="{{ url('uploads/'.@$history->video->image)}}" title="album-name" class="img-responsive img-trending" alt=" "  />
                                            @else
                                            <img src="{{ url('front/images/no-video.jpg')}}" title="album-name" class="img-responsive img-trending" alt=" "  />
                                            @endif
                                                <div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
                                            </a>
                                       </div>
                                       <div class="col-sm-9 wthree-news-info">
                                          <h3><a href="{{ url('/video-details/'.@$history->video->id.'/'.str_slug(@$history->video->title)) }}">{{ str_limit(@$history->video->title, 25, '...') }}</a></h3>
                                          <ul style="margin-bottom: 2%;">
                                            <li><i class="fa fa-user" aria-hidden="true"></i>
                                               <a href="{{ url('front_channel/'.@$history->video->id)}}">
                                                  {{ @$history->video->channel->channel }}
                                               </a></li>
                                             <li><i class="fa fa-clock-o" aria-hidden="true"></i>{{ date_format(@$history->created_at,"M d,Y") }}</li>
                                             <li><i class="fa fa-eye" aria-hidden="true"></i> 0</li>
                                          </ul>
                                          <p>{{str_limit(@$history->video->description, 300, ' (.......)')}}</p>
                                       </div>
                                       <div class="clearfix"> </div>
                                    </div>
                              @endforeach
                              </div>
                              <div role="tabpanel" class="tab-pane fade in" id="grid" aria-labelledby="home1-tab">
                                 <div class="wthree-news-top-left">
                                    @foreach($histories as $history)
                                       <div class="col-md-4 w3-agileits-news-left">
                                          <div class="col-sm-12 wthree-news-img">
                                             <a href="{{ url('/video-details/'.@$history->video->id.'/'.str_slug(@$history->video->title)) }}">
                                                @if(!empty($history->video->image))
                                               <img src="{{ url('uploads/'.@$history->video->image)}}" class="img-responsive img-grid" alt="" />
                                               @else
                                               <img src="{{ url('front/images/no-video.jpg')}}" title="album-name" class="img-responsive img-grid" alt=" " />
                                              @endif
                                            </a>
                                          </div>
                                          <div class="col-sm-12 wthree-news-info grid-title">
                                             <h3><a href="{{ url('/video-details/'.@$history->video->id.'/'.str_slug(@$history->video->title)) }}"> {{ str_limit(@$history->video->title, 25, '...') }}</a></h3>
                                             <ul class="list-grid">
                                                <li><i class="fa fa-user" aria-hidden="true"></i>
                                               <a href="{{ url('front_channel/'.@$history->video->id)}}">
                                                  {{ @$history->channel }}
                                               </a></li>
                                                <li><i class="fa fa-clock-o" aria-hidden="true"></i> {{ date_format(@$history->created_at,"M d,Y") }}</li>
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
            {{ @$histories->links() }}
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