<div id="app">
<div id="load" style="position: relative;">
  <div class="grid">
	@foreach($items as $item)
	<figure class="effect-zoe col-md-4 col-sm-6">
      <div class="figure_inner">
		
	@if ($item->type_id == 1)
    	<a href="{{ route('pistes.single', $item->slug) }}" title="{{ $item->title }}">
	@elseif ($item->type_id == 2)
		<a href="{{ route('clubs.single', $item->slug) }}" title="{{ $item->title }}">
	@else
		<a href="{{ route('bars.single', $item->slug) }}" title="{{ $item->title }}">
	@endif

      <img src="{{ asset('image_preset/'.$item->image) }}" alt="{{ $item->title }}">
      </a>
      <figcaption>
      
        <h2>{{ $item->title }}</h2>
        <p class="icon-links">
          @if (Auth::check())
              <favorite
                :item={{ $item->id }}
                :favorited={{ $item->favorited() ? 'true' : 'false' }}>
               </favorite>
          @endif

	@if ($item->type_id == 1)
    	<a href="{{ route('pistes.single', $item->slug) }}"><span class="fa fa-eye"></span></a>
	@elseif ($item->type_id == 2)
		<a href="{{ route('clubs.single', $item->slug) }}"><span class="fa fa-eye"></span></a>
	@else
		<a href="{{ route('bars.single', $item->slug) }}"><span class="fa fa-eye"></span></a>
	@endif

          <a href="/contact"><span class="fa fa-mobile"></span></a>
        </p>
        <p class="description">{{ substr(strip_tags($item->list_teaser), 0, 200) }}{{ strlen(strip_tags($item->list_teaser)) > 200 ? '...' : '' }}</p>
      </figcaption>  

      </div> 
    </figure>
	@endforeach
  <div class="clear"></div>
	</div>
</div>
	
<div class="row">
	<div class="col-md-12">
		<div class="text-center">
			{!!  $items->links() !!}
		</div>
	</div>
</div>
</div>