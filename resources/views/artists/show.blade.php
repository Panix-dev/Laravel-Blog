@extends('main')

<?php $titleTag = htmlspecialchars($artist->meta_title); ?>
<?php $descriptionTag = htmlspecialchars($artist->meta_desscription); ?>
<?php $keywordsTag = htmlspecialchars($artist->meta_keywords); ?>

@section('title', "$titleTag")
@section('meta_description', "$descriptionTag")
@section('meta_keywords', "$keywordsTag")

@section('content')
		
		<div class="row">
			<div class="col-md-8">
				
				<img src="{{ asset('images/'.$artist->image) }}" alt="{{ $artist->name }}">
				
				<h1>{{ $artist->name }}</h1>

		        <div class="lead">
		            {!! $artist->body !!}
		        </div>
		        
				@unless ( empty($artist->item->title) )
				<div>
					<h3>Item:</h3>
					@if ($artist->item->type->id == '1')
					{!! Html::LinkRoute('pistes.single', $artist->item->title, array($artist->item->slug), array('class' => 'btn btn-warning')) !!}
					@elseif ($artist->item->type->id == '2')
					{!! Html::LinkRoute('clubs.single', $artist->item->title, array($artist->item->slug), array('class' => 'btn btn-warning')) !!}
					@else
					{!! Html::LinkRoute('bars.single', $artist->item->title, array($artist->item->slug), array('class' => 'btn btn-warning')) !!}
					@endif
				</div>
				<hr>
				@endunless

			</div>

			<div class="col-md-4">
				<div class="well">
					<div class="row">
						<div class="col-sm-6">
							{!! Html::LinkRoute('artists.edit', 'Edit', array($artist->id), array('class' => 'btn btn-primary btn-block')) !!}
						</div>
						<div class="col-sm-6">
							{!! Form::open(['route' => ['artists.destroy', $artist->id], 'method' => 'DELETE']) !!}

								{{ Form::submit('Delete', array('class' => 'btn btn-danger btn-block')) }}

			                {!! Form::close() !!}
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							{!! Html::LinkRoute('artists.index', '<< See All Artists', array(), array('class' => 'btn btn-default btn-block btn-h1-spacing')) !!}
						</div>
					</div>
				</div>
			</div>
		</div>

@endsection

