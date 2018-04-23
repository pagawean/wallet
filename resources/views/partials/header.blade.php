
	<div class="header">
		<div class="container">
			<div class="w3layouts_logo">
				<a href="{{ url('/') }}"><img src="{{ url ('front/images/logo-balcony.png')}}" height="50"><span style="display: inline; font-size:40px; margin-top: 10px;"></span></a>
			</div>
			<div class="w3_search">
				<form action="{{ url('videos/search_video')}}" method="post">
					{{ csrf_field() }}
					<input type="text" name="Search" placeholder="Search" required="">
					<input type="submit" value="Go">
				</form>
			</div>
				@if(Auth::guard('channel')->check())
					<div class="pull-right">
						<div class="col-md-12">
							<div class="col-md-2">
								<br>
								<a href="{{url('user_pages/upload')}}" style="color: #ccc;" class="center-block" data-toggle="tooltip" title="Upload your videos?">
									<i class="fa fa-cloud-upload" style="font-size: 30px"></i>
								</a>
							</div>
							<div class="col-md-7 col-md-offset-2">
				              	<div class="dropdown">
					              	<a class="dropdown-toggle" aria-toggle="dropdown" id="dropdownMenu1" aria-haspopup="true" aria-expanded="false">
					                  	@if(!empty(Auth::guard('channel')->user()->avatar))
			                                <img src="{{ Auth::guard('channel')->user()->avatar }}" class="img-circle" width="50" height="50">
			                            @else
			                                <img src="{{url('front/images/default.jpg')}}" alt=""  class="img-circle" width="50" height="50">
			                            @endif
						                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
						                	<li><a href="{{url('user_pages/user_details')}}">My Account</a></li>
										    <li><a href="{{url('user_pages/channels')}}">Channel</a></li>
										    <li><a href="{{route('earning.index')}}">Earning</a></li>
										    <li role="separator" class="divider"></li>
										    <li><a href="{{ url('/logout') }}">Logout</a></li>
										</ul>
					                </a>
				                </div>
			                </div>
		                </div>
		            </div>
				@else
				<div class="w3l_sign_in_register">
					<ul>
						<li>
							<a href="{{ url('logins') }}"  data-target="">
								<i class="fa fa-upload" aria-hidden="true"></i>
							</a>
						</li>
						<li><a href="{{ url('logins') }}"  data-target=""><i class="fa fa-user" aria-hidden="true"></i></a></li>
					</ul>
				
				</div>
				@endif
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- header -->

<!-- //bootstrap-pop-up -->
<!-- nav -->
	@if(Request::segment(2)=='user_pages/upload')
	@else
		<div class="movies_nav" style="display: none;">
			<div class="container">
			
				<nav class="navbar navbar-default">
					<div class="navbar-header navbar-left">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
						<nav>
							<ul class="nav navbar-nav">
								<li class="first"><a href="{{ url('')}}">Home</a></li>
								<li><a href="{{ url('trendings')}}">Trending</a></li>
								<li><a href="{{ url('populars')}}">Popular</a></li>
								<li><a href="{{ url('histories')}}">History</a></li>
								<li><a href="{{ url('news')}}">News</a></li>
								<li><a href="{{ url('article')}}">Artikel</a></li>
							</ul>
						</nav>
					</div>
				</nav>	
			
		</div>
	</div>
@endif
<!-- nav -->