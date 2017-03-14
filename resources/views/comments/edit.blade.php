@extends('main')

@section('title', 'Edit Comment')

@section('stylesheets')
	
	{!! Html::style('css/parsley.css') !!}

@endsection

@section('content')
		
		<div class="row">

			{!! Form::model($comment, ['route' => ['comments.update', $comment->id], 'method' => 'PUT', 'data-parsley-validate' => '']) !!}

			<div class="col-md-8 col-md-offset-2">

			<h1>Edit Comment</h1>
			<hr>

				<div class="form-group">
					{{ Form::label('name', 'Name:') }}
					{{ Form::text('name', null, array('class' => 'form-control', 'disabled' => 'disabled', 'required' => '', 'maxlength' => '255')) }}
				</div>

				<div class="form-group">
					{{ Form::label('email', 'Email:') }}
					{{ Form::text('email', null, array('class' => 'form-control', 'disabled' => 'disabled', 'required' => '', 'maxlength' => '255')) }}
				</div>

				<div class="form-group">
					{{ Form::label('comment', 'Comment:') }}
					{{ Form::textarea('comment', null, array('class' => 'form-control', 'required' => '')) }}
				</div>
				
				<div class="form-group">
					{{ Form::submit('Update Comment', array('class' => 'btn btn-success btn-block')) }}
				</div>

			</div>

			{!! Form::close() !!}

		</div>

@endsection

@section('scripts')

	{!! Html::script('js/parsley.min.js') !!}

@endsection