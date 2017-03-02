@extends('main')

@section('title', 'All Tags')

@section('stylesheets')
	
	{!! Html::style('css/parsley.css') !!}

@endsection

@section('content')

        <div class="row">
            
            <h1>Tags</h1>
			<hr>
				
			<div class="col-md-8">

				<table class="table">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
						</tr>
					</thead>
					<tbody>

						@foreach ($tags as $tag)

						<tr>
							<td> {{ $tag->id }} </td>
							<td> <a href="{{ route('tags.show', $tag->id) }}"> {{ $tag->name }} </a></td>
						</tr>

						@endforeach

					</tbody>
				</table>

			</div>

			<div class="col-md-3 col-md-offset-1">
				<div class="well">
					{!! Form::open(array('route' => 'tags.store', 'method' => 'POST', 'data-parsley-validate' => '')) !!}
						
						<h2>New Tag</h2>

						<div class="form-group">
							{{ Form::label('name', 'Tag Name:') }}
							{{ Form::text('name', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}
						</div>

						{{ Form::submit('Create Tag', array('class' => 'btn btn-primary btn-block')) }}

					{!! Form::close() !!}
				</div>
			</div>

        </div> <!-- end of row -->

@endsection

@section('scripts')

	{!! Html::script('js/parsley.min.js') !!}

@endsection