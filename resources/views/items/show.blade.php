@extends('main')

<?php $titleTag = htmlspecialchars($item->meta_title); ?>
<?php $descriptionTag = htmlspecialchars($item->meta_desscription); ?>
<?php $keywordsTag = htmlspecialchars($item->meta_keywords); ?>

@section('title', "$titleTag")
@section('meta_description', "$descriptionTag")
@section('meta_keywords', "$keywordsTag")

@section('content')
	<div class="container">	
		<div class="row">
			<div class="col-md-8">
				
				<img src="{{ asset('images/'.$item->image) }}" alt="{{ $item->title }}">
				
				<h1>{{ $item->title }}</h1>
				
				<div class="lead">
		            {!! $item->pricing_body !!}
		        </div>

		        <div class="lead">
		            {!! $item->body_1 !!}
		        </div>

		        <hr>

		        <div class="lead">
		            {!! $item->body_2 !!}
		        </div>

		        <hr>

		        <div class="lead">
		            {!! $item->body_3 !!}
		        </div>

		        <hr>

		        <div class="lead">
		            {!! $item->body_4 !!}
		        </div>

		        <div class="itags">
			        @foreach ($item->itags as $itag)
						<span class="label label-default">{{ $itag->name }}</span>
			        @endforeach
		        </div>

			</div>

			<div class="col-md-4">
				<div class="well">
					<dl class="dl-horizontal">
						<label>Meta Title:</label>
						<p>{{ $item->meta_title }}</p>
					</dl>
					<dl class="dl-horizontal">
						<label>Meta Description:</label>
						<p>{{ $item->meta_desscription }}</p>
					</dl>
					<dl class="dl-horizontal">
						<label>Meta Keywords:</label>
						<p>{{ $item->meta_keywords }}</p>
					</dl>
				</div>
			</div>

			<div class="col-md-4">
				<div class="well">
					<dl class="dl-horizontal">
						<label>Type:</label>
						<p>{{ $item->type->name }}</p>
					</dl>
					<dl class="dl-horizontal">
						<label>Weekdays:</label>
						<p>{{ $item->weekdays }}</p>
					</dl>
					<dl class="dl-horizontal">
						<label>GMap:</label>
						<p>{{ $item->google_map }}</p>
					</dl>
					<dl class="dl-horizontal">
						<label>Points:</label>
						<p>{{ $item->points_to_award }}</p>
					</dl>
					<dl class="dl-horizontal">
						<label>Created At:</label>
						<p>{{ date('M j, Y h:ia', strtotime($item->created_at)) }}</p>
					</dl>
					<dl class="dl-horizontal">
						<label>Last Updated:</label>
						<p>{{ date('M j, Y h:ia', strtotime($item->updated_at)) }}</p>
					</dl>
					<hr>
					<div class="row">
						<div class="col-sm-6">
							{!! Html::LinkRoute('items.edit', 'Edit', array($item->id), array('class' => 'btn btn-primary btn-block')) !!}
						</div>
						<div class="col-sm-6">
			                {!! Html::LinkRoute('items.delete', 'Διαγραφή', array($item->id), array('class' => 'btn btn-danger btn-block')) !!}
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							{!! Html::LinkRoute('items.index', '<< See All Items', array(), array('class' => 'btn btn-default btn-block btn-h1-spacing')) !!}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

