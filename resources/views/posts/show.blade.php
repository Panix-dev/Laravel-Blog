@extends('main')

@section('title', 'Προβολή Άρθρου')

@section('content')
	<div class="container">	
		<div class="row">
			<div class="col-md-8">
				
				<img src="{{ asset('images/'.$post->image) }}" alt="{{ $post->title }}">
				
				<h1>{{ $post->title }}</h1>

		        <div class="lead">
		            {!! $post->body !!}
		        </div>

		        <hr>
				
				<div class="tags">
			        @foreach ($post->tags as $tag)
						<span class="label label-default">{{ $tag->name }}</span>
			        @endforeach
		        </div>

		        <div id="backend_comments">
		        	<h3>Σχόλια <small>{{ $post->comments()->count() }} σύνολο</small></h3>

		        	<table class="table">
		        		<thead>
		        			<th>Όνομα</th>
		        			<th>Email</th>
		        			<th>Σχόλιο</th>
		        			<th></th>
		        		</thead>
		        		<tbody>
		        			@foreach($post->comments as $comment)
								<tr>
									<td>{{ $comment->name }}</td>
									<td>{{ $comment->email }}</td>
									<td>{{ $comment->comment }}</td>
									<td>
										<a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>
										<a href="{{ route('comments.delete', $comment->id) }}" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
									</td>
								</tr>
		        			@endforeach
		        		</tbody>
		        	</table>
		        </div>

			</div>

			<div class="col-md-4">
				<div class="well">
					<dl class="dl-horizontal">
						<label>Meta Title:</label>
						<p>{{ $post->meta_title }}</p>
					</dl>
					<dl class="dl-horizontal">
						<label>Meta Description:</label>
						<p>{{ $post->meta_desscription }}</p>
					</dl>
					<dl class="dl-horizontal">
						<label>Meta Keywords:</label>
						<p>{{ $post->meta_keywords }}</p>
					</dl>
				</div>
			</div>

			<div class="col-md-4">
				<div class="well">
					<dl class="dl-horizontal">
						<label>Url:</label>
						<p><a href="{{ route('blog.single', $post->slug) }}">{{ route('blog.single', $post->slug) }}</a></p>
					</dl>
					<dl class="dl-horizontal">
						<label>Κατηγορία:</label>
						<p>{{ $post->category->name }}</p>
					</dl>
					<dl class="dl-horizontal">
						<label>Δημιουργήθηκε στις:</label>
						<p>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</p>
					</dl>
					<dl class="dl-horizontal">
						<label>Τροποποιήθηκε στις:</label>
						<p>{{ date('M j, Y h:ia', strtotime($post->updated_at)) }}</p>
					</dl>
					<hr>
					<div class="row">
						<div class="col-sm-6">
							{!! Html::LinkRoute('posts.edit', 'Επεξεργασία', array($post->id), array('class' => 'btn btn-primary btn-block')) !!}
						</div>
						<div class="col-sm-6">
							{!! Html::LinkRoute('posts.delete', 'Διαγραφή', array($post->id), array('class' => 'btn btn-danger btn-block')) !!}
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							{!! Html::LinkRoute('posts.index', '<< Προβολή Όλων', array(), array('class' => 'btn btn-default btn-block btn-h1-spacing')) !!}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

