@extends('main')

@section('title', 'All Categories')

@section('stylesheets')
	
	{!! Html::style('css/parsley.css') !!}

@endsection

@section('content')

        <div class="row">
            
            <h1>Categories</h1>
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

						@foreach ($categories as $category)

						<tr>
							<td> {{ $category->id }} </td>
							<td> {{ $category->name }} </td>
						</tr>

						@endforeach

					</tbody>
				</table>

			</div>

			<div class="col-md-3">
				<div class="well">
					{!! Form::open(array('route' => 'categories.store', 'method' => 'POST', 'data-parsley-validate' => '')) !!}
						
						<h2>New Category</h2>

						<div class="form-group">
							{{ Form::label('name', 'Category Name:') }}
							{{ Form::text('name', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}
						</div>

						{{ Form::submit('Create Category', array('class' => 'btn btn-primary btn-block')) }}

					{!! Form::close() !!}
				</div>
			</div>

        </div> <!-- end of row -->

@endsection

@section('scripts')

	{!! Html::script('js/parsley.min.js') !!}

@endsection