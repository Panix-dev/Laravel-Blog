@extends('main')

<?php $titleTag = htmlspecialchars($item->meta_title); ?>
<?php $descriptionTag = htmlspecialchars($item->meta_desscription); ?>
<?php $keywordsTag = htmlspecialchars($item->meta_keywords); ?>

@section('title', "$titleTag")
@section('meta_description', "$descriptionTag")
@section('meta_keywords', "$keywordsTag")

@section('content')

	<div class="inner_venue_banner">
		<div class="patter_overaly"></div>
		<img src="{{ asset('images/'.$item->image2) }}" alt="{{ $item->title }}">
		<div class="category_caption">
	        <h1>{{ $item->title }}</h1>
	        <div class="clear"></div>
	        <p><i class="fa fa-calendar-o" aria-hidden="true"></i> Κάθε {{ $item->weekdays }}</p>
	    </div>
	</div>

	<div class="display_mobile">
		<img class="venue_mobile_img" src="{{ asset('images/'.$item->image) }}" alt="{{ $item->title }}">
		<h1 class="mobile_heading_venue">{{ $item->title }}</h1>
	</div>

	<div class="container venue_container">	
		<div class="row">

			<div class="col-md-4 venue_side_info">
			<div class="well">
				
				<h3>Πληροφορίες Κράτησης</h3>
				
				<dl class="dl-horizontal">
					<label>Τηλέφωνο Κρατήσεων:</label>
					<p class="inner_venue_ci"><a class="btn btn-success" href="tel:6941681692"><span class="glyphicon glyphicon-phone"></span> 694 16 81 692</a></p>
				</dl>
				<dl class="dl-horizontal">
					<label>Email Κρατήσεων:</label>
					<p class="inner_venue_ci"><a class="btn btn-success" href="mailto:info@metr4u.gr"><span class="glyphicon glyphicon-envelope"></span>info@metr4u.gr</a></p>
				</dl>
	        	<dl class="dl-horizontal">
					<label>Τιμές:</label>
					<p>{!! $item->pricing_body !!}</p>
				</dl>
				<dl class="dl-horizontal">
					<label>Ημέρες Λειτουργείας:</label>
					<p>{{ $item->weekdays }}</p>
				</dl>
				<dl class="dl-horizontal">
					<label>Ώρα Προσέλευσης:</label>
					<p>23:30 - 00:00</p>
				</dl>

			</div>

			<div class="well">

				<h3>Καλύτερο για</h3>

				<div class="itags">
			        @foreach ($item->itags as $itag)
						<a class="label label-default lb-lg" href="/itags/{{ $itag->slug }}">{{ $itag->name }}</a>
			        @endforeach
		        </div>
			</div>
	
			@if (Auth::user() &&  Auth::user()->id == '1')

			<div class="well">

				<div class="row">
					<div class="col-sm-6">
						{!! Html::LinkRoute('items.edit', 'Edit', array($item->id), array('class' => 'btn btn-primary btn-block')) !!}
					</div>
					<div class="col-sm-6">
						{!! Form::open(['route' => ['items.destroy', $item->id], 'method' => 'DELETE']) !!}

							{{ Form::submit('Delete', array('class' => 'btn btn-danger btn-block')) }}

		                {!! Form::close() !!}
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						{!! Html::LinkRoute('items.index', '<< See All Items', array(), array('class' => 'btn btn-default btn-block btn-h1-spacing')) !!}
					</div>
				</div>

			</div>

			@endif

			</div>

			<div class="col-md-8">

		        <div class="inner_body_area">
		            {!! $item->body_1 !!}
		        </div>

		        <hr>

		        <div class="inner_body_area">
		            {!! $item->body_2 !!}
		        </div>

		        <hr>

		        <div class="inner_body_area">
		            {!! $item->body_3 !!}
		        </div>

		        <hr>

		        <div class="inner_body_area">
		            {!! $item->body_4 !!}
		        </div>

    			@if ( count($item->artists) > 0 )
    				<hr>
					<div class="inner_body_area">
						<div class="artists">
				        	<h2>Καλητέχνες που θα βρίσκονται</h2>
				        	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.<br><br>
							@foreach($item->artists as $artist)
							{!! Html::LinkRoute('artists.show', $artist->name, array($artist->slug), array('class' => 'btn btn-default')) !!}
							@endforeach
				        	</p>
				        </div>
			        </div>
				@endif

		        

			</div>

			</div>
		</div>

	<div class="gmap_area">
		<h3>Τοποθεσία στον χάρτη</h3>
		<iframe src="{{ $item->google_map }}" width="100%" height="450" scrollwheel="false" frameborder="0" style="border:0" allowfullscreen></iframe>
	</div>

	<div class="contact_info">
	    <div class="container">
	        <div class="row">
	            <div class="heading">
	                <h2>Θέλετε Διευκρινίσεις;</h2>
	                <div class="clear"></div>
	                <p>Μην διστάσετε να επικοινωνήσετε μαζί μας!</p>
	            </div>
	            <div class="col-md-6 text-right">
	                Τηλέφωνο Κρατήσεων<br>
	                <span>694 16 81 692</span> <i class="fa fa-comment-o" aria-hidden="true"></i>
	            </div>
	            <div class="col-md-6 text-left">
	                Ηλεκτρονική Διεύθυνση<br>
	                <i class="fa fa-envelope-o" aria-hidden="true"></i> <span>info@metr4u.gr</span>
	            </div>
	        </div>
	    </div>    
	</div>	

@endsection

@section('scripts')


<script type="text/javascript">
	$('.gmap_area').click(function () {
	    $('.gmap_area iframe').css("pointer-events", "auto");
	});

	$( ".gmap_area" ).mouseleave(function() {
	  $('.gmap_area iframe').css("pointer-events", "none"); 
	});

</script>

@endsection