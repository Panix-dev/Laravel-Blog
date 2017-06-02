@extends('main')

@section('title', 'Όλα τα Blog Άρθρα')

@section('content')
		
	<div class="row">
		<div class="col-md-10">
			<h1>Όλα τα Blog Άρθρα</h1>
		</div>
		<div class="col-md-2">
			{!! Html::LinkRoute('posts.create', 'Δημιουργία Νέου', array(), array('class' => 'btn btn-primary btn-block btn-h1-spacing')) !!}
		</div>
		<div class="col-md-12"><hr></div>

		<div class="row">
			<div class="col-md-12">
				<table class="table table-striped table-bordered table-hover table-responsive">
					<thead>
						<th>#</th>
						<th>Τίτλος</th>
						<th>Περιγραφή</th>
						<th>Δημιουργήθηκε</th>
						<th></th>
						<th></th>
					</thead>
					<tbody>
						@foreach ($posts as $post)
							<tr>
								<td style="width:20px;" align="center"><span class="label label-primary">{{ $post->id }}</span></td>
								<td style="width:10%">{{ $post->title }}</td>
								<td>{{ $post->meta_desscription }}</td>
								<td align="center" style="width:10%">{{ date('M j, Y', strtotime($post->created_at)) }}</td>
								<td style="width:80px;" align="center">
								{!! Html::LinkRoute('posts.show', 'View', array($post->id), array('class' => 'btn btn-primary btn-sm btn-block')) !!} 
								</td>
								<td style="width:80px;" align="center">
								{!! Html::LinkRoute('posts.edit', 'Edit', array($post->id), array('class' => 'btn btn-warning btn-sm btn-block')) !!}
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>

				<div class="text-center">
					{!!  $posts->links() !!}
				</div>

			</div>
		</div>

	</div>

@endsection

