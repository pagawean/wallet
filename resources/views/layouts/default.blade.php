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
<link rel="stylesheet" href="{{ url('front')}}/css/contactstyle.css" type="text/css" media="all" />
<link rel="stylesheet" href="{{ url('front')}}/css/faqstyle.css" type="text/css" media="all" />
<link href="{{ url('front')}}/css/single.css" rel='stylesheet' type='text/css' />
<link href="{{ url('front')}}/css/medile.css" rel='stylesheet' type='text/css' />
<!-- banner-slider -->
<link href="{{ url('front')}}/css/jquery.slidey.min.css" rel="stylesheet">
<!-- //banner-slider -->
<!-- pop-up -->
<link href="{{ url('front')}}/css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
<!-- //pop-up -->
<!-- font-awesome icons -->
<link rel="stylesheet" href="{{ url('front')}}/css/font-awesome.min.css" />
<!-- //font-awesome icons -->
@stack('css_plugin')
<!-- custom -->
<link href="{{ url('/metronic/theme') }}/assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
<link href="{{ url('/metronic/theme') }}/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="{{ url('front')}}/css/custom.css" />
<!-- //custom -->

<link href="{{ url('front') }}/node_modules/video.js/dist/video-js.css" rel="stylesheet">
<link href="{{ url('front/css') }}/videojs-playlist-ui.vertical.css" rel="stylesheet">
<link href="{{ url('front/css') }}/video-playlist.css" rel="stylesheet">

<script src="https://vjs.zencdn.net/ie8/1.1/videojs-ie8.min.js"></script>
 <script src="https://vjs.zencdn.net/5.19/video.js"></script>
@yield('css')
<!-- js -->
<script type="text/javascript" src="{{ url('front')}}/js/jquery-2.1.4.min.js"></script>
<!-- //js -->
<!-- banner-bottom-plugin -->
<link rel="stylesheet" href="{{ url('front')}}/owljs/owlcarousel/assets/owl.carousel.min.css">
<link rel="stylesheet" href="{{ url('front')}}/owljs/owlcarousel/assets/owl.theme.default.min.css">
<script src="{{ url('front')}}/owljs/vendors/jquery.min.js"></script>
<script src="{{ url('front')}}/owljs/owlcarousel/owl.carousel.js"></script>
<script src="{{ url('/metronic/theme') }}/assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
<script src="{{ url('/metronic/theme') }}/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>

<script>
	$(document).ready(function() {
		$("#owl-demo").owlCarousel({

		  autoPlay: 3000, //Set AutoPlay to 3 seconds

		  items : 5,
		  itemsDesktop : [640,4],
		  itemsDesktopSmall : [414,3]

		});

	});
</script>
<!-- //banner-bottom-plugin -->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700italic,700,400italic,300italic,300' rel='stylesheet' type='text/css'>
<!-- start-smoth-scrolling -->
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
<!-- start-smoth-scrolling -->
</head>
<body>
@include('partials.header')
@yield('content')
@include('partials.footer')
<!-- Bootstrap Core JavaScript -->
<script src="{{ url('front')}}/js/bootstrap.min.js"></script>
<script src="{{ url('front')}}/owljs/vendors/highlight.js"></script>
@stack('js_plugin')
<script src="{{ url('front')}}/owljs/js/app.js"></script>
 <script>
$(document).ready(function() {
  $('.owl-carousel').owlCarousel({
 
    loop: true,
    autoWidth: true,
    items: 4,

    loop:true,
 
    autoplay:true,
    autoplayTimeout:1000,
    autoplayHoverPause:true
  })
})
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
    $().UItoTop({ easingType: 'easeOutQuart' });
    $.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});

	@if(!empty($columns))
                $('#datatable tfoot th').each( function () {
                    var title = $(this).text();
                    $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
                } );
                var table = $('#datatable').DataTable({
                    processing: true,
//                    dom: 'Bfrtip',
//                    buttons: [
//                        'copy', 'csv', 'excel', 'pdf', 'print'
//                    ],
                    serverSide: true,
                    ajax: '{{ url()->current() }}',
                    columns: {!! General::columnDatatable($columns) !!}
                });
                // Apply the search
                table.columns().every( function () {
                    var that = this;

                    $( 'input', this.footer() ).on( 'keyup change', function () {
                        if ( that.search() !== this.value ) {
                            that
                                .search( this.value )
                                .draw();
                        }
                    } );
                } );
                @endif
});

</script>

<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
@if(!empty($validator))
{!! $validator->render() !!}
@endif

@yield('js')
@stack('js')
</body>
</html>
