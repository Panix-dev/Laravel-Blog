@extends('main')

<?php $titleTag = htmlspecialchars($artist->meta_title); ?>
<?php $descriptionTag = htmlspecialchars($artist->meta_desscription); ?>
<?php $keywordsTag = htmlspecialchars($artist->meta_keywords); ?>

@section('title', "$titleTag")
@section('meta_description', "$descriptionTag")
@section('meta_keywords', "$keywordsTag")

@section('content')

	<div class="container margin_top_container">
		<div class="row">

			<div class="col-md-4 venue_side_info">
				
				<div class="artist_image">
					<img src="{{ asset('images/'.$artist->image) }}" alt="{{ $artist->name }}">
				</div>

				<div class="well">
					@unless ( empty($artist->item->title) )
					<div>
						<h3>Ο καλλιτέχνης βρίσκεται</h3>
						<div class="text-center">
						@if ($artist->item->type->id == '1')
						{!! Html::LinkRoute('pistes.single', $artist->item->title, array($artist->item->slug), array('class' => 'btn btn-success')) !!}
						@elseif ($artist->item->type->id == '2')
						{!! Html::LinkRoute('clubs.single', $artist->item->title, array($artist->item->slug), array('class' => 'btn btn-success')) !!}
						@else
						{!! Html::LinkRoute('bars.single', $artist->item->title, array($artist->item->slug), array('class' => 'btn btn-success')) !!}
						@endif
						</div>
					</div>
					@endunless
				</div>

				<div class="well">
					
					<h3>Πληροφορίες Κράτησης</h2>
					
					<dl class="dl-horizontal">
						<label>Τηλέφωνο Κρατήσεων:</label>
						<p class="inner_venue_ci"><a class="btn btn-success" href="tel:6941681692"><span class="glyphicon glyphicon-phone"></span> 694 16 81 692</a></p>
					</dl>
					<dl class="dl-horizontal">
						<label>Email Κρατήσεων:</label>
						<p class="inner_venue_ci"><a class="btn btn-success" href="mailto:info@metr4u.gr"><span class="glyphicon glyphicon-envelope"></span>info@metr4u.gr</a></p>
					</dl>

				</div>
				
				@if (Auth::user() &&  Auth::user()->id == '1')

				<div class="well">
					<div class="row">
						<div class="col-sm-6">
							{!! Html::LinkRoute('artists.edit', 'Επεξεργασία', array($artist->id), array('class' => 'btn btn-primary btn-block')) !!}
						</div>
						<div class="col-sm-6">
							{!! Html::LinkRoute('artists.delete', 'Διαγραφή', array($artist->id), array('class' => 'btn btn-danger btn-block')) !!}
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							{!! Html::LinkRoute('artists.index', '<< Προβολή Όλων', array(), array('class' => 'btn btn-default btn-block btn-h1-spacing')) !!}
						</div>
					</div>
				</div>

				@endif

			</div>

			<div class="col-md-8">

		        <div class="inner_body_area">
		        	<h1 class="artist_header">{{ $artist->name }}</h1>
		            {!! $artist->body !!}
		        </div>
	
			</div>

		</div>
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

