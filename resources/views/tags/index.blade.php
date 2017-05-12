@extends('main')

@section('title', 'All Tags')

@section('stylesheets')
	
	{!! Html::style('css/parsley.css') !!}

@endsection

@section('content')

        <div class="row">
            
            <h1>Tags</h1>
			<hr>
				
			<div class="col-md-9">

				<table class="table table-striped table-bordered table-hover table-responsive">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th></th>
						</tr>
					</thead>
					<tbody>

						@foreach ($tags as $tag)

						<tr>
							<td> {{ $tag->id }} </td>
							<td> {{ $tag->name }} </td>
							<td>
								{!! Html::LinkRoute('tags.show', 'View', array($tag->slug), array('class' => 'btn btn-default btn-sm')) !!} 
								{!! Html::LinkRoute('tags.edit', 'Edit', array($tag->id), array('class' => 'btn btn-default btn-sm')) !!}
							</td>
							<td>
								{!! Form::open(['route' => ['tags.destroy', $tag->id], 'method' => 'DELETE']) !!}
									{{ Form::submit('Delete', array('class' => 'btn btn-default btn-sm',)) }}
					            {!! Form::close() !!}
							</td>
						</tr>

						@endforeach

					</tbody>
				</table>

			</div>

			<div class="col-md-3">
				<div class="well">
					{!! Form::open(array('route' => 'tags.store', 'method' => 'POST', 'data-parsley-validate' => '')) !!}
						
						<h2>New Tag</h2>

						<div class="form-group">
							{{ Form::label('name', 'Tag Name:') }}
							{{ Form::text('name', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}
						</div>

						<div class="form-group">
							{{ Form::label('slug', 'Slug:') }}
							{{ Form::text('slug', null, array('class' => 'form-control', 'required' => '', 'minlength' => '5', 'maxlength' => '255')) }}
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