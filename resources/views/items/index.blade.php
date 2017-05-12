@extends('main')

@section('title', 'All Items')

@section('content')
		
	<div class="row">
		<div class="col-md-10">
			<h1>All Items</h1>
		</div>
		<div class="col-md-2">
			{!! Html::LinkRoute('items.create', 'Create new item', array(), array('class' => 'btn btn-primary btn-block btn-h1-spacing')) !!}
		</div>
		<div class="col-md-12"><hr></div>

		<div class="row">
			<div class="col-md-12">
				<table class="table table-striped table-bordered table-hover table-responsive">
					<thead>
						<th>#</th>
						<th>Title</th>
						<th>Body</th>
						<th>Cteated At</th>
						<th></th>
					</thead>
					<tbody>
						@foreach ($items as $item)
							<tr>
								<th>{{ $item->id }}</th>
								<td>{{ $item->title }}</td>
								<td>{{ substr(strip_tags($item->body_1), 0, 50) }}{{ strlen(strip_tags($item->body_1)) > 50 ? '...' : '' }}</td>
								<td>{{ date('M j, Y', strtotime($item->created_at)) }}</td>
								<td>
								{!! Html::LinkRoute('items.show', 'View', array($item->slug), array('class' => 'btn btn-default btn-sm')) !!} 
								{!! Html::LinkRoute('items.edit', 'Edit', array($item->id), array('class' => 'btn btn-default btn-sm')) !!}
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>

				<div class="text-center">
					{!!  $items->links() !!}
				</div>

			</div>
		</div>

	</div>

@endsection

