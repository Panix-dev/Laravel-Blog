<div id="load" style="position: relative;">
	@foreach($posts as $post)
		  <div class="row">

		    <div class="col-md-12">

	          <h2>{{ $post->title }}</h2>

	          <h5>Published: {{ date('M j, Y', strtotime($post->created_at)) }} </h5>

	          <p>{{ substr(strip_tags($post->body), 0, 300) }}{{ strlen(strip_tags($post->body)) > 300 ? '...' : '' }}</p>

	          <a href="{{ route('blog.single', $post->slug) }}" class="btn btn-primary">Read more</a>

	          <hr>

		    </div>

		  </div>
	@endforeach
</div>
	
<div class="row">
	<div class="col-md-12">
		<div class="text-center">
			{!!  $posts->links() !!}
		</div>
	</div>
</div>