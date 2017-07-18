@extends('main')

@section('title', 'Τα Αγαπημένα Μου')

@section('content')

<div id="app">

<div class="row">
    <h1 class="itag_heading">Τα Αγαπημένα Μου!<div class="itag_counter"><span class="badge">{{ $myFavorites->count() }}</span> μαγαζιά</div></h1>
</div>

<div class="container margin_top_container">
    <div class="row">

            @forelse ($myFavorites as $myFavorite)
                
                <div class="col-md-4">
                    <div class="favorite_inner">
                    <div class="favorite_img">
                        <img src="{{ asset('image_preset/'.$myFavorite->image) }}" alt="{{ $myFavorite->name }}" width="330" height="220">
                    </div>

                    <div class="favorite_title">
                        {{ $myFavorite->title }}
                    </div>

                    <div class="favorite_teaser">
                        {!! $myFavorite->list_teaser !!}
                    </div>
                    @if (Auth::check())
                        <div class="panel-footer">
                        
                            <favorite
                                :item={{ $myFavorite->id }}
                                :favorited={{ $myFavorite->favorited() ? 'true' : 'false' }}
                            ></favorite>
                        </div>
                    @endif
                    </div>
                </div>
            @empty
                <p class="empty_favorites"><strong>Δεν έχετε επιλέξει κανένα μαγαζί ως αγαπημένο!</strong> Περιηγηθείτε στις λίστες των μαγαζιών και πατώντας στο εικονίδιο με την καρδιά μπορείτε να το θέσετε ως αγαπημένο. Τα αγαπημένα σας μαγαζιά θα εμφανίζονται πιο ψιλά στην ταξινόμηση.</p>
            @endforelse
    </div>
</div>

</div>

@endsection

@section('scripts')

<script type="text/javascript">

(function ($) {
    $('body').on('click', '.pagination a', function(e) {
        e.preventDefault();

        $('#load a').css('color', '#dfecf6');
        $('#load').append('<img style="position: absolute; left: 0; top: 0; z-index: 100000;" src="/images/loading.gif" />');

        var url = $(this).attr('href');  
        getPosts(url);
        window.history.pushState("", "", url);
    });

    function getPosts(url) {
        $.ajax({
            url : url  
        }).done(function (data) {

          	$('html, body').animate({
		        scrollTop: $("#load").offset().top-100
		    }, 1000, 'swing', function() {
                $('.posts').html(data); 
          	});
             
        }).fail(function () {
            alert('Items could not be loaded.');
        });
    }
})(jQuery);

</script>

@endsection

