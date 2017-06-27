@extends('main')

<?php $titleTag = htmlspecialchars($post->meta_title); ?>
<?php $descriptionTag = htmlspecialchars($post->meta_desscription); ?>
<?php $keywordsTag = htmlspecialchars($post->meta_keywords); ?>

@section('title', "$titleTag")
@section('meta_description', "$descriptionTag")
@section('meta_keywords', "$keywordsTag")

@section('stylesheets')
	
	{!! Html::style('css/parsley.css') !!}

@endsection

@section('content')
	<div class="container margin_top_container inner_blog_page">
		<div class="row">

			<div class="col-md-8">
				<div class="inner_blog_img_wrapper">
					<img src="{{ asset('images/'.$post->image) }}" alt="{{ $post->title }}">
				</div>
				<div class="inner_body_area">
				<h1 class="artist_header">{{ $post->title }}</h1>
				{!! $post->body !!}
				</div>
				<hr>
					<div class="tags text-right">
						<span class="tag_cat_lbl">Θα το βρείτε στα ακόλουθα tags: </span>
				        @foreach ($post->tags as $tag)
							<a class="label label-default" href="/tags/{{ $tag->slug }}">{{ $tag->name }}</a>
				        @endforeach
			        </div>
		        <hr>
			</div>

			<div class="col-md-4 venue_side_info">
		       
		       <a href="/blog" class="hvr-icon-back">Πίσω στο Blog</a> 

		        <div class="well">
		                
		            <h3>Κατηγορίες (Tags)</h3>

		            <dl class="dl-horizontal text-center">
		                @foreach ($tags as $tag)
		                    <a class="label label-default lg-label-tag" href="/tags/{{ $tag->slug }}">{{ $tag->name }}</a>
		                @endforeach
		            </dl>

		        </div>

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

		        </div>
		        
		    </div>

		</div>

	</div>

@endsection



@section('scripts')

	{!! Html::script('js/parsley.min.js') !!}

@endsection