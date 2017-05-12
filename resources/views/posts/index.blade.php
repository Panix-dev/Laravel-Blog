@extends('main')

@section('title', 'All Post')

@section('content')
		
	<div class="row">
		<div class="col-md-10">
			<h1>All Posts</h1>
		</div>
		<div class="col-md-2">
			{!! Html::LinkRoute('posts.create', 'Create new post', array(), array('class' => 'btn btn-primary btn-block btn-h1-spacing')) !!}
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
						@foreach ($posts as $post)
							<tr>
								<th>{{ $post->id }}</th>
								<td>{{ $post->title }}</td>
								<td>{{ substr(strip_tags($post->body), 0, 50) }}{{ strlen(strip_tags($post->body)) > 50 ? '...' : '' }}</td>
								<td>{{ date('M j, Y', strtotime($post->created_at)) }}</td>
								<td>
								{!! Html::LinkRoute('posts.show', 'View', array($post->id), array('class' => 'btn btn-default btn-sm')) !!} 
								{!! Html::LinkRoute('posts.edit', 'Edit', array($post->id), array('class' => 'btn btn-default btn-sm')) !!}
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

