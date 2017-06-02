<div id="app">
<div id="load" style="position: relative;">
	@foreach($items as $item)
		  <div class="row">

		    <div class="col-md-12">

	        <h2>{{ $item->title }}</h2>
	        
			@if (Auth::check())
					<favorite
						:item={{ $item->id }}
						:favorited={{ $item->favorited() ? 'true' : 'false' }}
					 	keep-alive>
					 </favorite>
			@endif

	          <h5>Published: {{ date('M j, Y', strtotime($item->created_at)) }} </h5>

	          <p>{{ substr(strip_tags($item->body_1), 0, 300) }}{{ strlen(strip_tags($item->body_1)) > 300 ? '...' : '' }}</p>

	          <a href="{{ route('bars.single', $item->slug) }}" class="btn btn-primary">Read more</a>

	          <hr>

		    </div>

		  </div>
	@endforeach
</div>
	
<div class="row">
	<div class="col-md-12">
		<div class="text-center">
			{!!  $items->links() !!}
		</div>
	</div>
</div>
</div>
