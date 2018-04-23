@extends('layouts.default')

@section('title','Video')

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
			<h4 class="latest-text ml0" >Article</h4>
			<div class="agileits-news-top">
				<ol class="breadcrumb">
					<li><a href="{{ url('') }}">Home</a></li>
					<li class="active">Article</li>
				</ol>
			</div>
			<div class="agileinfo-news-top-grids">
				<div class="col-md-8 wthree-top-news-left">
					<div class="wthree-news-left">
						<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
							<div id="myTabContent" class="tab-content">
								<div role="tabpanel" class="tab-pane fade in active" id="home1" aria-labelledby="home1-tab">
									@foreach( $newsed as $news )
										<div class="wthree-news-top-left">
											<div class="col-md-12 w3-agileits-news-left">
												<div class="col-sm-4 wthree-news-img">
													<a href="{{ url('/article-details/'.$news->id.'/'.$news->title)}}">
														<img src="{{ url('uploads/'.$news->content_media[0]->name) }}" alt="" />
													</a>
												</div>
												<div class="col-sm-8 wthree-news-info">
													<h5><a href="{{ url('/article-details/'.$news->id.'/'.$news->title)}}"> {{ $news->title }}</a></h5>
													{!! $news->content_preview !!}
													<ul>
														<li><i class="fa fa-clock-o" aria-hidden="true"></i> {{ date_format($news->created_at,"M d,Y") }}</li>
													</ul>
												</div>
												<div class="clearfix"> </div>
											</div>
											<div class="clearfix"> </div>
										</div>
									@endforeach
									<div class="blog-pagenat-wthree"/>
									{{ $newsed->links() }}
								</div>
							</div>
						</div>
					</div>
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
									<div class="date-text">
										<a href="{{ url('/article-details/'.$update_news->id.'/'.$update_news->title)}}">{{ $update_news->title }}</a> &nbsp;{{ date_format($update_news->created_at,"M d,Y") }}
										{!! $update_news->content_preview !!}
									</div>
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
	<!-- //faq-banner -->
@endsection
@endsection
@section('js')

@endsection