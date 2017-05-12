@extends('main')

@section('title', "$itag->name Itag")

@section('content')
		
	<div class="row">
		<div class="col-md-8">
			<h1>{{ $itag->name }} Itag <span class="badge">{{ $itag->items()->count() }}</span> <small> Items </small></h1>
		</div>
		<div class="col-md-2">
			<a href="{{ route('itags.edit', $itag->id) }}" class="btn pull-right btn-primary btn-block" style="margin-top: 20px;">Edit</a>
		</div>
		<div class="col-md-2">
			{!! Form::open(['route' => ['itags.destroy', $itag->id], 'method' => 'DELETE']) !!}
				{{ Form::submit('Delete', array('class' => 'btn pull-right btn-danger btn-block', 'style' => 'margin-top: 20px')) }}
            {!! Form::close() !!}
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<table class="table">
				<thead>
					<th>#</th>
					<th>Title</th>
					<th>Itags</th>
					<th></th>
				</thead>
				<tbody>
					@foreach ($itag->items as $item)
						<tr>
							<th>{{ $item->id }}</th>
							<td>{{ $item->title }}</td>
							<td>
								@foreach($item->itags as $itag)
									<span class="label label-default">{{ $itag->name }}</span>
								@endforeach
							</td>
							<td>
								{!! Html::LinkRoute('items.show', 'View', array($item->slug), array('class' => 'btn btn-default btn-sm')) !!} 
								{!! Html::LinkRoute('items.edit', 'Edit', array($item->id), array('class' => 'btn btn-default btn-sm')) !!}
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>

@endsection

