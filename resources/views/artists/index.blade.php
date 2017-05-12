@extends('main')

@section('title', 'All Artists')
@section('meta_description', 'Artists Description')
@section('meta_keywords', 'Artists keywords')

@section('content')
		
	<div class="row">
		<div class="col-md-10">
			<h1>All Artists</h1>
		</div>
		<div class="col-md-2">
			{!! Html::LinkRoute('artists.create', 'Create new artist', array(), array('class' => 'btn btn-primary btn-block btn-h1-spacing')) !!}
		</div>
		<div class="col-md-12"><hr></div>

		<div class="row">
			<div class="col-md-12">
				<table class="table table-striped table-bordered table-hover table-responsive">
					<thead>
						<th>#</th>
						<th>Name</th>
						<th>Body</th>
						<th>Cteated At</th>
						<th></th>
					</thead>
					<tbody>
						@foreach ($artists as $artist)
							<tr>
								<th>{{ $artist->id }}</th>
								<td>{{ $artist->name }}</td>
								<td>{{ substr(strip_tags($artist->body), 0, 50) }}{{ strlen(strip_tags($artist->body)) > 50 ? '...' : '' }}</td>
								<td>{{ date('M j, Y', strtotime($artist->created_at)) }}</td>
								<td>
								{!! Html::LinkRoute('artists.show', 'View', array($artist->slug), array('class' => 'btn btn-default btn-sm')) !!} 
								{!! Html::LinkRoute('artists.edit', 'Edit', array($artist->id), array('class' => 'btn btn-default btn-sm')) !!}
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>

				<div class="text-center">
					{!!  $artists->links() !!}
				</div>

			</div>
		</div>

	</div>

@endsection

