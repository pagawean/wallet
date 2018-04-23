@extends('layouts.default')

@section('title','Video')

@section('css')
<!-- <link rel="stylesheet" type="text/css" href="https://codepen.io/jasondavis/pen/xRerWB.css"> -->
@endsection
@section('header_dashboard')
@section('content')
<div class="contact-agile">
	<div class="container">
		<div class="faq">
			<h4 class="latest-text w3_latest_text ml0">Contact Us</h4>
			<div class="container">
				<form method="POST" action="{{ url('/contact/contact_store') }}"  enctype="multipart/form-data">
					{{ csrf_field() }}
					<input type="text" name="first_name" placeholder="FIRST NAME" required="">
					<input type="text" name="last_name" placeholder="LAST NAME" required="">
					<input type="text" name="email" placeholder="EMAIL" required="">
					<textarea  name="message" placeholder="YOUR MESSAGE" required=""></textarea>
					{{--<input type="submit" value="SEND MESSAGE">--}}
					<button class="" type="submit">SEND MESSAGE</button>
					<div class="clearfix">
					</div>
				</form>
			</div>
		</div>
	</div>
	</div>
@endsection
@section('js')
				<!-- Map-JavaScript -->
			<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>        
			<script type="text/javascript">
				google.maps.event.addDomListener(window, 'load', init);
				function init() {
					var mapOptions = {
						zoom: 11,
						center: new google.maps.LatLng(40.6700, -73.9400),
						styles: [{"featureType":"all","elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#000000"},{"lightness":40}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#000000"},{"lightness":16}]},{"featureType":"all","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":17},{"weight":1.2}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":21}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":16}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":19}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":17}]}]
					};
					var mapElement = document.getElementById('map');
					var map = new google.maps.Map(mapElement, mapOptions);
					var marker = new google.maps.Marker({
						position: new google.maps.LatLng(40.6700, -73.9400),
						map: map,
					});
				}
			</script>
	@endsection