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
   <div class="general-agileits-w3l" >
      <div class="w3l-medile-movies-grids" >
         <!-- /movie-browse-agile -->
         <div class="movie-browse-agile">
            <!--/browse-agile-w3ls -->
            <div class="browse-agile-w3ls general-w3ls">
               <div class="tittle-head">
                  <h4 class="latest-text">Newest Films Channel</h4>
                  <div class="container">
                     <div class="agileits-single-top">
                        <ol class="breadcrumb">
                           <li><a href="index.html">Home</a></li>
                           <li>Channel</li>
                           <li>Newest Films Channel</li>
                        </ol>
                     </div>
                  </div>
               </div>
               <div class="container">
                  <div class="browse-inner">
                     <div class="wthree-news-top-left">
                        <div class="col-md-12 w3-agileits-news-left" style="margin-top: 2%;">
                           <div class="col-sm-3 wthree-news-img">
                              <a href="{{ url('/video-details')}}" class="hvr-shutter-out-horizontal"><img src="{{ url('front')}}/uploads/image.jpg" title="album-name" class="img-responsive" alt=" "  />
									<div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
								</a>
                           </div>
                           <div class="col-sm-9 wthree-news-info">
                              <h3><a href="news-single.html">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a></h3>
                              <ul style="margin-bottom: 2%;">
                              	<li style="list-style: none; display: inline;"><i class="fa fa-user" aria-hidden="true"></i> M. Saepul Bahri</li>
                                 <li style="list-style: none; display: inline;"><i class="fa fa-clock-o" aria-hidden="true"></i> 24/09/2016</li>
                                 <li style="list-style: none; display: inline;"><i class="fa fa-eye" aria-hidden="true"></i> 2642</li>
                              </ul>
                              <p>Sed tristique mattis fermentum. Etiam semper aliquet massa, id tempus massa mattis eget.
                              Sed tristique mattis fermentum. Etiam semper aliquet massa, id tempus massa mattis eget.
                          Sed tristique mattis fermentum. Etiam semper aliquet massa, id tempus massa mattis eget.
                      Sed tristique mattis fermentum. Etiam semper aliquet massa, id tempus massa mattis eget.
                  </p>
                              
                           </div>
                           <div class="clearfix"> </div>
                        </div>

                        <div class="col-md-12 w3-agileits-news-left" style="margin-top: 2%;">
                           <div class="col-sm-3 wthree-news-img">
                              <a href="{{ url('/video-details')}}" class="hvr-shutter-out-horizontal"><img src="{{ url('front')}}/uploads/image.jpg" title="album-name" class="img-responsive" alt=" "  />
									<div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
								</a>
                           </div>
                           <div class="col-sm-9 wthree-news-info">
                              <h3><a href="news-single.html">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a></h3>
                              <ul style="margin-bottom: 2%;">
                              	<li style="list-style: none; display: inline;"><i class="fa fa-user" aria-hidden="true"></i> M. Saepul Bahri</li>
                                 <li style="list-style: none; display: inline;"><i class="fa fa-clock-o" aria-hidden="true"></i> 24/09/2016</li>
                                 <li style="list-style: none; display: inline;"><i class="fa fa-eye" aria-hidden="true"></i> 2642</li>
                              </ul>
                              <p>Sed tristique mattis fermentum. Etiam semper aliquet massa, id tempus massa mattis eget.
                              Sed tristique mattis fermentum. Etiam semper aliquet massa, id tempus massa mattis eget.
                          Sed tristique mattis fermentum. Etiam semper aliquet massa, id tempus massa mattis eget.
                      Sed tristique mattis fermentum. Etiam semper aliquet massa, id tempus massa mattis eget.
                  </p>
                           </div>
                           <div class="clearfix"> </div>
                        </div>

                        <div class="clearfix"> </div>
                     </div>
                     
            </div>
         </div>
         <!--//browse-agile-w3ls -->
         <div class="blog-pagenat-wthree">
            <ul>
               <li><a class="frist" href="#">Prev</a></li>
               <li><a href="#">1</a></li>
               <li><a href="#">2</a></li>
               <li><a href="#">3</a></li>
               <li><a href="#">4</a></li>
               <li><a href="#">5</a></li>
               <li><a class="last" href="#">Next</a></li>
            </ul>
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