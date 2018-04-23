@extends('layouts.default')

@section('title','News Detail')

@section('css')
<!-- list-css -->
<link rel="stylesheet" href="{{ url('front')}}/list-css/list.css" type="text/css" media="all" />
<!-- //list-css -->
<!-- news-css -->
<link rel="stylesheet" href="{{ url('front')}}/news-css/news.css" type="text/css" media="all" />
<!-- //news-css -->
@endsection
@section('header_dashboard')
@section('content')
	<div class="faq">
			<div class="container">
				<div class="col-md-12">
				<div class="agileits-news-top">
					<ol class="breadcrumb">
					  <li><a href="{{ url('') }}">Home</a></li>
					  @if(Request::segment(1)=='article-details')
					   <li><a href="{{ url('article') }}">Article</a></li>
					   @elseif(Request::segment(1)=='news-details')
					   <li><a href="{{ url('news') }}">News</a></li>
					  @endif
					  <li class="active">Detail</li>
					</ol>
				</div>
				<div class="agileinfo-news-top-grids">
					<div class="col-md-8 wthree-top-news-left">
						<div class="wthree-news-left">
							<div class="wthree-news-left-img">
								<img src="{{ url('uploads/'.$news->content_media[0]->name) }}" alt="" />
								<h4>{{ $news->title }}</h4>
								<div class="s-author">
									<p>Posted By <a href="#"><i class="fa fa-user" aria-hidden="true"></i> Admin</a> &nbsp;&nbsp; <i class="fa fa-calendar" aria-hidden="true"></i> {{ date_format($news->created_at,"M d,Y") }} &nbsp;&nbsp;</p>
								</div>
								<div id="fb-root"></div>
								<div class="news-shar-buttons">
									<ul>
										<li>
											<div class="fb-like" data-href="https://www.facebook.com/w3layouts" data-layout="button_count" data-action="like" data-size="small" data-show-faces="false" data-share="false"></div>
											<script>(function(d, s, id) {
											  var js, fjs = d.getElementsByTagName(s)[0];
											  if (d.getElementById(id)) return;
											  js = d.createElement(s); js.id = id;
											  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.7";
											  fjs.parentNode.insertBefore(js, fjs);
											}(document, 'script', 'facebook-jssdk'));</script>
										</li>
										<li>
											<div class="fb-share-button" data-href="https://www.facebook.com/w3layouts" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.facebook.com%2Fw3layouts&amp;src=sdkpreparse">Share</a></div>
										</li>
										<li>
											<!-- Place this tag where you want the +1 button to render. -->
											<div class="g-plusone" data-size="medium"></div>

											<!-- Place this tag after the last +1 button tag. -->
											<script type="text/javascript">
											  (function() {
												var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
												po.src = 'https://apis.google.com/js/platform.js';
												var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
											  })();
											</script>
										</li>
									</ul>
								</div>
								<div class="w3-agile-news-text">
									{!! $news->content !!}
								</div>
							</div>
						</div>
						<!-- agile-comments -->
						<div class="agile-news-comments">
							<div class="agile-news-comments-info">
								<h4>Comments</h4>
								<div class="all-comments">
				                  	<div class="all-comments-info">
				                     	<a href="#">Comments</a>
				                     	<div class="agile-info-wthree-box">
					                        @if(Auth::guard('channel')->check())
					                        <form id="form-comment" method="post">
					                           {{ csrf_field() }}
					                           <textarea placeholder="Message" required="required" name="comment"></textarea>
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
					                     @foreach($news->comments as $comment)
					                     <div class="media">
					                        <h5>{{ $comment->channel->name }}</h5>
					                        <div class="media-left">
					                           <a href="#">
					                           <img src="{{ url('front')}}/uploads/user.jpg" title="One movies" alt=" " />
					                           </a>
					                        </div>
					                        <div class="media-body">
					                           <p>{{ $comment->comment }}</p>
					                           <span>View all posts by :<a href="#"> {{ $comment->channel->username }} </a></span>
					                        </div>
					                     </div>
					                     @endforeach
				                  	</div>
				               </div>
							</div>
						</div>
						<!-- //agile-comments -->
						<div class="news-related">
							
						</div>
					</div>
					<div class="col-md-4 wthree-news-right">
						<!-- news-right-top -->
						<div class="news-right-top">
							<div class="wthree-news-right-heading">
								<h3>Updated News</h3>
							</div>
							<div class="wthree-news-right-top">
								<div class="news-grids-bottom">
									<!-- date -->
									<div id="design" class="date">
										<div id="cycler">
											@foreach($update_newsed as $update_news )
												@if($update_news->type == "news")
													<div class="date-text">
														<a href="{{ url('/news-details/'.$update_news->id.'/'.str_slug($update_news->title))}}">{{ $update_news->title }}</a> &nbsp;{{ date_format($update_news->created_at,"M d,Y") }}
														{!! $update_news->content_preview !!}
													</div>
												@else
													<div class="date-text">
														<a href="{{ url('/article-details/'.$update_news->id.'/'.str_slug($update_news->title))}}">{{ $update_news->title }}</a> &nbsp;{{ date_format($update_news->created_at,"M d,Y") }}
														{!! $update_news->content_preview !!}
													</div>
												@endif
											@endforeach
										</div>
										<script>
		                                    function blinker() {
		                                        $('.blinking').fadeOut(500);
		                                        $('.blinking').fadeIn(500);
		                                    }
		                                    setInterval(blinker, 1000);
										</script>
										<script>
		                                    function cycle($item, $cycler){
		                                        setTimeout(cycle, 2000, $item.next(), $cycler);

		                                        $item.slideUp(1000,function(){
		                                            $item.appendTo($cycler).show();
		                                        });
		                                    }
		                                    cycle($('#cycler div:first'),  $('#cycler'));
										</script>
									</div>
									<!-- //date -->
								</div>
							</div>
						</div>
					</div>
					<div class="clearfix"> </div>
						</div>
					</div>
			</div>
	</div>

@endsection
@endsection
@section('js')
<script>
   $("#form-comment").submit(function(e) {
       var url = "{{ route('post.content.comment',['content_id' => $news->id]) }}";
       $.ajax({
            type: "POST",
            url: url,
            data: $("#form-comment").serialize(),
            success: function(data)
            {
              $(".media-grids").append(data);
            }
       });
       e.preventDefault();
   });
</script>
@endsection