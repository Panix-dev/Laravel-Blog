@extends('main')

@section('title', 'Edit Itag')

@section('stylesheets')
	
	{!! Html::style('css/parsley.css') !!}

@endsection

@section('content')
		
		<div class="row">
		
			<div class="col-md-12">

				{!! Form::model($itag, ['route' => ['itags.update', $itag->id], 'method' => 'PUT', 'data-parsley-validate' => '']) !!}
						
					<div class="form-group">
						{{ Form::label('name', 'Name:') }}
						{{ Form::text('name', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}
					</div>

					{{ Form::submit('Save Changes', array('class' => 'btn btn-success pull-right')) }}

				{{ Form::close() }}

			</div>
		
		</div>

@endsection

@section('scripts')

	{!! Html::script('js/parsley.min.js') !!}

@endsection