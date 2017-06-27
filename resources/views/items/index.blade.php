@extends('main')

@section('title', 'Όλα τα Μαγαζιά')

@section('content')
<div class="container">		
	<div class="row">
		<div class="col-md-10">
			<h1>Όλα τα Μαγαζιά</h1>
		</div>
		<div class="col-md-2">
			{!! Html::LinkRoute('items.create', 'Δημιουργία Νέου', array(), array('class' => 'btn btn-primary btn-block btn-h1-spacing')) !!}
		</div>
		<div class="col-md-12"><hr></div>

		<div class="row">
			<div class="col-md-12">
				<table class="table table-striped table-bordered table-hover table-responsive">
					<thead>
						<th>#</th>
						<th>Τίτλος</th>
						<th>Τύπος</th>
						<th>Περιγραφή</th>
						<th>Δημιουργήθηκε</th>
						<th></th>
						<th></th>
					</thead>
					<tbody>
						@foreach ($items as $item)
							<tr>
								<td style="width:20px;" align="center"><span class="label label-primary">{{ $item->id }}</span></td>
								<td style="width:10%">{{ $item->title }}</td>
								<td style="width:10%">{{ $item->type->name }}</td>
								<td>{{ $item->meta_desscription }}</td>
								<td align="center" style="width:10%">{{ date('M j, Y', strtotime($item->created_at)) }}</td>
								<td style="width:80px;" align="center">
								{!! Html::LinkRoute('items.show', 'View', array($item->slug), array('class' => 'btn btn-primary btn-sm btn-block')) !!} 
								</td>
								<td style="width:80px;" align="center">
								{!! Html::LinkRoute('items.edit', 'Edit', array($item->id), array('class' => 'btn btn-warning btn-sm btn-block')) !!}
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
</div>
@endsection

