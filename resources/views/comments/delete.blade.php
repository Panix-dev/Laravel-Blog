@extends('main')

@section('title', 'Delete Comment?')

@section('content')

        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                <h1>Do you want to delete this comment?</h1>
                <hr>

                <p>
                	<strong>Name:</strong> {{ $comment->name }} <br>
                	<strong>Email:</strong> {{ $comment->email }} <br>
                	<strong>Comment:</strong> {{ $comment->comment }}
                </p>

				{!! Form::open(['route' => ['comments.destroy', $comment->id], 'method' => 'DELETE']) !!}

					{{ Form::submit('Yes delete this comment!', array('class' => 'btn btn-danger btn-lg btn-block')) }}

                {!! Form::close() !!}

            </div>
        </div>

@endsection