@extends('main')

<?php $titleTag = htmlspecialchars($post->title); ?>

@section('title', "$titleTag")

@section('stylesheets')
	
	{!! Html::style('css/parsley.css') !!}

@endsection

@section('content')
		
		<div class="row">

			<div class="col-md-8 col-md-offset-2">
				<img src="{{ asset('images/'.$post->image) }}" alt="{{ $post->title }}">
				<h1>{{ $post->title }}</h1>
				<p>{!! $post->body !!}</p>
				<hr>
				<p>Posted In: {{ $post->category->name }} </p>
			</div>

		</div>

		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<h3 class="comments_title"><span class="glyphicon glyphicon-comment"></span> {{ $post->comments()->count() }} Comments</h3>
				@foreach($post->comments as $comment)
					<div class="comment">
						<div class="author_info">
							<img src="{{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim($comment->email))) . "?s=50&d=mm" }}" class="author_image" alt="">
							<div class="author_name">
								<h4>{{ $comment->name }}</h4>
								<p class="author_time">{{ date('F nS, Y - G:i', strtotime($comment->created_at)) }}</p>
							</div>
						</div>
						<div class="comment_content">{{ $comment->comment }}</div>
					</div>
				@endforeach
			</div>
		</div>

		<div class="row">
			<div class="col-md-8 col-md-offset-2" id="comment-form">
				{{ Form::open(['route' => ['comments.store', $post->id], 'method' => 'POST', 'data-parsley-validate' => '']) }}
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								{{ Form::label('name', 'Name:') }}
								{{ Form::text('name', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								{{ Form::label('email', 'Email:') }}
								{{ Form::text('email', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255', 'data-parsley-type' => 'email')) }}
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								{{ Form::label('comment', 'Comment:') }}
								{{ Form::textarea('comment', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255', 'rows' => '5')) }}
							</div>

							{{ Form::submit('Add Comment', array('class' => 'btn btn-success btn-lg btn-block')) }}

						</div>
					</div>
				{{ Form::close() }}
			</div>
		</div>

@endsection

@section('scripts')

	{!! Html::script('js/parsley.min.js') !!}

@endsection