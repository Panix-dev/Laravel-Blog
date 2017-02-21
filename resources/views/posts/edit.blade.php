@extends('main')

@section('title', 'Edit Blog Post')

@section('stylesheets')
	
	{!! Html::style('css/parsley.css') !!}

@endsection

@section('content')
		
		<div class="row">

			{!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT', 'data-parsley-validate' => '']) !!}

			<div class="col-md-8">

				<div class="form-group">
					{{ Form::label('title', 'Post Title:') }}
					{{ Form::text('title', null, array('class' => 'form-control input-lg', 'required' => '', 'maxlength' => '255')) }}
				</div>

				<div class="form-group">
					{{ Form::label('slug', 'Slug:') }}
					{{ Form::text('slug', null, array('class' => 'form-control input-lg', 'required' => '', 'maxlength' => '255')) }}
				</div>

				<div class="form-group">
					{{ Form::label('body', 'Post Body:') }}
					{{ Form::textarea('body', null, array('class' => 'form-control', 'required' => '')) }}
				</div>

			</div>
			<div class="col-md-4">
				<div class="well">
					<dl class="dl-horizontal">
						<dt>Created At:</dt>
						<dd>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</dd>
					</dl>
					<dl class="dl-horizontal">
						<dt>Last Updated:</dt>
						<dd>{{ date('M j, Y h:ia', strtotime($post->updated_at)) }}</dd>
					</dl>
					<hr>
					<div class="row">
						<div class="col-sm-6">
							{!! Html::LinkRoute('posts.show', 'Cancel', array($post->id), array('class' => 'btn btn-danger btn-block')) !!}
						</div>
						<div class="col-sm-6">
							{{ Form::submit('Save Changes', array('class' => 'btn btn-success btn-block')) }}
						</div>
					</div>
				</div>
			</div>

			{!! Form::close() !!}

		</div>

@endsection

@section('scripts')

	{!! Html::script('js/parsley.min.js') !!}

@endsection