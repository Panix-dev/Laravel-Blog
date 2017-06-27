<div id="load" style="position: relative;">

	@foreach($posts as $post)
		  <div class="blogs">
			
			<div class="grid">
				<figure class="effect-julia">
					<img src="{{ asset('image_preset_blog/'.$post->image) }}" alt="{{ $post->title }}">
					<figcaption>
						<h2 class="blog_list_heading">{{ $post->title }}</h2>
						<div class="hover_caption_area">
							<p>Κατηγορία: {{ $post->category->name }}</p><br>
							<p>Tags:
							  @foreach ($post->tags as $tag)
							    <a class="label label-default" href="/tags/{{ $tag->slug }}">{{ $tag->name }}</a>
							  @endforeach
							</p><br>
							<p>Δημοσιεύθηκε στις {{ date('M j, Y', strtotime($post->created_at)) }}</p>
						</div>
						<a href="{{ route('blog.single', $post->slug) }}">Περισσότερα</a>

					</figcaption>			
				</figure>
			</div>

				<p class="blog_list_teaser">
		            {{ substr(strip_tags($post->body), 0, 460) }}{{ strlen(strip_tags($post->body)) > 460 ? '...' : '' }} 
		            <span class="tag_cat_lbl">Tags:</span>
					  @foreach ($post->tags as $tag)
					    <a class="label label-default tag_cat_lbl_item" href="/tags/{{ $tag->slug }}">{{ $tag->name }}</a>
					  @endforeach
		            <a style="max-width: 100%" href="{{ route('blog.single', $post->slug) }}" class="hvr-sweep-to-top">Περισσότερα</a>
		            <div class="clear"></div>
	          	</p>
		  </div>

		  <hr>
	@endforeach
	
	<div class="clear"></div>
</div>

<div class="row">
	<div class="text-center">
		{!!  $posts->links() !!}
	</div>
</div>
