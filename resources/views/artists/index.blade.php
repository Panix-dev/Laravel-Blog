@extends('main')

@section('title', 'Όλοι οι Καλλιτέχνες')

@section('content')

<div class="container">

	<div class="row">
		<div class="col-md-10">
			<h1>Όλοι οι Καλλιτέχνες</h1>
		</div>
		<div class="col-md-2">
			{!! Html::LinkRoute('artists.create', 'Δημιουργία Νέου', array(), array('class' => 'btn btn-primary btn-block btn-h1-spacing')) !!}
		</div>
		<div class="col-md-12"><hr></div>

		<div class="row">
			<div class="col-md-12">
				<table class="table table-striped table-bordered table-hover table-responsive">
					<thead>
						<th>#</th>
						<th>Όνομα</th>
						<th>Περιγραφή</th>
						<th>Δημιουργήθηκε</th>
						<th></th>
						<th></th>
					</thead>
					<tbody>
						@foreach ($artists as $artist)
							<tr>
								<td style="width:20px;" align="center"><span class="label label-primary">{{ $artist->id }}</span></td>
								<td style="width:10%">{{ $artist->name }}</td>
								<td>{{ $artist->meta_desscription }}</td>
								<td align="center" style="width:10%">{{ date('M j, Y', strtotime($artist->created_at)) }}</td>
								<td style="width:80px;" align="center">
								{!! Html::LinkRoute('artists.show', 'View', array($artist->slug), array('class' => 'btn btn-primary btn-sm btn-block')) !!} 
								</td>
								<td style="width:80px;" align="center">
								{!! Html::LinkRoute('artists.edit', 'Edit', array($artist->id), array('class' => 'btn btn-warning btn-sm btn-block')) !!}
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

</div>

@endsection

