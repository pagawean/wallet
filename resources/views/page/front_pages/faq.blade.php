@extends('layouts.default')

@section('title','Video')

@section('css')
<!-- <link rel="stylesheet" type="text/css" href="https://codepen.io/jasondavis/pen/xRerWB.css"> -->
@endsection
@section('header_dashboard')
@section('content')
<!-- faq-banner -->
	<div class="faq">
		
		<h4 class="latest-text w3_faq_latest_text w3_latest_text">FAQ</h4>
			<div class="container">

				<div class="panel-group w3l_panel_group_faq" id="accordion" role="tablist" aria-multiselectable="true">
				@foreach($faqs as $faq )
				   <div class="panel panel-default">
					<div class="panel-heading" role="tab" id="headingNine">
					  <h4 class="panel-title asd">
						<a class="pa_italic collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#{{ $faq->id }}" aria-expanded="false" aria-controls="collapseNine">
						  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><i class="glyphicon glyphicon-minus" aria-hidden="true"></i>{{ $faq->question }}
						</a>
					  </h4>
					</div>
					<div id="{{ $faq->id }}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingNine">
					   <div class="panel-body panel_text">
						{!! $faq->answer !!}
					  </div>
					</div>
				  </div>
				 @endforeach
				</div>
				
			</div>


<!-- //faq-banner -->
@endsection
@endsection
@section('js')

@endsection