<!DOCTYPE html>
<html lang="en">
<head>
<title>@yield('title')</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="{{ url('front')}}/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="{{ url('front')}}/css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- font-awesome icons -->
<link rel="stylesheet" href="{{ url('front')}}/css/font-awesome.min.css" />
<!-- //font-awesome icons -->
@stack('css_plugin')
<link rel="stylesheet" href="{{ url('front')}}/css/custom.css" />
<script type="text/javascript" src="{{ url('front')}}/js/jquery-2.1.4.min.js"></script>
<style type="text/css">
	body {

    position: relative;
	background-image: url({{ url('front/images/background.jpg') }});
	background-size: cover;

	    background-repeat: no-repeat;
	    background-position: 50% 0;
	    -ms-background-size: cover;
	    -o-background-size: cover;
	    -moz-background-size: cover;
	    -webkit-background-size: cover;
	    background-size: cover;
    /*overflow: hidden;*/
	}
	.container {
		opacity: 0.9;
	}

</style>

<!-- //banner-bottom-plugin -->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700italic,700,400italic,300italic,300' rel='stylesheet' type='text/css'>
<!-- start-smoth-scrolling -->

<script src="{{ url('front')}}/js/bootstrap.min.js"></script>
<script type="text/javascript" src="{{ url('front')}}/js/move-top.js"></script>
<script type="text/javascript" src="{{ url('front')}}/js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<script>
$(document).ready(function(){
    $(".dropdown").hover(            
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
            $(this).toggleClass('open');       
        }
    );
});
</script>
<!-- //Bootstrap Core JavaScript -->
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
<!-- start-smoth-scrolling -->
</head>
<body>

@yield('content')



<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
@if(!empty($validator))
{!! $validator->render() !!}
@endif

@yield('js')
@stack('js')
</body>
</html>
