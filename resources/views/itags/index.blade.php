@extends('main')

@section('title', 'All Itags')

@section('stylesheets')
	
	{!! Html::style('css/parsley.css') !!}

@endsection

@section('content')

        <div class="row">
            
            <h1>Itags</h1>
			<hr>
				
			<div class="col-md-9">

				<table class="table table-striped table-bordered table-hover table-responsive">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
						</tr>
					</thead>
					<tbody>

						@foreach ($itags as $itag)

						<tr>
							<td> {{ $itag->id }} </td>
							<td> <a href="{{ route('itags.show', $itag->id) }}"> {{ $itag->name }} </a></td>
						</tr>

						@endforeach

					</tbody>
				</table>

			</div>

			<div class="col-md-3">
				<div class="well">
					{!! Form::open(array('route' => 'itags.store', 'method' => 'POST', 'data-parsley-validate' => '')) !!}
						
						<h2>New Itag</h2>

						<div class="form-group">
							{{ Form::label('name', 'Itag Name:') }}
							{{ Form::text('name', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}
						</div>

						{{ Form::submit('Create Itag', array('class' => 'btn btn-primary btn-block')) }}

					{!! Form::close() !!}
				</div>
			</div>

        </div> <!-- end of row -->

@endsection

@section('scripts')

	{!! Html::script('js/parsley.min.js') !!}

@endsection