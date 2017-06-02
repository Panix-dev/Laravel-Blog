@extends('main')

@section('title', 'Κατηγορίες Μαγαζιών')

@section('stylesheets')
	
	{!! Html::style('css/parsley.css') !!}

@endsection

@section('content')

        <div class="row">
            
            <h1>Κατηγορίες Μαγαζιών</h1>
			<hr>
				
			<div class="col-md-7">

				<table class="table table-striped table-bordered table-hover table-responsive">
					<thead>
						<tr>
							<th>#</th>
							<th>Όνομα Κατηγορίας</th>
						</tr>
					</thead>
					<tbody>

						@foreach ($categories as $category)

						<tr>
							<td style="width:20px;" align="center"><span class="label label-primary"> {{ $category->id }} </span></td>
							<td> {{ $category->name }} </td>
						</tr>

						@endforeach

					</tbody>
				</table>

			</div>

			<div class="col-md-5">
				<div class="well">
					{!! Form::open(array('route' => 'categories.store', 'method' => 'POST', 'data-parsley-validate' => '')) !!}
						
						<h2>Νέα Κατηγορία</h2>

						<div class="form-group">
							{{ Form::label('name', 'Όνομα Κατηγορίας:') }}
							{{ Form::text('name', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}
						</div>

						{{ Form::submit('Δημιουργία Κατηγορίας', array('class' => 'btn btn-primary btn-block')) }}

					{!! Form::close() !!}
				</div>
			</div>

        </div> <!-- end of row -->

@endsection

@section('scripts')

	{!! Html::script('js/parsley.min.js') !!}

@endsection